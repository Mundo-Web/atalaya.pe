import { createRoot } from "react-dom/client";
import CreateReactScript from "../Utils/CreateReactScript";
import Adminto from "../components/Adminto";
import Table from "../components/Table";
import { useRef } from "react";
import ReactAppend from "../Utils/ReactAppend";
import DxButton from "../components/dx/DxButton";
import Swal from "sweetalert2";
import UsersRest from "../actions/UsersRest";

const usersRest = new UsersRest()

const Users = () => {
    const gridRef = useRef()

    const onDeleteClicked = async (id) => {
        const result = await Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        });

        if (!result.isConfirmed) return

        await usersRest.delete(id);
        $(gridRef.current).dxDataGrid('instance').refresh();
    }

    return <Table
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
        columns={[
            {
                dataField: 'person.document_number',
                caption: 'Documento',
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
                dataField: 'creator.name',
                caption: 'Creado por',
                cellTemplate: (container, { data }) => {
                    ReactAppend(container, <>
                        <span className="d-block">{data.creator?.name}</span>
                        <small className="text-muted">{data.creator?.email}</small>
                    </>)
                }
            },
            {
                caption: 'Acciones',
                cellTemplate: (container, { data }) => {
                    container.append(DxButton({
                        className: 'btn btn-xs btn-soft-danger',
                        title: 'Eliminar',
                        icon: 'fa fa-trash-alt',
                        onClick: () => onDeleteClicked(data.id)
                    }))
                }
            }
        ]}
    />
}

CreateReactScript((el, properties) => {
    if (!properties.can('users', 'root')) return location.href = '/';
    createRoot(el).render(
        <Adminto {...properties} title='Usuarios'>
            <Users {...properties} />
        </Adminto>
    );
})