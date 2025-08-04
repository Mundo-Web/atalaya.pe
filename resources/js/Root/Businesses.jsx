import { createRoot } from "react-dom/client";
import CreateReactScript from "../Utils/CreateReactScript";
import Adminto from "../components/Adminto";
import Table from "../components/Table";
import BusinessesRest from "../actions/BusinessesRest";
import { useRef } from "react";
import ReactAppend from "../Utils/ReactAppend";
import DxButton from "../components/dx/DxButton";
import Swal from "sweetalert2";

const businessesRest = new BusinessesRest()

const Businesses = ({ businesses }) => {
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

        await businessesRest.delete(id);
        $(gridRef.current).dxDataGrid('instance').refresh();
    }

    return <>
        <div className="d-flex flex-wrap gap-3 justify-content-center">
            {businesses.map((business) => (
                <div key={business.id} className="card mb-0" style={{ width: '420px' }}>
                    <div className="card-body">
                        <h4 className="card-title mt-0 mb-1">{business.name}</h4>
                        <div>
                            <span className="d-block">{business.creator?.fullname}</span>
                            <small className="text-muted">{business.creator?.email}</small>
                        </div>
                        <hr className="my-2" />
                        <div className="table-responsive" style={{ height: '241px' }}>
                            <table className="table table-sm mb-0">
                                <tbody>
                                    {business.users?.map((user, index) => (
                                        <tr key={index}>
                                            <td valign='middle' style={{
                                                width: '0%',
                                                borderBottomWidth: index === business.users.length - 1 ? 0 : undefined
                                            }}>
                                                <img src={`/api/profile/thumbnail/${user.relative_id}`} alt="" className="avatar-sm rounded-circle" />
                                            </td>
                                            <td style={{ borderBottomWidth: index === business.users.length - 1 ? 0 : undefined }}>
                                                <span className="d-block">{user.fullname}</span>
                                                <small className="text-muted">{user.email}</small>
                                            </td>
                                            <td valign="middle" style={{ borderBottomWidth: index === business.users.length - 1 ? 0 : undefined }}>
                                                <button
                                                    className="btn btn-xs btn-soft-danger"

                                                    onClick={() => onDeleteClicked(user.id)}
                                                >
                                                    <i className="fa fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            ))}
        </div>
        {/* <Table
            gridRef={gridRef}
            title='Empresas'
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
            rest={businessesRest}
            columns={[
                {
                    dataField: 'name',
                    caption: 'Empresa'
                },
                {
                    dataField: 'person.document_number',
                    caption: 'RUC',
                },
                {
                    dataField: 'owner.name',
                    caption: 'Dueño'
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
        /> */}
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