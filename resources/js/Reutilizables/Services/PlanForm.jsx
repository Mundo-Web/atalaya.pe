const PlanForm = ({ editedPlan, handleInputChange, handleCancelEdit, handleSaveEdit }) => {
    return (
        <div className="card mb-0 shadow-sm hover-shadow-lg transition-all" style={{ width: '280px', borderRadius: '12px' }}>
            <div className="card-body p-3">
                <div className="text-start">
                    <div className="form-group mb-2">
                        <label htmlFor="plan-name" className="form-label mb-1">Plan</label>
                        <input
                            id="plan-name"
                            type="text"
                            className="form-control form-control-sm"
                            value={editedPlan?.name || ''}
                            onChange={(e) => handleInputChange('name', e.target.value)}
                        />
                    </div>
                    <div className="form-group mb-2">
                        <label htmlFor="plan-description" className="form-label mb-1">Descripción</label>
                        <textarea
                            id="plan-description"
                            className="form-control form-control-sm"
                            value={editedPlan?.description || ''}
                            onChange={(e) => handleInputChange('description', e.target.value)}
                            style={{ minHeight: (2 * 27), fieldSizing: 'content' }}
                        />
                    </div>
                </div>
                <div className="pricing-section">
                    <div className="row">
                        <div className="col-6">
                            <div className="form-group">
                                <label htmlFor="plan-monthly-price" className="form-label mb-1">Precio x mes</label>
                                <div className="input-group">
                                    <input
                                        id="plan-monthly-price"
                                        type="number"
                                        className="form-control form-control-sm"
                                        value={editedPlan?.monthly_price || 0}
                                        onChange={(e) => handleInputChange('monthly_price', parseFloat(e.target.value) || 0)}
                                    />
                                </div>
                            </div>
                        </div>
                        <div className="col-6">
                            <div className="form-group">
                                <label htmlFor="plan-annual-price" className="form-label mb-1">Precio x año</label>
                                <div className="input-group">
                                    <input
                                        id="plan-annual-price"
                                        type="number"
                                        className="form-control form-control-sm"
                                        value={editedPlan?.annual_price || 0}
                                        onChange={(e) => handleInputChange('annual_price', parseFloat(e.target.value) || 0)}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="d-flex justify-content-center gap-2 mt-2">
                    <button className="btn btn-sm btn-secondary" onClick={handleCancelEdit} type="button">
                        Cancelar
                    </button>
                    <button className="btn btn-sm btn-primary" onClick={handleSaveEdit} type="button">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    );
};

export default PlanForm