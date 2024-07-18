(function (){
    const orden = document.querySelector('#orden');
    const area = document.querySelector('#area');
    const maquina = document.querySelector('#maquina');
    const cliente = document.querySelector('#cliente');
    const operador = document.querySelector('#operador');
    const contenedorForm = document.querySelector('#contenedorForm');
    const mobilemenu1 = document.querySelector('.mobile-menu1');
    
    let ordenes = [];

    const mensajeNoResultados = document.createElement('div'); // Elemento para el mensaje de no resultados
    mensajeNoResultados.classList.add('alerta', 'error', 'oculto');
    mensajeNoResultados.textContent = 'No Hay Resultados, Intenta con otros términos de búsqueda';
    contenedorForm.insertBefore(mensajeNoResultados, contenedorForm.firstChild); // Insertar mensaje arriba del formulario
    async function obtenerOrdenes(){
        try{
            const server = window.location.origin;
            const url = `${server}/api/cremalleras`;
            const respuesta = await fetch(url);
            const datos = await respuesta.json();
    
            ordenes = datos.vista_cremalleras_ordenes;
            clientes = datos.vista_clientes;
            mostrar_botones = datos.mostrar_botones;
        
            filtrar();
        } catch (error){
        }
    }
    
    
    mobilemenu1.addEventListener('click', () => {
        contenedorForm.classList.toggle('oculto');
    
    })
    
    
    
    
    const datosBusqueda = {
        orden: '',
        area: '',
        maquina: '',
        cliente: '',
        operador: ''
    }
    
    document.addEventListener('DOMContentLoaded', function () {
        // filtros();
        $resultado = document.querySelector('tbody');
        // llenarSelect();
        obtenerOrdenes();

    });
    
    
    orden.addEventListener('input', e => {
        datosBusqueda.orden = e.target.value;
    
        filtrar(); 
    });
    
    area.addEventListener('change', e => {
        datosBusqueda.area = e.target.value;
    
        filtrar();
        // datosBusqueda.area = e.target.value;
    });
    
    maquina.addEventListener('change', e => {
        datosBusqueda.maquina = e.target.value;
        filtrar();
        // datosBusqueda.area = e.target.value;
    });
    
    cliente.addEventListener('change', e => {
        datosBusqueda.cliente = e.target.value;
        filtrar();
    
        // datosBusqueda.area = e.target.value;
    });
    operador.addEventListener('change', e => {
        datosBusqueda.operador = e.target.value;
        filtrar();
    
        // datosBusqueda.area = e.target.value;
    });

    const resultado = document.querySelector('tbody'); // Definir resultado aquí

    function mostrarOrdenes(ordenes) {
         limpiarHTML();
         if(ordenes.length > 0){
            ordenes.forEach(orden => {
                const { numero_orden, descripcion_orden, hora_orden, fecha_orden, prioridad_orden, nombre_area, nombre_maquina, referencia_cliente, nombre_cliente, nombre_operador, apellido_operador, nombre_usuario, apellido_usuario, id } = orden;
                
                const [year, month, day] = fecha_orden.split('-');
                const dateTime = new Date(year, month-1,day);
                const fechaFormateada = dateTime.toLocaleDateString('es-ES');
        
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${numero_orden}</td>
                    <td>${descripcion_orden}</td>
                    <td>${hora_orden} el ${fechaFormateada}</td>
                    <td>${prioridad_orden}</td>
                    <td>${nombre_area}</td>
                    <td>${nombre_maquina}</td>
                    <td>${referencia_cliente} ${nombre_cliente}</td>
                    <td>${nombre_operador} ${apellido_operador}</td>
                    <td>${nombre_usuario} ${apellido_usuario}</td>
                    ${mostrar_botones ? `
                    <td>
                        <form method="POST" class="w-100" action="/busquedacremalleras/eliminar">
                            <input type="hidden" name="id" value="${id}">
                            <input type="hidden" name="tipo" value="cremalleras_ordenes">
                            <input type="submit" class="boton-rojo-block-1" value="Eliminar">
                        </form>
                        <a href="/busquedacremalleras/actualizar?id=${id}" class="boton-verde-block-1">Actualizar</a>
                    </td>
                    ` : ''}
                `;
                resultado.appendChild(row);
            });
         } else{
            noResultado();
         }

    }
    
    // Limpiar HTML
    function limpiarHTML(){
        while(resultado.firstChild){
            resultado.removeChild(resultado.firstChild);
        }
    }
    
    // function llenarSelect() {
    
    //     const max = new Date().getFullYear();
    //     const min = max - 10;
    
    
    //     for (let i = max; i > min; i--) {
    //         const opcion = document.createElement('option');
    //         opcion.value = i;
    //         opcion.textContent = i;
    //         fecha.appendChild(opcion); // Agrega las opciones de año al select
    //     }
    // }
    
    
    function filtrar(){
        const resultadoFiltrado = ordenes.filter( filtrarOrden ).filter( filtrarFecha ).filter( filtrarArea ).filter( filtrarMaquina ).filter( filtrarCliente ).filter( filtrarNombre ).filter( filtrarApellido);
        if(resultadoFiltrado.length){
            ocultarMensajeNoResultados();
            mostrarOrdenes(resultadoFiltrado);
        }else{
            mostrarMensajeNoResultados();
            noResultado();
        }
    }

    function mostrarMensajeNoResultados(){
        mensajeNoResultados.classList.remove('oculto');
    }

    function ocultarMensajeNoResultados(){
        mensajeNoResultados.classList.add('oculto');
    }
    
    function noResultado(){  
        limpiarHTML();
    }
    
    
    function filtrarOrden(ordenes){
        const { orden } = datosBusqueda;
        if(orden){
            return ordenes.numero_orden.includes(orden);
        }
        return ordenes;
    }

    function filtrarFecha(ordenes){
        const { fecha } = datosBusqueda;
        if(fecha){
            return ordenes.fecha_orden === fecha;
        }
        return ordenes;
    }
    
    function filtrarArea(ordenes){
        const { area } = datosBusqueda;
        if(area){
            return ordenes.nombre_area === area;
        }
        return ordenes;
    }
    
    function filtrarMaquina(ordenes){
        const { maquina } = datosBusqueda;
        if(maquina){
            return ordenes.nombre_maquina === maquina;
        }
        return ordenes;
    }


    function filtrarCliente(ordenes){
        const { cliente } = datosBusqueda;
        if(cliente){
            const partes = cliente.split(" ");
            return ordenes.referencia_cliente === partes[0];


        }
        return ordenes;
    }
//oeradoresssssss
    function filtrarNombre(ordenes){
        const { operador } = datosBusqueda;
        if(operador){
            const partes = operador.split(" ");
            return ordenes.nombre_operador === partes[0];

            
        }
        return ordenes;
    }

    function filtrarApellido(ordenes){
        const { operador } = datosBusqueda;
        if(operador){
            const partes = operador.split(" ");
            return ordenes.apellido_operador === partes[1];

        }
        return ordenes;
    }

})();