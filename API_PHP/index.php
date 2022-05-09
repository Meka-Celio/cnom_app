<?php
    session_start();
    require '../model.collection.php';

    $user       = $_SESSION['user'];
    $cotisation = $_SESSION['cotisation'];

    $frais    =   $cotisation->Frais;
    $montant  =   $cotisation->Montant+$frais;

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $actual_link."<br/>";
if(strpos($actual_link, "index.php")==true)
{
$liensuccess=str_replace('index.php', 'confirmation/confirmpaie.php', $actual_link);
$lienrecall=str_replace('index.php', 'recall.php', $actual_link);
$failurl=str_replace('index.php', 'failURL.php', $actual_link);

}else{
  if (strpos($actual_link, "API_PHP")==true) {
     $liensuccess=$actual_link."/confirmation/confirmpaie.php";
      $failurl=$actual_link."/failURL.php";
      $lienrecall=$actual_link.'/recall.php';

  }else
      {
      $liensuccess="confirmation/confirmpaie.php";
      $lienrecall='recall.php';
       $failurl="failURL.php";

      }
}


?>

 <html lang="en">
<head>
  <!-- <base href="hhttps://www.naps.ma/"> -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
<title>Paiement Cotisation CNOM</title>

 <script type="text/javascript" src="js/tramegatewaynapsv4.js"></script>
<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
<script type="text/javascript" src="js/jsencrypt.js"></script>
  
      <head>




</head>
<body style="" class="fix-sidebar">
<iframe id="GENERATE_CONTRAT"  style="display:none"></iframe>




<div id="wrapper" style="margin-top:10px">



<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
      <header id="header">

     


<div class="navbar navbar-default navbar-fixed-top" role="navigation">
     
  
      <div class="container" id="main">
      <div class="navbar-header">
      <br>
      <img alt="Naps Carte Prépayée" src="images/Logo-NAPS.png" height="30px" class="logo2">

    </div>

       <div class="navbar">
       
              <ul class="nav navbar-nav">
                         
                 <!-- <li><a href="www.naps.ma"><span style="text-transform: uppercase;">www.naps.ma</span></a></li> -->
             <a href="https://www.naps.ma/">   <img alt="Naps Carte Prépayée" src="images/Site-web.png" height="12px" class="logo2" style="margin-top: 25px;"></a>
        
                   </ul>
    </div>
    
      </div>
    </div>

  </header>
  

<div id="slideshow" style="height:100px;margin: 0 auto ;text-align:center !important" align="center">
  
  <img src="images/Banner_NAPS-2019.png" style="margin-top: -10px;width: 100%;">
</div>    <div id="page-wrssapper" style="margin-top: 170px;">
  <div class="container-fluid">
    <div class="container">

  

      <div class="row" id="div111" style="">
   
        <div class="col-md-12">
    
          <div class="swhite-box">
    
    <div class="col-md-12" style="text-align:center;"  >

            <h2 class="page-title" style="color: #f37121;font-weight: bold;margin-top: 30px">PAIEMENT COTISATION CNOM</h2>       
                      
              </div>
<br>
<!-- <img src="images/Séparation.png" style="margin-top: 7px;width: 102%;margin-left: -10px "> -->

    <!-- <div class="row" style="margin-top: 3px;">
  <h4 class="page-title" style="color: #f37121;margin-left: 15px"><STRONG>INFORMATIONS COMMERCANT</STRONG> </h4> -->
      <div class="col-12" style="margin-top: 30px;">       
     

   <div data-repeater-list="">
                <div data-repeater-item="">
                      <form>
                        <input type="hidden" class="form-control" id="cmr" value="2307021">
                        <input type="hidden" class="form-control"  id="gal" value="0110">
                        </form>                     
                </div>
            </div>  
            <!-- ligne2 -->
            <div data-repeater-list="">
                <div data-repeater-item="">
                      <form>
                        <input type="hidden" id="clepub" name="" value="MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh2q4viqQwzVWCKT1KRPvsiixEoNm8dg95gE7h4OUVuERp9csLKYHM9I9EaQ/SUYwgBBLHOslpe5qbvX3x1oAcksO5BT8SYHmtbgUpH1yZjcU1lI2/M3qyRUb03NQaF6vgxCOLGlLpDQqdg0jxl4ySDYu3bcMQto6J2eRAnIPIZkC/h4GQMwhBheFEHf7uMCqj8uNkNf5yU1Js9/Yj8FGbS1fSYwQ1ZQ7Jr94eUhCuTgjFKYUxD18QIPgYEnYbir4mKagtnF8fv3S1+COsVlUXkix77KGW5SYMbeJJYtOVTs1/Cr+/8eHRf5al5249binOJxWLkANpsZtLNI60i9UUQIDAQAB" placeholder="">
                        </form>                    
                </div>
            </div> 
            <!-- <img src="images/Séparation.png" style="margin-top: -10px; margin-left: 10px;width: 99%"> -->
