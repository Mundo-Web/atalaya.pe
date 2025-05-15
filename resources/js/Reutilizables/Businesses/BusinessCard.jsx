import React from "react"
import { Link } from "@inertiajs/react"

const BusinessCard = ({ id, name, owner, person }) => {
  return <div key={`business-${id}`} className="card mb-0 border shadow-sm" 
    style={{ 
      width: '240px', 
      minHeight: '120px',
      transition: 'all 0.3s ease'
    }}>
    <div className="card-body">
      <h5 className="mt-0 mb-2 text-truncate d-flex align-items-center">
        <i className='fa fa-building me-2 text-primary'></i>
        {name}
      </h5>
      <p className="text-muted mb-3 font-13 text-truncate d-flex align-items-center">
        <i className="fa fa-user me-1 opacity-50"></i>
        {(`${owner?.name} ${owner?.lastname}`).trim() || 'Sin propietario'}
      </p>
      <a href={`/services?business=${person?.document_number}`} 
        className="btn btn-sm btn-primary w-100">
        <i className="fa fa-cog me-1"></i>
        Administrar
      </a>
    </div>
  </div>
}

export default BusinessCard