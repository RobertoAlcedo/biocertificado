<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biocertificado";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Consultar los colegiados que no tienen estado exonerado
$sql = "SELECT idColegiado, codigo_col FROM colegiados WHERE estado_exonerado != 1";
$resultado = mysqli_query($conn, $sql);

// Crear una lista con los resultados de la consulta
$colegiados = array();
if (mysqli_num_rows($resultado) > 0) {
  while($fila = mysqli_fetch_assoc($resultado)) {
    $colegiados[] = $fila;
  }
}

// Cerrar la conexión
mysqli_close($conn);
?>

<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biocertificado";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Insertar en la tabla pagos_cabecera y obtener el idPagosC correspondiente
$idPagosC = 0;
$mes = $_POST["mes"];
$anio = $_POST["anio"];
$sql = "INSERT INTO pagos_cabecera (idColegiado, codigo_colegiado, estado) VALUES ";
foreach ($colegiados as $colegiado) {
  $idColegiado = $colegiado["idColegiado"];
  $codigo_col = $colegiado["codigo_col"];
  $sql .= "($idColegiado, '$codigo_col', 1),";
}
// Eliminar la coma sobrante en la consulta
$sql = rtrim($sql, ",");
if (mysqli_query($conn, $sql)) {
  $idPagosC = mysqli_insert_id($conn);
}

// Insertar en la tabla pagos_detalle con los datos correspondientes
if ($idPagosC != 0) {
  $sql = "INSERT INTO pagos_detalle (idPagoC, id_pago, nro_cuota, fecha_vence, mora, deuda, gen, obs, adelanto, saldo, estado) VALUES ";
  foreach ($colegiados as $colegiado) {
    $idColegiado = $colegiado["idColegiado"];
    $nro_cuota = $mes;
    $fecha_vence = date("Y-m-t", strtotime("$anio-$mes-01"));
    $sql .= "($idPagosC, 1, $nro_cuota, '$fecha_vence', '', 15.00, 'Pago Pendiente', '', '', 15.00, 1),";
  }
  // Eliminar la coma sobrante en la consulta
  $sql = rtrim($sql, ",");
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Los pagos se han ingresado con

    // Parte 3: Insertar información en la tabla pagos_cabecera
    $fecha_actual = date("Y-m-d H:i:s"); // Obtenemos la fecha actual para insertarla en el campo "fecha" de la tabla pagos_cabecera
    $idPagosC = 0; // Inicializamos el ID de pagos_cabecera en 0
    $colegiados_no_exonerados = mysqli_query($conexion, "SELECT idColegiado, codigo_col FROM colegiados WHERE estado_exonerado <> 1"); // Obtenemos los colegiados que no están exonerados
    while ($colegiado = mysqli_fetch_array($colegiados_no_exonerados)) {
      $idColegiado = $colegiado['idColegiado'];
      $codigo_colegiado = $colegiado['codigo_col'];
      mysqli_query($conexion, "INSERT INTO pagos_cabecera (idColegiado, codigo_colegiado, fecha) VALUES ('$idColegiado', '$codigo_colegiado', '$fecha_actual')"); // Insertamos la información en la tabla pagos_cabecera
      $idPagosC = mysqli_insert_id($conexion); // Obtenemos el ID de pagos_cabecera generado automáticamente
    }
    
    // Parte 4: Insertar información en la tabla pagos_detalle
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $fecha_vence = date("Y-m-t", strtotime("$anio-$mes-01")); // Obtenemos la fecha de vencimiento como el último día del mes y año seleccionados
    $nro_cuota = date("n", strtotime("$anio-$mes-01")); // Obtenemos el número de cuota a partir del mes y año seleccionados
    mysqli_query($conexion, "SET autocommit = 0"); // Desactivamos la opción autocommit para hacer una transacción
    mysqli_query($conexion, "START TRANSACTION"); // Iniciamos la transacción
    foreach ($colegiados_no_exonerados as $colegiado) {
      $idColegiado = $colegiado['idColegiado'];
      mysqli_query($conexion, "INSERT INTO pagos_detalle (idPagoC, id_pago, nro_cuota, fecha_vence, mora, deuda, gen, obs, adelanto, saldo, estado) VALUES ('$idPagosC', '1', '$nro_cuota', '$fecha_vence', '', '15.00', 'Pago Pendiente', '', '', '15.00', '1')"); // Insertamos la información en la tabla pagos_detalle
    }
    $success = mysqli_commit($conexion); // Confirmamos la transacción
    mysqli_query($conexion, "SET autocommit = 1"); // Reactivamos la opción autocommit
    if ($success) {
      echo "<script>alert('Pago(s) ingresado(s) con éxito.');</script>"; // Mostramos un mensaje de éxito
    } else {
      echo "<script>alert('Hubo un error al ingresar el(los) pago(s).');</script>"; // Mostramos un mensaje de error
    }

    