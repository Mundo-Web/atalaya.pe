import { createRoot } from "react-dom/client";
import CreateReactScript from "../Utils/CreateReactScript";
import Adminto from "../components/Adminto";
import Table from "../components/Table";
import { useRef, useState } from "react";
import ReactAppend from "../Utils/ReactAppend";
import DxButton from "../components/dx/DxButton";
import Swal from "sweetalert2";
import UsersRest from "../actions/Root/UsersRest";
import Modal from "../components/Modal";
import OpenBusinessesButton from "../Reutilizables/Users/OpenBusinessesButton";
import Global from "../Utils/Global";

const usersRest = new UsersRest()

const Users = () => {
    const gridRef = useRef()
    const modalRef = useRef()

    const [businesses, setBusinesses] = useState([])

    const onDeleteClicked = async (userData) => {
        const initialResult = await Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        });

        if (!initialResult.isConfirmed) return;

        // If user has businesses, show second confirmation
        if (userData.businesses_count > 0) {
            const secondResult = await Swal.fire({
                title: '¡Atención!',
                text: "Este usuario tiene empresas asociadas. Al eliminarlo, también se eliminarán todas sus empresas. ¿Estás realmente seguro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar todo!'
            });

            if (!secondResult.isConfirmed) return;
        }

        const result = await usersRest.delete(userData.id);
        if (!result) return

        $(gridRef.current).dxDataGrid('instance').refresh();
    }
    return <>
        <Table
            gridRef={gridRef}
            title='Usuarios'
            toolBar={(container) => {
                container.unshift({
                    widget: 'dxButton', location: 'after',
                    options: {
                        icon: 'refresh',
                        hint: 'Refrescar tabla',
                        onClick: () => $(gridRef.current).dxDataGrid('instance').refresh()
                    }
                });
            }}
            rest={usersRest}
            pageSize={25}
            columns={[
                {
                    dataField: 'person.document_number',
                    caption: 'Documento',
                    width: '120px',
                    cellTemplate: (container, { data }) => {
                        ReactAppend(container, <>
                            <span className="badge bg-primary me-1">{data.person?.document_type ?? 'SD'}</span>
                            {data.person?.document_number ?? '00000000'}
                        </>)
                    }
                },
                {
                    dataField: 'fullname',
                    caption: 'Usuario'
                },
                {
                    dataField: 'email',
                    caption: 'Correo electrónico'
                },
                {
                    dataField: 'businesses_count',
                    caption: 'Empresas',
                    allowFiltering: false,
                    cellTemplate: (container, { data }) => {
                        if (data.businesses_count == 0) return
                        ReactAppend(container, <OpenBusinessesButton data={data} modalRef={modalRef} setBusinesses={setBusinesses} />)
                    }
                },
                {
                    caption: 'Roles',
                    cellTemplate: (container, { data }) => {
                        container.text(data.roles?.map((role) => role.name).sort().join(', '))
                    }
                },
                {
                    caption: 'Acciones',
                    cellTemplate: (container, { data }) => {
                        container.append(DxButton({
                            className: 'btn btn-xs btn-soft-danger',
                            title: 'Eliminar',
                            icon: 'fa fa-trash-alt',
                            onClick: () => onDeleteClicked(data)
                        }))
                    }
                }
            ]}
        />
        <Modal modalRef={modalRef} title="Empresas">
            <table className="table table-sm mb-0 table-bordered">
                <thead>
                    <th>Empresa</th>
                    <th>Servicios</th>
                    <th>Usuarios</th>
                </thead>
                <tbody>
                    {businesses.map(business => {
                        return <tr key={business.id}>
                            <td>{business.name}</td>
                            <td>
                                <div className="d-flex flex-wrap gap-1">
                                    {business.services?.map(service => {
                                        return <img className="avatar-xs"
                                            src={`//${service.correlative}.${Global.APP_DOMAIN}/assets/img/icon.svg`}
                                            onError={(e) => e.target.src = '/assets/img/icon.svg'}
                                            alt={service.name}
                                            style={{ objectFit: 'contain', objectPosition: 'center' }} />
                                    })}
                                </div>
                            </td>
                            <td>{business.users.length}</td>
                        </tr>
                    })}
                </tbody>
            </table>
        </Modal>
    </>
}

CreateReactScript((el, properties) => {
    if (!properties.can('users', 'root')) return location.href = '/';
    createRoot(el).render(
        <Adminto {...properties} title='Usuarios'>
            <Users {...properties} />
        </Adminto>
    );
})