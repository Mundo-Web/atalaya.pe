import { createRoot } from "react-dom/client";
import CreateReactScript from "../Utils/CreateReactScript";
import Adminto from "../components/Adminto";
import { useRef, useState } from "react";
import Swal from "sweetalert2";
import Tippy from "@tippyjs/react";
import BusinessesRest from "../actions/Root/BusinessesRest";
import Global from "../Utils/Global";

const businessesRest = new BusinessesRest()

const Businesses = ({ businesses: businessesDB }) => {
  const gridRef = useRef()

  const [businesses, setBusinesses] = useState(businessesDB);

  const onStatusClicked = async (id, status) => {
    const result = await businessesRest.status({ id, status })
    setBusinesses(businesses.map(business => business.id === id ? result : business));
  }

  const onDeleteClicked = async (id) => {
    const firstConfirmation = await Swal.fire({
      title: '¿Estás seguro?',
      text: "¡Esta acción no se puede deshacer!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Sí, continuar!'
    });

    if (!firstConfirmation.isConfirmed) return;

    const secondConfirmation = await Swal.fire({
      title: '¿Estás REALMENTE seguro?',
      text: "¡Esta es tu última oportunidad, la acción no se podrá revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Sí, eliminar definitivamente!'
    });

    if (!secondConfirmation.isConfirmed) return;

    const result = await businessesRest.delete(id);
    if (!result) return;
    setBusinesses(businesses.filter(business => business.id !== id));
  }

  return <>
    <div className="d-flex flex-wrap gap-3 justify-content-center">
      {businesses.map((business) => (
        <div key={business.id} className='card mb-0' style={{ width: '420px' }}>
          <div className="card-body">
            <div className="dropdown float-end">
              <a href="#" className="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i className="mdi mdi-dots-vertical"></i>
              </a>
              <div className="dropdown-menu dropdown-menu-end ">
                {
                  !business.status
                    ? <button className="dropdown-item" onClick={() => onStatusClicked(business.id, false)}>
                      <i className="mdi mdi-restore me-1"></i>
                      <span>Habilitar</span>
                    </button>
                    : <button className="dropdown-item" onClick={() => onStatusClicked(business.id, true)}>
                      <i className="mdi mdi-cancel me-1"></i>
                      <span>Deshabilitar</span>
                    </button>
                }
                <Tippy content="Eliminar definitivamente">
                  <button className="dropdown-item" onClick={() => onDeleteClicked(business.id)}>
                    <i className="mdi mdi-delete me-1"></i>
                    <span>Eliminar</span>
                  </button>
                </Tippy>
              </div>
            </div>
            <h4 className="header-title mt-0 mb-1 text-truncate">
              {!business.status && <small className="me-1 text-danger fw-bold">(Deshabilitada)</small>}
              {business.name}
            </h4>
            <div>
              <span className="d-block">{business.creator?.fullname}</span>
              <small className="text-muted">{business.creator?.email}</small>
            </div>
            <div className="d-flex align-items-center gap-2">
              <hr className="flex-grow-1 my-2" />
              <span>{business.users?.length || 0} usuarios</span>
            </div>
            <div className="table-responsive" style={{ height: '241px' }}>
              <table className="table table-sm mb-0">
                <tbody>
                  {business.users?.map((user, index) => (
                    <tr key={index}>
                      <td valign='middle' style={{
                        width: '0%',
                        borderBottomWidth: index === business.users.length - 1 ? 0 : undefined
                      }}>
                        <div className="position-relative" style={{ width: 'max-content', height: 'max-content' }}>
                          <img src={`/api/profile/thumbnail/${user.relative_id}`} alt="" className="avatar-sm rounded-circle" />
                          <Tippy content={user.service.name}>
                            <img 
                            className="position-absolute bg-white rounded border" 
                            src={`//${user.service.correlative}.${Global.APP_DOMAIN}/assets/img/icon.svg`} 
                            onError={(e) => e.target.src = '/assets/img/icon.svg'}
                            alt={user.service.name}
                              style={{
                                objectFit: 'contain',
                                objectPosition: 'center',
                                width: '18px', height: '18px',
                                padding: '2px',
                                bottom: '-4px',
                                right: '-4px'
                              }}
                            />
                          </Tippy>
                        </div>
                      </td>
                      <td style={{ width: '100%', borderBottomWidth: index === business.users.length - 1 ? 0 : undefined }}>
                        <span className="d-block">{user.fullname}</span>
                        <small className="text-muted">{user.email}</small>
                      </td>
                      <td valign="middle" style={{ borderBottomWidth: index === business.users.length - 1 ? 0 : undefined }}>
                        <button
                          className="btn btn-xs btn-soft-danger"
                          onClick={() => onDeleteClicked(user.id)}
                        >
                          <i className="fa fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      ))}
    </div>
  </>

}

CreateReactScript((el, properties) => {
  if (!properties.can('businesses', 'root')) return location.href = '/';
  createRoot(el).render(
    <Adminto {...properties} title='Empresas'>
      <Businesses {...properties} />
    </Adminto>
  );
})