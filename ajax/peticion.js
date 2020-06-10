function enviarPeticion() {
    var objeto = new XMLHttpRequest();
    objeto.open('POST', 'backend.php', true);
    objeto.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    objeto.onreadystatechange = function () {
        document.getElementById('txtNombre').innerHTML = objeto.responseText;
    }
    objeto.send('username=David');
}