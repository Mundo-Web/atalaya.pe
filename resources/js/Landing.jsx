import React, { useState, useEffect, useRef } from 'react';
import { createRoot } from 'react-dom/client';
import CreateReactScript from './Utils/CreateReactScript';
import Global from './Utils/Global';
import Logout from './actions/Logout';
import Underline from '../img/home/underline.svg';
import CurvedArrow from '../img/home/curved-arrow.svg';
import AllInOnePlace from '../img/home/all-in-one-place.svg';
import Graphs from '../img/home/graphs.png';
import CRMImage from '../img/home/crm-image.png';
import ProjectsImage from '../img/home/projects-image.png';
import WavesImage from '../img/home/waves-image.png';
import { TypeAnimation } from 'react-type-animation';

import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import "swiper/css"
import "swiper/css/autoplay"
import "swiper/css/navigation"
import "swiper/css/pagination"
import ServicesModal from './Reutilizables/Services/ServicesModal';

const benefits = [
  {
    "icon": "mdi-robot-outline",
    "title": "Automatización total",
    "description": "Optimiza procesos, reduce trabajo manual, evita errores y retrabajos."
  },
  {
    "icon": "mdi-chart-line",
    "title": "Más productividad diaria",
    "description": "Gestiona todo en un solo lugar con rapidez, eficiencia y control total."
  },
  {
    "icon": "mdi-shield-lock-outline",
    "title": "Seguridad garantizada",
    "description": "Protegemos tus datos con cifrado, respaldo y acceso seguro."
  },
  {
    "icon": "mdi-flash-outline",
    "title": "Interfaz intuitiva",
    "description": "Usa la plataforma sin capacitación y sin complicaciones."
  }
]

const crmBenefits = [
  {
    "title": "Gestión centralizada",
    "description": "Organiza clientes y contactos fácilmente."
  },
  {
    "title": "Seguimiento automático",
    "description": "Recibe recordatorios de tareas clave."
  },
  {
    "title": "Reportes avanzados",
    "description": "Analiza métricas de ventas en segundos."
  },
  {
    "title": "Integración total",
    "description": "Conéctalo con emails y WhatsApp."
  }
]

const projectsBenefits = [
  {
    "title": "Tareas asignadas",
    "description": "Define responsables y plazos de entrega."
  },
  {
    "title": "Calendario visual",
    "description": "Ve el progreso en tableros Kanban."
  },
  {
    "title": "Colaboración fácil",
    "description": "Comparte archivos y comentarios."
  },
  {
    "title": "Monitoreo constante",
    "description": "Analiza tiempos y rendimiento."
  }
]

const wavesBenefits = [
  {
    "title": "Mensajes instantáneos",
    "description": "Mantente en contacto con tu equipo."
  },
  {
    "title": "Canales privados",
    "description": "Organiza la comunicación por áreas."
  },
  {
    "title": "Videollamadas rápidas",
    "description": "Reúnete sin salir de la plataforma."
  },
  {
    "title": "Integración total",
    "description": "Conéctalo con CRM y Proyectos."
  }
]

const testimonies = [
  {
    "title": "Nuestra relación con los clientes mejoró notablemente",
    "description": "El CRM de Atalaya nos permite dar seguimiento a cada oportunidad sin perder nada. Ahora entendemos mejor a nuestros clientes y respondemos más rápido.",
    "author": "Luis Rivas",
    "profession": "Gerente de Ventas"
  },
  {
    "title": "Organizamos los proyectos de forma clara y colaborativa",
    "description": "Antes teníamos tareas dispersas en correos y chats. Con Atalaya tenemos visibilidad total de cada etapa del proyecto, y el equipo trabaja en sincronía.",
    "author": "Andrea Silva",
    "profession": "Líder de Proyectos"
  },
  {
    "title": "Automatizamos nuestros envíos masivos sin esfuerzo",
    "description": "Enviar campañas de correos a miles de contactos era lento y caótico. Ahora lo hacemos desde Atalaya con segmentaciones inteligentes y reportes claros.",
    "author": "Carlos Mendoza",
    "profession": "Especialista en Marketing"
  },
  {
    "title": "Ahorro de tiempo en tareas repetitivas del CRM",
    "description": "Con las automatizaciones de Atalaya, tareas como asignar leads o enviar recordatorios ya no consumen tiempo del equipo. Nos enfocamos más en cerrar ventas.",
    "author": "Valeria Torres",
    "profession": "Coordinadora Comercial"
  }
]

