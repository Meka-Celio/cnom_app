



<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
<meta name="format-detection" content="telephone=no">
<link href="css/bootstrap.min.css" rel="stylesheet" />
 <script src="js/jquery.min.js"></script>
  <style type="text/css">
#myTable tr:nth-child(even) {   background: #f4f4f4}
#myTable tr:nth-child(odd) {  background: #fff}
#myTable tr td {    width: 200px;;
    padding: 5px;
    border: 1px solid #ccc;
        text-align: left;
    }
.tdgras{
  font-weight: bold;
      font-family: Calibri;
    font-size: 15px;
}
*{ font-family: Calibri;}
.buttonlg{
    
    /*border-radius: 6px;*/
    width: 70px;
    height: 40px;
    color: #fff;
    font-family: calibri;
    font-size: 17px;
    margin-top: -5px;
    margin-left: 1px;
    text-align: center;
}
.buttonlghaut{
    background: #fff;
    border: 1px solid #fff;
    /*border-radius: 6px;*/
    width: 110px;
    height: 40px;
    color: #fff;
    font-family: calibri;
    font-size: 12px;
   /* margin-top: -5px;*/
    margin-left: 1px;
    text-align: center;
    color : #000;
}
.col-xs-12 {
  text-align: center;
}
.row {
    margin-top: 0px !important;
     /*   margin-left: -20px !important;*/
         margin: 0 !important;
  }
  </style>


<style type="text/css">

 @media  screen and (max-width: 992px){
body{
 /* position: fixed;*/
  background-color: #333 !important;
      font-size: 27px !important;
}
#contenu{
box-shadow:0 0px 0px 0px rgba(0, 0, 0, 0.2), 0 0px 0px 0 rgba(0, 0, 0, 0.19) !important;
}
#footer{
bottom: 0;
    
    margin-top: 350px;
    position: fixed;
    bottom: 0;
    left: 0;
    height: 195px;
    width: 100%;
    padding-left: 15px;
    padding-right: 15px;
}
#bttneng{
  margin-right: 0px !important;
}
#powerlog{
  margin-right: 0px !important;
}
#divlng{
  text-align: right !important;
}
.tdgras{
      font-size: 22px !important;
}
#rowpadding{
  padding: 15px !important;
}
#cadre{
  width: 100%!important;
  margin-left: 0px!important;
  margin-right: 0px!important;
}
}
 @media  screen and (max-width: 600px){
body{
 /* position: fixed;*/
  background-color: #333 !important;
      font-size: 27px !important;
}
#contenu{
box-shadow:0 0px 0px 0px rgba(0, 0, 0, 0.2), 0 0px 0px 0 rgba(0, 0, 0, 0.19) !important;
}
#cadre{
  width: 100%;
  margin-left: 0px;
  margin-right: 0px;
}
#footer{
bottom: 0;
    
    margin-top: 350px;
    position: fixed;
    bottom: 0;
    left: 0;
    height: 195px;
    width: 100%;
    padding-left: 15px;
    padding-right: 15px;
}
#bttneng{
  margin-right: 0px !important;
}
#powerlog{
  margin-right: 0px !important;
}
#divlng{
  text-align: right !important;
}
.tdgras{
      font-size: 22px !important;
}
.resp{
 font-size: 24px !important;
}
.respp{

}
#rowpadding{
  padding: 15px !important;
}

}
</style>
</head>
<body style="       height: 100%;
    width: 100%; overflow: hidden;overflow-y: scroll !important;   ">
  <div class="container-fluid" style="width: 100% !important;padding-right: 10px !important; padding-left: 0px !important;"  id="contenu">
       <div  class="row"  style="background: #000;
    padding-top: 25px;
    padding-bottom: 25px;
    ">
    <div class="col-xs-12 col-md-4">

  </div>
  <div class="col-xs-12 col-md-4">

  </div>
   <div class="col-xs-12 col-md-4 col-md-offset-6">

