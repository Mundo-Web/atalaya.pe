import { createRoot } from 'react-dom/client'
import React, { useRef } from 'react'
import CreateReactScript from './Utils/CreateReactScript'

const Recovery = () => {
  document.title = 'Recuperar Contraseña | Atalaya'

  const emailRef = useRef()

  const onRecoverySubmit = (e) => {
    e.preventDefault()
    // Form submission handling will be implemented separately
  }

  return (
    <>
      <div className="account-pages my-5">
        <div className="container">
          <div className="row justify-content-center align-items-center" style={{
            minHeight: 'calc(100vh - 150px)',
          }}>
            <div className="col-md-8 col-lg-6 col-xl-4">
              <div className="text-center">
                <a href="/">
                  <img src="/assets/img/logo-dark.svg" alt="" height="22" className="mx-auto" style={{ height: '22px' }} />
                </a>
                <p className="text-muted mt-2 mb-4">Atalaya by Mundo Web</p>
              </div>
              
              <div className="card">
                <div className="card-body p-4">
                  <div className="text-center mb-4">
                    <h4 className="text-uppercase mt-0 font-bold">Recuperar Contraseña</h4>
                  </div>
                  
                  <form onSubmit={onRecoverySubmit}>
                    <div className="mb-3">
                      <label htmlFor="email" className="form-label">Correo Electrónico</label>
                      <input 
                        ref={emailRef}
                        className="form-control" 
                        type="email" 
                        id="email" 
                        required
                        placeholder="Ingrese su correo electrónico" 
                      />
                    </div>

                    <div className="mb-3 d-grid text-center">
                      <button className="btn btn-primary" type="submit">
                        Enviar Instrucciones
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <div className="row mt-3">
                <div className="col-12 text-center">
                  <p className="text-muted">Recordaste tu contraseña? <a href="/login" className="text-dark ms-1"><b>Inicia Sesión</b></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  )
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Recovery {...properties} />)
})