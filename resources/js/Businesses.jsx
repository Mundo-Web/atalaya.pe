
import Tippy from '@tippyjs/react'
import React, { useEffect, useRef, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript.jsx'
import BusinessesRest from './actions/BusinessesRest.js'
import Adminto from './components/Adminto.jsx'
import Modal from './components/Modal.jsx'
import InputFormGroup from './components/form/InputFormGroup.jsx'
import SelectFormGroup from './components/form/SelectFormGroup.jsx'
import CheckboxFormGroup from './components/form/CheckboxFormGroup.jsx'
import BusinessCard from './Reutilizables/Businesses/BusinessCard.jsx'
import BusinessIWorkCard from './Reutilizables/Businesses/BusinessIWorkCard.jsx'
import { GET } from 'sode-extend-react'
import Swal from 'sweetalert2'

const businessesRest = new BusinessesRest();

const Businesses = ({ businesses, businessesIWork, economic_sectors = [], business_activities = [], session, APP_DOMAIN, APP_PROTOCOL }) => {

  const gridRef = useRef()
  const modalRef = useRef()

  // Business data
  const idRef = useRef()
  const economicSectorRef = useRef()
  const businessActivityRef = useRef()

  // Person data
  const rucRef = useRef()
  const tradenameRef = useRef()
  const businessnameRef = useRef()

  // Owner data
  const ownerDocumentTypeRef = useRef()
  const ownerDocumentNumberRef = useRef()
  const ownerNameRef = useRef()
  const ownerLastnameRef = useRef()

  // Contact data
  const contactDocumentTypeRef = useRef()
  const contactDocumentNumberRef = useRef()
  const contactNameRef = useRef()
  const contactLastnameRef = useRef()

  const [isEditing, setIsEditing] = useState(false)
  const [contactIsOwner, setContactIsOwner] = useState(false)
  
  useEffect(() => {
    if (GET.message) Swal.fire({
      icon: 'info',
      title: 'Mensaje',
      text: GET.message,
      showConfirmButton: false,
      timer: 5000
    })
    history.pushState(null, null, '/businesses')
  }, [null])

  const onModalOpen = (data) => {
    if (data?.id) setIsEditing(true)
    else setIsEditing(false)

    $('[href="#business-data"]').addClass('active')
    $('[href="#owner-data"]').removeClass('active')
    $('#business-data').addClass('active')
    $('#owner-data').removeClass('active')

    idRef.current.value = data?.id || null
    $(economicSectorRef.current).val(data?.economic_sector_id ?? null).trigger('change')
    $(businessActivityRef.current).val(data?.business_activity_id ?? null).trigger('change')
    rucRef.current.value = data?.ruc || null
    tradenameRef.current.value = data?.name || null
    businessnameRef.current.value = data?.lastname || null
    $(ownerDocumentTypeRef.current).val(data?.owner?.document_type ?? 'DNI').trigger('change')
    ownerDocumentNumberRef.current.value = data?.owner?.document_number || null
    ownerNameRef.current.value = data?.owner?.name || null
    ownerLastnameRef.current.value = data?.owner?.lastname || null

    $(modalRef.current).modal('show')
  }

  const onModalSubmit = async (e) => {
    e.preventDefault()

    const request = {
      id: idRef.current.value || undefined,
      economic_sector_id: economicSectorRef.current.value,
      economic_sector: $(economicSectorRef.current).find('option:selected').text(),
      business_activity_id: businessActivityRef.current.value,
      business_activity: $(businessActivityRef.current).find('option:selected').text(),
      business: {
        ruc: rucRef.current.value,
        tradename: tradenameRef.current.value,
        businessname: businessnameRef.current.value,
      },
      owner: {
        document_type: ownerDocumentTypeRef.current.value,
        document_number: ownerDocumentNumberRef.current.value,
        name: ownerNameRef.current.value,
        lastname: ownerLastnameRef.current.value
      }
    }
    if (contactIsOwner) request.contact = request.owner
    else request.contact = {
      document_type: contactDocumentTypeRef.current.value,
      document_number: contactDocumentNumberRef.current.value,
      name: contactNameRef.current.value,
      lastname: contactLastnameRef.current.value
    }

    const result = await businessesRest.save(request)
    if (!result) return

    $(modalRef.current).modal('hide')
    location.href = `/services?business=${result.data}`
  }

  const onRucChange = async (e) => {
    const ruc = e.target.value.replace(/\D/g, '')
    rucRef.current.value = ruc
    if (ruc.length < 11) return
  }

  return (<>
    <div className='row'>
      <div className="col-md-6">
        <div className="card">
          <h5 className="card-header">Mis empresas</h5>
          <div className="card-body d-flex gap-2 justify-content-center flex-wrap">
            <div key='business-create' className="card mb-0 border" style={{ width: '240px', minHeight: '120px', cursor: 'pointer' }} onClick={onModalOpen}>
              <div className="card-body d-flex gap-2 align-items-center justify-content-center flex-column">
                <i className='fa fa-plus'></i>
                <div> Crear empresa</div>
              </div>
            </div>
            {
              businesses.map((business, index) => <BusinessCard key={index} {...business} session={session} />)
            }
          </div>
        </div>
      </div>
      <div className="col-md-6">
        <div className="card">
          <h5 className="card-header">Empresas en las que trabajo</h5>
          <div className="card-body d-flex gap-2 justify-content-center flex-wrap">
            {
              businessesIWork.map((business, index) => <BusinessIWorkCard key={index} {...business} session={session} APP_DOMAIN={APP_DOMAIN} APP_PROTOCOL={APP_PROTOCOL}/>)
            }
          </div>
        </div>
      </div>
    </div>
    <Modal modalRef={modalRef} title={isEditing ? 'Editar empresa' : 'Agregar empresa'} onSubmit={onModalSubmit} size='md'>
      <input ref={idRef} type='hidden' />
      <ul className="nav nav-pills navtab-bg nav-justified">
        <li className="nav-item">
          <Tippy content='Datos de la empresa'>
            <a href="#business-data" data-bs-toggle="tab" aria-expanded="false" className="nav-link active">
              Empresa
            </a>
          </Tippy>
        </li>
        <li className="nav-item">
          <Tippy content='Datos del propietario'>
            <a href="#owner-data" data-bs-toggle="tab" aria-expanded="true" className="nav-link">
              Propietario
            </a>
          </Tippy>
        </li>
        <li className="nav-item">
          <Tippy content='Datos del contacto'>
            <a href="#contact-data" data-bs-toggle="tab" aria-expanded="true" className="nav-link">
              Contacto
            </a>
          </Tippy>
        </li>
      </ul>
      <div className="tab-content" style={{ minHeight: '230px' }}>
        <div className="tab-pane active" id="business-data">
          <div className="row">
            <InputFormGroup eRef={rucRef} label='RUC' col='col-4' required onChange={onRucChange} />
            <InputFormGroup eRef={tradenameRef} label='Nombre comercial' col='col-8' required />
            <InputFormGroup eRef={businessnameRef} label='Razon social' col='col-12' required />
            <SelectFormGroup eRef={economicSectorRef} label='Sector Economico' col='col-md-5' dropdownParent='#business-data' required>
              {economic_sectors.map((item, index) => (<option key={index} value={item.id}>
                {item.name}
              </option>))}
            </SelectFormGroup>
            <SelectFormGroup eRef={businessActivityRef} label='Actividad comercial' col='col-md-7' dropdownParent='#business-data' required>
              {business_activities.map((item, index) => (<option key={index} value={item.id}>
                {item.name}
              </option>))}
            </SelectFormGroup>
          </div>
        </div>
        <div className="tab-pane show" id="owner-data">
          <div className="row">
            <SelectFormGroup eRef={ownerDocumentTypeRef} label='Tipo de documento' col='col-md-6' dropdownParent='#owner-data' disabled={isEditing} required>
              <option value="DNI">DNI - Documento Nacional de Identidad</option>
              <option value="CE">CE - Carnet de Extranjeria</option>
            </SelectFormGroup>
            <InputFormGroup eRef={ownerDocumentNumberRef} label='Numero de documento' col='col-md-6' disabled={isEditing} required />
            <InputFormGroup eRef={ownerNameRef} label='Nombres' col='col-6' disabled={isEditing} required />
            <InputFormGroup eRef={ownerLastnameRef} label='Apellidos' col='col-6' disabled={isEditing} required />
          </div>
        </div>
        <div className='tab-pane show' id='contact-data'>
          <div className='row'>
            <div className="col-12 mb-2" >
              <CheckboxFormGroup className='mx-auto' label='El propietario es el contacto' title='Marcar si el propietario y el contacto son la misma persona' style={{ maxWidth: 'max-content' }} onChange={(e) => setContactIsOwner(e.target.checked)} />
            </div>
            {
              !contactIsOwner && <>
                <SelectFormGroup eRef={contactDocumentTypeRef} label='Tipo de documento' col='col-md-6' dropdownParent='#contact-data' disabled={isEditing} required>
                  <option value="DNI">DNI - Documento Nacional de Identidad</option>
                  <option value="CE">CE - Carnet de Extranjeria</option>
                </SelectFormGroup>
                <InputFormGroup eRef={contactDocumentNumberRef} label='Numero de documento' col='col-md-6' disabled={isEditing} required />
                <InputFormGroup eRef={contactNameRef} label='Nombres' col='col-6' disabled={isEditing} required />
                <InputFormGroup eRef={contactLastnameRef} label='Apellidos' col='col-6' disabled={isEditing} required />
              </>
            }
          </div>
        </div>
      </div>
    </Modal>
  </>
  )
};

CreateReactScript((el, properties) => {
  // if (!properties.can('clients', 'root', 'all', 'list')) return location.href = '/';
  createRoot(el).render(
    <Adminto {...properties} title='Empresas'>
      <Businesses {...properties} />
    </Adminto>
  );
})