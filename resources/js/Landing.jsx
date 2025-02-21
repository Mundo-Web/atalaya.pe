import React from 'react';
import { createRoot } from 'react-dom/client';
import CreateReactScript from './Utils/CreateReactScript';
// import Swiper from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import Global from './Utils/Global';

const Landing = ({ services }) => {

  console.log(services)

  return (
    <main className='min-h-screen flex flex-col gap-8 w-full'>
      <header className='max-w-6xl w-full mx-auto flex justify-between items-center pt-8 pb-6 px-4 sm:px-6 lg:px-8 border-b-4 border-[#00ac9e]'>
        <a href="/">
          <img src="/assets/img/logo-dark.svg" alt="" style={{ height: '50px' }} />
        </a>
        <nav>
          <ul className="flex space-x-4 text-[#323a46] font-bold">
            <li>
              <a href="/login" className='w-max'>
                <i className='mdi mdi-login me-2'></i>
                <span className='hidden md:inline-block'>Iniciar sesion</span>
              </a>
            </li>
            <li>|</li>
            <li>
              <a href="/register"  className='w-max'>
                <i className='mdi mdi-account-plus me-2'></i>
                <span className='hidden md:inline-block'>Registro</span>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <div className="flex items-center justify-between min-h-[calc(100vh-200px)] py-8 px-4 sm:px-6 lg:px-8 ">
        <div className="max-w-6xl mx-auto grid items-center md:grid-cols-2 gap-8">
          <div className="space-y-8">
            <h1 className="text-5xl font-bold text-gray-900 tracking-tight">
              Tu espacio <span className="text-amber-500">DIGITAL</span>
              <br />
              en un solo Lugar
            </h1>

            <div className="mt-4">
              <a href="/login" className="inline-flex items-center px-8 py-3 text-base font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition-colors duration-200">
                Empecemos
                <i className="mdi mdi-arrow-right ml-2 text-xl"></i>
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
              spaceBetween={30}
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
                  return <SwiperSlide key={index} className="grid grid-cols-4 gap-4 items-center justify-center border w-[360px] mx-auto px-4">
                    <img
                      alt={service.name}
                      src={`//${service.correlative}.atalaya.pe/assets/img/icon.svg`}
                      className="object-contain h-10 aspect-square mx-auto"
                      onError={e => e.target.src = '/assets/img/icon.svg'} />
                    <div className='col-span-3'>
                      <h3 className="text-lg font-semibold">{service.name}</h3>
                      <p>{service.description}</p>
                    </div>
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