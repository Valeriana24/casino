<?php
   function ValidateEmail($email)
   {
      $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
      return preg_match($pattern, $email);
   }

   if($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      $mailto = 'casinomitrassur@gmail.com';
      $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
      $subject = 'Contacto de Casinomitrassur.com';
      $message = 'Datos enviados por el cliente:';
      $success_url = './success.php';
      $error_url = './error.php';
      $error = '';
      $eol = "\n";
      $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
      $boundary = md5(uniqid(time()));

      $header  = 'From: '.$mailfrom.$eol;
      $header .= 'Reply-To: '.$mailfrom.$eol;
      $header .= 'Bcc: '.$mailbcc.$eol;
      $header .= 'MIME-Version: 1.0'.$eol;
      $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
      $header .= 'X-Mailer: PHP v'.phpversion().$eol;
      if (!ValidateEmail($mailfrom))
      {
         $error .= "The specified email address is invalid!\n<br>";
      }

      if (!empty($error))
      {
         $errorcode = file_get_contents($error_url);
         $replace = "##error##";
         $errorcode = str_replace($replace, $error, $errorcode);
         echo $errorcode;
         exit;
      }

      $internalfields = array ("submit", "reset", "filesize", "upload_folder", "send", "captcha_code");
      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (!is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
         }
      }

      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
          foreach ($_FILES as $key => $value)
          {
             if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      mail($mailto, $subject, $body, $header);
      header('Location: '.$success_url);
      exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Nosotros - Casino Mitras Sur Monterrey - Salón de Eventos</title>
<meta name="AUTHOR" content="YoteloRecomiendo.com">
<meta name="KEYWORDS" content="casino mitras sur, casinos en monterrey, casino en monterrey, salones de fiestas en monterrey, salon de fiestas monterrey, salones de fiestas monterrey, salon de eventos, bodas en monterrey, salones para bodas en monterrey">
<meta name="DESCRIPTION" content="Casino Mitras Sur, Salon de eventos en Monterrey, Bodas, XV años, Banquetes, Desayunos, Comida. Tel. (81) 8346-5333
">
<meta name="GENERATOR" content="Created by BlueVoda Website builder http://www.bluevoda.com">
<meta name="HOSTING" content="Hosting Provided By VodaHost http://www.vodahost.com">
<link rel="shortcut icon" href="faviconcms.ico">
<style type="text/css">
div#container
{
   width: 1142px;
   position: relative;
   margin-top: 0px;
   margin-left: auto;
   margin-right: auto;
   text-align: left;
}
</style>
<style type="text/css">
body
{
   text-align: center;
   margin: 0;
   background-color: #FFFFFF;
   background-image: url(images/backcms3.jpg);
   color: #000000;
}
</style>
<style type="text/css">
a:hover
{
   color: #50322F;
}
</style>
<script type="text/javascript">
<!--
function ValidateForm1(theForm)
{
   var regexp;
   regexp = /^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i;
   if (theForm.Editbox2.value.length != 0 && !regexp.test(theForm.Editbox2.value))
   {
      alert("Please enter a valid email address.");
      theForm.Editbox2.focus();
      return false;
   }
   return true;
}
//-->
</script>
<script type="text/javascript">
<!--
function SetImage(id, filename)
{
   var elem=document.getElementById(id);
   if(elem)
   {
      elem.src=filename;
   }
}
//-->
</script>
<!--[if lt IE 7]>
<style type="text/css">
   img { behavior: url("pngfix.htc"); }
</style>
<![endif]-->
</head>
<body>
<div id="container">
<div id="bv_Image12" style="margin:0;padding:0;position:absolute;left:0px;top:190px;width:186px;height:150px;text-align:left;z-index:13;">
<img src="images/garigol1.png" id="Image12" alt="" align="top" border="0" style="width:186px;height:150px;"></div>
<div id="bv_Image1" style="margin:0;padding:0;position:absolute;left:444px;top:82px;width:307px;height:142px;text-align:left;z-index:14;">
<img src="images/logo.png" id="Image1" alt="" align="top" border="0" style="width:307px;height:142px;"></div>
<div id="bv_Image2" style="margin:0;padding:0;position:absolute;left:450px;top:18px;width:287px;height:55px;text-align:left;z-index:15;">
<img src="images/garigol.png" id="Image2" alt="" align="top" border="0" style="width:287px;height:55px;"></div>
<div id="bv_Image4" style="margin:0;padding:0;position:absolute;left:196px;top:93px;width:119px;height:17px;text-align:left;z-index:16;">
<a href="nosotros.php"><img src="images/boton2b.png" id="Image4" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image5" style="margin:0;padding:0;position:absolute;left:195px;top:135px;width:119px;height:17px;text-align:left;z-index:17;">
<a href="paquetes.php" onmouseover="SetImage('Image5','images/boton3b.png');return false;" onmouseout="SetImage('Image5','images/boton3a.png');return false;"><img src="images/boton3a.png" id="Image5" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image3" style="margin:0;padding:0;position:absolute;left:197px;top:50px;width:119px;height:17px;text-align:left;z-index:18;">
<a href="index.php" onmouseover="SetImage('Image3','images/boton1b.png');return false;" onmouseout="SetImage('Image3','images/boton1a.png');return false;"><img src="images/boton1a.png" id="Image3" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image6" style="margin:0;padding:0;position:absolute;left:865px;top:50px;width:119px;height:17px;text-align:left;z-index:19;">
<a href="salones.php" onmouseover="SetImage('Image6','images/boton4b.png');return false;" onmouseout="SetImage('Image6','images/boton4a.png');return false;"><img src="images/boton4a.png" id="Image6" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image7" style="margin:0;padding:0;position:absolute;left:865px;top:93px;width:119px;height:17px;text-align:left;z-index:20;">
<a href="noticias.php" onmouseover="SetImage('Image7','images/boton5b.png');return false;" onmouseout="SetImage('Image7','images/boton5a.png');return false;"><img src="images/boton5a.png" id="Image7" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image8" style="margin:0;padding:0;position:absolute;left:864px;top:135px;width:119px;height:17px;text-align:left;z-index:21;">
<a href="contacto.php" onmouseover="SetImage('Image8','images/boton6b.png');return false;" onmouseout="SetImage('Image8','images/boton6a.png');return false;"><img src="images/boton6a.png" id="Image8" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image9" style="margin:0;padding:0;position:absolute;left:66px;top:237px;width:419px;height:286px;text-align:left;z-index:22;">
<img src="images/bv01396.png" id="Image9" alt="" align="top" border="0" style="width:419px;height:286px;"></div>
<div id="bv_Text1" style="margin:0;padding:0;position:absolute;left:527px;top:345px;width:327px;height:22px;text-align:left;z-index:23;">
<font style="font-size:21px" color="#FFFFE0" face="Copperplate Gothic Light">Casino Mitras Sur, A.C.</font></div>
<div id="bv_Text2" style="margin:0;padding:0;position:absolute;left:506px;top:293px;width:237px;height:38px;text-align:center;z-index:24;">
<font style="font-size:35px" color="#FFFFE0" face="Copperplate Gothic Light">Nosotros</font></div>
<div id="bv_Text4" style="margin:0;padding:0;position:absolute;left:528px;top:386px;width:542px;height:345px;text-align:left;z-index:25;">
<font style="font-size:16px" color="#FFFFE0" face="Gill Sans MT">Casino Mitras Sur, es una institución de caracter civil constituida en el año de 1957 gracias a la organización de un nutrido grupo de vecinos de la zona Sur de la colonia Mitras, fundadores de la misma y fue identificada como “Casino Mitras Sur Asociación Civil” para realizar toda clase de eventos y actividades sociales y culturales.<br>
<br>
Esta agrupación logro con el esfuerzo de diversas actividades sociales, otorgar diversas becas a estudiantes quienes obtuvieron en su momento un título profesional y hasta la fecha se sigue ayudando a diversas instituciones, entre algunas a la Casa Simón de Betania, dedicada a personas discapacitadas y menores adolescentes con cáncer terminal. <br>
<br>
Las asociadas se reúnen dos veces al mes para convivir y conocer las actividades de su mesa directiva y los socios con sus esposas se reúnen una vez al mes para convivir con una cena baile y escuchar el informe de las actividades sociales.</font></div>
<div id="bv_Text7" style="margin:0;padding:0;position:absolute;left:59px;top:841px;width:394px;height:195px;text-align:left;z-index:26;">
<font style="font-size:21px" color="#663300" face="Copperplate Gothic Light">Consulta con nuestos expertos las opciones para tu evento.<br>
</font><font style="font-size:16px" color="#663300" face="Copperplate Gothic Light"><br>
Tels<br>
(81) 8346.5333<br>
(81) 8333.0032<br>
<br>
Zapotlan 206<br>
Col. Mitras Sur<br>
Monterrey, N.L.</font><font style="font-size:13px" color="#663300" face="Copperplate Gothic Light"><br>
</font></div>
<div id="bv_Form1" style="position:absolute;left:517px;top:803px;width:601px;height:275px;z-index:27">
<form name="Form1" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form1" onsubmit="return ValidateForm1(this)">
<div id="bv_Shape4" style="margin:0;padding:0;position:absolute;left:352px;top:40px;width:192px;height:148px;text-align:center;z-index:0;">
<img src="images/bv01405.png" id="Shape4" alt="" title="" style="border-width:0;width:192px;height:148px"></div>
<div id="bv_Shape3" style="margin:0;padding:0;position:absolute;left:164px;top:150px;width:172px;height:38px;text-align:center;z-index:1;">
<img src="images/bv01403.png" id="Shape3" alt="" title="" style="border-width:0;width:172px;height:38px"></div>
<div id="bv_Shape2" style="margin:0;padding:0;position:absolute;left:163px;top:97px;width:172px;height:38px;text-align:center;z-index:2;">
<img src="images/bv01404.png" id="Shape2" alt="" title="" style="border-width:0;width:172px;height:38px"></div>
<div id="bv_Shape1" style="margin:0;padding:0;position:absolute;left:164px;top:44px;width:172px;height:38px;text-align:center;z-index:3;">
<img src="images/bv01406.png" id="Shape1" alt="" title="" style="border-width:0;width:172px;height:38px"></div>
<input type="text" id="Editbox1" style="position:absolute;left:174px;top:52px;width:150px;height:20px;border:0px #C0C0C0 solid;background-color:#FFFFE0;font-family:'Courier New';font-size:16px;z-index:4" name="Nombre" value="">
<input type="text" id="Editbox2" style="position:absolute;left:171px;top:108px;width:150px;height:20px;border:0px #C0C0C0 solid;background-color:#FFFFE0;font-family:'Courier New';font-size:16px;z-index:5" name="Email" value="">
<input type="text" id="Editbox3" style="position:absolute;left:172px;top:160px;width:150px;height:20px;border:0px #C0C0C0 solid;background-color:#FFFFE0;font-family:'Courier New';font-size:16px;z-index:6" name="Tel" value="">
<textarea name="Comentarios" id="TextArea1" style="position:absolute;left:360px;top:49px;width:174px;height:129px;border:0px #C0C0C0 solid;background-color:#FFFFE0;font-family:'Courier New';font-size:16px;z-index:7" rows="6" cols="14"></textarea>
<input type="submit" id="Button1" name="Enviar" value="Enviar" style="position:absolute;left:464px;top:200px;width:81px;height:34px;border:2px #D2B48C solid;background-color:#FFFFE0;color:#996633;font-family:'Gill Sans MT';font-weight:bold;font-size:16px;z-index:8">
<div id="bv_Text8" style="margin:0;padding:0;position:absolute;left:90px;top:55px;width:70px;height:23px;text-align:left;z-index:9;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Nombre:</font></div>
<div id="bv_Text9" style="margin:0;padding:0;position:absolute;left:90px;top:160px;width:55px;height:23px;text-align:left;z-index:10;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Tel:</font></div>
<div id="bv_Text10" style="margin:0;padding:0;position:absolute;left:90px;top:104px;width:64px;height:23px;text-align:left;z-index:11;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Email:</font></div>
<div id="bv_Text11" style="margin:0;padding:0;position:absolute;left:354px;top:14px;width:115px;height:23px;text-align:left;z-index:12;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Comentarios:</font></div>
</form>
</div>
</div>
</body>
</html>