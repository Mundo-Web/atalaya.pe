
import JSEncrypt from 'jsencrypt'
import React, { useRef, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript.jsx'
import ReactAppend from './Utils/ReactAppend.jsx'
import SetSelectValue from './Utils/SetSelectValue.jsx'
import RolesRest from './actions/RolesRest.js'
import UsersRest from './actions/UsersRest.js'
import Adminto from './components/Adminto'
import Modal from './components/Modal.jsx'
import Table from './components/Table.jsx'
import InputFormGroup from './components/form/InputFormGroup.jsx'
import PasswordFormGroup from './components/form/PasswordFormGroup.jsx'
import SelectAPIFormGroup from './components/form/SelectAPIFormGroup.jsx'
import TippyButton from './components/form/TippyButton.jsx'
import DxBox from './components/dx/DxBox.jsx'
import DxButton from './components/dx/DxButton.jsx'
import TeamRest from './actions/TeamRest.js'

const teamRest = new TeamRest()

const Users = ({ session }) => {
  const gridRef = useRef()

  const onDeleteClicked = async (id) => {
    const { isConfirmed } = await Swal.fire({
      title: '¿Estás seguro?',
      text: 'No podrás revertir esto!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar'
    })
    if (!isConfirmed) return
    const result = await teamRest.delete(id)
    if (!result) return
    $(gridRef.current).dxDataGrid('instance').refresh()
  }

  return (<>
    <Table gridRef={gridRef} title='Colaboradores' rest={teamRest}
      toolBar={(container) => {
        container.unshift({
          widget: 'dxButton', location: 'after',
          options: {
            icon: 'refresh',
            hint: 'Refrescar tabla',
            onClick: () => $(gridRef.current).dxDataGrid('instance').refresh()
          }
        });
      }}
      pageSize={25}
      columns={[
        {
          dataField: 'business.name',
          caption: 'Empresa',
        },
        {
          dataField: 'service.name',
          caption: 'Servicio',
        },
        {
          dataField: 'user.name',
          caption: 'Usuario',
          width: '500px',
          cellTemplate: (container, { data }) => {
            const fullname = data.user.name + ' ' + data.user.lastname
            ReactAppend(container, <div className='d-flex gap-2'>
              <img
                className='avatar-sm rounded-circle'
                src={`/api/profile/thumbnail/${data.user.relative_id}`}
                onError={(e) => {
                  e.target.onerror = null
                  e.target.src = `/assets/img/user-404.svg`;
                }}
                style={{ aspectRatio: 1 }}
                alt={fullname} />
              <div>
                <span className='d-block'>{fullname}</span>
                <small className='text-muted'>{data.user.email}</small>
              </div>
            </div>)
          }
        },
        {
          caption: 'Acciones',
          cellTemplate: (container, { data }) => {
            session.id != data.user.id && container.append(DxButton({
              className: 'btn btn-xs btn-soft-danger',
              title: 'Eliminar',
              icon: 'fa fa-trash-alt',
              onClick: () => onDeleteClicked(data.id)
            }))
          },
          allowFiltering: false,
          allowExporting: false
        }
      ]} />
  </>
  )
};

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <Adminto {...properties} title='Colaboradores'>
      <Users {...properties} />
    </Adminto>
  );
})