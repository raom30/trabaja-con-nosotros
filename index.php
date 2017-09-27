<?php
require("class.phpmailer.php");
session_start();
    $msg = "";
    if ($_POST['action'] == "send") {
        $Message = "";

		$varname = $_FILES['Adjunto']['name'];
    	$vartemp = $_FILES['Adjunto']['tmp_name'];
		
		$mail = new PHPMailer();
		$mail->Host = "mail.hogarium.es";
		$mail->From = $_POST['re_eMail'];
		$mail->FromName = $_POST['Nombre'];
		$mail->Subject = $_POST['Asunto'];
		$mail->AddAddress($_POST['Recipiente']);
		$mail->AddCC($_POST['CopiaA']);
		if ($varname != "") {
			$mail->AddAttachment($vartemp, $varname);
		}
		$link = "http://".$_SERVER['SERVER_NAME'];
		$body = "<font face=Arial, Helvetica, sans-serif size=2 color=#333333><strong>Datos de Informaci&oacute;n en Contacto:</strong></font><br><br><hr width=450px align=left><br><font face=Arial, Helvetica, sans-serif size=2><strong>Nombre:</strong> ".$_POST['Nombre']."<br><strong>Apellidos:</strong> ".$_POST['Direccion']."<br><strong>Tel&eacute;fono:</strong> ".$_POST['Telefono']."<br><strong>Correo Electr&oacute;nico:</strong> ".$_POST['re_eMail']."<br><strong>Tipo de Perfil:</strong> ".$_POST['perfil']."<br><strong>¿Que aportaria usted a la empresa?</strong> ".$_POST['Comentarios']."</font><p></p>";
	$body.= "<p><font face=Arial, Helvetica, sans-serif size=2>Mi Empresa<br><strong>slogan de la empresa</strong></font><br><i><a href='$link/' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#333333; text-decoration:none;'>$link/</a></i></p>";
		
	$mail->Body = $body;
	$mail->IsHTML(true);
	$mail->Send();
	
    header("Location: $link/guardar/gracias.php");
    exit;
	

}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trabaja con Nosotros</title>
<script language="javascript1.2">

var filtro  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

function validar(){

var datos = document.contactenos;
var archivo = datos.Adjunto.value;
var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();

if(datos.Nombre.value=="")
{
 alert('Se requiere que llene el siguiente campo(s) para poder completar su envio:');
 datos.Nombre.focus();
 datos.Nombre.value="";
 return false;
}

if(datos.Direccion.value=="")
{
 alert('Se requiere que llene el siguiente campo(s) para poder completar su envio:');
 datos.Direccion.focus();
 datos.Direccion.value="";
 return false;
}

if(datos.Telefono.value=="")
{
 alert('Se requiere que llene el siguiente campo(s) para poder completar su envio:');
 datos.Telefono.focus();
 datos.Telefono.value="";
 return false;
}

if(datos.re_eMail.value=="")
{
 alert('Se requiere que llene el siguiente campo con una direccion de email valida para poder completar su envio:');
 datos.re_eMail.focus();
 datos.re_eMail.value="";
 return false;
}

if (!filtro.test(datos.re_eMail.value)){

        alert("Su direccion de email es incorrecta");

        return false;

    }

if(datos.Comentarios.value=="")
{
 alert('Se requiere que llene el siguiente campo(s) para poder completar su envio:');
 datos.Comentarios.focus();
 datos.Comentarios.value="";
 return false;
}

if(datos.Adjunto.value=="")
{
 alert('Se requiere de un archivo valido para poder completar su envio:');
 datos.Adjunto.focus();
 datos.Adjunto.value="";
 return false;
}

if (extension==".doc")
{
 datos.Adjunto.focus()
 return true;
}
else
{
alert('Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: .doc')
datos.Adjunto.value="";
return false;
}

return true;

}

</script>
<link href="css.css" rel="stylesheet" type="text/css">
<link href="animate.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
 <link rel="shortcut icon" href="favicon.png">
</head>
<body>
<img style="position: absolute; margin: 0px; padding: 0px; border: medium none; width: 1903px; height: 1268.67px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -34.3333px;" src="bg.jpg">
      <div class="c-form-container section-container section-container-image-bg">
               <div class="container">
                  <div class="row">
	                <div class="col-sm-8 col-sm-offset-2 c-form section-description wow fadeIn">
				  <h1>Trabaja con Nosotros <strong>Hogarium</strong></h1>
				  </div>
				  </div>
				  
				  <div class="row">
	            	<div class="col-sm-6 col-sm-offset-3 c-form-box wow fadeInUp">
					  <div class="c-form-bottom">
                  <form   action="index.php" method="post" enctype="multipart/form-data" name="contactanos">
                  <input type="hidden" name="Recipiente" value="webmaster@hogarium.es" />
                  <input type="hidden" name="Asunto" value="Curriculum" />
                   
                      <div class="form-group">
                        <label ><span class="label-text">Nombre:</span></label>
                        <input name="Nombre" type="text" placeholder="Su Nombre..." class="c-form-name form-control" id="Nombre"  required />
                      </div>
					  <div class="form-group">
                        <label ><span class="label-text">Apellidos:</span></label>
                        <input name="Direccion" type="text" placeholder="Sus Apellidos..." class="c-form-name form-control" id="Direccion" required/>
                      </div>
					  <div class="form-group">
                        <label ><span class="label-text">Tel&eacute;fono:</span></label>
                        <input name="Telefono" type="text" placeholder="Su Telefono..." class="c-form-name form-control" id="Telefono" required/>
                      </div>
					  <div class="form-group">
                        <label ><span class="label-text">E-mail:</span></label>
                       <input name="re_eMail" type="text" placeholder="Su email..." class="c-form-name form-control" id="re_eMail" required/>
                      </div>
					  <!---    -->
					  <div class="form-group">
                        <label ><span class="label-text">Perfil Profesional:</span></label>
                        
							<select name="perfil" class="c-form-name form-control" id="perfil"> 
									<option>Encargado/Dependiente de Comercio</option>
									<option>Administrativo/Aux Administrativo</option>
									<option>Comercial</option>
									<option>Conductor</option>
									<option>Personal de Almacén</option>
									<option>Operaciones/Logistica</option>
									<option>Producción/Fabricación</option>
									<option>Recursos Humanos</option>
									<option>Atención al cliente</option>
									<option>Diseñador Grafico</option>
									
									</select>
						
					    <!---    -->
                     </div>
					 <div class="form-group">
                        <label ><span class="label-text">¿Qué puedes aportar a nuestra empresa?:</span></label>
                        <textarea name="Comentarios" placeholder="Escriba aquí su texto..." class="c-form-name form-control" id="Comentarios" required ></textarea>
                    </div>
					<div class="form-group">
                        <label><span class="label-text">Mandanos tu Curriculum:</span></label>
                        <input name="Adjunto" type="file" class="c-form-name form-control" id="Adjunto" required />
                     </div>
                       
					   
					   </div>
					   </div>
					   </div>
                        <?php
	
						if(!empty($Message)) {
						echo $Message; 
						}
						 
						 ?>
                     
                        &nbsp;
                        <input name="btsend" type="submit" class="w3-bar-item w3-button w3-red" onClick="return validar();" value="Enviar" />
                          &nbsp;
                          <input type="reset" name="Borrar" class="w3-bar-item w3-button w3-teal" value="Borrar" />
                          <input type="hidden" name="action" value="send" />
                      
                    </form>
              </div>
           </div>
</body>
</html>