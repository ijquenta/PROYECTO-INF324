<?php
// Incluimos el archivo XML para leer los procesos 
session_start();
include "xmlprocesos.php";
$proceso = $_GET['proceso'];
$resultado = buscaProceso($proceso);
$formulario = $resultado->FORMULARIO;
// Creamos el seguimiento
$iduser = $_SESSION["id"];
$nrotramite = $_SESSION["nrotramite"];
$rol = $_SESSION["rol"];
include "xmlseguimiento.inc.php";
$sw = existeSeguimiento($nrotramite, $proceso);
if($sw == -1){
    nuevoSeguimiento($nrotramite, $iduser, $proceso, $rol);
}

?>
<html>
<head>
<title>Procesos Caja</title>
</head>
<style>
    html, body { width: 100%; height: 100%; background: #ECF3F3 }
    form{
    display: block;
    margin: 30px;
    overflow: hidden;
    background: #FFF;
    border: 1px solid #E4E4E4;
    border-radius: 5px;
    font-size: 0;
    }
    h1{
        text-align: center;
        color: darkcyan;
        font-weight: 800;
        padding: 40px;
    }
    @media(min-width:800px){
        form > div {
            display: inline-block;
        }
        form > div.col-submit {
            display: block;
        }
    }

    form > div > label
    {
    display: block;
    padding: 20px 20px 10px;
    /*vertical-align: top;*/
    font-family: Source Sans Pro, Arial, sans-serif;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    color: #939393;
    cursor: pointer;
    }

    form > div.col-2, form > div.col-3, form > div.col-4 { 
    border-bottom: 1px solid #E4E4E4;
    }

    @media(min-width: 800px){
    form > div.col-2, form > div.col-3, form > div.col-4 { box-shadow: 1px 1px #E4E4E4; border: none; }  
    }

    @media(min-width:800px){
    form > div.col-2 { width: 50% }
    form > div.col-3 { width: 33.3333333333% }
    form > div.col-4 { width: 25% }
    }

    form > div > label > input
    {
    display: inline-block;
    position: relative;
    width: 100%;
    height: 27px;
    line-height: 27px;
    margin: 5px -5px 0;
    padding: 7px 5px 3px;
    border: none;
    outline: none;
    border-radius: 3px;
    background: transparent;
    font-size: 14px;
    font-weight: 200;
    opacity: .66;
    transition: opacity .3s, box-shadow .3s;
    }

    form > div.col-submit {
    text-align: center;
    padding: 20px;
    }

    form > div.col-submit button {
    border: 1px solid #E4E4E4;
    background: #A3CECE ;
    font-size: 14px;
    color: #fff;
    padding: 1em;
    display: block;
    width: 100%;
    cursor: pointer;
    border: 0;
    border-radius: 5px;
    text-transform: uppercase;
    }

    @media(min-width: 800px){
    form > div.col-submit button {
        width: 30%;
        margin: 0 auto;
    }
    }

    form > div.col-submit button:hover {
    background: #92BDBD;
    }

    form > div > label > select
    {
    display: block;
    width: 100%;
    margin: 16px 0 6px;
    padding: 0;
    background: transparent;
    border: none;
    outline: none;
    font-size: 14px;
    font-weight: 200;
    opacity: .33;
    }

    form > div > label > input:focus, form > div > label > select:focus
    {
    opacity: 1;
    box-shadow: 0 3px 4px rgba(0, 0, 0, .15);
    }
</style>
<body>
<h1>CAJA FCPN</h1>
<form action="motor.php" method="GET">
<?php include $formulario.'.php'; ?>
<!-- Mandamos el flujo proceso -->
<!--<input type="hidden" value="" name="flujo" />-->
<input type="hidden" value="<?php echo $proceso; ?>" name="proceso"/>
<div class="col-submit">
    <button type="submit">SIGUIENTE</button>
</div>
</form>
</body> 

</html>