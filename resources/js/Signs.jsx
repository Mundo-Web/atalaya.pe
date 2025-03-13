import React, { useEffect, useRef, useState } from "react";
import { createRoot } from "react-dom/client";
import CreateReactScript from "./Utils/CreateReactScript.jsx";
import Adminto from "./components/Adminto.jsx";
import Swal from "sweetalert2";
import BusinessSignsRest from "./actions/BusinessSignsRest.js";

const businessSignsRest = new BusinessSignsRest()

const Signs = ({ businesses = [] }) => {
  const [isUploading, setIsUploading] = useState(false);
  const [signs, setSigns] = useState([]);

  // Group signs by business
  const signsByBusiness = signs.reduce((acc, sign) => {
    acc[sign.business_id] = sign;
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
    const formData = new FormData();
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
      isLoadingAll: true
    })
    if (!result) return
    setSigns(result.data)
  }

  useEffect(() => {
    getSigns()
  }, [null])

  return (
    <>
      <div
        className="d-flex align-items-center justify-content-center"
        style={{ minHeight: "calc(100vh - 135px)" }}>
        <div
          className="d-flex flex-wrap justify-content-center gap-3"
          style={{ maxWidth: "960px" }}>
          {businesses.map((business, i) => {
            const sign = signsByBusiness[business.id];
            const uuid = `file-${business.uuid}`;
            return (
              <div
                key={`business-${i}`}
                className="card mb-0"
                style={{ width: "280px" }}>
                <input
                  id={uuid}
                  type="file"
                  className="form-control"
                  accept="image/*"
                  hidden
                  data-id={business.uuid}
                  onChange={onSignUpload}
                  disabled={isUploading} />
                <div className="card-body position-relative p-0">
                  {
                    sign
                      ? <>
                        <label htmlFor={uuid}>
                          <img
                            src={`/repository/signs/${sign.sign}`}
                            alt={`${business.name} signature`}
                            className="w-100"
                            style={{
                              aspectRatio: 5 / 2,
                              objectFit: "contain",
                              cursor: isUploading ? 'not-allowed' : 'pointer'
                            }} />
                        </label>
                        <button
                          className="btn btn-soft-danger btn-xs position-absolute waves-effect rounded-pill"
                          style={{
                            top: "0.5rem",
                            right: "0.5rem",
                          }}
                          type="button"
                          onClick={() => onDeleteClicked(sign.id)}>
                          <i className="mdi mdi-trash-can"></i>
                        </button>
                      </>
                      : <label htmlFor={uuid}
                        className="d-flex align-items-center justify-content-center"
                        style={{
                          aspectRatio: 5 / 2,
                          cursor: isUploading ? 'not-allowed' : 'pointer'
                        }}
                      >
                        <div className="text-center text-muted">
                          <i className="fa fa-signature fa-2x mb-2 d-block"></i>
                          <p className="mb-0">
                            Agregar firma
                          </p>
                        </div>
                      </label>
                  }
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
