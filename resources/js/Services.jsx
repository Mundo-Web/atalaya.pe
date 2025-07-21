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
  const [serviceEnabling, setServiceEnabling] = useState(null);

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
    setServiceEnabling(service)
    e.target.disabled = true
    const result = await servicesByBusinessesRest.enableService(businessRuc, service)
    e.target.disabled = false
    setServiceEnabling(null)
    if (!result) return
    getServicesByBusiness()
  }

  const onOpenManagement = async (service) => {
    setServiceLoaded(service)
    $(modalRef.current).modal('show')
  }

  const onUserSearch = async () => {
    const filter = [
      ['email', 'contains', userRef.current.value],
      'or',
      ['name', 'contains', userRef.current.value],
      'or',
      ['lastname', 'contains', userRef.current.value],
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
        <div style={{ width: '100%', maxWidth: '1200px' }}>
          <div className='mx-auto' style={{ width: '280px', marginBottom: '2rem' }}>
            <SelectFormGroup
              eRef={businessRef}
              templateResult={businessTemplate}
              templateSelection={businessTemplate}
              onChange={onBusinessChange}
              className="shadow-sm"
            >
              {businesses.map((business, i) => {
                return <option key={`business-${i}`} value={business.id} data={JSON.stringify(business)} selected={GET.business == business.person.document_number}>{business.name}</option>
              })}
            </SelectFormGroup>
          </div>

          <div className='d-flex flex-wrap justify-content-center gap-4'>
            {services.sort((a, b) => b.status - a.status).map((service, i) => {
              const sbb = servicesByBusiness[service.correlative]
              return (
                <div
                  key={`service-${i}`}
                  className="card mb-0"
                  style={{
                    width: '100%',
                    maxWidth: '360px',
                    transition: 'all 0.3s ease',
                    transform: 'translateY(0)',
                    boxShadow: '0 2px 4px rgba(0,0,0,0.05)',
                    cursor: 'pointer'
                  }}
                  onMouseEnter={e => {
                    e.currentTarget.style.transform = 'translateY(-5px)';
                    e.currentTarget.style.boxShadow = '0 8px 16px rgba(0,0,0,0.1)';
                  }}
                  onMouseLeave={e => {
                    e.currentTarget.style.transform = 'translateY(0)';
                    e.currentTarget.style.boxShadow = '0 2px 4px rgba(0,0,0,0.05)';
                  }}
                >
                  <div className="card-body" style={{ padding: '1.5rem' }}>
                    <div className="d-flex justify-content-between align-items-start mb-3">
                      <div className="d-flex align-items-center gap-2">
                        <img
                          src={`//${service.correlative}.${APP_DOMAIN}/assets/img/icon.svg`}
                          alt={service.name}
                          style={{
                            height: '32px',
                            width: '32px',
                            objectFit: 'contain',
                            padding: '4px',
                            borderRadius: '8px',
                            backgroundColor: 'rgba(0,172,158,0.1)'
                          }}
                          onError={e => e.target.src = '/assets/img/icon.svg'}
                        />
                        <div>
                          <h4 className="mb-0" style={{ fontSize: '1.1rem' }}>
                            <a href="#"
                              className="text-dark d-flex align-items-center gap-2"
                              onClick={() => onServiceOpen(service)}
                              style={{ textDecoration: 'none' }}
                            >
                              {service.name}
                              <i className="mdi mdi-arrow-top-right text-muted"></i>
                            </a>
                          </h4>
                          <p className="text-success mb-0 font-13">{service.correlative}.{APP_DOMAIN}</p>
                        </div>
                      </div>
                      <div className="badge bg-primary" style={{ padding: '0.5rem 1rem', borderRadius: '20px' }}>Gratis</div>
                    </div>

                    <p className="text-muted" style={{
                      fontSize: '0.9rem',
                      lineHeight: '1.5',
                      display: '-webkit-box',
                      WebkitLineClamp: 2,
                      WebkitBoxOrient: 'vertical',
                      overflow: 'hidden',
                      height: '42px',
                      marginBottom: '1.5rem'
                    }}>
                      {service.description}
                    </p>

                    <div className="d-flex align-items-center justify-content-between">
                      {!sbb ? (
                        service.status ? (
                          <button
                            type="button"
                            className="btn btn-primary rounded-pill w-100"
                            style={{
                              background: 'linear-gradient(45deg, #00ac9e, #00c9b7)',
                              border: 'none',
                              boxShadow: '0 2px 6px rgba(0,172,158,0.2)'
                            }}
                            onClick={(e) => onEnableService(e, service.correlative)}
                          >
                            {serviceEnabling ? (
                              <><i className='mdi mdi-spin mdi-loading me-1'></i> Habilitando</>
                            ) : (
                              <><i className='mdi mdi-rocket-launch-outline me-1'></i> Habilitar servicio</>
                            )}
                          </button>
                        ) : (
                          <div className="badge bg-warning text-dark" style={{
                            padding: '0.75rem 1.5rem',
                            borderRadius: '20px',
                            fontSize: '0.9rem',
                            width: '100%',
                            textAlign: 'center'
                          }}>
                            <i className="mdi mdi-clock-outline me-1"></i>
                            Próximamente
                          </div>
                        )
                      ) : (
                        <div className="w-100">
                          <div className="d-flex align-items-center justify-content-between mb-2">
                            <h6 className="mb-0">Equipo</h6>
                            <Tippy content='Gestionar usuarios'>
                              <button
                                className="btn btn-soft-primary btn-sm rounded-circle"
                                style={{ width: '32px', height: '32px', padding: 0 }}
                                onClick={() => onOpenManagement(sbb)}
                              >
                                <i className="mdi mdi-account-plus-outline"></i>
                              </button>
                            </Tippy>
                          </div>
                          <div className="avatar-group">
                            {sbb.users.map((user, i) => (
                              <div key={`user-${i}`} className="avatar-group-item mb-0">
                                <Tippy content={`${user?.person?.name || user?.name} ${user?.person?.lastname || user?.lastname} ${session.id == user.id && '(Tú)'}`}>
                                  <img
                                    src={`/api/profile/thumbnail/${user.relative_id}`}
                                    className="rounded-circle"
                                    alt={`${user.name} ${user.lastname}`}
                                    style={{
                                      width: '32px',
                                      height: '32px',
                                      objectFit: 'cover',
                                      border: '2px solid white'
                                    }}
                                  />
                                </Tippy>
                              </div>
                            ))}
                          </div>
                        </div>
                      )}
                    </div>
                  </div>
                </div>
              );
            })}
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
                    <p className='mb-0 text-bold text-truncate'>{user?.name} {user?.lastname}</p>
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