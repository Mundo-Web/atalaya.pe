import { createRoot } from 'react-dom/client'
import React from 'react'
import CreateReactScript from './Utils/CreateReactScript'

const Terms = ({ }) => {
  return (
    <>
      <div className="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div className="bg-white rounded-lg shadow-lg max-w-2xl w-full mx-auto">
          <div className="p-6 border-b border-gray-200">
            <h1 className="text-2xl font-semibold text-gray-800">Política de Privacidad de Atalaya</h1>
          </div>
          <div className="h-[calc(100vh-12rem)] max-h-[32rem] p-6 overflow-y-auto">
            <div className="space-y-6 text-gray-600">
              <section>
                <p>
                  Bienvenido a Atalaya. Nos comprometemos a proteger su privacidad y garantizar la seguridad de su
                  información personal. Esta Política de Privacidad describe cómo recopilamos, usamos y protegemos sus
                  datos cuando utilizamos nuestros servicios de desarrollo web y marketing digital.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">1. Información que Recopilamos</h2>
                <p>Podemos recopilar los siguientes tipos de información:</p>
                <ul className="list-disc pl-5 mt-2 space-y-1">
                  <li>
                    Datos personales: Nombre, dirección de correo electrónico, número de teléfono y otra información de
                    contacto.
                  </li>
                  <li>Datos de facturación: Información necesaria para procesar pagos.</li>
                  <li>
                    Datos técnicos: Dirección IP, tipo de navegador, sistema operativo y otra información sobre su
                    dispositivo.
                  </li>
                  <li>Datos de uso: Información sobre su interacción con nuestro sitio web y servicios.</li>
                </ul>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">2. Uso de la Información</h2>
                <p>Utilizamos la información recopilada para:</p>
                <ul className="list-disc pl-5 mt-2 space-y-1">
                  <li>Proveer y mejorar nuestros servicios.</li>
                  <li>Personalizar la experiencia del usuario.</li>
                  <li>Comunicarnos con usted sobre nuestros productos y servicios.</li>
                  <li>Procesar pagos y facturación.</li>
                  <li>Cumplir con obligaciones legales.</li>
                </ul>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">3. Compartición de la Información</h2>
                <p>No vendemos ni alquilamos su información personal. Sin embargo, podemos compartir sus datos con:</p>
                <ul className="list-disc pl-5 mt-2 space-y-1">
                  <li>Proveedores de servicios terceros que nos ayudan a operar nuestro negocio.</li>
                  <li>Autoridades legales cuando sea requerido por ley.</li>
                  <li>Socios comerciales con su consentimiento.</li>
                </ul>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">4. Seguridad de los Datos</h2>
                <p>
                  Implementamos medidas de seguridad para proteger su información personal contra accesos no autorizados,
                  alteraciones o destrucciones.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">5. Cookies y Tecnologías de Seguimiento</h2>
                <p>
                  Utilizamos cookies y otras tecnologías de seguimiento para mejorar su experiencia en nuestro sitio web.
                  Puede configurar su navegador para rechazar cookies, pero esto puede afectar la funcionalidad del sitio.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">6. Derechos del Usuario</h2>
                <p>Usted tiene derecho a:</p>
                <ul className="list-disc pl-5 mt-2 space-y-1">
                  <li>Acceder, rectificar o eliminar sus datos personales.</li>
                  <li>Restringir u oponerse al procesamiento de sus datos.</li>
                  <li>Retirar su consentimiento en cualquier momento.</li>
                </ul>
                <p className="mt-2">Para ejercer estos derechos, contáctenos a julio@mundoweb.pe</p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">7. Cambios en la Política de Privacidad</h2>
                <p>
                  Nos reservamos el derecho de actualizar esta Política de Privacidad en cualquier momento. Le
                  recomendamos revisar esta página periódicamente para estar informado sobre cambios.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">8. Contacto</h2>
                <p>Si tiene alguna pregunta sobre nuestra Política de Privacidad, puede contactarnos en:</p>
                <address className="mt-2 not-italic">
                  Atalaya
                  <br />
                  Av. Aramburú 166 - Miraflores, Oficina 4B
                  <br />
                  Lima, Lima 51, PE
                  <br />
                  Email:{" "}
                  <a href="mailto:julio@mundoweb.pe" className="text-blue-600 hover:underline">
                    julio@mundoweb.pe
                  </a>
                  <br />
                  Teléfono:{" "}
                  <a href="tel:+51998913140" className="text-blue-600 hover:underline">
                    +51 998913140
                  </a>
                </address>
              </section>

              <p className="text-sm text-gray-500 mt-6">Última actualización: {new Date().toLocaleDateString()}</p>
            </div>
          </div>
        </div>
      </div>
    </>
  )
};

CreateReactScript((el, properties) => {
  createRoot(el).render(<Terms {...properties} />);
})