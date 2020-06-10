<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">Aplicacion de Tareas</a>
        <ul class="navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
                <input type="search" id="txtSearch" class="form-control mr-sm-2" placeholder="Busca tu tarea">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </ul>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form id="usuario-form">
                            <div class="form-group">
                                <input type="text" id="txtNombre" placeholder="Ingrese su nombre" class="form-control"><br>
                                <input type="text" id="txtApellido" placeholder="Ingrese su apellido" class="form-control"><br>
                                <input type="date" id="txtFechanacimiento" placeholder="Ingrese su fecha de nacimiento" class="form-control"><br>
                                <input type="number" id="txtEdad" placeholder="Ingrese su edad" class="form-control"><br>
                                <input type="text" id="txtUsuario" placeholder="Ingrese su usuario" class="form-control"><br>
                                <input type="password" id="txtPassword" placeholder="Ingrese su contraseña" class="form-control"><br>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block text-center">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card my-4" id="usuario-result">
                    <div class="card-body">
                        <ul id="container">
                            <ul>
                    </div>
                </div>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Edad</td>
                            <td>Fecha de Nacimiento</td>
                            <td>Usuario</td>
                            <td>Password</td>
                        </tr>
                    </thead>
                    <tbody id="usuario-list"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>

</html>