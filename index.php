<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<!--<link rel="stylesheet" href="css/hoja_index.css">
	--><title>Biblioteca Universitaria</title>


	<script type="text/javascript">

		function AbrirVentaLogin(){
			document.forms['formingreso'].reset();
			$("#ventanalogin").slideDown("slow");
			$('#ErrorUsuario').hide('fast');
		}

		function CerrarVentaLogin(){
			document.forms['formingreso'].reset();
			$("#ventanalogin").slideUp("fast");
			$('#ErrorUsuario').hide('fast');
			
		}
		

	</script>


</head>
<body onload="VistaInicio()">
	<div id="contenedor">

		<div id="ventanalogin">
			

			<div id="formlogin">

				<div id="cerrar"><a href="javascript:CerrarVentaLogin();">Cerrar X</a></div>

				<h1>Ingresar al Sistema</h1>
				<hr><br>

				<form method="POST" name="formingreso">
	
					<input type="text" name="txtnrcarnet" placeholder="Nombre..." required>
					<input type="password" name="txtclave" placeholder="Contraseña..." required>
					<button type="submit" name="btnEntrar">Entrar</button>
					
					<button type="button" onclick="javascript:CerrarVentaLogin();">Cancelar</button>
					<div id='ErrorUsuario'><strong>Error!</strong>Usuario No Encontrado</div>
					<?php
						include('dbconexion.php');

						if (isset($_POST['btnEntrar'])){

							$nombre  = $_POST['txtnrcarnet'];
							$clave = $_POST['txtclave'];

							$query_b = "SELECT * FROM bibliotecario WHERE Nombres='$nombre' AND Contrasena ='$clave'";
							$query_l = "SELECT * FROM lector WHERE Nombres='$nombre' AND Contrasena ='$clave'";

							$result_b = $cnmysql->query($query_b);
							$result_l = $cnmysql->query($query_l);

							$num_row_b = mysqli_num_rows($result_b);
							$num_row_l = mysqli_num_rows($result_l);
							


							if( $num_row_b > 0 ){
								
								$row = mysqli_fetch_array($result_b);

								/*$idb = $row['CodBibliotecario'];*/

								session_start();
								$_SESSION["idb"]= $row['CodBibliotecario'];
								 
   							   $_SESSION['actives'] = true;//ve si esta valida la sesion
   								$_SESSION["Nombres"]= $row['Nombres'];
								$_SESSION["Apellidos"]= $row['Apellidos'];
								$_SESSION["cod"]= $row['CodBibliotecario'];

								/*header("location: biblioteca/indexbibliotecario.php?id=$idb");*/
								header("location: biblioteca/indexbibliotecario.php");

							}elseif ($num_row_l > 0 ) {
								
								$row = mysqli_fetch_array($result_l);

								/*$idl = $row['CodLector'];*/

								session_start();
								$_SESSION["idl"] = $row['CodLector'];
								$_SESSION['active'] = true;//ve si esta valida la sesion
								$_SESSION["Nombres"]= $row['Nombres'];
							 $_SESSION["Apellidos"]= $row['Apellidos'];
						//	 $_SESSION["cod"]= $row['CodBibliotecario'];

								/*header("location: biblioteca/indexlector.php?id=$idl");*/
								header("location: biblioteca/indexlector.php");

							}else{ 


								echo "<script>";
								echo "$('#ventanalogin').slideDown('slow');";
								echo "$('#ErrorUsuario').slideDown('slow');";
								echo "</script>";
							}

						}else{

						}
					?>



				</form>
			</div>

		</div>

	
	<center>	<h1> Universidad Autónoma Tomás Frías</h1>
	<h1><a href = "index.php"><img src="img/banner.png" width="900" height="300"></a></h1>
	</center>			
		<br>
		<hr>

		<nav>
		<center>
			<ul>
				<li><a onclick="VistaInicio();">Inicio</a></li>
				<li><a onclick="VistaLibros();">Libros</a></li>
		<li><a href="javascript:AbrirVentaLogin();">Entrar</a></li>
			</ul>
		</center>
		</nav>


		<section>
			<div id="contenido">
			<img src="img/uatf.jpg" width="1500" height="600">

			</div>
		</section>

		<footer>
			<p>Biblioteca Universitaria Tomás Frías Derechos Reservados</p>
		</footer>
		
	</div>



<style>
</style>



</body>
</html>
<style>
*{
	margin: 0px;
	padding: 0px;
}

body{
	margin-top: 50px;
	margin-bottom: 180px;
	background-color:#fff;
	background-size: 100vw 100vh;
	background-attachment: fixed;
}


#contenedor{
	width: 1500px;

	margin-top: 50px;
	margin-bottom: 20px;
	margin: auto;
	
	
}


#contenido{/* este hace el color verdoso medio bonito*/
	background: #20858B  ;
}


#ventanalogin{
	width: 20%;
	height: 40%;
	color: #20858B;
	position: center;
	z-index: 5; /*LO PONEMOS ENCIMA DE TODOS LOS DIVS*/
	background: rgba(0,0,0,0.7);
	top: 20px;
	left: 0;

	display: none; /*No se muestra(oculto)*/
}

#cerrar{
	color:#FF0000;
	font-weight: 900;
	text-align: right;
}


#formlogin{
	width: 500px;
	

	padding: 25px;

	background-color: #fff;

	color: #20858B;

	top: 25%;
	left: 40%;

	position: absolute;

	margin-left: -175px;
	margin-top: -175px;

	/*MI ESTILO*/
	border-radius: 5px;
	text-align: center;
	border: 2px solid #1589D3;

}


#formlogin > h1{
	font-size: 15pt;
	margin: 10px;
	padding: 10px;
	box-sizing: border-box;
	background-color: #1589D3;
	color: #fff;
}


form input{
	width: 250px;
	
	margin: auto;
	margin-bottom: 20px;
	font-size: 12pt;
	padding: 5px;
	box-sizing: border-box;
	border-radius: 5px;
}

form button{
	width: 250px;	
	margin: auto;
	margin-bottom: 30px;
	font-size: 10pt;
	


	border:none;
	border-radius: 5px;

	background: #1589D3;
	color: #fff;


	padding: 10px;
	box-sizing: border-box;
}

form button:hover{
	background: #0869C4;
	color: #fff;
	text-decoration: underline;
	cursor: pointer;
}


#ErrorUsuario{
	display: none;
	background-color: #F48888;
	color: #FF0000;
	padding: 10px;
	box-sizing: border-box;
	border: 1px solid #FF0000;
}

#titulo{
	color: #fff;
	text-align: center;
	padding: 10px 5px;
	text-decoration: underline;
}

#banner{
	border: 1px solid #fff;
	padding: 5px;
	background:  #0C89AD;
	text-align: center;
}


nav{
	border: 1px solid #fff;
	text-align: center;
	font-weight: bold;
	font-size: 17px;
	height: 40px;
	
	background:  #0C89AD;
}


nav ul li{
	list-style: none;
	display: inline;
	padding: 10px 20px;
	line-height: 40px;
	color: #fff;
}

nav ul li a{
	color: #fff;
	text-decoration: none;
}

li:hover, nav ul li a:hover {
	cursor: pointer;
	font-size: 18px;
	color: #56E253;
	text-decoration: underline;
}



footer{
	border: 1px solid #fff;
	background: rgba(0,0,0,0.8);
	color: #fff;
	text-align: center;
}

footer > p{

	padding: 20px;
	font-family: italic;
	font-size: 10pt;
}

</style>