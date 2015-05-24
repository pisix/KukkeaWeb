<html>
<meta charset="UTF-8">
<head>
    <title>Accueil Bring moi ca</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css"/>
</head>
<body>
    <div id="content">
        <h1><?php echo $heading;?></h1>
        <?php
        if($rows !=null):
        echo form_open('site/update/'.$rows->NUMANNONCE);
        ?>
        <input type="text" name="titre" value="<?php echo $rows->TITREANNONCE?>"/>
        <?php echo form_error('titre','<span class="error">','</span>'); ?>
        <textarea name="contenu"><?php echo $rows->CONTENUANNONCE; ?></textarea>
        <?php echo form_error('contenu','<span class="error">','</span>'); ?>

        <input type="submit" value="Modifier">

        <?php endif ?>


    </div>

</body>
</html>