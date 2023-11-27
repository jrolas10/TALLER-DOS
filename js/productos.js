console.log("El uso de JS está en funcionamiento");

function selectData(respuesta) {
    let datosTabla = [];
    const obj = {
        accion: 'select_Materiales' // Cambia a la acción correspondiente
    }

    if (respuesta) {
        obj['ordenar'] = respuesta;
    }

    $.post('../../includes/_functions.php', obj, function (response) {
        let html = ``;

        response.map(function (i) {
            if (i.cantidad <= i.cantidad_min) {
                var color = 'colorout';
            } else {
                color = '#fffff';
            }

            datosTabla = i;

            html += `<tr> 
                        <td class="${datosTabla.categorias}">${datosTabla.id}</td>
                        <td>${datosTabla.nombre}</td>
                        <td>${datosTabla.descripcion}</td>
                        <td>${datosTabla.color}</td>
                        <td>${datosTabla.precio}$</td>
                        <td class="${color}" >${datosTabla.cantidad}</td>
                        <td>${datosTabla.cantidad_min}</td>
                        <td>${datosTabla.categorias}</td>
                        <td><img width="100" src="data:image;base64,${datosTabla.imagen}" ></td>
                        <td>
                            <a href="#" data-id="${datosTabla.id}" class="editar">
                                <div>Editar</div>
                            </a>
                            <a>|</a>
                            <a href="#" data-id="${datosTabla.id}" class="eliminar">
                                <div>Eliminar</div>
                            </a>
                        </td>
                    </tr>`;
        })
        $("#table-data tbody").html(html);
    }, 'JSON');
}

// Resto del código...

