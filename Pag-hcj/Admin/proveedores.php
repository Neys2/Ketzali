<?php

require '../conexion.php';
$conexion = mysqli_connect("localhost", "root", "", "piel");
if(isset($_POST['add_proveedor'])){

   $prov_name = $_POST['prov_name'];
   $prov_correo = $_POST['prov_correo'];

   if(empty($prov_name) || empty($prov_correo)){
      $message[] = 'Uno de los campos está vacío';
   }else{
	$db = new Conexion();
	$con = $db->conectar();
	$sql = $con->prepare("INSERT INTO proveedor(nombreP, correoP) VALUES('$prov_name', '$prov_correo')");
    $band = $sql->execute();
      if($band == 1){
         $message[] = 'Nuevo proveedor añadido correctamente';
      }else{
         $message[] = 'Error al registrar proveedor';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conexion, "DELETE FROM proveedor WHERE ID_P = $id");
   header('location:proveedores.php');
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

            <div class="admin-product-form-container">

                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                   <h3>Agregar nuevo proveedor</h3>
                   <input type="text" placeholder="Ingrese nombre de proveedor" name="prov_name" class="box">
                   <input type="text" placeholder="Ingrese correo de proveedor" name="prov_correo" class="box" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                   <input type="submit" class="btn" name="add_proveedor" value="Agregar Proveedor">
                </form>
          
             </div>

			 <div class="table-data">
				<div class="order">
					<div class="head">
						<input type="search" id="busquedaaddpv" placeholder="Buscar..." oninput="reiniciarprov()">
                        <i class='bx bx-search' onclick="buscarproveedor()"></i>
					</div>

					<?php
					$select = mysqli_query($conexion, "SELECT * FROM proveedor");
					?>
             <div class="product-display">
                <table class="product-display-table" id="proveedoradd">
                   <thead>
                   <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Accion</th>
                   </tr>
                   </thead>
				   <?php while($row = mysqli_fetch_assoc($select)){ ?>
                   <tr>
                      <td><?php echo $row['nombreP']; ?></td>
                      <td><?php echo $row['correoP']; ?></td>
                      <td>
                         <a href="prov_update.php?edit=<?php echo $row['ID_P']; ?>" class="btn"> <i class="fas fa-edit"></i> Editar </a>
                         <a href="proveedores.php?delete=<?php echo $row['ID_P']; ?>" class="btn"> <i class="fas fa-trash"></i> Eliminar </a>
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