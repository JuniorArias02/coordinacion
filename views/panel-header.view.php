<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coordinacion Tic</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link rel="stylesheet" href="css/editor.dataTables.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Estilo para el menú lateral -->
    <style>
        .main-sidebar {
            background-color: #315e48 !important;
        }
    </style>
</head>

<body>
    <div class="vw-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom" style="background-color: #315e48;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0"></ul>
                    <button class="btn btn-outline-success text-white border-0">Salir</button>
                </div>
            </div>
        </nav>
    </div>
</body>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="images/imagesm.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Panel de Control</span>
    </a>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">

                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="panel.php?modulo=fichas" class="nav-link <?php echo ($modulo == "fichas") ? " active " : " "; ?>">
                            <i class="fas fa-users nav-icon" aria-hidden="true"></i>
                            <p>Fichas</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="panel.php?modulo=aprendices" class="nav-link <?php echo ($modulo == "aprendices") ? " active " : " "; ?>">
                            <i class="icon ion-md-cube mr-3 lead" aria-hidden="true"></i>
                            <p>Aprendices</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="panel.php?modulo=comites" class="nav-link <?php echo ($modulo == "comites") ? " active " : " "; ?>">
                            <i class="icon ion-md-cube mr-3 lead" aria-hidden="true"></i>
                            <p>Comites</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#" onclick="confirmLogout(event)" class="nav-link <?php echo ($modulo == 'logout..php') ? ' active ' : ''; ?>">
                            <i class="icon ion-md-exit mr-3 lead" aria-hidden="true"></i>
                            <p>Cerrar Sesion</p>
                        </a>
                    </li>

                </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php if (isset($_REQUEST['mensaje'])) : ?>
    <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <?php echo $_REQUEST['mensaje'] ?>
    </div>
<?php endif; ?>
<script>
    function confirmLogout(event) {
        event.preventDefault(); // Evita la acción por defecto del enlace
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cerrar sesión'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?vista=logout'; // Redirige a la página de logout
            }
        });
    }
</script>
</body>

</html>