/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {



    screens: {
      'xs': '120px',
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1536px',
    },

    extend: {

      fontSize: {
        text12: "12px",
        text14: "14px",
        text16: "16px",
        text18: "18px",
        text20: "20px",
        text22: "22px",
        text24: "24px",
        text28: "28px",
        text32: "32px",
        text36: "36px",
        text40: "40px",
        text44: "44px",
        text48: "48px",
        text52: "52px",
        text56: "56px",
        text60: "60px",
        text64: "64px",
        text68: "68px",
      },

      backgroundImage: {
        'fondoapps': "url('/img_mundowebaplicativos/apps.png')",
        'fondoapps2': "url('/img_mundowebaplicativos/apps3.png')",
        'fondoapps3': "url('/img_mundowebaplicativos/apps4.png')",

        'textura': "url('/img_mundowebaplicativos/texturaplicactivos.png')",

        'fondolanding': "url('/img_landingmundoweb/landing1.png')",
        'fondolanding2': "url('/img_landingmundoweb/webslanding2.png')",
        'fondolanding3': "url('/img_landingmundoweb/webslanding3.png')",

        'texturalanding': "url('/img_landingmundoweb/texturalanding.png')",
        'texturalanding2': "url('/img_landingmundoweb/texturalanding2.png')",

        'fondoecommerce': "url('/img_landingecommerce/landingecoomerce3.png')",

        'texturaecommerce': "url('/img_landingecommerce/texturaecommerce.png')",
        'texturaecommerce2': "url('/img_landingecommerce/texturaecommerce2.png')",

        'fondowebsitef': "url('/img_landingwebsite/fondowebsite.png')",
        'fondowebsite2': "url('/img_landingwebsite/landingwebsite3.png')",

        'texturawebsite': "url('/img_landingwebsite/texturawebsite.png')",
        'texturawebsite2': "url('/img_landingwebsite/texturawebsite2.png')",

      },

      animation: {
        'infinite-scroll': 'infinite-scroll 25s linear infinite',
      },
      keyframes: {
        'infinite-scroll': {
          from: { transform: 'translateX(0)' },
          to: { transform: 'translateX(-100%)' },
        }
      },

      colors: {
        primary: '#3490dc', // Puedes cambiar el código de color según tus preferencias
        fondo: '#1e2f33',
        fondoboton: '#FFFFFF66',
        azulmundoweb: '#303BE4',
        azuloscuro: '#080B44',
        azulanding: '#091CA6',
        azulecommerce: '#0017d7',
        azulmoviles: '#0018ff',
        azulform: '#040a45',
        fondoinput: '#060A2F',
        //colores de las donas
        rosalasdonas: '#DF3876',
        rosasuave: '#fcecf2',
        griscard: '#f8f8f8',
        colorgris: '#7c7c7c',
        verdelasdonas: '#447279',
        barracarrusel: '#060A2F',
        mwnaranja: '#E15A29',
        //colores de mundoweb

        //azulmw: '#3f56fb',
        textomw: '#3f4654',
        textonegro: '#111827',
        azulecoomer: '#1d1da9',
        azulecommerboton: '#0A1983',
        verdemw: '#1a292c',
        verdeee: 'rgba(26, 41, 44, 0.7)',
        verdeboton: '#355155',
        verdebotonclaro: '#C2DFDF',
        azulecommerboton: '#172FC7',
        azulf: '#172FC7',
        fondoinputverde: '#161f21 ',
        azulfondo: '#091da8',
        fondowebsite: '#EAF2F4',
        azulwebsite: '#323BDC',
        azultextowebsite: '#050A41',
        inputmw: '#FFFFFF66',
        fondoform: '#FFFFFF1A',
        fondofooter: '#060A2F',
        bgAzulFondo: "#040c44",
      },

      fontFamily: {
        RightgroteskMedium: ['RightgroteskMedium', 'sans-serif'],
        PoppinsSemiBold: ['Poppins-SemiBold', 'sans-serif'],
        MontserratMedium: ['Montserrat-Medium', 'sans-serif'],
        MontserratSemibold: ['Montserrat-Semibold', 'sans-serif'],
        MontserratRegular: ['Montserrat-Regular', 'sans-serif'],
        monserrat: ['Montserrat-Medium', 'sans-serif'],

      },

      height: {
        '100': '28rem',
        '128': '32rem',
        '200': '38rem',

      },

      placeholderColor: {
        'rosaplaceholder': '#DF387666',

      },

      borderWidth: {
        DEFAULT: '1px',
        '0': '0',
        '2': '2px',
        '3': '3px',
        '4': '4px',
        '6': '6px',
        '8': '8px',
        '16': '16px',

      },

      margin: {
        '30': '7.5rem',

      }

    },
  },
  plugins: [
    require('tailwindcss-animated'),
  ],
}

