import { createRoot } from 'react-dom/client'
import React, { useEffect, useRef, useState } from 'react'
import JSEncrypt from 'jsencrypt'
import CreateReactScript from './Utils/CreateReactScript'
import AuthRest from './actions/AuthRest'
import { Link } from '@inertiajs/react'
import Swal from 'sweetalert2'
import { GET } from 'sode-extend-react'
import '../css/login.css'

const Login = ({ PUBLIC_RSA_KEY, token, APP_DOMAIN, APP_PROTOCOL }) => {

  document.title = 'Login | Atalaya'

  const jsEncrypt = new JSEncrypt()
  jsEncrypt.setPublicKey(PUBLIC_RSA_KEY)

  // Estados
  const [loading, setLoading] = useState(false)

  const emailRef = useRef()
  const passwordRef = useRef()
  const rememberRef = useRef()

  useEffect(() => {
    if (GET.message) Swal.fire({
      icon: 'info',
      title: 'Mensaje',
      text: GET.message,
      showConfirmButton: false,
      timer: 3000
    })
    if (GET.service) history.pushState(null, null, `/login?service=${GET.service}`)
    else history.pushState(null, null, '/login')
  }, [null])

  const onLoginSubmit = async (e) => {
    e.preventDefault()
    setLoading(true)

    const email = emailRef.current.value
    const password = passwordRef.current.value

    const request = {
      email: jsEncrypt.encrypt(email),
      password: jsEncrypt.encrypt(password),
      _token: token
    }
    const result = await AuthRest.login(request)

    if (!result) return setLoading(false)

    if (GET.service) location.href = `${APP_PROTOCOL}://${GET.service}.${APP_DOMAIN}/home`;
    else location.href = './home';
  }

  return (
    <>
      <div className="account-pages my-5">
        <div className="container">

          <div className="row justify-content-center align-items-center" style={{
            minHeight: 'calc(100vh - 150px)',
          }}>
            <div className="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-xs-12">
              <div className="text-center">
                <p className="text-muted mt-2 mb-3">Atalaya by Mundo Web</p>
              </div>
              <div className="card">
                <div className="card-header border-bottom bg-white">
                  <a href="/" className='my-1 d-block'>
                    <img src="/assets/img/logo-dark.svg" alt="Atalaya" className="mx-auto" style={{ height: '35px' }} />
                  </a>
                </div>
                <div className="card-body p-3">
                  <div className="text-center mb-3">
                    <h4 className="header-title mt-0 font-bold mb-1">Hola, listo para generar!</h4>
                    <small className="text-muted mb-4">Ingresa tus datos para iniciar sesión.</small>
                  </div>
                  <form onSubmit={onLoginSubmit}>
                    <div className="mb-3">
                      <label htmlFor="email" className="form-label mb-1">
                        Correo o Usuario
                        <span className='ms-1' style={{ color: '#ff6c37' }}>*</span>
                      </label>
                      <input ref={emailRef} className="form-control" type="email" id="email" required
                        placeholder="Ingrese su correo o usuario" disabled={loading} />
                    </div>
                    <div className="mb-3">
                      <label htmlFor="password" className="form-label mb-1">
                        Contraseña
                        <span className='ms-1' style={{ color: '#ff6c37' }}>*</span>
                      </label>
                      <input ref={passwordRef} className="form-control" type="password" required id="password"
                        placeholder="Ingrese su contraseña" disabled={loading} />
                    </div>
                    <div className="mb-3">
                      <div className="form-check">
                        <input ref={rememberRef} type="checkbox" className="form-check-input" id="checkbox-signin" defaultChecked style={{ cursor: 'pointer' }} />
                        <label className="form-check-label" htmlFor="checkbox-signin" style={{ cursor: 'pointer' }}>Recuerdame</label>
                      </div>
                    </div>
                    <div className="d-grid gap-1 text-center">
                      <button className="btn btn-primary" type="submit" disabled={loading}>
                        {
                          loading
                            ? <>
                            <i className='mdi mdi-spin mdi-loading me-1'></i>
                            Verificando
                            </>
                            : <>Iniciar Sesión</>
                        }
                      </button>
                      <button className="btn btn-outline-primary" type="submit" disabled={loading}
                        onClick={() => location.href = '/register'}>
                        Crear cuenta
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              {/* <div className="row mt-3">
                <div className="col-12 text-center">
                  <p> <a href="/recovery" className="text-muted ms-1"><i
                    className="fa fa-lock me-1"></i>Olvidaste tu contraseña?</a></p>
                  <p className="text-muted">No tienes una cuenta aun? <a href="/register"
                    className="text-dark ms-1"><b>Registrate</b></a></p>
                </div>
              </div> */}
            </div>
          </div>
        </div>
      </div>
    </>
  )
};

CreateReactScript((el, properties) => {
  createRoot(el).render(<Login {...properties} />);
})