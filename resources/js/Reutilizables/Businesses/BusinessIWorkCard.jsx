import Tippy from "@tippyjs/react"
import React from "react"
import UsersByServicesByBusinessesRest from "../../actions/UsersByServicesByBusinessesRest"

const usersByServicesByBusinessesRest = new UsersByServicesByBusinessesRest()

const BusinessIWorkCard = ({ uuid, name, APP_PROTOCOL, owner, my_services, APP_DOMAIN }) => {

  const beforeRedirect = async ({ invitation_accepted, invitation_token, correlative }) => {
    if (!invitation_accepted) {
      location.href = `${APP_PROTOCOL}://${APP_DOMAIN}/invitation/${invitation_token}`
      return
    }
    const result = await usersByServicesByBusinessesRest.authorize({
      service: correlative,
      business: uuid
    })
    if (!result) return

    location.href = `${APP_PROTOCOL}://${correlative}.${APP_DOMAIN}/home`
    // window.open(`${APP_PROTOCOL}://${correlative}.${APP_DOMAIN}/home`)
  }

  return <div key={`business-${uuid}`} className="card mb-0 border" style={{ width: '240px', minHeight: '120px' }}>
    <div className="card-body">
      <h5 className="mt-0 mb-1 text-truncate">
        <i className='fa fa-building me-1'></i>
        {name}
      </h5>
      <p className="text-muted mb-1 font-13 text-truncate">
        {(`${owner?.name} ${owner?.lastname}`).trim() || 'Sin propietario'}
      </p>
      {
        my_services.length == 1
          ? <Tippy content={`Abrir ${my_services[0].name}`}>
            <button className="btn btn-xs btn-white" onClick={() => beforeRedirect(my_services[0])}>
              <img src={`//${my_services[0].correlative}.${APP_DOMAIN}/assets/img/icon.svg`} alt={my_services[0].name} style={{
                height: '16px',
                aspectRatio: 1,
                objectFit: 'contain',
                objectPosition: 'center'
              }} onError={e => e.target.src = '/assets/img/icon.svg'} />
              <span className="ms-1">{my_services[0].name}</span>
              {
                !my_services[0].invitation_accepted && <i className="text-muted ms-1" style={{ fontSize: 'small' }}>Pendiente</i>
              }
            </button>
          </Tippy>
          : <div style={{ position: 'relative' }}>
            <button className="btn btn-xs btn-light dropdown-toggle" type="button" id="dropdown-services-button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Ver servicios <i className="mdi mdi-chevron-down"></i>
            </button>
            <div className="dropdown-menu" aria-labelledby="dropdown-services-button">
              {my_services.map((service, i) => {
                return <button key={`service-${i}`} className="dropdown-item d-flex align-items-center gap-1" target="_blank" onClick={() => beforeRedirect(service)}>
                  <img src={`//${service.correlative}.${APP_DOMAIN}/assets/img/icon.svg`} alt={service.name} style={{
                    height: '16px',
                    aspectRatio: 1,
                    objectFit: 'contain',
                    objectPosition: 'center'
                  }} onError={e => e.target.src = '/assets/img/icon.svg'} />
                  <span className="ms-1">{service.name}</span>
                  {
                    !service.invitation_accepted && <i className="text-muted ms-1" style={{ fontSize: 'small' }}>Pendiente</i>
                  }
                </button>
              })}
            </div>
          </div>
      }
    </div>
  </div>
}

export default BusinessIWorkCard