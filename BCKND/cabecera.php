<?php 
	session_start();
?>


<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="./styles/styles.css">
	<link rel="stylesheet" href="./styles/headerStyle.css">
    </head>
<body>	
<header>
	<nav class="header">
		
		<ul id="list">	
			<li><a href="index.php">Inicio</a></li>		

			<li><a href="list_noticias.php">Noticias</a></li>	
			

			<?php 
				if(isset($_SESSION['user_id'])){
					echo '<li><a href="form_noticias.php">Crear noticia</a></li>';
					echo '<li><a href="list_usuarios.php">Usuarios</a></li>';					
					echo '<li><a href="logout.php">Cerrar sesión</a></li>';
					
				}
				else{
					echo '<li><a href="form_usuario.php">Crear usuario</a></li>';
					echo '<li><a href="login.php">Iniciar sesión</a></li>';
				}
			?>

			
		</ul>
	</nav>
</header>



