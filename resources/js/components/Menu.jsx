import React from 'react'
import Logout from '../actions/Logout'
import MenuItem from './MenuItem'
import MenuItemContainer from './MenuItemContainer'
import Tippy from '@tippyjs/react'
import 'tippy.js/dist/tippy.css';

const Menu = ({ session, can }) => {
  const mainRole = session.roles[0]

  const idBirthday = moment(session.birthdate).format('MM-DD') == moment().format('MM-DD')

  return (<div className="left-side-menu">
    <div className="h-100" data-simplebar>
      <div className="user-box text-center">
        <img src={`api/profile/thumbnail/${session.relative_id}?v=${new Date(session.updated_at).getTime() }`} alt={session.name} title={session.name}
          className="rounded-circle img-thumbnail avatar-md" style={{ backgroundColor: 'unset', borderColor: '#98a6ad', objectFit: 'cover', objectPosition: 'center' }} />
        <div className="dropdown">
          <a href="#" className="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
            aria-expanded="false">{session.name} {session.lastname} {idBirthday ? <Tippy content={`Feliz cumpleaños ${session.name}`} arrow={true}><i className=' fas fa-birthday-cake text-danger'></i></Tippy> : ''}</a>
          <div className="dropdown-menu user-pro-dropdown">


            <a href="/profile" className="dropdown-item notify-item">
              <i className="fe-user me-1"></i>
              <span>Mi perfil</span>
            </a>

            <a href="/account" className="dropdown-item notify-item">
              <i className="mdi mdi-account-key-outline me-1"></i>
              <span>Mi cuenta</span>
            </a>

            <a href="#" className="dropdown-item notify-item right-bar-toggle dropdown notification-list">
              <i className="fe-settings me-1"></i>
              <span>Configuracion</span>
            </a>

            <a href="#" className="dropdown-item notify-item" onClick={Logout}>
              <i className="fe-log-out me-1"></i>
              <span>Cerrar sesion</span>
            </a>

          </div>
        </div>

        <Tippy content={mainRole.description} arrow={true}>
          <p className="text-muted left-user-info" >{mainRole.name}</p>
        </Tippy>

        <ul className="list-inline">
          <li className="list-inline-item">
            <Tippy content="Configuracion">
              <a href="#" className="text-muted left-user-info right-bar-toggle dropdown notification-list">
                <i className="mdi mdi-cog"></i>
              </a>
            </Tippy>
          </li>

          <li className="list-inline-item">
            <Tippy content="Cerrar sesion">
              <a href="#" className="text-danger" onClick={Logout}>
                <i className="mdi mdi-power"></i>
              </a>
            </Tippy>
          </li>
        </ul>
      </div>


      <div id="sidebar-menu" className='show'>

        <ul id="side-menu">
          <li className="menu-title">Panel de navegacion</li>
          <MenuItem href="/home" icon='mdi mdi-home'>Inicio</MenuItem>
          <MenuItem href="/businesses" icon='mdi mdi-bag-checked'>Empresas</MenuItem>

          <li className="menu-title">Configuracion</li>
          <MenuItem href="/profile" icon='mdi mdi-account'>Mi perfil</MenuItem>
          <MenuItem href="/account" icon='mdi mdi-account-key'>Mi cuenta</MenuItem>

          {
            can(['people', 'users', 'constants'], 'all', 'list') && <>
              <li className="menu-title">Menus del sistema</li>
              <MenuItemContainer title='Mantenimiento' icon='mdi mdi-application-cog'>
                {
                  can('people', 'all', 'list') &&
                  <MenuItem href='/people' icon='mdi mdi-account-group'>Personas</MenuItem>
                }
                {
                  can('users', 'all', 'list') &&
                  <MenuItem href='/users' icon='mdi mdi-account-multiple'>Usuarios</MenuItem>
                }
              </MenuItemContainer>
              {
                can('constants', 'all', 'list') &&
                <MenuItem href='/constants' icon='mdi mdi-cogs'>Constantes</MenuItem>
              }
            </>
          }
        </ul>

      </div>


      <div className="clearfix"></div>

    </div>


  </div>)
}

export default Menu