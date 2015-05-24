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
                        <h1 style="font-size:22px;font-weight:normal;line-height:22px;margin:0 0 11px 0">Bonjour Cher(e) utilisateur, </h1><br/>
                        <p style="font-size:12px;line-height:16px;margin:0 0 16px 0">
                            Vous avez recu un message de <?php echo $email?>, message relatif à votre annonce dont l'intitulé est: <strong><?php echo $titreannonce ?></strong>  sur Kukkea <br/>
                        </p>
                        Voici son message:
                        <p style="border:1px solid #e0e0e0;font-size:12px;line-height:16px;margin:0;padding:13px 18px;background:#f9f9f9">
                            <br>
                            <?php echo $message?>
                        </p>
                        <br>
                        <?php if($telephone !=null):?>
                            <p style="font-size:12px;line-height:16px;margin:0">
                                Vous pouvez  directement le contacter à son numéro de téléphone ci-après <strong> <?php echo $telephone?> </strong>
                            </p>
                        <?php endif;?>

                    </td>
                </tr>
                <tr>
                    <td bgcolor="#EAEAEA" align="center" style="background:#dcdcdc;text-align:center">
                        <center>
                            <p style="font-size:12px;margin:0">
                                Nous vous remercions pour votre activité  sur
                                <strong>Kukkea</strong>
                            </p>
                        </center>
                    </td>
                </tr>
                </tbody>
            </table>
</body>
</html>