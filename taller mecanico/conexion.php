<?php
$serverName = "DESKTOP-G0U12FR\EQUIPO"; //serverName\instanceName
date_default_timezone_set("America/Mexico_city");
$fecha=date("Y/m/d h:i:s");

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"tallerbd");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn ) {
    "ALTER table[192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] add estatus_envio varchar(5)";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>