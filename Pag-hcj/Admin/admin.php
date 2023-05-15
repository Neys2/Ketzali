<?php
date_default_timezone_set('America/Mexico_City');
$fecha_actual = date("Y-m-d");
$conexion = mysqli_connect("localhost", "root", "", "piel");
$consulta = mysqli_query($conexion, "SELECT SUM(total) AS total_ventas FROM venta");
$consulta2 = mysqli_query($conexion, "SELECT COUNT(ID_U) AS total_usuarios FROM usuario");
$consulta3 = mysqli_query($conexion, "SELECT COUNT(ID_V) AS total_venta FROM venta");
$consulta4 = mysqli_query($conexion, "SELECT usuario.nombreU AS nombre, venta.fecha AS fecha, venta.total AS total, venta.tipoPago AS pago FROM venta
JOIN usuario ON venta.fkID_U = usuario.ID_U
ORDER BY venta.fecha DESC
LIMIT 10");
$consulta5 = mysqli_query($conexion, "SELECT nombreA FROM articulo WHERE cantidad < 151 LIMIT 10");
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
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Mi tienda</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analitica</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Mensaje</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Equipo</span>
				</a>
			</li>
			<li>
				<a href="reportes.php">
					<i class='bx bxs-report' ></i>
					<span class="text">Reportes</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Configuracion</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout" >
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
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Buscar...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Principal</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<?php  $fila3 = mysqli_fetch_assoc($consulta3) ?>
						<h3><?php echo $fila3['total_venta'] ?></h3>
						<p>Nueva Orden</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<?php  $fila2 = mysqli_fetch_assoc($consulta2) ?>
						<h3><?php echo $fila2['total_usuarios'] ?></h3>
						<p>Usuarios</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<?php  $fila = mysqli_fetch_assoc($consulta) ?>
						<h3>$<?php echo $fila['total_ventas'] ?></h3>
						<p>Ventas Totales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Ventas Recientes</h3>
					</div>
					<table id="tabla_venta">
						<thead>
							<tr>
								<th>Usuario</th>
								<th>Fecha de Compra</th>
								<th>Total</th>
								<th>Tipo de pago</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php while ($fila = mysqli_fetch_assoc($consulta4)): ?>
                                <td><?php echo $fila['nombre'] ?></td>
								<td><?php echo $fila['fecha'] ?></td>
								<td><?php echo $fila['total'] ?></td>
                                <td><?php echo $fila['pago'] ?></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Productos con poco inventario</h3>
					</div>
					<ul class="todo-list">
					<?php while ($fila = mysqli_fetch_assoc($consulta5)): ?>
						<li class="not-completed">
							<p><?php echo $fila['nombreA'] ?></p>
							<?php endwhile; ?>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="http://localhost/ketzali-main/Pag-hcj/Admin/script.js"></script>
</body>
</html>