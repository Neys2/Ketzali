<?php

require '../conexion.php';
$id = $_GET['edit'];
$conexion = mysqli_connect("localhost", "root", "", "piel");
if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_cantidad = $_POST['product_cantidad'];
   $product_desc = $_POST['product_desc'];
   $product_image = $_FILES['product_image']['name'];
   $tipoArchivo = $_FILES["product_image"]["type"];
   $rutaTemporal = $_FILES["product_image"]["tmp_name"];

   if(empty($product_name) || empty($product_price) || empty($product_cantidad) || empty($product_desc) ){
      $message[] = 'Uno de los campos está vacío';
   }else{
	$db = new Conexion();
	$con = $db->conectar();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$opcionSeleccionada = $_POST["opciones"];
		$prov = mysqli_query($conexion,"SELECT ID_P FROM proveedor where nombreP = '" . $opcionSeleccionada . "'");
		$row = $prov->fetch_assoc();
		$idp = $row["ID_P"];
	}
	$sql = $con->prepare("UPDATE articulo SET fkID_P='$idp',nombreA='$product_name', cantidad='$product_cantidad', precio='$product_price', descripcion='$product_desc' WHERE ID_A = '$id'");
    $band = $sql->execute();
      if($band == 1){
		 $carpetaDestino = "../imagen/productos/";
		 $nuevoNombreArchivo = $id . ".png";
		 $rutaDestino = $carpetaDestino . $nuevoNombreArchivo;
		 if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
			// Agrega un parámetro único a la URL de la imagen para evitar el almacenamiento en caché
            $rutaDestino = $rutaDestino . '?' . uniqid();
            echo "La imagen se ha guardado correctamente.";
        } else {
            echo "Hubo un error al guardar la imagen.";
        }
		 header('location:mitienda.php');
      }else{
         $message[] = 'Error al modificar producto';
      }
   }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
	<title>AdminHub</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Administrador</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="admin.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Mi tienda</span>
				</a>
			</li>
			<li>
				<a href="reportes.php">
					<i class='bx bxs-report' ></i>
					<span class="text">Reportes</span>
				</a>
			</li>
			<li>
				<a href="proveedores.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Proveedores</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../Usuario/salir.php" class="logout" >
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Cerrar Sesion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Mi tienda</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Mi tienda</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Principal</a>
						</li>
					</ul>
				</div>
			</div>
			

			<?php
				if(isset($message)){
					foreach($message as $message){
						echo '<span class="message">'.$message.'</span>';
					}
				}
			?>

            <div class="admin-product-form-container centered">
			<?php
      
				$select = mysqli_query($conexion, "SELECT * FROM articulo WHERE ID_A = '$id'");
				$result = mysqli_query($conexion,"SELECT nombreP FROM proveedor");
				while($row = mysqli_fetch_assoc($select)){

			?>
			

                <form action="" method="post" enctype="multipart/form-data">
                   <h3 class="title">Actualizar Producto</h3>
                   <input type="text" class="box" name="product_name" value="<?php echo $row['nombreA']; ?>" placeholder="Introduce el nombre del producto">
                   <input type="number" min="1" step="any" class="box" name="product_price" value="<?php echo $row['precio']; ?>" placeholder="Introduce el precio">
                   <input type="number" min="1" class="box" name="product_cantidad" value="<?php echo $row['cantidad']; ?>" placeholder="Introduce la cantidad">
                   <input type="text" class="box" name="product_desc" value="<?php echo $row['descripcion']; ?>" placeholder="Introduce la descripción del producto">
                   <h2>Selecciona Imagen del producto</h2>
				   <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
				   <h2>Selecciona Proovedor</h2>
				   <select name="opciones" class="box">
				    <?php while($row = mysqli_fetch_assoc($result)){ ?>
  						<option value="<?php echo $row['nombreP']; ?>"><?php echo $row['nombreP']; ?></option>
					<?php } ?>
					</select>
					<h2>Selecciona Categoria</h2>
					<select name="opcion" class="box">
					<option value="">Organicos</option>
					<option value="">Aceites Rehidratantes</option>
					<option value="">Cremas Hidratantes</option>
					<option value="">Tonificadores</option>
                   <input type="submit" value="Actualizar producto" name="update_product" class="btn">
                   <a href="mitienda.php" class="btn">Regresar</a>
                </form>   

			<?php }; ?>
             
             </div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>