const faqs = [
  {
    "question": "¿Qué es un Lead en el CRM?",
    "answer": "Un Lead es un posible cliente que ha mostrado interés en tus productos o servicios y ha compartido sus datos de contacto, como correo electrónico, teléfono o redes sociales."
  },
  {
    "question": "¿Cómo puedo registrar un Lead en el CRM?",
    "answer": "Puedes registrar un Lead manualmente agregando nombre, correo, teléfono y fuente de captación, o de forma automática mediante formularios en tu web, integraciones con WhatsApp, redes sociales o landing pages conectadas al CRM."
  },
  {
    "question": "¿Cómo se clasifican los Leads en el CRM?",
    "answer": "Los Leads pueden clasificarse según estado (Nuevo, Contactado, En Seguimiento, Convertido, No Interesado), fuente (Web, redes sociales, referidos, eventos) y prioridad (Alta, Media, Baja)."
  },
  {
    "question": "¿Puedo asignar Leads a un asesor específico?",
    "answer": "Sí, puedes asignar manual o automáticamente Leads a tus asesores para que gestionen el seguimiento según sus tareas y zonas asignadas."
  },
  {
    "question": "¿Cómo hago seguimiento de un Lead?",
    "answer": "Puedes agendar llamadas, reuniones o visitas, registrar notas de cada contacto, configurar recordatorios automáticos y visualizar el historial completo de interacciones con cada Lead."
  },
  {
    "question": "¿El CRM me notifica sobre seguimientos pendientes?",
    "answer": "Sí, recibirás notificaciones automáticas por correo o dentro del CRM para recordarte seguimientos pendientes, llamadas o correos programados."
  },
  {
    "question": "¿Puedo enviar correos o WhatsApp desde el CRM?",
    "answer": "Dependerá de tu plan, pero generalmente puedes enviar correos directamente desde el CRM e integrar WhatsApp para enviar mensajes y registrar conversaciones en el historial del Lead."
  },
  {
    "question": "¿Cómo convierto un Lead en Cliente?",
    "answer": "Cuando se concreta una venta, puedes cambiar el estado del Lead a 'Convertido' y pasarlo al módulo de Clientes para su gestión en contratos, ventas o facturación."
  },
  {
    "question": "¿Puedo importar una lista de Leads al CRM?",
    "answer": "Sí, puedes importar archivos CSV o Excel con tus Leads, asegurándote de mantener el formato correcto de columnas como nombre, correo, teléfono y fuente."
  },
  {
    "question": "¿Cómo mido la efectividad de mis Leads?",
    "answer": "El CRM permite generar reportes de conversión de Leads por asesor, fuente y periodo, tiempo promedio de conversión y actividades de tu equipo comercial."
  },
  {
    "question": "¿El CRM me ayuda a evitar duplicados?",
    "answer": "Sí, el CRM valida y evita duplicados utilizando correo electrónico y teléfono como referencias principales."
  },
  {
    "question": "¿Puedo personalizar las etapas de mi pipeline de Leads?",
    "answer": "Sí, puedes configurar las etapas de tu pipeline según tu proceso de ventas para adaptarlo a tu flujo comercial."
  }
]