<h4 class="page-title" style="color: #f37121; margin-left: 15px;"><STRONG>INFORMATIONS PAIEMENT <span id="chmpoblg" style="display: none;color: #fff; margin-left: 100px; background: red; padding: 10px;">* les champs suivis d'un astérisque sont obligatoires</span></STRONG> </h4>
<p>Voiçi le récapitulatif de votre commande, merci de le <strong>valider</strong> en appuyant sur le bouton tout en bas</p>
 <div data-repeater-list="" style="margin-top: 30px;">
                <div data-repeater-item="">
                      <form class="col-md-12">
                        <input type="hidden" class="form-control" id="nomprenom" value="<?= $user->Nom_Medecin ?>">
                        <input type="hidden" class="form-control" id="email" value="<?= $user->Email ?>">
                            <div class="form-row">

                                    <div class="form-group col-md-2">
                                                        <label>Nom & Prénom * :</label>    
                                    </div>
                                    <div class="form-group col-md-4"><?= $user->Nom_Medecin ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                         <label>E-Mail :</label>       
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?= $user->Email ?>
                                    </div>    
                            </div>
                        </form>
                                            
                </div>
            </div> 
            <!-- /////////2 -->
             <div data-repeater-list="">
                <div data-repeater-item="">
                      <form class="col-md-12">
                            <div class="form-row">

                                    <div class="form-group col-md-2">
                                        <label>ID commande * :</label>
                                                       
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?= $cotisation->NCommande ?>
                                    </div>

                                    <input type="hidden" class="form-control" id="idcommande" value="<?= $cotisation->NCommande ?>">

                                    <div class="form-group col-md-2">
                                         <label>Montant * :</label>   
                                         <p style="font-size: 12px;">* Frais de transaction: </p>    
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for=""><?= $cotisation->MontantAff ?> Dh</label>
                                        <p style="font-size: 12px;"><?= $frais ?> Dh</p>
                                    </div>
                                    <input type="hidden" class="form-control" id="montant" value="<?= $montant ?>">     
                            </div>
                        </form>
                                            
                </div>
            </div> 
            <!-- //////////3 -->
             <div data-repeater-list="">
                <div data-repeater-item="">
                      <form class="col-md-12">
                            <div class="form-row">
                                <input type="hidden" class="form-control" id="langue" value="FR">
                                <input type="hidden" class="form-control" id="tel" value="<?= $_SESSION['user']->Telephone ?>">    
                                    <!-- <div class="form-group col-md-2">
                                                        <label>Langue :</label>             
                                    </div>
                                    <div class="form-group col-md-4">
                                        FR
                                    </div> -->
                                    <div class="form-group col-md-2">
                                         <label>GSM  :</label>       
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?= $user->Telephone ?></div>    
                            </div>
                        </form>
                                            
                </div>
            </div> 
            <!-- ///////4 -->
             <div data-repeater-list="">
                <div data-repeater-item="">
                      <form>
                        <input type="hidden" class="form-control" id="failURL" value="<?php echo $failurl; ?>">
                        <input type="hidden" class="form-control" id="timeoutURL" value=""> 
                            <!-- <div class="form-row">

                                    <div class="form-group col-md-2">
                                                        <label>Fail URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
                                                       
                                    </div>
                                    <div class="form-group col-md-4">
                                      
                                    </div>
                                    <div class="form-group col-md-2">
                                         <label style="margin-left: 30px">Time out URL  &nbsp;:</label>       
                                    </div>
                                    <div class="form-group col-md-4">
                                            
                                    </div>    
                            </div> -->
                        </form>
                                            
                </div>
            </div> 
            <!-- /////////5 -->
             <div data-repeater-list="">
                <div data-repeater-item="">
                      <form class="col-md-12">
                        <input type="hidden" class="form-control" id="successURL" value="<?php echo $liensuccess; ?>">
                        </form>
                                            
                </div>
            </div> 
            <!-- /////////6 -->
             <div data-repeater-list="">
                <div data-repeater-item="">
                      <form class="col-md-12">
                        <input type="hidden" class="form-control"  id="state" value="<?= $user->NomRegion ?>">
                        <input type="hidden" class="form-control" id="country" value="Maroc">
                            <div class="form-row">

                                    <div class="form-group col-md-2">
                                                        <label>Région  :</label>
                                                       
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for=""><?= $user->NomRegion ?></label>
                                    </div>
                                    <!-- <div class="form-group col-md-2">
                                         <label style="margin-left: 30px">Pays :</label>       
                                    </div>
                                    <div class="form-group col-md-4">
                                         <input type="text" class="form-control" id="country" value="Maroc">    
                                    </div>  -->   
                            </div>
                        </form>
                                            
                </div>
            </div> 
             <!-- /////////6 -->
                <div data-repeater-list="">
                <div data-repeater-item="">
                      <form class="col-md-12">
                        <input type="hidden" class="form-control" id="recallURL" value="<?= $lienrecall; ?>">
                        <input type="hidden" class="form-control" id="postcode">
                        </form>
                                            
                </div>
            </div> 
             <div data-repeater-list="">
                <div data-repeater-item="">
                      <form>
                        <input type="hidden" class="form-control" id="city" style=" margin-bottom: 25px; " value="<?= $user->NomProvince ?>">
                        <input type="hidden" class="form-control" id="detailoperation" style=" margin-bottom: 25px; " value="Paiement Cotisation">
                            <div class="form-row">

                                    <div class="div-group">
                                        <div class="form-group col-md-2">
                                            <label>Ville :</label>          
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for=""><?= $user->NomProvince ?></label>  
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Paiement Cotisation</label> 
                                    </div>

                            </div>
                        </form>
                                            
                </div>
            </div> 
                  
              <!-- /////////6 -->
             <div data-repeater-list="">
                <div data-repeater-item="">
                      <form>
                            <div class="form-row">

                                    <div class="form-group col-md-12" align="center" style="margin-top: 20px;">
                                                     
                                  
                   <button class="btn waves-effect waves-light btn-block btn-info" type="button" id="payer"  style="width: 110px;background-color: #f37121;border-color: #f37121!important;color: white !important;margin-top: -35px; border-radius: 30px;margin-bottom: 10px;font-size: 16px; font-family: Helvetica Neue,Helvetica,Arial,sans-serif">Valider</button>
   </div>
                                      
                            </div>
                        </form>
                                            
                </div>
            </div> 






