<?php
session_start();
/*
print_r($_SESSION);
$id_commande="1526fdgg5656";
$clepub="MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh2q4viqQwzVWCKT1KRPvsiixEoNm8dg95gE7h4OUVuERp9csLKYHM9I9EaQ/SUYwgBBLHOslpe5qbvX3x1oAcksO5BT8SYHmtbgUpH1yZjcU1lI2/M3qyRUb03NQaF6vgxCOLGlLpDQqdg0jxl4ySDYu3bcMQto6J2eRAnIPIZkC/h4GQMwhBheFEHf7uMCqj8uNkNf5yU1Js9/Yj8FGbS1fSYwQ1ZQ7Jr94eUhCuTgjFKYUxD18QIPgYEnYbir4mKagtnF8fv3S1+COsVlUXkix77KGW5SYMbeJJYtOVTs1/Cr+/8eHRf5al5249binOJxWLkANpsZtLNI60i9UUQIDAQAB";
$msgahash=$id_commande.$clepub;
$hashagegenere=MD5($msgahash); 
echo "<br/>".$msgahash;
echo "<br/>".$hashagegenere;
*/
$id_commande="951";
$clepub="MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuXZVhLsrS18P4V8BNDkuJd5QGGeA8sDIV3trfNt45NIlTYPgkNrpRbiXhjIAJuxvvbLF5ZVdi7PcuPtge77SXGDW0SUG1bsAHVky7Zesm11htGNBWOJQqpjRxyds1bdwkIaVrBF4Yrj/K5hfAy8cMHnpx+IGzXgroYGZqNyjBKSLWhvJyz4LDClFUt3QhJe1HpmFiGzKrs1CN3V1drZrt1LafekooXhEiSsCfQb2FQDwBlARxCyfLf5MyN5lFb8x/MqXuGkhn2ejKwvVHkEhH6D1MZbT8E5dZ7+ccE/EvytTTzBcltzP7deo3DfxxkYUFHR7388Q4qk37fye/E0AIQIDAQAB";
$msgahash=$id_commande.$clepub;
$hashagegenere=MD5($msgahash); 
echo "<br/>".$hashagegenere;
?>