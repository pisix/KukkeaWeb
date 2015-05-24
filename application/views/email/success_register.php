<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body>
<body>

<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
    <tr>
        <td valign="top" align="center" style="padding:20px 0 20px 0">
            <table width="650" cellspacing="0" cellpadding="10" border="0" bgcolor="FFFFFF" style="border:1px solid #e0e0e0">
                <tbody>
                <tr>
                    <td style="text-align: center;float: center"><img src="<?php echo base_url('images/site/logo.png')?>" width="100px" height="100px"/></td>
                </tr>

                <tr>
                    <td valign="top">
                        <h1 style="font-size:22px;font-weight:normal;line-height:22px;margin:0 0 11px 0">Cher (e) <?php echo $nom .' '.$prenom?>, </h1><br/>
                        <p style="font-size:12px;line-height:16px;margin:0 0 16px 0">
                            <span class="il">Bienvenue chez vous, <br/></span>
                           Pour vous connecter lors de vos visites sur notre site, cliquez sur
                            <a target="_blank" style="color:#1e7ec8" href="<?php echo site_url("signup/login");?>">Connexion</a>
                            ou bien
                            <a target="_blank" style="color:#1e7ec8" href="<?php echo site_url("signup/membres")?>">Mon Compte </a>
                            au haut de chaque page, puis entrez votre adresse e-mail et votre mot de passe.
                        </p>
                        <p style="border:1px solid #e0e0e0;font-size:12px;line-height:16px;margin:0;padding:13px 18px;background:#f9f9f9">
                            Utilisez les valeurs suivantes lorsque vous êtes invité à vous connecter :
                            <br>
                            <strong>Email</strong>
                            :
                            <a target="_blank" href="mailto:<?php echo $email?>"><?php echo $email?></a>
                            <br>
                            <strong>Mot de passe</strong>
                            :vous seule le connaissez !
                        </p>
                        <br>
                        <p style="font-size:12px;line-height:16px;margin:0 0 8px 0">En vous connectant à votre compte, vous pourrez :</p>
                        <ul style="font-size:12px;line-height:16px;margin:0 0 16px 0;padding:0">
                            <li style="list-style:disc inside;padding:0 0 0 10px"> Publier des annonces</li>
                            <li style="list-style:disc inside;padding:0 0 0 10px"> Contactez un expéditeur ou un transporteur</li>
                            <li style="list-style:disc inside;padding:0 0 0 10px"> Consulter vos anciennes annonces</li>
                            <li style="list-style:disc inside;padding:0 0 0 10px"> Modifier les informations de votre compte</li>
                            <li style="list-style:disc inside;padding:0 0 0 10px"> Modifier votre mot de passe</li>
                        </ul>
                        <p style="font-size:12px;line-height:16px;margin:0">
                            Si vous avez des questions concernant votre compte ou toutes autres questions, n'hésitez pas à nous écrire à l'adresse suivante
                            <a target="_blank" style="color:#1e7ec8" href="mailto:contact@kukkea.com">contact@kukkea.com</a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#EAEAEA" align="center" style="background:#dcdcdc;text-align:center">
                        <center>
                            <p style="font-size:12px;margin:0">
                                Nous vous remercions de votre inscription  sur
                                <strong>Kukkea</strong>
                            </p>
                        </center>
                    </td>
                </tr>
                </tbody>
            </table>
</body>
</html>