<?php
    include_once 'conf/conf.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Colegio de Biólogos</title>

    <style>

    body {
    background-image: url("dist/img/fondo.jpg");
    background-position: center 25%;
    background-size: cover;
    }
    </style>

    <link rel="stylesheet" href="dist/css/estilos.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">



</head>






<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a style="color:#FFFFFF;" href="#"><b>SISTEMA DE GESTION ADMINISTRATIVA </b> </a>
      <hr>
      </hr>
      <a style="color:#FFFFFF;" href="#"><b>SIGBIOL </b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese sus datos para iniciar sesión</p>

      <form id="loginForm" method="post">
        <div class="input-group mb-3">
          <input id="usuario" type="text" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">ENTRAR</button>
          </div>
          <!-- /.col -->
        <br>
            </br>
            <br>
            </br>
            <br>
            </br>
            <div class="col-12">

                <button type="button" class="btn btn-primary btn-block" onclick="location.href='https://biocertificado.com/login-usuarios'">INTRANET COLEGIADOS</button>
                <button type="button" class="btn btn-primary btn-block" onclick="location.href='https://biocertificado.com/inventario'">INGRESAR AL SISTEMA DE INVENTARIO</button>

            </div>
            <!-- /.col -->
        </div>

          <!-- /.col -->
        </div>
      </form>

      <div style="background-color: rgba(23, 99, 175, 0.6); background: rgba(23, 99, 175, 0.6); color: rgba(23, 99, 175, 0.6);">
          <p class="footer-text text-center"><br><br><font color="#FFFFFF">copyright © 2022. All rights reserved.<br>Colegio de Biólogos de Lima<br><br>Desarrollado Por </font> <a href="http://www.khana.cl/" target="_blank"><font color="#FFFFFF"> <b>Khana Servicios Digitales</b> </font></a> </p>
      </div>
<!--       <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

<!--       <p class="mb-1">
        <a href="forgot-password.html">Olvide mi contraseña</a>
      </p> -->
      
    </div>
    <!-- /.login-card-body -->


  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

<script type="text/javascript">



  $( "#loginForm" ).submit(function( event ) {
    // alert( "Envio datos usuarios");
    event.preventDefault();

    $.ajax({
      url: 'mod_login/login.php',
      type: 'POST',
      data: {
        usuario: $("#usuario").val(), 
        password: $("#password").val()
      },
    })
    .done(function(data) {
      // console.log("success : " + data);
      if(data == 'exito'){
        // console.log('exitosoooo!!!');
        document.location.href = "<?php echo ENLACE_WEB;?>administrador/";
      }

    })
    .fail(function() {
      console.log("error");
    });
    

    
  });


</script>


</body>
</html>
