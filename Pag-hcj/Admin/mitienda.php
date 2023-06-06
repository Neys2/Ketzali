<?php

require '../conexion.php';
$conexion = mysqli_connect("localhost", "root", "", "piel");
if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_cantidad = $_POST['product_cantidad'];
   $product_desc = $_POST['product_desc'];
   $product_image = $_FILES['product_image']['name'];
   $tipoArchivo = $_FILES["product_image"]["type"];
   $rutaTemporal = $_FILES["product_image"]["tmp_name"];

   if(empty($product_name) || empty($product_price) || empty($product_cantidad) || empty($product_desc) || empty($product_image)){
      $message[] = 'Uno de los campos está vacío';
   }else{
	$db = new Conexion();
	$con = $db->conectar();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$opcionSeleccionada = $_POST["opciones"];
		$opcionSeleccion = $_POST["opcion"];
		$prov = mysqli_query($conexion,"SELECT ID_P FROM proveedor where nombreP = '" . $opcionSeleccionada . "'");
		$row = $prov->fetch_assoc();
		$idp = $row["ID_P"];
	}
	$sql = $con->prepare("INSERT INTO articulo(fkID_P,nombreA, cantidad, precio, descripcion, categoria) VALUES('$idp','$product_name', '$product_cantidad', '$product_price', '$product_desc','$opcionSeleccion')");
    $band = $sql->execute();
      if($band == 1){
		 $ultimor = mysqli_query($conexion,"SELECT MAX(ID_A) AS ultimoID FROM articulo");
		 $filar = $ultimor->fetch_assoc();
		 $ultimoID = $filar["ultimoID"];
		 $carpetaDestino = "../imagen/productos/";
		 $nuevoNombreArchivo = $ultimoID . ".png";
		 $rutaDestino = $carpetaDestino . $nuevoNombreArchivo;
		 if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
		    echo "La imagen se ha guardado correctamente.";
        } else {
            echo "Hubo un error al guardar la imagen.";
        }
         $message[] = 'Nuevo producto añadido correctamente';
      }else{
         $message[] = 'Error al registrar producto';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conexion, "DELETE FROM articulo WHERE ID_A = $id");
   header('location:mitienda.php');
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
	<title>Admin</title>
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
			$result = mysqli_query($conexion,"SELECT nombreP FROM proveedor");
			if ($result->num_rows > 0) {
					//$row = $result->fetch_assoc();
					//$nombre = $row["nombreP"];
				} else {
					$message[] = 'No se encontraron proveedores';
				}
			?>

            <div class="admin-product-form-container">

                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                   <h3>Agregar nuevo Producto</h3>
                   <input type="text" placeholder="Ingrese nombre de producto" name="product_name" class="box">
                   <input type="number" min="1" step="any" placeholder="Ingrese precio de producto" name="product_price" class="box">
                   <input type="number" min="150" placeholder="Ingrese cantidad de producto" name="product_cantidad" class="box">
                   <input type="text" placeholder="Ingrese descripción del producto" name="product_desc" class="box">
                   <h2>Selecciona Imagen del producto</h2>
				   <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
				   <h2>Selecciona Proovedor</h2>
				   <select name="opciones" class="box">
				   <?php while($row = mysqli_fetch_assoc($result)){ ?>
  						<option value="<?php echo $row['nombreP']; ?>"><?php echo $row['nombreP']; ?></option>
					<?php } ?>
					</select>
					<h2>Selecciona Categoria</h2>
					<select name="opcion" class="box">
					<option value="organicos">Organicos</option>
					<option value="aceites">Aceites Rehidratantes</option>
					<option value="cremas">Cremas Hidratantes</option>
					<option value="tonificadores">Tonificadores</option>
					</select>
                   <input type="submit" class="btn" name="add_product" value="Agregar Producto">
                </form>
          
             </div>

			 <div class="table-data">
				<div class="order">
					<div class="head">
						<input type="search" id="busquedaadd" placeholder="Buscar..." oninput="reiniciarTablaadd()">
                        <i class='bx bx-search' onclick="buscaradd()"></i>
					</div>

					<?php
					$select = mysqli_query($conexion, "SELECT * FROM articulo");
					?>
             <div class="product-display">
                <table class="product-display-table" id="productosadd">
                   <thead>
                   <tr>
                      <th>Imagen</th>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Descripción</th>
                      <th>Accion</th>
                   </tr>
                   </thead>
				   <?php while($row = mysqli_fetch_assoc($select)){ ?>
                   <tr>
				   			<?php
							$id = $row['ID_A'];
							$imagen = "../imagen/Productos/" . $id . ".png";

							if(!file_exists($imagen)){
								$imagen = "../imagen/noimage.jpg";
							}
							?>
                      <td><img src="<?php echo $imagen . '?v=' . time(); ?>" height="100%" max-height="100%" alt=""></td>
                      <td><?php echo $row['nombreA']; ?></td>
                      <td><?php echo $row['precio']; ?></td>
                      <td><?php echo $row['cantidad']; ?></td>
                      <td><?php echo $row['descripcion']; ?></td>
                      <td>
                         <a href="admin_update.php?edit=<?php echo $row['ID_A']; ?>" class="btn"> <i class="fas fa-edit"></i> Editar </a>
                         <a href="mitienda.php?delete=<?php echo $row['ID_A']; ?>" class="btn"> <i class="fas fa-trash"></i> Eliminar </a>
                      </td>
                   </tr>
				   <?php } ?>
                </table>
             </div>
			</div>
		</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>