import React from 'react';
import { createRoot } from 'react-dom/client';
import Adminto from './components/Adminto';
import CreateReactScript from './Utils/CreateReactScript';
import { Link } from '@inertiajs/react';

const Home = () => {
  return (
    <>
      <div className='d-flex align-items-center justify-content-center' style={{ height: 'calc(100vh - 135px)' }}>
        <div className='text-center'>
          <h1 className='mb-4'>Bienvenido a atalaya</h1>
          <a href='/businesses' className='btn btn-primary'>Ver empresas</a>
        </div>
      </div>
    </>
  );
};

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <Adminto {...properties} title='Inicio'>
      <Home {...properties} />
    </Adminto>
  );
})