<?php
ini_set('display_errors',1);
$idcommande=$_POST['idcommande'];
$repauto=$_POST['repauto'];
$signature=$_POST['signature'];
$montant=$_POST['montant'];
$numAuto=$_POST['numAuto'];
$numTrans=$_POST['numTrans'];
$cle="MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh2q4viqQwzVWCKT1KRPvsiixEoNm8dg95gE7h4OUVuERp9csLKYHM9I9EaQ/SUYwgBBLHOslpe5qbvX3x1oAcksO5BT8SYHmtbgUpH1yZjcU1lI2/M3qyRUb03NQaF6vgxCOLGlLpDQqdg0jxl4ySDYu3bcMQto6J2eRAnIPIZkC/h4GQMwhBheFEHf7uMCqj8uNkNf5yU1Js9/Yj8FGbS1fSYwQ1ZQ7Jr94eUhCuTgjFKYUxD18QIPgYEnYbir4mKagtnF8fv3S1+COsVlUXkix77KGW5SYMbeJJYtOVTs1/Cr+/8eHRf5al5249binOJxWLkANpsZtLNI60i9UUQIDAQAB";
$msgahash=$idcommande.$repauto.$cle.$montant;
$msgsigne=MD5($msgahash); 

if(($msgsigne == $signature || $msgsigne == "0".$signature)&& $_POST["repauto"] == "00" )	{
	//update BD 
	//envoi mail
	//envoi SMS
	 echo "GATESUCCESS";
	}else {
		echo "GATEFAILED";   
	}
?>