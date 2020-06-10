$(document).ready(function () {
    console.log('jQuery esta funcionando');
    //EJECUTAMOS LA FUNCION
    obtenerUsuarios();

    //OCULTAR LA VISTA DE LA BUSCQUEDA
    $('#usuario-result').hide();
    //CAPTURAR EL ELEMENTO
    $('#txtSearch').keyup(function () {
        //VALIDAR SI EL USUARIO A TIPEADO ALGO
        if ($('#txtSearch').val()) {
            //OBTENEMOS EL VALOR DIGITADO POR EL USUARIO Y ALMACENAMOS EN UNA VARIABLE
            let buscar = $('#txtSearch').val();
            //USAR AJAX PARA ENVIAR A NUESTRO PHP
            $.ajax({
                url: 'buscar.php',
                type: 'POST',
                //ESPECIFICAMOS EL TIPO DE DATO QUE QUEREMOS ENVIAR
                data: { buscar },
                //ENVIAMOS UNA PETICION PARA ESPERAR UNA RESPUESTA DE NUESTRO PHP
                success: function (response) {
                    //TOMAR UN OBJETO JSON STRING Y VUELVE A SER UN JSON
                    let verusuarios = JSON.parse(response);
                    let template = '';
                    //RECORRER ESE ARRAY
                    verusuarios.forEach(usuario => {
                        //``SIRVEN PARA COLOCAR UN VALOR 
                        template += `<li>${usuario.Nombre}</li>`
                    });
                    //MOSTRAR EN UNA PARTE DE NUESTRA INTERFAZ EL RESULTADO
                    $('#container').html(template);
                    $('#usuario-result').show();
                }
            })
        }
    })

    //SE DA CLICK EN EL BOTON SUBMIT FUNCION DEL FORMULARIO
    $('#usuario-form').submit(function (e) {
        //GUARDAR ESOS CAMPOS LLENOS EN UN OBJETO
        const objetoUsuario = {
            nombre: $('#txtNombre').val(),
            apellido: $('#txtApellido').val(),
            edad: $('#txtEdad').val(),
            fechanac: $('#txtFechanacimiento').val(),
            usuario: $('#txtUsuario').val(),
            password: $('#txtPassword').val()
        };
        $.post('insertarusuarios.php', objetoUsuario, function (response) {
            console.log(response);
            //RESETEAR EL FORMULARIO 
            $('#usuario-form').trigger('reset');
        });
        //CANCELAR EL EVENTO POR DEFECTO DEL FORMULARIO
        e.preventDefault();
    })

    //INDICA EN LA TABLA LOS DATOS CUANDO LA APP ESTA INICIADA
    function obtenerUsuarios() {
        $.ajax({
            url: 'listausuarios.php',
            type: 'GET',
            success: function (response) {
                let verusuarios = JSON.parse(response);
                let template = '';
                verusuarios.forEach(usuario => {
                    template += `
                    <tr>
                    <td>${usuario.Id}</td>
                    <td>${usuario.Nombre}</td>
                    <td>${usuario.Apellido}</td>
                    <td>${usuario.Edad}</td>
                    <td>${usuario.Fecha_de_Nacimiento}</td>
                    <td>${usuario.Usuario}</td>
                    <td>${usuario.Password}</td>
                    </tr>                
                    `
                });
                $('#usuario-list').html(template);
            }
        })

    }
});