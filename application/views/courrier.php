<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url().'/css/courrier.css'?>">
</head>


<body>
<div class="invoice-table">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="50%" valign="top">
        <h1>kukkea.com</h1><br/><br/>
        BOITE POSTALE 00<br />
        BELFORT CEDEX<br />
        90001 BELFORT CEDEX<br />
        TELEPHONE:000000000<br />
        FAX:0000000000<br />
    </td>
    <br/>  <br/>  <br/>  <br/>  <br/>  <br/>
    <td width="50%" align="right" valign="top"><table width="60%" border="0" cellspacing="0" cellpadding="0" class="invoice" align="right">

            <?php if ($civilite='Mr'):?>
                    <?php echo $date;?><br/><br/><br/>
                    <?php echo $codepostale;?>&nbsp;<?php echo $ville;?><br/>
                     <?echo $adresse;?><br/>
                    M <?php echo $nom; ?>&nbsp;<?php echo $prenom;?></a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <?php elseif ($civilite='Mlle'):?>
                    <?php echo $date;?><br/><br/><br/><br/><br/>
                    <?php echo $codepostale;?>&nbsp;<?php echo $ville;?><br/>
                    <?echo $adresse;?></a></li>
                      Mlle <?php echo $nom; ?>&nbsp;<?php echo $prenom;?><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

            <?php else:?>
                <?php echo $date;?><br/><br/><br/><br/><br/>
                <?php echo $codepostale;?>&nbsp;<?php echo $ville;?><br/>
                <?echo $adresse;?></a></li>
                Mme <?php echo $nom; ?>&nbsp;<?php echo $prenom;?><br/><br/><br/><br/><br/><br/><br/><br/><br/>

            <?php endif;?>

        </table></td>
</tr>
<tr>
    <td colspan="2" valign="top" height="40" style="clear:both;"></td>
</tr>
<tr>
    <div align="justify">
        Cher Utilisateur, <br/><br/>
        &nbsp; &nbsp; &nbsp;Vous recevez ce courriel Dans le cadre de votre inscription en ligne sur la plateforme kukkea.com votre site numéro 1 d'expédition et de reception de colis entre particuliers.<br/>
        &nbsp; &nbsp; &nbsp; Pour une sécurité plus accrue de vos colis, nous avons opté pour un double niveau de sécurité lors de l'inscription, une premier par mail, et une seconde par courriel ainsi donc l'équipe kukkea.com est à mesure de remonter jusqu'a l'adresse de l'expediteur, ou de l'envoyeur en cas de litige.
        <br/>
        Ce code d'activation vous permet de valider et de terminer sur www.kukkea.com votre inscription<br/><br/>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <B>CODE ACTIVATION: <?echo $codeactivation?>(valable 15 jours)</B><br/><br/>

        Lors de votre prochaine connexion, logguez-vous avez votre email et mot de passe saisi lors de votre inscription, si vous avez les bons identifiants, vous allez avoir acces à l'interface pour saisir votre code d'activation, ceci effectué, vous pourrez avoir accès à tous nos services.
        <br/><br/><br/><br/><br/><br/>

        Je vous pris de recevoir Cher Utilisateur, mes salutations distinguées<br/><br/><br/>


        Le Directeur d'agence


    </div>
</tr>
</table>
</div>
</body>
</html>
