import { useState } from "react"
import BusinessesRest from "../../actions/Root/BusinessesRest";

const businessesRest = new BusinessesRest()

const OpenBusinessesButton = ({ data, modalRef, setBusinesses }) => {
    const [loading, setLoading] = useState(false);

    const onClick = async () => {
        setLoading(true)
        const result = await businessesRest.byUser(data.id)
        setLoading(false)
        if (!result) return
        setBusinesses(result)
        $(modalRef.current).modal('show')
    }

    return <button
        className="btn btn-xs btn-soft-primary"
        onClick={onClick}
        disabled={loading}
    >
        {
            loading
                ? <>
                    <i className="mdi mdi-loading mdi-spin me-1"></i>
                    <span>Cargando</span>
                </>
                : <>
                    <span className="me-1">{data.businesses_count}</span>
                    {data.businesses_count > 1 ? 'Empresas' : 'Empresa'}
                </>
        }
    </button>
}

export default OpenBusinessesButton
