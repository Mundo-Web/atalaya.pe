import { createRoot } from "react-dom/client";
import CreateReactScript from "../Utils/CreateReactScript";
import Adminto from "../components/Adminto";
import { useRef, useState } from "react";
import ServicesRest from "../actions/Root/ServicesRest";
import ServiceCard from "../Reutilizables/Services/ServiceCard";
import Modal from "../components/Modal";
import Number2Currency from "../Utils/Number2Currency";
import PlansRest from "../actions/Root/PlansRest";
import PlanForm from "../Reutilizables/Services/PlanForm";

const servicesRest = new ServicesRest()
const plansRest = new PlansRest()

const Services = ({ services: servicesDB }) => {
  const modalRef = useRef()
  const planesModalRef = useRef()
  const [services, setServices] = useState(servicesDB);
  const [serviceLoaded, setServiceLoaded] = useState(null);
  const [editingPlan, setEditingPlan] = useState(null);
  const [editedPlan, setEditedPlan] = useState(null);
  const [isCreating, setIsCreating] = useState(false);

  const onStatusClicked = async (id, status) => {
    const result = await servicesRest.status({ id, status })
    setServices(services.map(service => service.id === id ? result : service));
  }

  const onPlanesClicked = (service) => {
    setServiceLoaded(service)
    setEditingPlan(null)
    setIsCreating(false)
    $(planesModalRef.current).modal('show')
  }

  const handleEditClick = (plan) => {
    setIsCreating(false)
    setEditingPlan(plan);
    setEditedPlan({ ...plan });
  }

  const handleCancelEdit = () => {
    setEditingPlan(null);
    setEditedPlan(null);
    setIsCreating(false);
  }

  const handleCreateNew = () => {
    setIsCreating(true);
    setEditingPlan(null);
    setEditedPlan({
      name: '',
      description: '',
      monthly_price: 0,
      annual_price: 0
    });
  }

  const handleSaveEdit = async () => {
    try {
      const result = await plansRest.save({
        ...editedPlan,
        service_id: serviceLoaded.id
      });
      if (isCreating) {
        setServiceLoaded({
          ...serviceLoaded,
          plans: [...serviceLoaded.plans, result]
        });
      } else {
        setServiceLoaded({
          ...serviceLoaded,
          plans: serviceLoaded.plans.map(plan =>
            plan.id === editedPlan.id ? result : plan
          )
        });
      }

      setEditingPlan(null);
      setEditedPlan(null);
      setIsCreating(false);
    } catch (error) {
      console.error("Error saving plan:", error);
    }
  }

  const handleInputChange = (field, value) => {
    setEditedPlan(prev => ({
      ...prev,
      [field]: value
    }));
  };

  return <>
    <div className="d-flex flex-wrap gap-3 justify-content-center">
      {services.map((service) => <ServiceCard key={service.id} {...service} onPlanesClicked={() => onPlanesClicked(service)} onStatusClicked={onStatusClicked} />)}
    </div>
    <Modal modalRef={planesModalRef} title={`Planes - ${serviceLoaded?.name}`} size="full-width" bodyStyle={{ backgroundColor: '#ebeff2' }} hideFooter>
      <div className="d-flex h-100 gap-3 overflow-x-auto pb-2 position-relative align-items-center justify-content-center" style={{ minHeight: 'calc(100vh - 150px)' }}>
        {serviceLoaded?.plans?.map(plan => (
          editingPlan?.id === plan.id ? (
            <PlanForm 
              key={plan.id}
              editedPlan={editedPlan}
              handleInputChange={handleInputChange}
              handleCancelEdit={handleCancelEdit}
              handleSaveEdit={handleSaveEdit}
            />
          ) : (
            <div className="card mb-0 shadow-sm hover-shadow-lg transition-all" style={{ width: '280px', borderRadius: '12px' }} key={plan.id}>
              <div className="card-body p-3">
                <div className="d-flex float-end mb-2">
                  <button
                    className="btn btn-link text-primary p-0"
                    onClick={() => handleEditClick(plan)}
                    type="button"
                  >
                    <i className="mdi mdi-pencil"></i>
                  </button>
                </div>
                <div className="text-start">
                  <h3 className="card-title fw-bold text-primary mb-2">{plan.name}</h3>
                  <p className="card-text text-muted mb-0">{plan.description}</p>
                </div>
                <div className="pricing-section">
                  <div className="text-center mt-3">
                    <div className="d-flex justify-content-center align-items-baseline mb-2">
                      <span className="fs-5 me-2">S/</span>
                      <h1 className="display-5 fw-bold mb-0">{Number2Currency(plan.monthly_price)}</h1>
                      <span className="text-muted ms-2">/mes</span>
                    </div>
                    <div className="text-muted">
                      <span className="badge bg-light text-dark fs-8">
                        o S/ {Number2Currency(plan.annual_price)} / año
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          )
        ))}

        {isCreating ? (
          <PlanForm
            editedPlan={editedPlan}
            handleInputChange={handleInputChange}
            handleCancelEdit={handleCancelEdit}
            handleSaveEdit={handleSaveEdit}
          />
        ) : (
          <div className="d-flex justify-content-center" style={{ width: '120px' }}>
            <button 
              className="btn btn-primary rounded-circle"
              style={{
                width: '50px',
                height: '50px',
              }}
              onClick={handleCreateNew}
              type="button"
            >
              <i className="mdi mdi-plus"></i>
            </button>
          </div>
        )}
      </div>
    </Modal>
  </>
}

CreateReactScript((el, properties) => {
  if (!properties.can('services', 'root')) return location.href = '/';
  createRoot(el).render(
    <Adminto {...properties} title='Servicios'>
      <Services {...properties} />
    </Adminto>
  );
})