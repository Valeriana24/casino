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
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Inicio - Casino Mitras Sur - Banquetes, eventos bodas, XV años</title>
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
   background-image: url(images/backcms3.jpg);
   color: #000000;
}
</style>
<style type="text/css">
a:hover
{
   color: #650100;
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
<div id="bv_Image12" style="margin:0;padding:0;position:absolute;left:0px;top:190px;width:186px;height:150px;text-align:left;z-index:13;">
<img src="images/garigol1.png" id="Image12" alt="" align="top" border="0" style="width:186px;height:150px;"></div>
<div id="bv_Image10" style="margin:0;padding:0;position:absolute;left:56px;top:230px;width:403px;height:306px;text-align:left;z-index:14;">
<img src="images/aaa.png" id="Image10" alt="" align="top" border="0" style="width:403px;height:306px;"></div>
<div id="bv_Image13" style="margin:0;padding:0;position:absolute;left:997px;top:206px;width:186px;height:150px;text-align:left;z-index:15;">
<img src="images/ornament2.png" id="Image13" alt="" align="top" border="0" style="width:186px;height:150px;"></div>
<div id="bv_Image1" style="margin:0;padding:0;position:absolute;left:444px;top:82px;width:307px;height:142px;text-align:left;z-index:16;">
<img src="images/logo.png" id="Image1" alt="" align="top" border="0" style="width:307px;height:142px;"></div>
<div id="bv_Image2" style="margin:0;padding:0;position:absolute;left:450px;top:18px;width:287px;height:55px;text-align:left;z-index:17;">
<img src="images/garigol.png" id="Image2" alt="" align="top" border="0" style="width:287px;height:55px;"></div>
<div id="bv_Image4" style="margin:0;padding:0;position:absolute;left:196px;top:93px;width:119px;height:17px;text-align:left;z-index:18;">
<a href="nosotros.php" onmouseover="SetImage('Image4','images/boton2b.png');return false;" onmouseout="SetImage('Image4','images/boton2a.png');return false;"><img src="images/boton2a.png" id="Image4" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image5" style="margin:0;padding:0;position:absolute;left:195px;top:135px;width:119px;height:17px;text-align:left;z-index:19;">
<a href="paquetes.php" onmouseover="SetImage('Image5','images/boton3b.png');return false;" onmouseout="SetImage('Image5','images/boton3a.png');return false;"><img src="images/boton3a.png" id="Image5" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image3" style="margin:0;padding:0;position:absolute;left:197px;top:50px;width:119px;height:17px;text-align:left;z-index:20;">
<a href="/"><img src="images/boton1b.png" id="Image3" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image6" style="margin:0;padding:0;position:absolute;left:865px;top:50px;width:119px;height:17px;text-align:left;z-index:21;">
<a href="salones.php" onmouseover="SetImage('Image6','images/boton4b.png');return false;" onmouseout="SetImage('Image6','images/boton4a.png');return false;"><img src="images/boton4a.png" id="Image6" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image7" style="margin:0;padding:0;position:absolute;left:865px;top:93px;width:119px;height:17px;text-align:left;z-index:22;">
<a href="noticias.php" onmouseover="SetImage('Image7','images/boton5b.png');return false;" onmouseout="SetImage('Image7','images/boton5a.png');return false;"><img src="images/boton5a.png" id="Image7" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image8" style="margin:0;padding:0;position:absolute;left:864px;top:135px;width:119px;height:17px;text-align:left;z-index:23;">
<a href="contacto.php" onmouseover="SetImage('Image8','images/boton6b.png');return false;" onmouseout="SetImage('Image8','images/boton6a.png');return false;"><img src="images/boton6a.png" id="Image8" alt="" align="top" border="0" style="width:119px;height:17px;"></a></div>
<div id="bv_Image11" style="margin:0;padding:0;position:absolute;left:745px;top:225px;width:375px;height:307px;text-align:left;z-index:24;">
<img src="images/ccc.png" id="Image11" alt="" align="top" border="0" style="width:375px;height:307px;"></div>
<div id="bv_Image9" style="margin:0;padding:0;position:absolute;left:400px;top:226px;width:376px;height:286px;text-align:left;z-index:25;">
<img src="images/bv01396.png" id="Image9" alt="" align="top" border="0" style="width:376px;height:286px;"></div>
<div id="bv_Text1" style="margin:0;padding:0;position:absolute;left:81px;top:537px;width:259px;height:44px;text-align:left;z-index:26;">
<font style="font-size:21px" color="#FFFFE0" face="Copperplate Gothic Light">Salones para todo tipo de evento</font></div>
<div id="bv_Text2" style="margin:0;padding:0;position:absolute;left:392px;top:522px;width:387px;height:22px;text-align:center;z-index:27;">
<font style="font-size:21px" color="#FFFFE0" face="Copperplate Gothic Light">Tu evento en Casino Mitras Sur</font></div>
<div id="bv_Text3" style="margin:0;padding:0;position:absolute;left:833px;top:541px;width:281px;height:44px;text-align:left;z-index:28;">
<font style="font-size:21px" color="#FFFFE0" face="copperplate gothic light">Deliciosas opciones para tu banquete</font></div>
<div id="bv_Text4" style="margin:0;padding:0;position:absolute;left:78px;top:601px;width:234px;height:115px;text-align:left;z-index:29;">
<font style="font-size:16px" color="#FFFFE0" face="Gill Sans MT">En Casino Mitras Sur contamos con salones para todo tipo de evento, desde una pequeña reunion de 30 personas, hasta una gran fiesta con 300 invitados.</font></div>
<div id="bv_Text5" style="margin:0;padding:0;position:absolute;left:398px;top:562px;width:378px;height:184px;text-align:center;z-index:30;">
<font style="font-size:16px" color="#FFFFE0" face="Gill Sans MT">Si estas planeando organizar tu boda, XV años, despedida de soltera, posada, junta empresarial, o cualquier otro tipo de evento, Casino Mitras Sur es tu mejor opción. Contamos con 4 salones acondicionados para cada tipo de evento y con diferentes capacidades. Además te ofrecemos la atención de nuestro personal áltamente capacitado para atender a ti y a tus invitados para que disfruten su evento desde el inicio hasta su fin.</font></div>
<div id="bv_Text6" style="margin:0;padding:0;position:absolute;left:833px;top:592px;width:261px;height:161px;text-align:left;z-index:31;">
<font style="font-size:16px" color="#FFFFE0" face="Gill Sans MT">En la cocina de Casino Mitras Sur, se preparan platillos exquisitos con los más altos estándares de calidad siempre cuidando la frescura de los alimentos. Manejamos&nbsp; un menú extenso con diversas opciones para todos los gustos.y ocasiones.</font></div>
<div id="bv_GlassButton1" style="margin:0;padding:0;position:absolute;left:190px;top:757px;width:122px;height:31px;text-align:left;z-index:32;">
<script language="JavaScript" type="text/javascript">
<!--
GlassButton19 = new Image();
GlassButton19.src = "images/bv01400_hover.png";
//-->
</script>
<a href="salones.php">
<img src="images/bv01400.png" id="GlassButton19" width="122" height="31" alt="Conócelos" border="0" onmouseover="this.src='images/bv01400_hover.png'" onmouseout="this.src='images/bv01400.png'">
</a>
</div>
<div id="bv_GlassButton2" style="margin:0;padding:0;position:absolute;left:487px;top:761px;width:187px;height:28px;text-align:left;z-index:33;">
<script language="JavaScript" type="text/javascript">
<!--
GlassButton20 = new Image();
GlassButton20.src = "images/bv01401_hover.png";
//-->
</script>
<a href="paquetes.php">
<img src="images/bv01401.png" id="GlassButton20" width="187" height="28" alt="Conoce nuestros paquetes" border="0" onmouseover="this.src='images/bv01401_hover.png'" onmouseout="this.src='images/bv01401.png'">
</a>
</div>
<div id="bv_GlassButton3" style="margin:0;padding:0;position:absolute;left:943px;top:761px;width:150px;height:29px;text-align:left;z-index:34;">
<script language="JavaScript" type="text/javascript">
<!--
GlassButton21 = new Image();
GlassButton21.src = "images/bv01402_hover.png";
//-->
</script>
<a href="menu.php">
<img src="images/bv01402.png" id="GlassButton21" width="150" height="29" alt="Ver Menú" border="0" onmouseover="this.src='images/bv01402_hover.png'" onmouseout="this.src='images/bv01402.png'">
</a>
</div>
<div id="bv_Text7" style="margin:0;padding:0;position:absolute;left:59px;top:841px;width:394px;height:195px;text-align:left;z-index:35;">
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
<div id="bv_Form2" style="position:absolute;left:599px;top:804px;width:527px;height:239px;z-index:36">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" id="Form2">
<div id="bv_Shape7" style="margin:0;padding:0;position:absolute;left:98px;top:130px;width:196px;height:36px;text-align:center;z-index:0;">
<img src="images/bv01563.png" id="Shape7" alt="" title="" style="border-width:0;width:196px;height:36px"></div>
<div id="bv_Shape6" style="margin:0;padding:0;position:absolute;left:96px;top:88px;width:196px;height:36px;text-align:center;z-index:1;">
<img src="images/bv01562.png" id="Shape6" alt="" title="" style="border-width:0;width:196px;height:36px"></div>
<div id="bv_Shape8" style="margin:0;padding:0;position:absolute;left:310px;top:44px;width:206px;height:124px;text-align:center;z-index:2;">
<img src="images/bv01560.png" id="Shape8" alt="" title="" style="border-width:0;width:206px;height:124px"></div>
<div id="bv_Shape5" style="margin:0;padding:0;position:absolute;left:95px;top:45px;width:196px;height:36px;text-align:center;z-index:3;">
<img src="images/bv01561.png" id="Shape5" alt="" title="" style="border-width:0;width:196px;height:36px"></div>
<input type="submit" id="Button2" name="Enviado" value="Enviar" style="position:absolute;left:415px;top:177px;width:96px;height:25px;border:1px #D2B48C solid;background-color:#FFFFE0;color:#A52A00;font-family:Calibri;font-size:19px;z-index:4">
<div id="bv_Text8" style="margin:0;padding:0;position:absolute;left:10px;top:50px;width:70px;height:23px;text-align:left;z-index:5;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Nombre:</font></div>
<div id="bv_Text10" style="margin:0;padding:0;position:absolute;left:12px;top:91px;width:64px;height:23px;text-align:left;z-index:6;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Email:</font></div>
<div id="bv_Text9" style="margin:0;padding:0;position:absolute;left:13px;top:133px;width:55px;height:23px;text-align:left;z-index:7;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Tel:</font></div>
<div id="bv_Text11" style="margin:0;padding:0;position:absolute;left:318px;top:24px;width:115px;height:23px;text-align:left;z-index:8;">
<font style="font-size:16px" color="#663300" face="Gill Sans MT">Comentarios:</font></div>
<input type="text" id="Editbox4" style="position:absolute;left:99px;top:50px;width:187px;height:22px;border:0px #C0C0C0 solid;background-color:#FFFFE0;color:#A52A00;font-family:'Gill Sans MT Condensed';font-size:16px;z-index:9" name="nombre" value="">
<input type="text" id="Editbox5" style="position:absolute;left:102px;top:95px;width:182px;height:22px;border:0px #C0C0C0 solid;background-color:#FFFFE0;color:#A52A00;font-family:'Gill Sans MT Condensed';font-size:16px;z-index:10" name="email" value="">
<input type="text" id="Editbox6" style="position:absolute;left:102px;top:136px;width:185px;height:22px;border:0px #C0C0C0 solid;background-color:#FFFFE0;color:#A52A00;font-family:'Gill Sans MT Condensed';font-size:16px;z-index:11" name="tel" value="">
<textarea name="comentario" id="TextArea2" style="position:absolute;left:314px;top:53px;width:200px;height:105px;border:0px #C0C0C0 solid;background-color:#FFFFE0;color:#A52A00;font-family:'Gill Sans MT Condensed';font-size:16px;z-index:12" rows="4" cols="33"></textarea>
</form>
</div>

<div id="bv_Text12" style="margin:0;padding:0;position:absolute;left:3px;top:1065px;width:1115px;height:14px;text-align:left;z-index:38;">
<font style="font-size:11px" color="#FFFFE0" face="Arial">*EN EL MES DE JUNIO EN EL CASO DE CONTRATAR MERIENDAS, DESAYUNOS O COMIDAS TE HACEMOS UN 10 % DE DESCUENTO EN EL TOTAL DE TU EVENTO </font></div>
</div>
</body>
</html>