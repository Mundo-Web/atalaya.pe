import { createInertiaApp } from '@inertiajs/react'
import { Cookies, FetchParams } from 'sode-extend-react'

const CreateReactScript = (render) => {

  createInertiaApp({
    resolve: name => `/${name}.jsx`,
    setup: ({ el, props }) => {
      const properties = props.initialPage.props
      const can = (page, ...keys) => {
        const keys2validate = []
        if (Array.isArray(page)) {
          for (const p of page) {
            keys2validate.push(...keys.map(x => `${p}.${x}`))
          }
        } else {
          keys2validate.push(...keys.map(x => `${page}.${x}`))
        }
        if (properties?.session?.permissions?.find(x => keys2validate.includes(x.name) || x.name == 'general.root')) return true
        const roles = properties?.session?.roles ?? []
        for (const rol of roles) {
          if (rol?.permissions?.find(x => keys2validate.includes(x.name) || x.name == 'general.root')) return true
        }
        return false
      }
      FetchParams.headers = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
        'X-Xsrf-Token': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
      }
      render(el, { ...properties, can })
    },
  });
}

export default CreateReactScript