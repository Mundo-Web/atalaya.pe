import { createRoot } from 'react-dom/client'
import React from 'react'
import CreateReactScript from './Utils/CreateReactScript'

const DataUsage = ({ }) => {
  return (
    <>
      <div className="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div className="bg-white rounded-lg shadow-lg max-w-2xl w-full">
          <div className="p-6 border-b border-gray-200">
            <h1 className="text-2xl font-semibold text-gray-800">Condiciones del Servicio de Atalaya</h1>
          </div>
          <ScrollArea className="h-[calc(100vh-12rem)] max-h-[32rem] p-6">
            <div className="space-y-6 text-gray-600">
              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">1. Introducción</h2>
                <p>
                  Bienvenido a Atalaya. Al acceder y utilizar nuestros servicios de desarrollo web y marketing digital,
                  usted acepta cumplir con estas Condiciones del Servicio. Si no está de acuerdo con alguno de los
                  términos, le recomendamos que no utilice nuestros servicios.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">2. Servicios Ofrecidos</h2>
                <p>
                  Atalaya proporciona servicios de desarrollo web, marketing digital, consultoría tecnológica y otras
                  soluciones relacionadas. Nos reservamos el derecho de modificar, actualizar o descontinuar cualquier
                  servicio en cualquier momento sin previo aviso.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">3. Uso de los Servicios</h2>
                <p>
                  Usted se compromete a utilizar nuestros servicios de manera legal y conforme a estas condiciones. Queda
                  prohibido:
                </p>
                <ul className="list-disc pl-5 mt-2 space-y-1">
                  <li>Utilizar nuestros servicios para actividades ilegales o no autorizadas.</li>
                  <li>Intentar acceder sin autorización a nuestros sistemas o datos.</li>
                  <li>Modificar o interferir con el funcionamiento de nuestros servicios.</li>
                </ul>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">4. Responsabilidad del Cliente</h2>
                <p>
                  El cliente es responsable de proporcionar información veraz y actualizada. Además, debe garantizar que
                  cualquier contenido proporcionado para el desarrollo de su proyecto no infringe derechos de terceros.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">5. Propiedad Intelectual</h2>
                <p>
                  Todos los derechos sobre los desarrollos, diseños y estrategias creados por Atalaya pertenecen a
                  Atalaya, salvo acuerdo expreso en contrario. El cliente obtiene una licencia de uso no exclusiva sobre
                  los desarrollos entregados.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">6. Pagos y Facturación</h2>
                <p>
                  Los pagos deben realizarse según los términos acordados en la propuesta o contrato. En caso de impago,
                  Atalaya se reserva el derecho de suspender los servicios hasta que la cuenta esté regularizada.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">7. Limitación de Responsabilidad</h2>
                <p>
                  Atalaya no se hace responsable de daños indirectos, incidentales o consecuentes derivados del uso de
                  nuestros servicios. No garantizamos que los servicios sean ininterrumpidos o libres de errores.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">8. Modificaciones de las Condiciones</h2>
                <p>
                  Podemos actualizar estas condiciones en cualquier momento. El uso continuo de nuestros servicios después
                  de cualquier modificación implica la aceptación de los términos actualizados.
                </p>
              </section>

              <section>
                <h2 className="text-lg font-semibold text-gray-800 mb-2">9. Contacto</h2>
                <p>Para cualquier consulta sobre estas condiciones, puede contactarnos en:</p>
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
          </ScrollArea>
        </div>
      </div>
    </>
  )
};

CreateReactScript((el, properties) => {
  createRoot(el).render(<DataUsage {...properties} />);
})