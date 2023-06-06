<?php

require '../conexion.php';
$id = $_GET['edit'];
$conexion = mysqli_connect("localhost", "root", "", "piel");
if(isset($_POST['update_prov'])){

   $prov_name = $_POST['prov_name'];
   $prov_correo = $_POST['prov_correo'];

   if(empty($prov_name) || empty($prov_correo)){
      $message[] = 'Uno de los campos está vacío';
   }else{
	$db = new Conexion();
	$con = $db->conectar();
	$sql = $con->prepare("UPDATE proveedor SET nombreP='$prov_name', correoP='$prov_correo' WHERE ID_P = '$id'");
    $band = $sql->execute();
      if($band == 1){
		 header('location:proveedores.php');
      }else{
         $message[] = 'Error al modificar proveedor';
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
			<li>
				<a href="mitienda.php">
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
			<li class="active">
				<a href="#">
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
					<h1>Proveedores</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Proveedores</a>
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
      
				$select = mysqli_query($conexion, "SELECT * FROM proveedor WHERE ID_P = '$id'");
				while($row = mysqli_fetch_assoc($select)){

			?>
			

                <form action="" method="post" enctype="multipart/form-data">
                   <h3 class="title">Actualizar Proveedor</h3>
                   <input type="text" class="box" name="prov_name" value="<?php echo $row['nombreP']; ?>" placeholder="Introduce el nombre del proveedor">
                   <input type="email" class="box" name="prov_correo" value="<?php echo $row['correoP']; ?>" placeholder="Introduce el correo del proveedor" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>                  
                   <input type="submit" value="Actualizar proveedor" name="update_prov" class="btn">
                   <a href="proveedores.php" class="btn">Regresar</a>
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