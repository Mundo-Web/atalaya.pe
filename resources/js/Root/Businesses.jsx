import { createRoot } from "react-dom/client";
import CreateReactScript from "../Utils/CreateReactScript";
import Adminto from "../components/Adminto";
import { useRef, useState } from "react";
import Swal from "sweetalert2";
import BusinessesRest from "../actions/Root/BusinessesRest";
import RootBusinessCard from "../Reutilizables/Businesses/RootBusinessCard";
import Modal from "../components/Modal";
import PlanPaymentsRest from "../actions/Root/PlanPaymentsRest";
import ServicesByBusinessesRest from "../actions/Root/ServicesByBusinessesRest";

const businessesRest = new BusinessesRest()
const planPayments = new PlanPaymentsRest()
const serviceByBusinessRest = new ServicesByBusinessesRest()

const Businesses = ({ businesses: businessesDB }) => {
  const paymentModalRef = useRef()

  const [businesses, setBusinesses] = useState(businessesDB);

  const [summary, setSummary] = useState(null)
  const [payments, setPayments] = useState([])

  const onPaymentClicked = async (match_id) => {
    const { status, data, summary } = await planPayments.paginate({
      match_id,
      filter: ['service_by_business_id', '=', match_id]
    })
    if (status != 200) return

    setSummary(summary)
    setPayments(data)

    $(paymentModalRef.current).modal('show')
  }

  const onExemptClicked = async (exempt) => {
    const result = await serviceByBusinessRest.save({
      id: summary.match_id,
      exempt
    })
    if (!result) return
    location.reload()
  }

  const onStatusClicked = async (id, status) => {
    const result = await businessesRest.status({ id, status })
    setBusinesses(businesses.map(business => business.id === id ? result : business));
  }

  const onDeleteClicked = async (id) => {
    const firstConfirmation = await Swal.fire({
      title: '¿Estás seguro?',
      text: "¡Esta acción no se puede deshacer!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Sí, continuar!'
    });

    if (!firstConfirmation.isConfirmed) return;

    const secondConfirmation = await Swal.fire({
      title: '¿Estás REALMENTE seguro?',
      text: "¡Esta es tu última oportunidad, la acción no se podrá revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Sí, eliminar definitivamente!'
    });

    if (!secondConfirmation.isConfirmed) return;

    const result = await businessesRest.delete(id);
    if (!result) return;
    setBusinesses(businesses.filter(business => business.id !== id));
  }

  return <>
    <div className="d-flex flex-wrap gap-3 justify-content-center">
      {businesses.map((business) => <RootBusinessCard {...business} onPaymentClicked={onPaymentClicked} onStatusClicked={onStatusClicked} onDeleteClicked={onDeleteClicked} />)}
    </div>
    <Modal modalRef={paymentModalRef} title="Historial de pagos" hideFooter>
      <div className="mb-2">
        <p className="mb-0"><strong>Empresa:</strong> {summary?.business?.name ?? ''}</p>
        <p className="mb-0"><strong>Servicio:</strong> {summary?.service?.name ?? ''}</p>
      </div>

      {summary?.exempt ? (<>
        <button className="btn btn-sm btn-dark" type="button" onClick={() => onExemptClicked(false)}>Dejar de exonerar</button>
        <div className="alert alert-info mt-2 mb-0">
          Este cliente está exonerado de pagos
        </div>
      </>
      ) : (<>
        <button className="btn btn-sm btn-success" type="button" onClick={() => onExemptClicked(true)}>Exonerar pagos</button>
        <div className="table-responsive mt-2">
          <table className="table table-sm table-centered table-bordered mb-0 text-center">
            <thead>
              <tr>
                <th rowSpan={2}>Fecha de pago</th>
                <th colSpan={2}>Cobertura</th>
              </tr>
              <tr>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
              </tr>
            </thead>
            <tbody>
              {payments.map(payment => (
                <tr key={payment.id}>
                  <td>{payment.created_at}</td>
                  <td>{payment.begins_at}</td>
                  <td>{payment.ends_at}</td>
                </tr>
              ))}
              <tr>
                <td colSpan={3} className="text-center">
                  <div className="btn-group">
                    <button
                      className="btn btn-sm btn-primary"
                      type="button"
                    >
                      <i className="mdi mdi-plus me-1"></i>
                      Pago Mensual
                    </button>
                    <button
                      className="btn btn-sm btn-success"
                      type="button"
                    >
                      <i className="mdi mdi-plus me-1"></i>
                      Pago Anual
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </>
      )}
    </Modal>
  </>

}

CreateReactScript((el, properties) => {
  if (!properties.can('businesses', 'root')) return location.href = '/';
  createRoot(el).render(
    <Adminto {...properties} title='Empresas'>
      <Businesses {...properties} />
    </Adminto>
  );
})