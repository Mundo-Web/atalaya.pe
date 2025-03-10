import { createRoot } from 'react-dom/client'
import React, { useEffect, useRef, useState } from 'react'
import JSEncrypt from 'jsencrypt'
import CreateReactScript from './Utils/CreateReactScript'
import AuthRest from './actions/AuthRest'
import { Link } from '@inertiajs/react'
import Swal from 'sweetalert2'
import { GET } from 'sode-extend-react'

const Login = ({ PUBLIC_RSA_KEY, token, APP_DOMAIN, APP_PROTOCOL }) => {

  document.title = 'Login | Atalaya'

  const jsEncrypt = new JSEncrypt()
  jsEncrypt.setPublicKey(PUBLIC_RSA_KEY)

  // Estados
  const [loading, setLoading] = useState(true)

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
                    <h4 className="text-uppercase mt-0 font-bold">Inicia Sesión</h4>
                  </div>
                  <form onSubmit={onLoginSubmit}>
                    <div className="mb-3">
                      <label htmlFor="email" className="form-label">Correo o Usuario</label>
                      <input ref={emailRef} className="form-control" type="email" id="email" required
                        placeholder="Ingrese su correo o usuario" />
                    </div>
                    <div className="mb-3">
                      <label htmlFor="password" className="form-label">Contraseña</label>
                      <input ref={passwordRef} className="form-control" type="password" required id="password"
                        placeholder="Ingrese su contraseña" />
                    </div>
                    <div className="mb-3">
                      <div className="form-check">
                        <input ref={rememberRef} type="checkbox" className="form-check-input" id="checkbox-signin" defaultChecked style={{ cursor: 'pointer' }} />
                        <label className="form-check-label" htmlFor="checkbox-signin" style={{ cursor: 'pointer' }}>Recuerdame</label>
                      </div>
                    </div>
                    <div className="mb-3 d-grid text-center">
                      <button className="btn btn-primary" type="submit"> Iniciar Sesión </button>
                    </div>
                  </form>
                </div>
              </div>
              <div className="row mt-3">
                <div className="col-12 text-center">
                  <p> <a href="/recovery" className="text-muted ms-1"><i
                    className="fa fa-lock me-1"></i>Olvidaste tu contraseña?</a></p>
                  <p className="text-muted">No tienes una cuenta aun? <a href="/register"
                    className="text-dark ms-1"><b>Registrate</b></a></p>
                </div>
              </div>
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