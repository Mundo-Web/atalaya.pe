import Tippy from "@tippyjs/react"
import Global from "../../Utils/Global"
import { useState } from "react"
import UsersByServicesByBusinessesRest from "../../actions/UsersByServicesByBusinessesRest"
import Swal from "sweetalert2"

const ubsbbRest = new UsersByServicesByBusinessesRest()

const RootBusinessCard = ({ users: usersDB, onStatusClicked, onDeleteClicked, ...business }) => {
  const [users, setUsers] = useState(usersDB)

  const onUserDeleteClicked = async (match_id) => {
    const { isConfirmed } = await Swal.fire({
      title: '¿Estás seguro?',
      text: "No podrás revertir esta acción",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
    });

    if (!isConfirmed) return;

    const result = await ubsbbRest.delete(match_id);
    if (!result) return;

    setUsers(old => old.filter(user => user.match_id !== match_id));
  }

  return <div key={business.id} className='card mb-0' style={{ width: '420px' }}>
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
        <span>{users?.length || 0} usuarios</span>
      </div>
      <div className="table-responsive" style={{ height: '241px' }}>
        <table className="table table-sm mb-0">
          <tbody>
            {users?.map((user, index) => (
              <tr key={index}>
                <td valign='middle' style={{
                  width: '0%',
                  borderBottomWidth: index === users.length - 1 ? 0 : undefined
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
                          width: '20px', height: '20px',
                          padding: '2px',
                          bottom: '-6px',
                          right: '-6px'
                        }}
                      />
                    </Tippy>
                  </div>
                </td>
                <td style={{ width: '100%', borderBottomWidth: index === users.length - 1 ? 0 : undefined }}>
                  <span className="d-block">{user.fullname}</span>
                  <small className="text-muted">{user.email}</small>
                </td>
                <td valign="middle" style={{ borderBottomWidth: index === users.length - 1 ? 0 : undefined }}>
                  {
                    user.id != business.creator.id &&
                    <button
                      className="btn btn-xs btn-soft-danger"
                      onClick={() => onUserDeleteClicked(user.match_id)}
                    >
                      <i className="fa fa-trash-alt"></i>
                    </button>
                  }
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  </div>
}

export default RootBusinessCard