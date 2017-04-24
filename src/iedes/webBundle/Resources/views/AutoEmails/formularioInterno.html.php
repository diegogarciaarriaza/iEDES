<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Respuesta Email</title>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
</head>
<body>

	<style>
		*{
			font-family: 'PT Sans Narrow', sans-serif;
			font-weight: 400;
                        color: black;
                        text-align: center;
                        margin: 0;
		}
                
                h1, h2, h3, h4 {
                        text-align: center;
                }

		img{
			max-width: 100%;
			height: auto;
                        margin: 0 auto;
                        text-align: center;
		}

		h1{
			
			font-size: 2em;
			padding-bottom: 20px;
		}

		h2{
			font-size: 1.8em;
                        padding-bottom: 20px;
		}

		h3{
			font-size: 1.5em;
			padding-bottom: 20px;
		}

		h4{
			font-size: 1.3em;
                        padding-bottom: 5px;
		}
                
                h6{
                        text-align: justify;
                        font-size: 0.7em;
                }

		strong{
			font-weight: 700;
		}
                
	</style>
    
        <table border="0" cellspacing="0" width="100%">
            <tr>
                <td></td>
                <td width="650">
                    <img src="http://www.iedes.com/img/mailing/cabecera.png" alt="cabecera mailing de respuesta">
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td width="650">
                    <h2>Correo interno por formulario enviado:</h2>
                    <h1><strong><?php echo $nombreformulario?></strong></h1>
                    <h3><?php echo $subtitulo?></h3>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td width="650">
                    <?php foreach ($datos as $k => $v){ 
                        if($k === 'Teléfono'){ ?>
                            <h4><strong><?php echo $k ?></strong>: <a href="tel:<?php echo $v ?>"><?php echo $v ?></a></h4>
                        <?php } else { ?>
                            <h4><strong><?php echo $k ?></strong>: <?php echo $v ?></h4>
                    <?php } 
                    }?>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td width="650">
                    <img src="http://www.iedes.com/img/mailing/pie.png" alt="cabecera mailing de respuesta">
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td width="650">
                    <h6>AVISO LEGAL<br/>
                    De conformidad con la L.O.P.D. 15/1999, le comunicamos que la información contenida en la correspondencia entre Usted y IEDES ENERGIAS S.L. forma parte de un fichero del que es Responsable dicha empresa. Asimismo le informamos de que tiene Usted la posibilidad de ejercer los derechos de acceso, rectificación y cancelación dirigiéndose por escrito a iEDES ENERGIAS S.L., con domicilio en C/ Inventor Pedro Cawley Nº17 - Puerto de Santa María (Cádiz) - 11500, o mediante e-mail en info@iedes.com. Este mensaje, su contenido y cualquier fichero transmitido con él está dirigido únicamente a su destinatario y es confidencial. Por ello, se informa a quien lo reciba por error o tenga conocimiento del mismo sin ser su destinatario, que la información contenida en él es reservada y su uso no autorizado, por lo que en tal caso le rogamos nos lo comunique por la misma vía o por teléfono (902 171 537), así como que se abstenga de reproducir el mensaje mediante cualquier medio o remitirlo o entregarlo a otra persona, procediendo a su borrado de manera inmediata. IEDES ENERGIAS S.L. se reserva las acciones legales que le correspondan contra todo tercero que acceda de forma ilegítima al contenido de cualquier mensaje externo emitido por la misma.<br/>
                    Por favor, considere su responsabilidad con el medio ambiente antes de imprimir este e-mail.
                    </h6>
                </td>
                <td></td>
            </tr>
        </table>
</body>
</html>