<img src="images/poweredBy.png" style=" float: right;" id="powerlog">
  </div>
  
  </div>
  <div  class="row" style="">
    <div class="col-xs-12">

  </div>
  </div>

  <br><br>

  <div  class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2" style="text-align:left;">
 
  </div>
  </div>
   <div  class="row" style="/*margin-top:40px*/">
    <div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
    <form name="frm1" id="frm1" method="POST" style="margin-bottom: 27px;" >

<div  id="contenu" style="margin-top: 50px;border-radius: 5px;padding-left: 50px;box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding-right: 50px;margin: 0 auto;text-align: center;vertical-align: center;/* font-size: 16px; */padding-top: 10px;padding-bottom: 10px;" >
 <img src="images/close.png" style=" width: 40px; height: 40px; " id="iconerror" >


 <br/><br/>
 <?php

$id_commande=$_GET["id_commande"];
$token=$_GET["token"];
$clepub="MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh2q4viqQwzVWCKT1KRPvsiixEoNm8dg95gE7h4OUVuERp9csLKYHM9I9EaQ/SUYwgBBLHOslpe5qbvX3x1oAcksO5BT8SYHmtbgUpH1yZjcU1lI2/M3qyRUb03NQaF6vgxCOLGlLpDQqdg0jxl4ySDYu3bcMQto6J2eRAnIPIZkC/h4GQMwhBheFEHf7uMCqj8uNkNf5yU1Js9/Yj8FGbS1fSYwQ1ZQ7Jr94eUhCuTgjFKYUxD18QIPgYEnYbir4mKagtnF8fv3S1+COsVlUXkix77KGW5SYMbeJJYtOVTs1/Cr+/8eHRf5al5249binOJxWLkANpsZtLNI60i9UUQIDAQAB";
$msgahash=$id_commande.$clepub;
$tokengenere=MD5($msgahash); 
if ($token==$tokengenere) {
	//votre traitement ici dans ce cas
?>
   <p id="liengww" style=" width: 60%;margin: 0 auto;font-size: 20px ; font-family: calibri; /* margin-top: 54px; */ " class="resp">Votre commande a été annulée.</p> 
  <br/>
 <?php
}else{
?>
 <p id="liengww" style=" width: 60%;margin: 0 auto;font-size: 20px ; font-family: calibri; /* margin-top: 54px; */ " class="resp">Vous avez annulé le paiement</p> 
  <br/>
  <?php
}
?>
  </div>
</div>


</form>
</div>
  </div>

<div style="    bottom: -20px;/*height: 150px*/;position: fixed;width:100%;" id="footer">
 <div  class="row" style="padding: 0px;" id="rowpadding">
    <div class=" col-xs-4 col-xs-offset-2 col-md-4 col-md-offset-2" style="/*padding-bottom: 25px;*/">
 </div>
  <div class=" col-xs-2 col-md-2 col-lg-2">

  </div>
   <div class=" col-xs-0 col-md-1">
 </div>
   <div class="col-xs-2 col-md-2">

  </div>
  </div>
  
<br/>
   <div  class="row"  style="background: #000;    
    padding-top: 25px;
    padding-bottom: 25px;
   ">
     <div class="col-xs-3 ">

  </div>
  <div class="col-xs-6" style="color:#fff;text-align: center;">
<p style="  color:#fff;    font-size: 15px !important;
    font-family: calibri; ">
<img src="images/logosMaster.png" style="height:25px;"> 
</p>

</div>
    <div class="col-xs-3">

  </div>
   

  </div>
</div>

</div>
</body>

  <script>
               
 
        </script>
</html>
<style type="text/css">
  body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #f6f1f1;
    background-color: #fff;
}
#cadre{
    border: 1px solid #00000029;
    background-color: #555;
    width: 70%;
    font-size: 19px;
    margin-left: 16%;
    margin-top: 4%;
    text-align: left;
    margin-right: 16%;
    padding: 20px;
}


#frm1{
    
    background-color: #333 !important;
}
.buttonlg {
    background: #555;
    border: 1px solid #555;
    /* border-radius: 6px; */
    width: 67%;
    height: 40px;
    color: #fff;
    font-family: calibri;
    font-size: 17px;
    margin-top: 72px;
    margin-left: 2%;
    text-align: center;
    margin-bottom: 35px;
}



</style>

