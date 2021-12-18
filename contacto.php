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
      $subject = 'contacto casinomitrassur.com';
      $message = 'Values submitted from web site form:';
      $success_url = './success.php';
      $error_url = './error.html';
      $error = '';
      $eol = "\n";
      $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
      $boundary = md5(uniqid(time()));

      $header  = 'From: '.$mailfrom.$eol;
      $header .= 'Reply-To: '.$mailfrom.$eol;
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
<title>Noticias - Casino Mitras Sur Monterrey - Salon de Eventos</title>
<meta name="AUTHOR" content="YoteloRecomiendo.com">
<meta name="KEYWORDS" content="casino mitras sur, casinos en monterrey, casino en monterrey, salones de fiestas en monterrey, salon de fiestas monterrey, salones de fiestas monterrey, salon de eventos, bodas en monterrey, salones para bodas en monterrey">
<meta name="DESCRIPTION" content="Casino Mitras Sur, Salon de eventos en Monterrey, Bodas, XV años, Banquetes, Desayunos, Comida. Tel. (81) 8346-5333">
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
   background-image: url(images/backcms6.jpg);
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
<div id="bv_Shape8" style="margin:0;padding:0;position:absolute;left:627px;top:556px;width:520px;height:426px;text-align:center;z-index:13;">
<img src="images/bv01444.png" id="Shape8" alt="" title="" style="border-width:0;width:520px;height:426px"></div>
<div id="bv_Image2" style="margin:0;padding:0;position:absolute;left:444px;top:82px;width:307px;height:142px;text-align:left;z-index:14;">
<img src="images/logo.png" id="Image2" alt="" align="top" border="0" style="width:307px;height:142px;"></div>
<div id="bv_Image1" style="margin:0;padding:0;position:absolute;left:450px;top:18px;width:287px;height:55px;text-align:left;z-index:15;">
<img src="images/garigol.png" id="Image1" alt="" align="top" border="0" style="width:287px;height:55px;"></div>
<div id="bv_Image3" style="margin:0;padding:0;position:absolute;left:196px;top:93px;width:119px;height:17px;text-align:left;z-index:16;">
<a href="nosotros.php" onmouseover="SetImage('Image3','images/boton2b.png');return false;" onmouseout="SetImage('Image3','images/boton2a.png');return false;"><img src="images/boton2a.png" id="Image3" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image4" style="margin:0;padding:0;position:absolute;left:195px;top:135px;width:119px;height:17px;text-align:left;z-index:17;">
<a href="paquetes.php" onmouseover="SetImage('Image4','images/boton3b.png');return false;" onmouseout="SetImage('Image4','images/boton3a.png');return false;"><img src="images/boton3a.png" id="Image4" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image5" style="margin:0;padding:0;position:absolute;left:197px;top:50px;width:119px;height:17px;text-align:left;z-index:18;">
<a href="/" onmouseover="SetImage('Image5','images/boton1b.png');return false;" onmouseout="SetImage('Image5','images/boton1a.png');return false;"><img src="images/boton1a.png" id="Image5" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image7" style="margin:0;padding:0;position:absolute;left:865px;top:50px;width:119px;height:17px;text-align:left;z-index:19;">
<a href="salones.php" onmouseover="SetImage('Image7','images/boton4a.png');return false;" onblur="SetImage('Image7','images/boton4b.png');return false;"><img src="images/boton4a.png" id="Image7" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image6" style="margin:0;padding:0;position:absolute;left:865px;top:93px;width:119px;height:17px;text-align:left;z-index:20;">
<a href="noticias.php" onmouseover="SetImage('Image6','images/boton5b.png');return false;" onmouseout="SetImage('Image6','images/boton5a.png');return false;"><img src="images/boton5a.png" id="Image6" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image9" style="margin:0;padding:0;position:absolute;left:864px;top:135px;width:119px;height:17px;text-align:left;z-index:21;">
<a href="contacto.php"><img src="images/boton6b.png" id="Image9" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Shape1" style="margin:0;padding:0;position:absolute;left:17px;top:554px;width:592px;height:431px;text-align:center;z-index:22;">
<img src="images/bv01443.png" id="Shape1" alt="" title="" style="border-width:0;width:592px;height:431px"></div>
<div id="bv_Text1" style="margin:0;padding:0;position:absolute;left:378px;top:637px;width:197px;height:161px;text-align:left;z-index:23;">
<font style="font-size:16px" color="#996633" face="Gill Sans MT">Casino Mitras Sur A.C.<br>
Zapotlan 206, Col. Mitras Sur<br>
Monterrey, N.L. <br>
<br>
Tels <br>
(81) 8346.5333<br>
(81) 8333.0032</font></div>
<div id="Html1" style="position:absolute;left:45px;top:624px;width:296px;height:252px;z-index:24">
<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.mx/maps?ie=UTF8&amp;q=casino+mitras+sur&amp;fb=1&amp;gl=mx&amp;hq=casino+mitras+sur&amp;hnear=0x8662944a2a8ac425:0x2f265ecee055e5aa,San+Nicol%C3%A1s+de+Los+Garza,+NL&amp;cid=0,0,16896762148370547244&amp;t=m&amp;ll=25.684193,-100.348263&amp;spn=0.005801,0.006437&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com.mx/maps?ie=UTF8&amp;q=casino+mitras+sur&amp;fb=1&amp;gl=mx&amp;hq=casino+mitras+sur&amp;hnear=0x8662944a2a8ac425:0x2f265ecee055e5aa,San+Nicol%C3%A1s+de+Los+Garza,+NL&amp;cid=0,0,16896762148370547244&amp;t=m&amp;ll=25.684193,-100.348263&amp;spn=0.005801,0.006437&amp;z=16&amp;iwloc=A&amp;source=embed" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small></div>
<div id="bv_Image10" style="margin:0;padding:0;position:absolute;left:0px;top:169px;width:186px;height:150px;text-align:left;z-index:25;">
<img src="images/garigol1.png" id="Image10" alt="" align="top" border="0" style="width:186px;height:150px;"></div>
<div id="bv_Shape9" style="margin:0;padding:0;position:absolute;left:124px;top:270px;width:233px;height:242px;text-align:center;z-index:26;">
<img src="images/bv01449.gif" id="Shape9" alt="" title="" style="border-width:0;width:233px;height:242px"></div>
<div id="bv_Text7" style="margin:0;padding:0;position:absolute;left:645px;top:628px;width:495px;height:54px;text-align:left;z-index:27;">
<font style="font-size:19px" color="#996633" face="Gill Sans MT">Déjanos un mensaje y estaremos contestando tu menaje en un momento.</font></div>
<div id="bv_Text8" style="margin:0;padding:0;position:absolute;left:413px;top:344px;width:403px;height:52px;text-align:center;z-index:28;">
<font style="font-size:48px" color="#FFFFE0" face="Copperplate Gothic Light">Contacto</font></div>
<div id="bv_Text9" style="margin:0;padding:0;position:absolute;left:15px;top:575px;width:256px;height:35px;text-align:center;z-index:29;">
<font style="font-size:32px" color="#996633" face="Copperplate Gothic Light">Ubicación</font></div>
<div id="bv_Text10" style="margin:0;padding:0;position:absolute;left:633px;top:575px;width:202px;height:35px;text-align:center;z-index:30;">
<font style="font-size:32px" color="#996633" face="Copperplate Gothic Light">Contacto</font></div>
<div id="bv_Shape2" style="margin:0;padding:0;position:absolute;left:294px;top:1020px;width:674px;height:22px;opacity:0.01;-moz-opacity:0.01;-khtml-opacity:0.01;filter:alpha(opacity=1);text-align:center;z-index:31;">
<img src="images/bv01462.png" id="Shape2" alt="" title="" style="border-width:0;width:674px;height:22px"></div>
<div id="bv_Text3" style="margin:0;padding:0;position:absolute;left:481px;top:399px;width:495px;height:92px;text-align:left;z-index:32;">
<font style="font-size:16px" color="#FFFFE0" face="Gill Sans MT">Si tiene alguna duda o necesita alguna cotización, puede ponerse en contacto con nosotros por medio de nuestros teléfonos de contacto o bien llenando el formato de contacto y estaremos contestando su mensaje en muy poco tiempo.</font></div>
<div id="bv_Form1" style="position:absolute;left:639px;top:695px;width:503px;height:239px;z-index:33">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" id="Form1">
<div id="bv_Shape3" style="margin:0;padding:0;position:absolute;left:74px;top:130px;width:196px;height:36px;text-align:center;z-index:0;">
<img src="images/bv01556.png" id="Shape3" alt="" title="" style="border-width:0;width:196px;height:36px"></div>
<div id="bv_Shape4" style="margin:0;padding:0;position:absolute;left:72px;top:88px;width:196px;height:36px;text-align:center;z-index:1;">
<img src="images/bv01557.png" id="Shape4" alt="" title="" style="border-width:0;width:196px;height:36px"></div>
<div id="bv_Shape5" style="margin:0;padding:0;position:absolute;left:274px;top:44px;width:206px;height:124px;text-align:center;z-index:2;">
<img src="images/bv01558.png" id="Shape5" alt="" title="" style="border-width:0;width:206px;height:124px"></div>
<div id="bv_Shape6" style="margin:0;padding:0;position:absolute;left:71px;top:45px;width:196px;height:36px;text-align:center;z-index:3;">
<img src="images/bv01559.png" id="Shape6" alt="" title="" style="border-width:0;width:196px;height:36px"></div>
<input type="text" id="Editbox1" style="position:absolute;left:75px;top:50px;width:187px;height:22px;border:0px #C0C0C0 solid;background-color:#FFFFE0;color:#A52A00;font-family:'Gill Sans MT Condensed';font-size:16px;z-index:4" name="nombre" value="">
<input type="text" id="Editbox2" style="position:absolute;left:78px;top:95px;width:182px;height:22px;border:0px #C0C0C0 solid;background-color:#FFFFE0;color:#A52A00;font-family:'Gill Sans MT Condensed';font-size:16px;z-index:5" name="email" value="">
<input type="text" id="Editbox3" style="position:absolute;left:78px;top:136px;width:185px;height:22px;border:0px #C0C0C0 solid;background-color:#FFFFE0;color:#A52A00;font-family:'Gill Sans MT Condensed';font-size:16px;z-index:6" name="tel" value="">
<input type="submit" id="Button1" name="Enviado" value="Enviar" style="position:absolute;left:388px;top:177px;width:96px;height:25px;border:1px #D2B48C solid;background-color:#FFFFE0;color:#A52A00;font-family:Calibri;font-size:19px;z-index:7">
<div id="bv_Text2" style="margin:0;padding:0;position:absolute;left:1px;top:50px;width:70px;height:23px;text-align:left;z-index:8;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Nombre:</font></div>
<textarea name="comentario" id="TextArea1" style="position:absolute;left:280px;top:53px;width:200px;height:105px;border:0px #C0C0C0 solid;background-color:#FFFFE0;color:#A52A00;font-family:'Gill Sans MT Condensed';font-size:16px;z-index:9" rows="4" cols="33"></textarea>
<div id="bv_Text4" style="margin:0;padding:0;position:absolute;left:2px;top:91px;width:64px;height:23px;text-align:left;z-index:10;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Email:</font></div>
<div id="bv_Text5" style="margin:0;padding:0;position:absolute;left:4px;top:133px;width:55px;height:23px;text-align:left;z-index:11;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Tel:</font></div>
<div id="bv_Text6" style="margin:0;padding:0;position:absolute;left:278px;top:24px;width:115px;height:23px;text-align:left;z-index:12;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Comentarios:</font></div>
</form>
</div>
<div id="bv_Image8" style="margin:0;padding:0;position:absolute;left:132px;top:278px;width:216px;height:226px;text-align:left;z-index:34;">
<img src="images/bv_img29.jpg" id="Image8" alt="" align="top" border="0" style="width:216px;height:226px;"></div>
</div>
</body>
</html>