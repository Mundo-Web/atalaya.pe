import { createRoot } from 'react-dom/client'
import React, { useState } from 'react'
import CreateReactScript from './Utils/CreateReactScript'
import InputContainer from './Reutilizables/Join/InputContainer'
import DropDownContainer from './Reutilizables/Join/DropDownContainer';
import AuthRest from './actions/AuthRest';
import Global from './Utils/Global';

const Register = ({ invitation, prefixes = [] }) => {
  const [firstName, setFirstName] = useState('')
  const [lastName, setLastName] = useState('')
  const [documentType, setDocumentType] = useState('DNI')
  const [documentNumber, setDocumentNumber] = useState('')
  const [phonePrefix, setPhonePrefix] = useState('51')
  const [phone, setPhone] = useState('')
  const [password, setPassword] = useState('')
  const [passwordConfirm, setPasswordConfirm] = useState('')

  const onRegisterSubmit = async (e) => {
    e.preventDefault()
    const request = {
      name: firstName,
      lastname: lastName,
      document_type: documentType,
      document_number: documentNumber,
      phone_prefix: phonePrefix,
      phone: phone,
      password: password,
      confirmation: passwordConfirm,
    }

    const result = await AuthRest.signup(request)
    if (!result) return

    location.href = `//${result}.${Global.APP_DOMAIN}/home`
  }

  return (<>
    <main className="text-[#000938] bg-no-repeat bg-cover bg-fixed bg-center" style={{
      // backgroundImage: 'url(/assets/img/background-auth.png)',
    }}>
      <header className="bg-white shadow-lg">
        <div className="max-w-7xl w-full mx-auto relative flex items-center justify-center py-4 px-4 sm:px-6 lg:px-8">
          <a href="/" className="transition-transform hover:scale-105">
            <img src="/assets/img/logo-dark.svg" alt="" style={{ height: '32px' }} />
          </a>
        </div>
      </header>
      <section className="relative bg-[#f8f8f8]">
        <img
          className='absolute top-0 left-0 w-full h-full z-0'
          src="/assets/img/background-auth.png"
        />
        <div className={` mx-auto flex flex-col md:flex-row z-10 items-center justify-center`}>
          <div className={`relative h-[calc(100vh-144px)] md:h-[calc(100vh-116px)] overflow-y-auto w-full p-6 md:p-12 z-10  justify-center items-center`}>
            <div className="bg-white block rounded-xl max-w-lg w-full mx-auto p-6 shadow-lg">
              <i className="mdi mdi-account mdi-36px w-14 h-14 bg-[#DBE0FF] mx-auto mb-6 rounded-2xl flex items-center justify-center text-[#4621E1]"></i>
              <h2 className="text-3xl font-bold mb-2 text-center w-full">
                Registro en Atala<span className="text-[#FE4611]">y</span>a
              </h2>
              <p className="text-gray-600 text-center mb-6">Completa tus datos para registrarte</p>
              <form onSubmit={onRegisterSubmit}>
                <h4 className='font-bold mb-2'>Datos personales</h4>
                <div className="space-y-4 mb-4">
                  <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <DropDownContainer
                      label='Tipo de doc.'
                      icon="mdi mdi-badge-account-horizontal-outline"
                      value={documentType}
                      values={['DNI', 'CE']}
                      onChange={(e) => setDocumentType(e.target.value)}
                      required
                    />
                    <div className="lg:col-span-2">
                      <InputContainer
                        label='Número de documento'
                        placeholder='00000000'
                        value={documentNumber}
                        onChange={(e) => setDocumentNumber(e.target.value)}
                        required
                      />
                    </div>

                  </div>
                  <div className="grid md:grid-cols-2 gap-4">
                    <InputContainer
                      label='Nombres'
                      icon='mdi mdi-account'
                      placeholder='Ingresa tus nombres'
                      value={firstName}
                      onChange={e => setFirstName(e.target.value)}
                      required />
                    <InputContainer
                      label='Apellidos'
                      icon='mdi mdi-account'
                      placeholder='Ingresa tus apellidos'
                      value={lastName}
                      onChange={e => setLastName(e.target.value)}
                      required />
                  </div>
                </div>
                <h4 className='font-bold mb-2'>Datos de contacto</h4>
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-4">
                  <div className="lg:col-span-2">
                    <DropDownContainer
                      label='Prefijo'
                      icon="mdi mdi-flag"
                      value={phonePrefix}
                      values={prefixes.map((prefix) => ({
                        value: prefix.realCode,
                        label: (<>
                          <span className="font-emoji w-6 inline-block">{prefix.flag}</span>
                          <span className="font-semibold">{prefix.country}</span>
                          <span className="text-gray-600 text-xs ms-1">{prefix.beautyCode}</span>
                        </>),
                      }))}
                      onChange={(e) => setPhonePrefix(e.target.value)}
                      searchable
                    />
                  </div>
                  <div className="lg:col-span-3">
                    <InputContainer
                      icon='mdi mdi-phone'
                      label='Teléfono'
                      placeholder='000000000'
                      type='tel'
                      value={phone}
                      onChange={(e) => setPhone(e.target.value)}
                      required />
                  </div>
                </div>
                <h4 className='font-bold mb-2'>Datos de inicio de sesión</h4>
                <div className='space-y-4 mb-6'>
                  <InputContainer
                    label='E-mail'
                    placeholder='correo@ejemplo.com'
                    value={invitation.email}
                    disabled />
                  <div className="grid md:grid-cols-2 gap-4">
                    <InputContainer
                      label='Contraseña'
                      placeholder='••••••••'
                      type="password"
                      value={password}
                      onChange={(e) => setPassword(e.target.value)}
                      required
                    />
                    <InputContainer
                      label='Confirmar'
                      placeholder='••••••••'
                      type="password"
                      value={passwordConfirm}
                      onChange={(e) => setPasswordConfirm(e.target.value)}
                      required
                    />
                  </div>
                </div>
                <button
                  type="submit"
                  className="w-full block border-2 border-[#4621E1] bg-[#4621E1] hover:bg-opacity-90 transition-colors font-semibold text-white rounded-xl py-2 px-6"
                >
                  Registrarme
                </button>
              </form>
            </div>
          </div>
        </div>
      </section>
      <footer className="bg-white shadow-lg">
        <div className="max-w-7xl w-full mx-auto relative flex flex-col md:flex-row gap-2 items-center justify-between py-4 px-4 sm:px-6 lg:px-8 text-sm">
          <span>{new Date().getFullYear()} &copy; Atalaya | Propiedad de <a href="//mundoweb.pe" target="_blank" className="text-[#fe4611]">MundoWeb</a></span>
          <span>Powered By MundoWeb</span>
        </div>
      </footer>
    </main>
  </>)
};

CreateReactScript((el, properties) => {
  createRoot(el).render(<Register {...properties} />);
})