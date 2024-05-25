<style>
    body {
        margin: 0;
        padding: 0;
    }

    .main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .contenedor-img {
        width: 70%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .formulario {
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: Arial, Helvetica, sans-serif;
    }

    .card {
        width: 90%;
        max-width: 400px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #294d3b;
        color: white;
        padding: 20px;
        text-align: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .icon {
        width: 30px;
        margin-right: 10px;
    }

    .input {
        width: calc(100% - 40px);
    border: none;
    border-bottom: 1px solid #689284;
    outline: none;
    padding: 10px;
    font-size: 16px;
    background-color: transparent; 
    }

    .input#usuario {
    background-color: transparent !important; /* Asegura que el fondo sea transparente solo para el campo de usuario */
}

    .btn-login {
        background-color: #294d3b;
        color: white;
        border: none;
        padding: 12px 0;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%; /* Ancho del 100% para ocupar todo el contenedor */
    }

    .btn-login:hover {
        background-color: #294d3b;
    }

    .alert {
        background-color: #f44336;
        color: white;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Ajustes para la imagen */
    .contenedor-img img {
        width: 100%;
        height: 100%;
        display: block;
        margin: 0 auto;
    }

    /* Alineación de iconos al lado de los campos */
    .controll {
        display: flex;
        align-items: center;
    }

    /* Estilos para el botón de mostrar/ocultar contraseña */
    .toggle-password {
        cursor: pointer;
        display: flex;
        align-items: center;
    }
    
</style>


<div class="main-container">
        <div class="contenedor-img img">
            <img src="images/sena.jpg" alt="sena" border="0" />
        </div>

        <div class="formulario">
            <div class="card">
                <div class="card-header">
                    <h2 class="texto-iniciar">Inicia sesión</h2>
                </div>
                <div class="card-body">
                    <?php if(isset($loginError)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $loginError; ?>
                        </div>
                    <?php } ?>
                    <form action="validar.php" method="post">
                        <div class="form-group">
                            <div class="controll">
                                <img src="https://i.ibb.co/cc1dbXt/user-1.png" class="icon" alt="" srcset="">
                                <input name="usuario" id="usuario" type="text" class="input" placeholder="Nombre de Usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controll">
                                <img src="https://i.ibb.co/vdMjtxN/lock-1.png" class="icon" alt="" srcset="">
                                <input type="password" class="input" id="contraseña" name="contraseña" placeholder="Contraseña" required>
                                <div class="toggle-contraseña" onclick="togglePasswordVisibility('contraseña')">
                                    <img id="eye-icon" src="https://img.icons8.com/material-outlined/24/000000/invisible.png"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-login">Acceder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


<script>
    function togglePasswordVisibility(passwordFieldId) {
        var passwordField = document.getElementById(passwordFieldId);
        var toggleButton = passwordField.nextElementSibling;

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.innerHTML = '<img src="https://img.icons8.com/material-outlined/24/000000/visible.png"/>';
        } else {
            passwordField.type = "password";
            toggleButton.innerHTML = '<img src="https://img.icons8.com/material-outlined/24/000000/invisible.png"/>';
        }
    }
</script>