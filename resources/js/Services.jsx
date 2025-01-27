import Tippy from '@tippyjs/react';
import React, { useEffect, useRef, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { GET } from 'sode-extend-react';
import Swal from 'sweetalert2';
import ServicesByBusinessesRest from './actions/ServicesByBusinessesRest';
import UsersByServicesByBusinessesRest from './actions/UsersByServicesByBusinessesRest';
import UsersRest from './actions/UsersRest';
import Adminto from './components/Adminto';
import SelectFormGroup from './components/form/SelectFormGroup';
import Modal from './components/Modal';
import ArrayJoin from './Utils/arrayJoin';
import CreateReactScript from './Utils/CreateReactScript';

const usersRest = new UsersRest()
const servicesByBusinessesRest = new ServicesByBusinessesRest()
const usersByServicesByBusinessesRest = new UsersByServicesByBusinessesRest()

const Services = ({ businesses = [], services = [], session, APP_DOMAIN, APP_PROTOCOL }) => {

  const businessRef = useRef()
  const userRef = useRef()
  const modalRef = useRef()

  const [businessRuc, setBusinessRuc] = useState(GET.business)
  const [servicesByBusiness, setServicesByBusiness] = useState({})
  const [serviceLoaded, setServiceLoaded] = useState(null)
  const [usersResult, setUsersResult] = useState([])

  useEffect(() => {
    getServicesByBusiness()
  }, [businessRuc])

  const getServicesByBusiness = async () => {
    const result = await servicesByBusinessesRest.byBusiness(businessRuc);
    const newServicesByBusiness = {}
    for (const sbb of result) {
      newServicesByBusiness[sbb.service.correlative] = sbb
    }
    setServicesByBusiness(newServicesByBusiness)
    return newServicesByBusiness
  }

  const businessTemplate = ({ id, text, element }) => {
    if (!id) return

    const data = JSON.parse($(element).attr('data'))

    const container = document.createElement('div')
    container.style.display = 'block'
    createRoot(container).render(<>
      <div className="relative d-flex align-items-center py-2">
        <div className="flex-grow-1 overflow-hidden">
          <h5 className="mt-0 mb-1 text-truncate">
            <i className='fa fa-building me-1'></i>
            {text}
          </h5>
          <p className="d-block text-gray mb-0 font-13 text-truncate">
            {data.owner.name} {data.owner.lastname}
          </p>
        </div>
      </div>
    </>)
    return container
  }

  const onBusinessChange = (e) => {
    const option = $(businessRef.current).find('option:selected')
    const business = JSON.parse(option.attr('data'))
    const newBusinessRuc = business.person.document_number
    history.pushState(null, null, `/services?business=${newBusinessRuc}`)
    setBusinessRuc(newBusinessRuc)
  }

  const onEnableService = async (e, service) => {
    const { isConfirmed } = await Swal.fire({
      title: "¿Estás seguro?",
      text: "Habilitar el servicio puede aumentar los costos.",
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Continuar",
      cancelButtonText: "Cancelar"
    })
    if (!isConfirmed) return

    e.target.disabled = true
    const result = await servicesByBusinessesRest.enableService(businessRuc, service)
    e.target.disabled = false
    if (!result) return
    // const res = await Fetch(`${APP_PROTOCOL}://${result.data.service}.${APP_DOMAIN}/api/start/${result.data.business}`);
    console.log(result)
    getServicesByBusiness()
  }

  const onOpenManagement = async (service) => {
    setServiceLoaded(service)
    $(modalRef.current).modal('show')
  }

  const onUserSearch = async () => {
    const filter = [
      ['email', 'contains', userRef.current.value],
    ]
    if (serviceLoaded?.users?.length) filter.push('and', [
      '!',
      ArrayJoin(serviceLoaded?.users?.map(({ email }) => (['email', '=', email])), 'or')
    ])
    const result = await usersRest.paginate({ filter })
    console.log(result)
    setUsersResult(result?.data ?? [])
  }

  const onInviteUser = async (email) => {
    const match = serviceLoaded.id
    const result = await usersByServicesByBusinessesRest.inviteUser(email, match)
    if (!result) return
    const newServicesByBusiness = await getServicesByBusiness()
    setServiceLoaded(newServicesByBusiness[serviceLoaded.service.correlative])
  }

  const onDeleteInvitation = async (id) => {
    const result = await usersByServicesByBusinessesRest.delete(id)
    if (!result) return
    const newServicesByBusiness = await getServicesByBusiness()
    setServiceLoaded(newServicesByBusiness[serviceLoaded.service.correlative])
  }

  const onServiceOpen = async ({ correlative }) => {
    const selected = $(businessRef.current).find('option:selected')
    const business = JSON.parse(selected.attr('data'))

    const result = await usersByServicesByBusinessesRest.authorize({
      service: correlative,
      business: business.uuid
    })
    if (!result) return

    location.href = `${APP_PROTOCOL}://${correlative}.${APP_DOMAIN}/home`
    // window.open(`${APP_PROTOCOL}://${correlative}.${APP_DOMAIN}/home`)
  }

  return (
    <>
      <div className='d-flex align-items-center justify-content-center' style={{ minHeight: 'calc(100vh - 135px)' }}>
        <div>
          <div className='mx-auto' style={{ width: '240px' }}>
            <SelectFormGroup eRef={businessRef} templateResult={businessTemplate} templateSelection={businessTemplate} onChange={onBusinessChange}>
              {businesses.map((business, i) => {
                return <option key={`business-${i}`} value={business.id} data={JSON.stringify(business)} selected={GET.business == business.person.document_number}>{business.name}</option>
              })}
            </SelectFormGroup>
          </div>
          <hr className='mx-auto' style={{ width: '180px' }} />
          <div className='d-flex flex-wrap align-items-center justify-content-center gap-3'>
            {
              services.map((service, i) => {
                const sbb = servicesByBusiness[service.correlative]
                return <div key={`service-${i}`} className="card mb-0" style={{ width: '100%', maxWidth: '360px' }}>
                  <div className="card-body project-box">
                    <div className="badge bg-primary float-end">Gratis</div>
                    <h4 className="mt-0"><a href="#" className="text-dark" onClick={() => onServiceOpen(service)}>{service.name} <i className="mdi mdi-arrow-top-right"></i></a></h4>
                    <p className="text-success text-lowercase font-13">{service.correlative}.{APP_DOMAIN}</p>
                    <p className="text-muted font-13" style={{
                      display: '-webkit-box',
                      WebkitLineClamp: 2,
                      textOverflow: 'ellipsis',
                      WebkitBoxOrient: 'vertical',
                      overflow: 'hidden',
                      height: '38px'
                    }}>
                      {service.description}
                    </p>

                    <div className="project-members mb-0">
                      {
                        !sbb ? (
                          service.status ? <Tippy content="Habilitar servicio">
                            <button type="button" className="btn btn-sm btn-soft-primary rounded-pill waves-effect waves-light" onClick={(e) => onEnableService(e, service.correlative)}>
                              <i className='mdi mdi-plus'></i> Habilitar
                            </button>
                          </Tippy>
                            : <span style={{
                              position: 'relative',
                              marginLeft: '-24px',
                              display: 'block',
                              backgroundColor: '#f9c851',
                              color: '#343a40',
                              padding: '.28rem 1.28rem',
                              width: 'max-content',
                              borderRadius: '0 25px 25px 0',
                            }}>Proximamente</span>
                        ) : (
                          <>
                            <h5 className="float-start me-3">Equipo :</h5>
                            <div className="avatar-group">
                              {
                                sbb.users.map((user, i) => (<div key={`user-${i}`} className="avatar-group-item mb-0">
                                  <Tippy content={`${user?.person?.name || user?.name} ${user?.person?.lastname || user?.lastname} ${session.id == user.id && '(Tú)'}`}>
                                    <img src={`/api/profile/thumbnail/${user.relative_id}`} className="rounded-circle avatar-sm" alt={`${user.name} ${user.lastname}`} />
                                  </Tippy>
                                </div>))
                              }
                              <div className="avatar-group-item mb-0" style={{ cursor: 'pointer' }} onClick={() => onOpenManagement(sbb)}>
                                <Tippy content='Gestionar usuarios'>
                                  <img src="/assets/img/plus.svg" className="rounded-circle avatar-sm" alt="Gestionar usuarios" style={{ backgroundColor: 'rgba(255, 255, 255, .5)', border: '1px solid transparent' }} />
                                </Tippy>
                              </div>

                            </div>
                          </>
                        )
                      }
                    </div>
                  </div>
                </div>
              })
            }
          </div>
        </div>
      </div>
      <Modal modalRef={modalRef} onSubmit={(e) => e.preventDefault()} title={`Gestionar acceso a ${serviceLoaded?.service?.name}`} size='md' isStatic={true} hideFooter={true}>
        <div className="d-block btn-group mx-auto" style={{ width: 'max-content' }}>
          <button type="button" className="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i className='fa fa-user-plus'></i> Agregar usuarios a este servicio
          </button>
          <div className="dropdown-menu dropdown-menu-center p-2" style={{ width: '100%' }}>
            <input ref={userRef} className='form-control mb-2' type="text" onChange={onUserSearch} />
            {
              usersResult.map((user, i) => {
                return <>
                  <a key={`user-${i}`} className="dropdown-item py-1 px-2 border-t" href="#" onClick={() => onInviteUser(user.email)}>
                    <p className='mb-0 text-bold text-truncate'>{user?.person?.name || user?.name} {user?.person?.lastname || user?.lastname}</p>
                    <p className='mb-0 text-muted text-truncate' style={{ fontSize: 'small' }}>{user.email}</p>
                  </a>
                </>
              })
            }
          </div>
        </div>
        <hr className='mx-auto' style={{ maxWidth: '240px', width: '100%' }} />
        <div>
          {
            serviceLoaded?.users?.length > 0
              ? <table style={{ width: '100%' }}>
                <tbody>
                  {serviceLoaded?.users?.map((user, i) => {
                    return <tr key={`user-${i}`}>
                      <td>
                        <img src={`/api/profile/thumbnail/${user.relative_id}`} className="rounded-circle avatar-sm me-1" alt={`${user.name} ${user.lastname}`}></img>
                      </td>
                      <td>
                        <div>
                          <h5 className='mt-1 mb-1 text-truncate' >{user?.person?.name || user?.name} {user?.person?.lastname || user?.lastname}</h5>
                          <p className="mb-1 text-truncate" style={{ fontSize: 'small' }}>{user?.email}</p>
                        </div>
                      </td>
                      <td align='center'>
                        {
                          user.pivot.invitation_accepted == false &&
                          <Tippy content="El usuario no ha aceptado la invitacion">
                            <p className='mb-0 text-danger' style={{ fontSize: 'small' }}>Pendiente</p>
                          </Tippy>
                        }
                        <button className='btn btn-xs btn-white rounded-pill' onClick={() => onDeleteInvitation(user.pivot.id)}>
                          <i className='fa fa-trash'></i>
                        </button>
                      </td>
                    </tr>
                  })}
                </tbody>
              </table>
              : <i className='d-block text-center text-muted'>- No hay usuarios vinculados -</i>
          }
        </div>
      </Modal>
    </>
  );
};

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <Adminto {...properties} title='Servicios'>
      <Services {...properties} />
    </Adminto>
  );
})