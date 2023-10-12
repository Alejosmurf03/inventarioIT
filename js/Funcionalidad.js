//Funcion para agragar campos de gRFS en la tabla envio

num = 0;

con = 0;

function btn1(obj) {
    con++
    num++

    var v = document.getElementById('divgrfs');
    contenedor = document.createElement('div');
    contenedor.id = 'div' +num;
    v.appendChild(contenedor);

    var x = document.createElement("label");
    x.for = 'GRFS';
    x.name = 'GRFS' +num;
    x.innerHTML = con + '.  gRFS';
    contenedor.appendChild(x);

    var x = document.createElement("INPUT");
    x.type = 'text';
    x.id = 'grfs';
    x.name = 'grfs' +num;
    x.placeholder = 'Ingrese El gRFS';
    x.setAttribute('class', 'form-control');
    contenedor.appendChild(x);

    var x = document.createElement("input");
    x.type = 'button';
    x.id = 'elim';
    x.name = 'div' +num;
    x.value = 'Elimirar Campo  ' + con;
    x.setAttribute('class', 'btn btn-danger');
    x.onclick = function () {
        borrar(this.name)
    }
    contenedor.appendChild(x);
}
function borrar(obj) {
    v = document.getElementById('divgrfs');
    v.removeChild(document.getElementById(obj));
}
