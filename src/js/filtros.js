const orden = document.querySelector('#orden');
const fecha = document.querySelector('#fecha');
const area = document.querySelector('#area');
const maquina = document.querySelector('#maquina');
const cliente = document.querySelector('#cliente');
const operador = document.querySelector('#operador');
const contenedorForm = document.querySelector('#contenedorForm');
const mobilemenu1 = document.querySelector('.mobile-menu1');

mobilemenu1.addEventListener('click', () => {
    contenedorForm.classList.toggle('oculto');

})


const resultado = document.querySelector('#resultado');


const datosBusqueda = {

    orden: '',
    fecha: '',
    area: '',
    maquina: '',
    cliente: '',
    operador: ''
}

document.addEventListener('DOMContentLoaded', function () {
    // filtros();
    llenarSelect();
});


orden.addEventListener('input', e => {
    datosBusqueda.orden = e.target.value;
    filtrarOrden();

});

fecha.addEventListener('change', e => {
    datosBusqueda.fecha = e.target.value;
    console.log(datosBusqueda);

});

area.addEventListener('change', e => {
    datosBusqueda.area = e.target.value;

    console.log(datosBusqueda);
    // datosBusqueda.area = e.target.value;
});

maquina.addEventListener('change', e => {
    datosBusqueda.maquina = e.target.value;

    console.log(datosBusqueda);
    // datosBusqueda.area = e.target.value;
});

cliente.addEventListener('change', e => {
    datosBusqueda.cliente = e.target.value;

    console.log(datosBusqueda);
    // datosBusqueda.area = e.target.value;
});
operador.addEventListener('change', e => {
    datosBusqueda.operador = e.target.value;

    console.log(datosBusqueda);
    // datosBusqueda.area = e.target.value;
});

function llenarSelect() {

    const max = new Date().getFullYear();
    const min = max - 10;


    for (let i = max; i > min; i--) {
        const opcion = document.createElement('option');
        opcion.value = i;
        opcion.textContent = i;
        fecha.appendChild(opcion); // Agrega las opciones de año al select
    }
}

function filtrarOrden(ordenb){
    const { orden } = datosBusqueda;
    if( orden ){
        return ordenb.orden === orden;
    }
    return ordenb;
}


