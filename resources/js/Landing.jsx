import React from 'react';
import { createRoot } from 'react-dom/client';
import CreateReactScript from './Utils/CreateReactScript';
// import Swiper from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import Global from './Utils/Global';

const Landing = ({ session, services }) => {

  console.log(session)

  return (
    <main className='min-h-screen flex flex-col gap-8 w-full'>
      <header className='max-w-7xl w-full mx-auto flex justify-between items-center pt-8 px-4 sm:px-6 lg:px-8 relative'>
        <a href="/">
          <img src="/assets/img/logo-dark.svg" alt="" style={{ height: '40px' }} />
        </a>
        <nav>
          <ul className="flex space-x-4 text-[#323a46] font-bold">
            {
              session
                ? <>
                  <li>
                    <a href="/login" className='w-max flex items-center justify-center gap-2'>
                      <img src={`/api/profile/thumbnail/${session.uuid}`} alt="" className='w-8 rounded-full object-center object-cover' />
                      <span className=''>{session.name.split(' ')[0]} {session.lastname?.split(' ')?.[0]}</span>
                    </a>
                  </li>
                </>
                : <>
                  <li>
                    <a href="/login" className='w-max'>
                      <i className='mdi mdi-login me-2'></i>
                      <span className='hidden md:inline-block'>Iniciar sesion</span>
                    </a>
                  </li>
                  <li>|</li>
                  <li>
                    <a href="/register" className='w-max'>
                      <i className='mdi mdi-account-plus me-2'></i>
                      <span className='hidden md:inline-block'>Registro</span>
                    </a>
                  </li>
                </>
            }
          </ul>
        </nav>
      </header>
      <div className='relative mb-6 w-full h-[3px]' style={{
        background: 'linear-gradient(to right, transparent, #00ac9e 50%, transparent)'
      }}></div>
      <div className="flex items-center justify-between min-h-[calc(100vh-200px)] py-8 px-4 sm:px-6 lg:px-8 ">
        <div className="max-w-7xl mx-auto grid items-center md:grid-cols-2 gap-8">
          <div className="text-center md:text-start space-y-8">
            <h1 className="text-5xl font-bold text-gray-900 tracking-tight">
              Tu espacio <span className="text-amber-500 me-2">DIGITAL</span>
              <br className='hidden md:block' />
              en un solo Lugar
            </h1>

            <div className="mt-4">
              <a href={session ? "/home" : "/login"} className="inline-flex items-center px-8 py-3 text-xl font-medium text-white bg-[#00ac9e] rounded-lg transition-colors duration-200">
                {
                  session
                    ? <>
                      Ver panel
                      <i className="mdi mdi-view-dashboard ml-2"></i>
                    </>
                    : <>
                      Empecemos
                      <i className="mdi mdi-arrow-right ml-2"></i>
                    </>
                }
              </a>
            </div>

            <p className="mt-8 text-lg text-gray-600 max-w-2xl mx-auto">
              Simplificamos la gestión de tu negocio con tecnología de vanguardia.
              En Atalaya, ofrecemos soluciones integrales que incluyen facturación electrónica, CRM, ERP,
              mensajería instantánea e inteligencia artificial para optimizar la gestión de tu empresa.
              Nuestra plataforma destaca por su diseño minimalista y facilidad de uso.
            </p>
          </div>
          <div className='w-full h-[420px] relative'>
            <div className="absolute inset-0 pointer-events-none z-10" style={{
              background: 'linear-gradient(to bottom, white 0%, transparent 25%, transparent 75%, white 100%)'
            }}></div>
            <Swiper
              direction="vertical"
              slidesPerView={3}
              spaceBetween={20}
              centeredSlides={true}
              autoplay={{
                delay: 2500,
                disableOnInteraction: false,
              }}
              pagination={{
                clickable: true,
              }}
              loop={true}
              navigation={true}
              modules={[Autoplay, Pagination, Navigation]}
              className="relative w-full h-full overflow-hidden top-0"
              wrapperClass='mt-[150px]'
            >{
                services.map((service, index) => {
                  return <SwiperSlide key={index}>
                    {({ isPrev }) => (
                      <div className={`grid grid-cols-4 gap-4 items-center justify-center shadow-xl rounded-2xl w-[360px] h-auto mx-auto px-4 py-3 transition-all duration-300 ${isPrev ? 'scale-110 bg-white' : 'scale-90 opacity-50'}`}>
                        <img
                          alt={service.name}
                          src={`//${service.correlative}.${Global.APP_DOMAIN}/assets/img/icon.svg`}
                          className="object-contain h-12 aspect-square mx-auto"
                          onError={e => e.target.src = '/assets/img/icon.svg'} />
                        <div className='col-span-3'>
                          <h3 className="text-lg font-semibold">{service.name}</h3>
                          <p className='line-clamp-2 h-13'>{service.description}</p>
                          {
                            service.status == 0
                              ? <span className='text-sm bg-red-500 px-3 py-1 rounded-full text-white mt-2 block w-max'>
                                Proximamente
                                <i className='mdi mdi-timer-sand ms-2'></i>
                                </span>
                              : <a href={`/login?service=${service.correlative}`} className='text-sm bg-[#00ac9e] px-3 py-1 rounded-full text-white mt-2 block w-max'>
                                Vamos alla
                                <i className='mdi mdi-arrow-top-right ms-2'></i>
                              </a>
                          }
                        </div>
                      </div>
                    )}
                  </SwiperSlide>
                })
              }
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