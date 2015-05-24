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
                        <h1 style="font-size:22px;font-weight:normal;line-height:22px;margin:0 0 11px 0">Bonjour <?php echo $prenom?>, </h1><br/>
                        <p style="font-size:12px;line-height:16px;margin:0 0 16px 0">

                            Merci de vous être inscrit sur Kukkea! Avant de commencer vous devez valider votre adresse email en cliquant sur le lien ci-dessous. <a href="<?php echo site_url().'account/activate/'.$confirm_inscription_by_mail;?>"> Activer votre compte </a><br/><br/>
                        <p style="font-size:12px;line-height:16px;margin:0">
                            Cordialement,<br/><br/>

                            L'équipe Kukkea<br/>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#EAEAEA" align="center" style="background:#dcdcdc;text-align:center">
                        <center>
                            <p style="font-size:12px;margin:0">
                                Nous vous remercions de votre inscription sur
                                <strong>Kukkea</strong>
                            </p>
                        </center>
                    </td>
                </tr>
                </tbody>
            </table>
</body>
</html>