<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

?>
<html>
<a href="../index.php" class="logo">
    <img src="../imagen/logo.png" alt="">
    <a class=ketzali href="../index.php">Ketzali Piel</a>
</a>

<nav class="navbar">
    <a href="../index.php">inicio</a>
    <a href="../productos.php">productos</a>
    <a href="../index.php#us">nosotros</a>
    <?php
    if (!isset($_SESSION['id_usuario']) && empty($_SESSION['id_usuario'])) {
        echo "<a href='../login.php'>login</a>";
    }
    ?>
</nav>

<div class="icons">
    <div class="fas fa-search" id="search-btn"></div>
    <?php
    if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
        echo "<a href='carrito.php'><div class='fas fa-shopping-cart' id='cart-btn'></div></a>";
    }
    ?>
    <div class="fas fa-bars" id="menu-btn"></div>
    <a href='perfil.php'>;
        <div class='fas fa-circle-user'>
        </div>
    </a>
</div>

</html>