import React from 'react'
import { Link } from '@inertiajs/react'

const MenuItem = ({ href, icon, children }) => {
  return (
    <li className={location.pathname.startsWith(href) ? 'menuitem-active' : ''}>
      <a href={href} className={location.pathname.startsWith(href) ? 'active' : ''}>
        <i className={icon}></i>
        <span> {children} </span>
      </a>
      {/* <a href={href} className={location.pathname.startsWith(href) ? 'active' : ''}>
        <i className={icon}></i>
        <span> {children} </span>
      </a> */}
    </li>
  )
}

export default MenuItem