</div>

          </div>

        </div>
        
    
      </div>


        </div>
      </div>
 
    </div>
     
    <!-- /.container-fluid -->
<div class="navbar" style="background-color: #000; height: 70px;text-align: center;">
   <img alt="Naps Carte Prépayée" src="images/logos.png" style="margin-top: 20px;" class="logo2"><br /> <br />
</div>
  </div>
  <!-- /#page-wrapper -->

</div>

  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!-- Sweet-Alert  -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</body>


</html>
<script type="text/javascript">

    
 $('#payer').click(function(){

//récupération des éléments de la commande
var nomprenom =$('#nomprenom').val();
var idcommande=$('#idcommande').val();
var montant=$('#montant').val();
var email =$('#email').val();
var langue =$('#langue').val();
var successURL =$('#successURL').val();
var recallURL =$('#recallURL').val();

var failURL =$('#failURL').val();
var timeoutURL =$('#timeoutURL').val();
var tel =$('#tel').val();
var address=$('#address').val();
var city=$('#city').val();
var state =$('#state').val();
var postcode =$('#postcode').val();
var clepub =$('#clepub').val();
var cmr =$('#cmr').val();
var gal =$('#gal').val();
var detailoperation =$('#detailoperation').val();

var  mxgateway= new MXGateway(cmr, gal,clepub,langue);



//cryptage trame 1
var encrypteddata1=mxgateway.cryptageTrame1(nomprenom, idcommande, montant, email,detailoperation);
//Cryptage trame 2
var encrypteddata2=mxgateway.cryptageTrame2(successURL, timeoutURL);
//cryptage trame 3
var encrypteddata3=mxgateway.cryptageTrame3(failURL, recallURL);
//cryptage trame 4
var encrypteddata4=mxgateway.cryptageTrame4(tel, address, city, state, "MA", postcode);

//génération lien de paiement 
var lien_gateway =mxgateway.generateLien(encrypteddata1, encrypteddata2,encrypteddata3,encrypteddata4);
//redirection vers la page de paiement
if (nomprenom=="" || idcommande=="" || montant=="0" || montant=="" || montant=="0.00"  || montant=="0.0"  || gal=="" || successURL=="" || clepub=="" || cmr=="" || gal=="" )
 {
$('#chmpoblg').show();
 }else{
  $('#chmpoblg').hide();
  window.top.location.href=lien_gateway;
 }


});
 
</script>
<style type="text/css">
  label {
    margin-top: 5px;
  }
</style>
<!-- 00044204 -->