import { createRoot } from 'react-dom/client'
import React, { useRef, useState } from 'react'
import JSEncrypt from 'jsencrypt'
import CreateReactScript from './Utils/CreateReactScript'
import AuthRest from './actions/AuthRest'
import { a } from '@inertiajs/react'

const ConfirmEmail = ({ email }) => {

  document.title = 'Confirmar correo electronico | Atalaya'

  return (
    <>
      <div className="account-pages mt-5 mb-5">
        <div className="container">
          <div className="row justify-content-center">
            <div className="col-md-8 col-lg-6 col-xl-4">
              <div className="text-center">
                <a href="/">
                  <img src="/assets/img/logo-dark.svg" alt="" height="22" className="mx-auto" style={{ height: '22px' }} />
                </a>
                <p className="text-muted mt-2 mb-4">Atalaya by Mundo Web</p>
              </div>
              <div className="card text-center">
                <div className="card-body p-4">
                  <div className="mb-4">
                    <h4 className="text-uppercase mt-0">Confirmar correo electrónico</h4>
                  </div>
                  <img src="/lte/assets/images/mail_confirm.png" alt="img" width="86" className="mx-auto d-block" />
                  <p className="text-muted font-14 mt-2">Se ha enviado un correo electrónico a <b>{email}</b>. Por favor, verifica si has recibido un mensaje de la empresa y haz clic en el enlace incluido para continuar con el registro.</p>
                  <a href="/login" className="btn d-block btn-pink waves-effect waves-light mt-3">Iniciar sesion</a>
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
  createRoot(el).render(<ConfirmEmail {...properties} />);
})