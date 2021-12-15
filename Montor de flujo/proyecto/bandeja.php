<?php
session_start();

$nrotramite = $_SESSION['nrotramite'];
echo $_SESSION['id'];
include "xmlseguimiento.inc.php";
$seguimientos = buscaTramiteSegui($nrotramite);
?>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Seguimiento</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    * { 
	margin: 0; 
	padding: 0; 
    }
    body { 
        background:#ECF3F3;
        font: 14px/1.4 Georgia, Serif; 
    }
    #page-wrap {
        width: 700px;
        height: auto;
        margin:0 auto;
    }
    p {
        margin: 20px 0; 
    }
    h1{
        color:darkcyan;
        text-align: center;
        margin-top: 100px;
    }
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
	}
	th { 
		background: cadetblue; 
		color: black;
        text-align: center; 
		font-weight: bold; 
	}
	td, th { 
        font-size: 20px;
		padding: 6px; 
		border: 1px solid #ccc; 
		/*text-align: left;*/
	}
</style>	
</head>

<body>
    <h1>SEGUIMIENTO DE SUS PROCESOS</h1>
    <br><br>
	<div id="page-wrap">
	<table>
		<tr>
			<th>Nro. Trámite</th>
			<th>Usuario CI</th>
			<th>ID Proceso</th>
			<th>Rol</th>
			<th>Fecha Inicio</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($seguimientos as $seg){
		echo "<tr>";
		echo "<td>".$seg->ID."</td>";
		echo "<td>".$seg->CI."</td>";
		echo "<td>".$seg->PROCESO."</td>";
		echo "<td>".$seg->ROL."</td>";
		echo "<td>".$seg->FECHAINICIO."</td>";
		echo "<td><a href='procesos.php?proceso=".$seg->PROCESO."'>IR</td>";
		echo "</tr>";
		}
		?>
	</table>
	
	</div>
		
</body>

</html>