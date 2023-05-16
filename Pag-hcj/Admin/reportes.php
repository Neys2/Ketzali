<?php
date_default_timezone_set('America/Mexico_City');
$fecha_actual = date("Y-m-d");
$conexion = mysqli_connect("localhost", "root", "", "piel");
$consulta = mysqli_query($conexion, "SELECT ID_A, nombreA, cantidad, precio, descripcion FROM articulo");
$consulta2 = mysqli_query($conexion,"SELECT ID_A, nombreA, venta.fecha as fecha, SUM(carrito.cantidadArt) as totalCantidad FROM articulo 
INNER JOIN carrito ON carrito.fkArticulo = articulo.ID_A 
INNER JOIN venta ON carrito.fkVenta = venta.ID_V 
WHERE venta.fecha =  '$fecha_actual'
GROUP BY ID_A, venta.fecha");

$consulta3 = mysqli_query($conexion,"SELECT ID_A,nombreA,venta.fecha AS fecha, SUM(carrito.cantidadArt) AS totalVendido
FROM articulo
INNER JOIN carrito ON articulo.ID_A = carrito.fkArticulo
INNER JOIN venta ON carrito.fkVenta = venta.ID_V
WHERE venta.fecha = '$fecha_actual'
GROUP BY articulo.ID_A, articulo.nombreA
ORDER BY totalVendido DESC
LIMIT 1");
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
			<li>
				<a href="admin.php">
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
			<li class="active">
				<a href="#">
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
				<a href="#" class="logout">
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
					<h1>Reportes</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Reportes</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Principal</a>
						</li>
					</ul>
				</div>
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Productos que se han vendido en el día</h3>
						<input type="search" id="busqueda" placeholder="Buscar..." oninput="reiniciarTabla()">
                        <i class='bx bx-search' onclick="buscar()"></i>
						<a href="#" class="btn-download" id="toPDF" onclick="pdf()">
							<i class='bx bxs-cloud-download' ></i>
							<span class="text">Descargar</span>
						</a>
					</div>
					<table id="customers_table">
						<thead>
							<tr>
								<th>ID</th>
                                <th>Producto</th>
								<th>Fecha de Compra</th>
								<th>Cantidad</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php while ($fila = mysqli_fetch_assoc($consulta2)): ?>
                                <td><?php echo $fila['ID_A'] ?></td>
								<td>
									<p><?php echo $fila['nombreA'] ?></p>
								</td>
								<td><?php echo $fila['fecha'] ?></td>
                                <td><?php echo $fila['totalCantidad'] ?></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				
			</div>

            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Productos que hay en inventario</h3>
						<input type="search" id="busqueda2" placeholder="Buscar..." oninput="reiniciarTabla2()">
                        <i class='bx bx-search' onclick="buscar2()" ></i>
						<a href="#" class="btn-download" id="toPDF2" onclick="pdf2()">
							<i class='bx bxs-cloud-download' ></i>
							<span class="text">Descargar</span>
						</a>
					</div>
					<table id="customers_table2">
						<thead>
							<tr>
								<th>ID</th>
                                <th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php while ($fila = mysqli_fetch_assoc($consulta)): ?>
                                <td><?php echo $fila['ID_A'] ?></td>
								<td>
									<p><?php echo $fila['nombreA'] ?></p>
								</td>
								<td><?php echo $fila['cantidad'] ?></td>
                                <td><?php echo $fila['precio'] ?></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				
			</div>

            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Producto que más se vendió en el día</h3>
					</div>
					<table id="customers_table3">
						<thead>
							<tr>
								<th>ID</th>
                                <th>Producto</th>
								<th>Fecha de Compra</th>
								<th>Cantidad</th>
							</tr>
						</thead>
						<tbody>
							<tr>
                            <?php while ($fila = mysqli_fetch_assoc($consulta3)): ?>
                                <td><?php echo $fila['ID_A'] ?></td>
								<td>
									<p><?php echo $fila['nombreA'] ?></p>
								</td>
								<td><?php echo $fila['fecha'] ?></td>
                                <td><?php echo $fila['totalVendido'] ?></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="http://localhost/ketzali-main/Pag-hcj/Admin/script.js"></script>
</body>
</html>