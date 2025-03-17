import React, { useEffect, useRef, useState } from "react";
import { createRoot } from "react-dom/client";
import CreateReactScript from "./Utils/CreateReactScript.jsx";
import Adminto from "./components/Adminto.jsx";
import Swal from "sweetalert2";
import BusinessSignsRest from "./actions/BusinessSignsRest.js";
import Tippy from "@tippyjs/react";

const businessSignsRest = new BusinessSignsRest()

const Signs = ({ businesses = [] }) => {
  const [isUploading, setIsUploading] = useState(false);
  const [signs, setSigns] = useState([]);

  // Group signs by business as an array
  const signsByBusiness = signs.reduce((acc, sign) => {
    if (!acc[sign.business_id]) acc[sign.business_id] = [];
    acc[sign.business_id].push(sign);
    return acc;
  }, {});

  const onSignUpload = async (e) => {
    const file = e.target.files[0];
    if (!file) return;
    e.target.value = null;
    if (!file.type.startsWith("image/")) {
      Swal.fire({
        title: "Error",
        text: "El archivo debe ser una imagen",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
      return;
    }
    const business_id = e.target.getAttribute("data-id");
    const sign_id = e.target.getAttribute("data-sign");

    const formData = new FormData();
    if (sign_id) formData.append("id", sign_id);
    formData.append("sign", file);
    formData.append("business_id", business_id);

    setIsUploading(true);
    const result = await businessSignsRest.save(formData)
    setIsUploading(false);
    if (!result) return
    getSigns()
  };

  const onDeleteClicked = async (id) => {
    const { isConfirmed } = await Swal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción no se puede deshacer",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "No, cancelar",
    });
    if (!isConfirmed) return
    setIsUploading(true);
    const result = await businessSignsRest.delete(id)
    setIsUploading(false);
    if (!result) return
    getSigns()
  }

  const getSigns = async () => {
    const result = await businessSignsRest.paginate({
      isLoadingAll: true,
      sort: [{
        selector: 'created_at',
        desc: false 
      }]
    })
    if (!result) return
    setSigns(result.data)
  }

  useEffect(() => {
    getSigns()
  }, [null])

  const renderSignatureSlot = (business, sign, index) => {
    const uuid = `file-${business.uuid}-${index}`;
    return (
      <div className="position-relative" style={{ width: '25%', aspectRatio: '.5' }}>
        {sign ? (
          <>
            <label htmlFor={uuid} className="w-100 h-100">
              <img
                src={`/repository/signs/${sign.sign}`}
                alt={`${business.name} signature ${index + 1}`}
                className="w-100 h-100"
                style={{
                  objectFit: "cover",
                  objectPosition: 'center',
                  cursor: isUploading ? 'not-allowed' : 'pointer',
                  // padding: '0.5rem'
                }}
              />
            </label>
            <Tippy content="Quitar firma">
              <i
                className="mdi mdi-trash-can mdi-24px position-absolute text-danger"
                style={{
                  top: "0.25rem",
                  right: "0.25rem",
                }}
                type="button"
                onClick={() => onDeleteClicked(sign.id)}>
              </i>
            </Tippy>
          </>
        ) : (
          <label
            htmlFor={uuid}
            className="d-flex align-items-center justify-content-center w-100 h-100"
            style={{
              cursor: isUploading ? 'not-allowed' : 'pointer'
            }}
          >
            <div className="text-center text-muted">
              <i className="fa fa-plus fa-lg"></i>
            </div>
          </label>
        )}
        <input
          id={uuid}
          type="file"
          className="form-control"
          accept="image/*"
          hidden
          data-id={business.uuid}
          data-sign={sign?.id}
          onChange={onSignUpload}
          disabled={isUploading || (signsByBusiness[business.id]?.length >= 4 && !sign)}
        />
      </div>
    );
  };

  return (
    <>
      <div className="d-flex align-items-center justify-content-center" style={{ minHeight: "calc(100vh - 135px)" }}>
        <div className="d-flex flex-wrap justify-content-center gap-3" style={{ maxWidth: "960px" }}>
          {businesses.map((business, i) => {
            const businessSigns = signsByBusiness[business.id] || [];
            return (
              <div
                key={`business-${i}`}
                className="card mb-0"
                style={{ width: "280px" }}>
                <div className="card-body position-relative p-0">
                  <div className="d-flex flex-wrap">
                    {[0, 1, 2, 3].map((index) => renderSignatureSlot(business, businessSigns[index], index))}
                  </div>
                </div>
                <div className="card-footer bg-light">
                  <h6 className="text-center my-0 text-truncate">
                    <i className="fa fa-building me-1"></i>
                    <b>{business.name}</b>
                  </h6>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </>
  );
};

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <Adminto {...properties} title="Firmas digitales">
      <Signs {...properties} />
    </Adminto>
  );
});
