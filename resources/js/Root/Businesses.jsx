import { createRoot } from "react-dom/client";
import CreateReactScript from "../Utils/CreateReactScript";
import Adminto from "../components/Adminto";
import { useRef, useState } from "react";
import Swal from "sweetalert2";
import Tippy from "@tippyjs/react";
import BusinessesRest from "../actions/Root/BusinessesRest";
import Global from "../Utils/Global";
import UsersByServicesByBusinessesRest from "../actions/UsersByServicesByBusinessesRest";
import RootBusinessCard from "../Reutilizables/Businesses/RootBusinessCard";

const businessesRest = new BusinessesRest()
const ubsbbRest = new UsersByServicesByBusinessesRest()

const Businesses = ({ businesses: businessesDB }) => {
  const [businesses, setBusinesses] = useState(businessesDB);

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
      {businesses.map((business) => <RootBusinessCard {...business} onStatusClicked={onStatusClicked} onDeleteClicked={onDeleteClicked} />)}
    </div>
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