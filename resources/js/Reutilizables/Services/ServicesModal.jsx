import Global from "../../Utils/Global"
import Number2Currency from "../../Utils/Number2Currency"

const ServicesModal = ({ modalOpen, onRequestClose, services, onServiceClicked }) => {
    return <div
        className={`fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-all duration-300 ease-in-out ${modalOpen ? 'opacity-100 visible' : 'opacity-0 invisible'
            }`}
        onClick={onRequestClose}
    >
        <div className="bg-white rounded-lg p-6 max-w-2xl w-full mx-4" onClick={(e) => e.stopPropagation()}>
            <div className="flex justify-between items-center mb-4">
                <h3 className="text-3xl font-bold">Servicios de Atala<span className='text-[#fe4611]'>y</span>a</h3>
                <button
                    type="button"
                    onClick={onRequestClose}
                    className="text-gray-500 hover:text-gray-700"
                >
                    <i className="mdi mdi-close text-2xl"></i>
                </button>
            </div>

            <div className="grid md:grid-cols-2 gap-4">
                {services?.sort((a, b) => a.name.localeCompare(b.name)).map((service, index) => (
                    <div
                        key={index}
                        className="bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-gray-100 relative overflow-hidden group"
                    >
                        <div className="absolute inset-0 bg-gradient-to-br from-[#315af3]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-100 z-0"></div>

                        <div className="relative z-10">
                            <div className="flex items-start justify-between mb-4">
                                <img
                                    className='h-8 w-max'
                                    src={`//${service.correlative}.${Global.APP_DOMAIN}/assets/img/logo-dark.svg`}
                                    alt={service.name}
                                    onError={(e) => e.target.src = '/assets/img/logo-dark.svg'}
                                />
                                <span className="text-[#315af3] font-bold text-xl">
                                    S/ {Number2Currency(service.price)}
                                    <span className="text-sm text-gray-500 font-normal">/mes</span>
                                </span>
                            </div>

                            <h4 className="font-bold text-2xl mb-2 text-gray-900">{service.name}</h4>
                            <p className="text-gray-600 mb-4 leading-tight ">{service.description}</p>

                            {service.status === 1
                                ? <>
                                    {
                                        typeof onServiceClicked != 'undefined'
                                            ? <button
                                                type="button"
                                                onClick={() => onServiceClicked(service)}
                                                className="w-full inline-flex items-center justify-center px-6 py-2 bg-[#315af3] text-white rounded-xl hover:bg-[#2a4ed8] transition-colors duration-300 font-medium group-hover:shadow-lg"
                                            >
                                                Comenzar ahora
                                                <i className="mdi mdi-arrow-right ml-2"></i>
                                            </button>
                                            : <a
                                                href={`/join/${service.correlative}`}
                                                className="w-full inline-flex items-center justify-center px-6 py-2 bg-[#315af3] text-white rounded-xl hover:bg-[#2a4ed8] transition-colors duration-300 font-medium group-hover:shadow-lg"
                                            >
                                                Comenzar ahora
                                                <i className="mdi mdi-arrow-right ml-2"></i>
                                            </a>
                                    }</>
                                : <div className="w-full inline-flex items-center justify-center px-6 py-2 bg-gray-200 text-gray-600 rounded-xl font-medium cursor-not-allowed">
                                    Próximamente
                                </div>
                            }
                        </div>
                    </div>
                ))}
            </div>
        </div>
    </div>
}

export default ServicesModal