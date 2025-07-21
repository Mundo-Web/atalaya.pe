const JoinThanks = () => {
    return <div className="bg-white rounded-xl max-w-sm w-full mx-auto p-6 text-center">
        <i className="mdi mdi-check mdi-36px w-14 h-14 bg-[#DBE0FF] mx-auto mb-6 rounded-2xl flex items-center justify-center text-[#4621E1]"></i>
        <h2 className="text-4xl font-bold mb-4">
            ¡Bienvenido a <span className="text-[#FE4611]">Atalaya</span>!
        </h2>
        <p className="leading-tight mb-6 text-gray-600">Tu cuenta ha sido configurada exitosamente. Estás listo para comenzar a gestionar tus clientes y hacer crecer tu negocio.</p>
        <div className="space-y-2 mb-6">
            <button className="w-full block border-2 border-[#4621E1] bg-[#4621E1] hover:bg-opacity-90 transition-colors font-semibold text-white rounded-xl py-3 px-6">Ir al Dashboard</button>
            <button className="w-full block border-2 border-[#4621E1] transition-colors text-[#4621E1] hover:bg-[#4621E1] hover:text-white font-semibold rounded-xl py-3 px-6">
                Ver tutorial
            </button>
        </div>
        <p className="leading-tight text-[#4621E1] text-sm">
            <span className="font-bold">💡 Próximos pasos:</span> Importa tus contactos existentes o comienza agregando tu primer lead.</p>
    </div>
}

export default JoinThanks