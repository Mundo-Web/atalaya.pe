import React from "react"
import Global from "../../Utils/Global"

const ServiceCard = ({ id, name, description, correlative, status, onStatusClicked, onPlanesClicked}) => {
  return <div key={`service-${id}`}
    className={`card mb-0 border shadow-sm ${!status ? 'opacity-50' : ''}`}
    style={{
      width: '240px',
      minHeight: '120px',
      transition: 'all 0.3s ease'
    }}>
    <div className="card-body">
      <div className="d-flex align-items-center mb-2">
        <img
          src={`//${correlative}.${Global.APP_DOMAIN}/assets/img/icon.svg`}
          onError={(e) => {
            e.target.onerror = null;
            e.target.src = "/assets/img/icon.svg";
          }}
          alt={name}
          className="me-2"
          style={{
            width: '24px',
            height: '24px',
            objectFit: 'contain',
            objectPosition: 'center'
          }}
        />
        <h4 className="mt-0 mb-0 text-truncate">
          {name}
        </h4>
      </div>
      <small className="d-block text-muted mb-2">
        {description || 'Sin descripción'}
      </small>
      <div className="d-flex justify-content-between align-items-center gap-1">
        <button
          className={`btn btn-xs ${status ? 'btn-success' : 'btn-danger'}`}
          onClick={() => onStatusClicked(id, !!status)}
        >
          <i className={`mdi ${status ? 'mdi-toggle-switch' : 'mdi-toggle-switch-off'} me-1`}></i>
          {status ? 'Activo' : 'Inactivo'}
        </button>
          <button  className="btn btn-xs btn-secondary" onClick={onPlanesClicked}>
            <i className="mdi mdi-cards me-1"></i>
            Planes
          </button>
      </div>
    </div>
  </div>
}

export default ServiceCard
