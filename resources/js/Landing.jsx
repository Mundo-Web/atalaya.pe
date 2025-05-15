import React, { useState, useEffect, useRef } from 'react';
import { createRoot } from 'react-dom/client';
import CreateReactScript from './Utils/CreateReactScript';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import Global from './Utils/Global';
import Logout from './actions/Logout';

const Landing = ({ session: sessionDB, services }) => {
  const [session, setSession] = useState(sessionDB);
  const [isOpen, setIsOpen] = useState(false);
  const dropdownRef = useRef(null);

  useEffect(() => {
    const handleClickOutside = (event) => {
      if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
        setIsOpen(false);
      }
    };

    document.addEventListener('mousedown', handleClickOutside);
    return () => document.removeEventListener('mousedown', handleClickOutside);
  }, []);

  return (
    <main className='min-h-screen flex flex-col w-full bg-gradient-to-b from-white via-[#f8fffe] to-white'>
      <header className='max-w-7xl w-full mx-auto flex justify-between items-center pt-8 px-4 sm:px-6 lg:px-8 relative'>
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
                      className='w-8 h-8 rounded-full object-center object-cover ring-2 ring-[#00ac9e]' 
                    />
                    <span className='text-[#00ac9e]'>
                      {session.name.split(' ')[0]} {session.lastname?.split(' ')?.[0]}
                    </span>
                    <i className={`mdi mdi-chevron-down text-gray-500 transition-transform ${isOpen ? 'rotate-180' : ''}`}></i>
                  </button>

                  <div className={`absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none divide-y divide-gray-100 transition-all duration-200 ${
                    isOpen 
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
                  <a href="/login" className='w-max px-4 py-2 rounded-full hover:bg-gray-100 transition-all flex items-center'>
                    <i className='mdi mdi-login me-2 text-[#00ac9e]'></i>
                    <span className='hidden md:inline-block'>Iniciar sesión</span>
                  </a>
                </li>
                <li>
                  <a href="/register" className='w-max px-4 py-2 bg-[#00ac9e] text-white rounded-full hover:bg-[#009588] transition-all flex items-center'>
                    <i className='mdi mdi-account-plus me-2'></i>
                    <span className='hidden md:inline-block'>Registro</span>
                  </a>
                </li>
              </>
            )}
          </ul>
        </nav>
      </header>

      <div className='relative mt-4 mb-6 w-full h-[3px]' style={{
        background: 'linear-gradient(to right, transparent, #00ac9e 50%, transparent)'
      }}></div>

      <div className="flex items-center justify-between max-w-7xl mx-auto min-h-[calc(100vh-200px)] py-8 px-4 sm:px-6 lg:px-8">
        <div className="mx-auto grid items-center md:grid-cols-2 gap-12">
          <div className="text-center md:text-start space-y-8 relative">
            <div className="absolute -top-20 -left-20 w-64 h-64 bg-[#00ac9e] rounded-full opacity-10 blur-3xl"></div>
            <h1 className="text-6xl font-bold text-gray-900 tracking-tight leading-tight relative">
              Tu espacio 
              <span className="text-amber-500 font-extrabold relative inline-block mx-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-1 after:bg-amber-500/30">
                DIGITAL
              </span>
              <br className='hidden md:block' />
              en un solo Lugar
            </h1>

            <div className="mt-4 relative z-10">
              <a 
                href={session ? "/home" : "/login"} 
                className="inline-flex items-center px-8 py-4 text-xl font-medium text-white bg-[#00ac9e] rounded-xl transition-all duration-300 hover:bg-[#009588] hover:scale-105 hover:shadow-lg shadow-md"
              >
                {session ? (
                  <>
                    Ver panel
                    <i className="mdi mdi-view-dashboard ml-2"></i>
                  </>
                ) : (
                  <>
                    Empecemos
                    <i className="mdi mdi-arrow-right ml-2"></i>
                  </>
                )}
              </a>
            </div>

            <p className="mt-8 text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
              Simplificamos la gestión de tu negocio con tecnología de vanguardia.
              En Atalaya, ofrecemos soluciones integrales que incluyen facturación electrónica, CRM, ERP,
              mensajería instantánea e inteligencia artificial para optimizar la gestión de tu empresa.
              <span className="block mt-2 font-medium text-[#00ac9e]">
                Nuestra plataforma destaca por su diseño minimalista y facilidad de uso.
              </span>
            </p>
          </div>

          <div className='w-full h-[480px] relative'>
            <div className="absolute inset-0 pointer-events-none z-10" style={{
              background: 'linear-gradient(to bottom, white 0%, transparent 25%, transparent 75%, white 100%)'
            }}></div>
            <div className="absolute -top-20 -right-20 w-64 h-64 bg-amber-500 rounded-full opacity-10 blur-3xl"></div>
            <Swiper
              direction="vertical"
              slidesPerView={3}
              spaceBetween={24}
              centeredSlides={true}
              autoplay={{
                delay: 3000,
                disableOnInteraction: false,
              }}
              pagination={{
                clickable: true,
              }}
              loop={true}
              navigation={true}
              modules={[Autoplay, Pagination, Navigation]}
              className="relative w-full h-full overflow-hidden"
              wrapperClass='mt-[150px]'
            >
              {services.map((service, index) => (
                <SwiperSlide key={index}>
                  {({ isPrev }) => (
                    <div 
                      className={`grid grid-cols-4 gap-4 items-center justify-center shadow-xl rounded-2xl w-[380px] h-auto mx-auto px-6 py-4 transition-all duration-500 backdrop-blur-sm ${
                        isPrev 
                          ? 'scale-110 bg-white/95 shadow-[#00ac9e]/10' 
                          : 'scale-90 opacity-50 bg-white/80'
                      }`}
                    >
                      <div className="relative">
                        <div className="absolute inset-0 bg-[#00ac9e]/10 rounded-xl"></div>
                        <img
                          alt={service.name}
                          src={`//${service.correlative}.${Global.APP_DOMAIN}/assets/img/icon-dark.svg`}
                          className="object-contain h-14 aspect-square mx-auto relative z-10 p-2"
                          onError={e => e.target.src = '/assets/img/icon.svg'}
                        />
                      </div>
                      <div className='col-span-3'>
                        <h3 className="text-lg font-semibold text-gray-900">{service.name}</h3>
                        <p className='line-clamp-2 text-gray-600'>{service.description}</p>
                        {service.status == 0 ? (
                          <span className='text-sm bg-red-500/10 text-red-500 px-4 py-1.5 rounded-full mt-2 block w-max font-medium'>
                            Próximamente
                            <i className='mdi mdi-timer-sand ms-2'></i>
                          </span>
                        ) : (
                          <a 
                            href={`//${service.correlative}.${Global.APP_DOMAIN}/home`} 
                            className='text-sm bg-[#00ac9e]/10 text-[#00ac9e] px-4 py-1.5 rounded-full mt-2 block w-max font-medium hover:bg-[#00ac9e] hover:text-white transition-colors'
                          >
                            Vamos allá
                            <i className='mdi mdi-arrow-top-right ms-2'></i>
                          </a>
                        )}
                      </div>
                    </div>
                  )}
                </SwiperSlide>
              ))}
            </Swiper>
          </div>
        </div>
      </div>
    </main>
  );
};

CreateReactScript((el, properties) => {
  createRoot(el).render(<Landing {...properties} />);
})