import { Cookies, Fetch, Notify } from "sode-extend-react"

class AuthRest {
  static login = async (request) => {
    try {

      const { status, result } = await Fetch('/api/login', {
        method: 'POST',
        body: JSON.stringify(request)
      })
      if (!status) throw new Error(result?.message || 'Error al iniciar sesion')

      Notify.add({
        icon: '/assets/img/icon.svg',
        title: 'Operacion correcta',
        body: 'Se inicio sesion correctamente'
      })

      return true
    } catch (error) {
      Notify.add({
        icon: '/assets/img/icon.svg',
        title: 'Error',
        body: error.message,
        type: 'danger'
      })
      return false
    }
  }

  static signup = async (request) => {
    try {

      const { status, result } = await Fetch('/api/signup', {
        method: 'POST',
        body: JSON.stringify(request)
      })
      if (!status) throw new Error(result?.message || 'Error al registrar el usuario')

      Notify.add({
        icon: '/assets/img/icon.svg',
        title: 'Operacion correcta',
        body: 'Se registro el usuario correctamente'
      })

      return result.data
    } catch (error) {
      Notify.add({
        icon: '/assets/img/icon.svg',
        title: 'Error',
        body: error.message,
        type: 'danger'
      })
      return null
    }
  }

  login = async (request) => {
    const { status, result } = await Fetch('/api/auth/login', {
      method: 'POST',
      body: JSON.stringify(request),
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
        'X-Xsrf-Token': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
      }
    })
    return { ...result, status }
  }

  userExists = async (request) => {
    let summary = {}
    try {
      const { status, result } = await Fetch('/api/auth/check', {
        method: 'POST',
        body: JSON.stringify(request)
      })
      summary = result.summary
      if (!status) throw new Error(result?.message || 'Error al verificar el usuario')
      return { status: true }
    } catch (error) {
      return { status: false, message: error.message, type: summary?.type ?? 'other' }
    }
  }

  register = async (request) => {
    const { status, result } = await Fetch('/api/auth/register', {
      method: 'POST',
      body: JSON.stringify(request)
    })
    return { ...result, status }
  }

  sendCode = async (request) => {
    const { status, result } = await Fetch('/api/auth/send-code', {
      method: 'POST',
      body: JSON.stringify(request)
    })
    return { ...result, status }
  }

  verifyEmail = async (request) => {
    const { status, result } = await Fetch('/api/auth/verify-email', {
      method: 'POST',
      body: JSON.stringify(request)
    })
    return { ...result, status }
  }
}

export default AuthRest