const Landing = ({ session: sessionDB, services }) => {
  const [session, setSession] = useState(sessionDB);
  const [isOpen, setIsOpen] = useState(false);
  const [faqOpen, setFaqOpen] = useState(null);
  const [serviceModalOpen, setServiceModalOpen] = useState(false);
  const dropdownRef = useRef(null);

  useEffect(() => {
    const handleClickOutside = (event) => {
      if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
        setIsOpen(false);
      }
    };

    document.title = 'Home | Atalaya'

    document.addEventListener('mousedown', handleClickOutside);
    return () => document.removeEventListener('mousedown', handleClickOutside);
  }, []);

  useEffect(() => {
    particlesJS('particles-js', {
      particles: {
        number: { value: 80, density: { enable: true, value_area: 800 } },
        color: { value: '#315af3' },
        shape: { type: 'circle' },
        opacity: { value: 0.5, random: false },
        size: { value: 3, random: true },
        line_linked: { enable: true, distance: 150, color: '#315af3', opacity: 0.4, width: 1 },
        move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false }
      },
      interactivity: {
        detect_on: 'canvas',
        events: {
          onhover: { enable: true, mode: 'repulse' },
          onclick: { enable: true, mode: 'push' },
          resize: true
        }
      },
      retina_detect: true
    });
  }, [null])

  useEffect(() => {
    if (serviceModalOpen) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = 'auto';
    }

    return () => {
      document.body.style.overflow = 'auto';
    };
  }, [serviceModalOpen]);

  return (<>
    <main className='min-h-screen flex flex-col w-full bg-gradient-to-b from-white via-[#f8fffe] to-white text-[#000938]'>
      <header className='max-w-7xl w-full mx-auto flex justify-between items-center pt-8 px-4 sm:px-6 lg:px-8 relative z-50'>
        <a href="/" className="transition-transform hover:scale-105">
          <img src="/assets/img/logo-dark.svg" alt="" style={{ height: '40px' }} />
        </a>
        <nav>
          <ul className="flex space-x-4 text-[#323a46] font-bold">
            {session ? (
              <li className="relative">
                <div className="relative inline-block text-left" ref={dropdownRef}>
                  <button
                    type="button"
                    className="w-max flex items-center justify-center gap-2 px-4 py-2 rounded-full hover:bg-gray-100 transition-all"
                    onClick={() => setIsOpen(!isOpen)}
                  >
                    <img
                      src={`/api/profile/thumbnail/${session.relative_id}`}
                      alt=""
                      className='w-8 h-8 rounded-full object-center object-cover ring-2 ring-[#315af3]'
                    />
                    <span className='text-[#315af3]'>
                      {session.name.split(' ')[0]} {session.lastname?.split(' ')?.[0]}
                    </span>
                    <i className={`mdi mdi-chevron-down text-gray-500 transition-transform ${isOpen ? 'rotate-180' : ''}`}></i>
                  </button>

                  <div className={`absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none divide-y divide-gray-100 transition-all duration-200 ${isOpen
                    ? 'transform opacity-100 scale-100 visible'
                    : 'transform opacity-0 scale-95 invisible'
                    }`}>
                    <div className="py-1">
                      <a
                        href="/home"
                        className="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                      >
                        <i className="mdi mdi-view-dashboard me-2"></i>
                        <span>Ver panel</span>
                      </a>
                    </div>
                    <div className="py-1">
                      <a
                        href="#"
                        onClick={async () => {
                          await Logout(false);
                          setSession(null);
                        }}
                        className="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700"
                      >
                        <i className="fe-log-out me-2"></i>
                        <span>Cerrar sesión</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
            ) : (
              <>
                <li>
                  <a href="/join" className='w-max px-4 py-2 rounded-full hover:bg-gray-100 transition-all flex items-center'>
                    <i className='mdi mdi-login me-2 text-[#315af3]'></i>
                    <span className='hidden md:inline-block'>Iniciar sesión</span>
                  </a>
                </li>
                <li>
                  <button
                    className='w-max px-4 py-2 bg-[#315af3] text-white rounded-full hover:bg-opacity-80 transition-all flex items-center'
                    onClick={() => setServiceModalOpen(true)}>
                    <i className='mdi mdi-account-plus me-2'></i>
                    <span className='hidden md:inline-block'>Registro</span>
                  </button>
                </li>
              </>
            )}
          </ul>
        </nav>
      </header>

      <div className='relative mt-4 w-full h-[3px] rounded-[50%]' style={{
        background: 'linear-gradient(to right, transparent, #315af3 50%, transparent)'
      }}></div>

      <section className='relative pt-6'>
        <div id="particles-js" className="absolute inset-0 z-0"></div>
        <div className='max-w-7xl w-full mx-auto py-8 px-4 sm:px-6 lg:px-8 relative z-10'>
          {/* Add particles background */}

          <span className='bg-[#5e4dff] text-white text-xs px-2 py-1 rounded-lg block mx-auto w-max'>Powered by MundoWeb</span>
          <h1 className='text-6xl font-bold text-center my-6'>
            La Plataforma <br />
            <span className='relative text-[#fe4611]'>
              <TypeAnimation
                sequence={[
                  'Flexible', 1000,
                  'Ágil', 1000,
                  'Inteligente', 1000,
                  'Escalable', 1000,
                  'Versátil', 1000,
                ]}
                speed={250}
                wrapper="span"
                cursor={true}
                repeat={Infinity}
                cursorClassName='text-[#fe4611] inline-block'
              />
              <img src={Underline} alt={Global.APP_NAME} className='absolute left-1/2 -translate-x-1/2 bottom-1 h-2 block w-full' />
            </span> para Gestionar <br />
            tu Negocio
          </h1>
          <p className='text-center max-w-xl w-full mx-auto'>Automatiza y optimiza tus procesos con nuestras soluciones en CRM, Facturación, Proyectos y más.</p>
          <div className='flex gap-4 my-8 justify-center'>
            <div className='relative'>
              {session ? (
                <a
                  href={`//crm.${Global.APP_DOMAIN}`}
                  className='relative block px-6 py-2 border-2 border-[#315af3] bg-[#315af3] text-white rounded-xl hover:bg-[#2a4ed8] transition-colors z-10'
                >
                  Gestiona tus leads
                </a>
              ) : (
                <>
                  <button
                    className='relative block px-6 py-2 border-2 border-[#315af3] bg-[#315af3] text-white rounded-xl hover:bg-[#2a4ed8] transition-colors z-10'
                    onClick={() => setServiceModalOpen(true)}
                  >
                    ¡Registrate Gratis!
                  </button>
                  <span className='font-[Fresca] absolute block w-max -bottom-12 left-6 text-lg -rotate-2 z-0'>
                    <img src={CurvedArrow} alt={Global.APP_NAME} className='absolute w-4 -left-6 -top-6 animate-bounce' />
                    Elige tu servicio y comienza a gestionar con Atalaya
                  </span>
                </>
              )}
            </div>
            <a href='//wa.me/51934464915' className='px-6 py-2 border-2 bg-white border-[#315af3] text-[#315af3] rounded-xl hover:bg-[#315af3] hover:text-white transition-colors'>
              Hablar con ventas
            </a>
          </div>
          <div className='relative'>
            <div className='absolute right-[7.5%] md:-top-[5%] w-32 h-32'>
              <img
                className='animate-spin-reverse animate-duration-[10s] w-full h-full'
                src={AllInOnePlace}
                alt="Todo lo que necesitas en un solo lugar" />
              <i className='mdi mdi-36px mdi-arrow-right text-[#315af3] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2'></i>
            </div>
            <img src={Graphs} alt="" className='w-full mt-16 md:mt-12 -mb-12 block aspect-[1216/641]' />
          </div>
        </div>
      </section>

      <div className='max-w-7xl w-full mx-auto py-8 px-4 sm:px-6 lg:px-8'>
        <h2 className='text-4xl font-bold text-center'>
          <span className='text-[#5e4dff]'>Potencia</span>{" "}
          tu negocio <br />
          con Atala<span className='text-[#fe4611]'>y</span>a
        </h2>
        <div className="mt-12 relative">
          <Swiper
            modules={[Autoplay, Navigation, Pagination]}
            spaceBetween={24}
            slidesPerView={1}
            autoplay={{
              delay: 3000,
              disableOnInteraction: false,
            }}
            navigation={{
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            }}
            breakpoints={{
              640: {
                slidesPerView: 2,
              },
              1024: {
                slidesPerView: 4,
              },
            }}
            className="py-4"
          >
            {[...benefits, ...benefits].map((benefit, i) => (
              <SwiperSlide key={i}>
                <div className="bg-[#f4f8fd] rounded-2xl p-6 h-full">
                  <div className="h-12 w-12 bg-[#fe4611]/10 rounded-xl flex items-center justify-center mb-4">
                    <i className={`mdi ${benefit.icon} text-2xl text-[#fe4611]`}></i>
                  </div>
                  <h3 className="text-lg font-bold mb-2">{benefit.title}</h3>
                  <p className="text-gray-600 leading-tight">{benefit.description}</p>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>

          <div className="swiper-button-prev -translate-x-7 !text-[#315af3] !w-10 !h-10 !bg-white !rounded-full !shadow-lg after:!text-xl"></div>
          <div className="swiper-button-next translate-x-7 !text-[#315af3] !w-10 !h-10 !bg-white !rounded-full !shadow-lg after:!text-xl"></div>
        </div>
      </div>

      <div className='max-w-7xl w-full mx-auto py-10 px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-10'>
        <div>
          <h2 className='text-4xl font-bold'>
            CRM inteligente <br />
            Gestiona tus {" "}
            <span className='text-[#5e4dff]'>clientes y ventas</span>
          </h2>
          <p className='my-4'>
            Control total sobre tus clientes y oportunidades de negocio. <br />
            Con el CRM de Atalaya puedes:
          </p>

          <div className='flex flex-col gap-4 my-8'>
            {crmBenefits.map((benefit, i) => (
              <div key={i} className=' flex gap-4'>
                <i className='mdi mdi-24px mdi-xml text-[#fe4611]'></i>
                <div>
                  <h3 className='text-lg font-bold'>{benefit.title}</h3>
                  <p className='text-gray-600'>{benefit.description}</p>
                </div>
              </div>
            ))}
          </div>

          <a href='/join/crm' className='block w-max px-6 py-2 border-2 border-[#315af3] bg-[#315af3] text-white rounded-xl'>Optimiza tus ventas</a>
        </div>
        <img src={CRMImage} alt="" className='w-full h-full mx-auto max-w-lg object-contain object-center' />
      </div>

      <div className='max-w-7xl w-full mx-auto py-10 px-4 sm:px-6 lg:px-8'>
        <div className='flex flex-col-reverse md:grid md:grid-cols-2 gap-10'>
          <img src={ProjectsImage} alt="" className='w-full h-full mx-auto max-w-md object-contain object-center' />
          <div>
            <h2 className='text-4xl font-bold'>
              Gestión de Proyectos <br />
              Organiza y cumple {" "}
              <span className='text-[#5e4dff]'>objetivos</span>
            </h2>
            <p className='my-4'>
              Planifica, ejecuta y monitorea tus proyectos de forma eficiente. <br />
              Con Atalaya puedes gestionar tus proyectos de manera profesional:
            </p>

            <div className='flex flex-col gap-4 my-8'>
              {projectsBenefits.map((benefit, i) => (
                <div key={i} className=' flex gap-4'>
                  <i className='mdi mdi-24px mdi-xml text-[#fe4611]'></i>
                  <div>
                    <h3 className='text-lg font-bold'>{benefit.title}</h3>
                    <p className='text-gray-600'>{benefit.description}</p>
                  </div>
                </div>
              ))}
            </div>

            <a href='/register' className='block w-max px-6 py-2 border-2 border-[#315af3] bg-[#315af3] text-white rounded-xl'>Gestiona tus proyectos</a>
          </div>
        </div>
      </div>

      <div className='max-w-7xl w-full mx-auto py-10 px-4 sm:px-6 lg:px-8'>
        <div className='bg-[#EDF3FB] rounded-2xl p-10 relative'>
          <Swiper
            modules={[Autoplay]}
            spaceBetween={24}
            slidesPerView={1}
            loop={true}
            autoplay={{
              delay: 5000,
              disableOnInteraction: false,
            }}
            className="py-4"
          >
            {testimonies.map((testimony, i) => (
              <SwiperSlide key={i}>
                <div className='max-w-lg w-full mx-auto text-center'>
                  <div className='aspect-square w-10 h-10 rounded-full block mx-auto mb-4 bg-[#315af3] text-white flex items-center justify-center'>
                    {testimony.author.charAt(0)}
                  </div>
                  <h4 className='text-lg font-bold mb-2'>"{testimony.title}"</h4>
                  <p className='text-lg text-gray-600 leading-tight mb-4'>
                    {testimony.description}
                  </p>
                  <div>
                    <span className='block font-bold'>{testimony.author}</span>
                    <span className='block text-gray-600 text-sm'>{testimony.profession}</span>
                  </div>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </div>

      <div className='max-w-7xl w-full mx-auto py-10 px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-10'>
        <div>
          <h2 className='text-4xl font-bold'>
            Atalaya Waves <br />
            Comunicación <span className='text-[#5e4dff]'>interna</span> sin límites

          </h2>
          <p className='my-4'>
            Una herramienta de mensajería pensada para equipos de trabajo. <br />
            Puedes mejorar en tu empresa:
          </p>

          <div className='flex flex-col gap-4 my-8'>
            {wavesBenefits.map((benefit, i) => (
              <div key={i} className=' flex gap-4'>
                <i className='mdi mdi-24px mdi-xml text-[#fe4611]'></i>
                <div>
                  <h3 className='text-lg font-bold'>{benefit.title}</h3>
                  <p className='text-gray-600'>{benefit.description}</p>
                </div>
              </div>
            ))}
          </div>

          <a href='/register' className='block w-max px-6 py-2 border-2 border-[#315af3] bg-[#315af3] text-white rounded-xl'>Mejora la comunicación</a>
        </div>
        <img src={WavesImage} alt="" className='w-full mx-auto max-w-xs h-full object-contain object-center' />
      </div>

      <div className='max-w-7xl w-full mx-auto py-10 px-4 sm:px-6 lg:px-8'>
        <div className='bg-[#EDF3FB] rounded-2xl p-10 grid gap-10'>
          <div className='max-w-xl mx-auto text-center'>
            <h2 className='text-4xl font-bold'>
              Nuevas herramientas en <span className='text-[#5e4dff]'>camino</span>
            </h2>
            <p className='my-4'>
              Muy pronto, Waves y Tickets revolucionarán la forma en que te comunicas y gestionas el soporte. ¡Prepárate para la próxima gran actualización!
            </p>
          </div>
          <div className='grid md:grid-cols-2 gap-10'>
            <div className='bg-white p-6 rounded-xl'>
              <h4 className='text-2xl font-bold leading-tight mb-4'>
                <span className='block text-[#fe4611]'>Facturación</span>
                Control financiero
              </h4>
              <p className='text-gray-600'>
                Crea, gestiona y automatiza tu facturación sin complicaciones.
                Con la herramienta puedes:
              </p>
              <hr className='my-4' />
              <div className='text-gray-600'>
                <li>Genera y envía facturas en segundos.</li>
                <li>Recibe pagos sin complicaciones.</li>
                <li>Notifica vencimientos a tus clientes.</li>
                <li>Controla ingresos y egresos fácilmente.</li>
              </div>
              <hr className='my-4' />
              <a href='#' className='block px-6 py-2 border-2 border-[#315af3] bg-[#315af3] text-white text-center rounded-xl'>
                Proximamente
              </a>
            </div>
            <div className='bg-white p-6 rounded-xl'>
              <h4 className='text-2xl font-bold leading-tight mb-4'>
                <span className='block text-[#fe4611]'>Tickets</span>
                Soporte rápido y eficiente
              </h4>
              <p className='text-gray-600'>
                Un sistema de tickets para brindar atención al cliente sin demoras.
                Con él podrás:
              </p>
              <hr className='my-4' />
              <div className='text-gray-600'>
                <li>Administra solicitudes con facilidad.</li>
                <li>Monitorea el estado de cada ticket.</li>
                <li>Agiliza el soporte con IA.</li>
                <li>Mejora el tiempo de respuesta.</li>
              </div>
              <hr className='my-4' />
              <a href='#' className='block px-6 py-2 border-2 border-[#315af3] bg-[#315af3] text-white text-center rounded-xl'>
                Proximamente
              </a>
            </div>
          </div>
        </div>
      </div>

      <div className='max-w-7xl w-full mx-auto py-10 mb-10 px-4 sm:px-6 lg:px-8'>
        <h4 className='text-2xl font-bold text-center text-[#5E4DFF]'>FAQs</h4>
        <h2 className='text-4xl font-bold text-center'>
          Todo lo que necesitas <br />
          saber sobre Atala<span className='text-[#fe4611]'>y</span>a
        </h2>
        <div className='grid gap-6 max-w-4xl mt-10 mx-auto'>
          {
            faqs.map((faq, index) => {
              return <div key={index} className='bg-[#F4F8FD] rounded-xl p-6 cursor-pointer' onClick={() => setFaqOpen(faqOpen == index ? null : index)}>
                <h4 className={`text-lg font-bold flex justify-between items-center`}>
                  {faq.question}
                  <i className={`mdi mdi-24px ${faqOpen == index ? 'mdi-close' : 'mdi-star-four-points'} text-[#fe4611]`}></i>
                </h4>
                <p className={`text-gray-600 leading-tight transition-all ${faqOpen == index ? 'h-auto mt-2' : 'h-0 overflow-hidden'}`}>{faq.answer}</p>
              </div>
            })
          }
        </div>
        <a href='#' className='block w-max px-6 py-2 mt-10 mx-auto border-2 border-[#5E4DFF] bg-[#5E4DFF] text-white text-center rounded-xl'>
          ¿Tienes más dudas? Contáctanos aquí
        </a>
      </div>

      <footer className="max-w-7xl w-full mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div className="w-full grid grid-cols-1 md:grid-cols-5 gap-8">
          <div className='md:col-span-2'>
            <a href="/" className="transition-transform hover:scale-105">
              <img src="/assets/img/logo-dark.svg" alt="" style={{ height: '40px' }} />
            </a>
            <p className="my-4 w-full">
              La plataforma todo en uno para gestionar clientes, proyectos, facturación y más. Simplifica tu negocio con herramientas automatizadas.
            </p>
            <button className="px-6 py-2 border-2 bg-[#315af3] border-[#315af3] text-white rounded-lg">
              Empieza a usar Atalaya hoy mismo
            </button>
          </div>

          <div>
            <h4 className="font-semibold text-lg mb-4">Enlaces Rápidos</h4>
            <ul className="space-y-2">
              <li><a href="#">Beneficios</a></li>
              <li><a href="#">Planes y Precios</a></li>
              <li><a href="#">Preguntas Frecuentes</a></li>
              <li><a href="#">Contacto</a></li>
            </ul>
          </div>

          <div>
            <h4 className="font-semibold text-lg mb-4">Servicios</h4>
            <ul className="space-y-2">
              <li>
                <b className='block'>CRM</b>
                <span className='block leading-tight truncate'>Gestión de clientes y oportunidades.</span>
              </li>
              <li>
                <b className='block'>Proyectos</b>
                <span className='block leading-tight truncate'>Organización de tareas y equipos.</span>
              </li>
              <li>
                <b className='block'>Waves</b>
                <span className='block leading-tight truncate'>Comunicación interna.</span>
              </li>
              <li>
                <b className="block">Facturación <em className='text-sm'>(Próximamente)</em></b>
                <span className='block leading-tight truncate'>Automatización de pagos y facturas.</span>
              </li>
              <li>
                <b className="block">Tickets <em className='text-sm'>(Próximamente)</em></b>
                <span className='block leading-tight truncate'>Soporte inteligente.</span>
              </li>
            </ul>
          </div>

          <div>
            <h4 className="font-semibold text-lg mb-4">Derechos y Legal</h4>
            <ul className="space-y-2">
              <li><a href="#">Términos y Condiciones</a></li>
              <li><a href="#">Política de Privacidad</a></li>
            </ul>
          </div>
        </div>
        <div className="border-t border-gray-200 mt-10 pt-6">
          <div className="max-w-7xl mx-auto flex flex-col md:flex-row gap-4 items-center justify-between">
            {/* Redes sociales */}
            <div className="flex gap-4 text-xl text-white">
              <a href="#" className="hover:opacity-75 w-10 h-10 flex items-center justify-center rounded-full bg-[#5e4dff]">
                <i className="mdi mdi-24px mdi-facebook"></i>
              </a>
              <a href="#" className="hover:opacity-75 w-10 h-10 flex items-center justify-center rounded-full bg-[#5e4dff]">
                <i className="mdi mdi-24px mdi-instagram"></i>
              </a>
              <a href="#" className="hover:opacity-75 w-10 h-10 flex items-center justify-center rounded-full bg-[#5e4dff]">
                <i className="mdi mdi-24px mdi-youtube"></i>
              </a>
              <a href="#" className="hover:opacity-75 w-10 h-10 flex items-center justify-center rounded-full bg-[#5e4dff]">
                <i className="mdi mdi-24px mdi-twitter"></i>
              </a>
              <a href="#" className="hover:opacity-75 w-10 h-10 flex items-center justify-center rounded-full bg-[#5e4dff]">
                <i className="mdi mdi-24px mdi-tiktok"></i>
              </a>
            </div>

            {/* Derechos reservados */}
            <p className="text-center md:text-right">
              © 2025 Atalaya. Todos los derechos reservados.
            </p>
          </div>
        </div>
      </footer>
    </main>

    <ServicesModal modalOpen={serviceModalOpen} onRequestClose={() => setServiceModalOpen(false)} services={services} />
  </>
  );
};

CreateReactScript((el, properties) => {
  createRoot(el).render(<Landing {...properties} />);
})