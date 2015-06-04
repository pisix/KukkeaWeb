<!-- Header -->

<header id="header" class="skel-layers-fixed">
    <h1 id="logo"><a href="<?php echo site_url();?>" style="margin-top: 40px" class="no-decoration"><img src="<?php echo base_url('images/site/logo.png')?>" height="20px" width="20px"/>Kukkea<span>.com</span></a></h1>
    <nav id="nav">
        <ul>
            <li><a href="<?=site_url('auth/login'); ?>" >Connexion</a></li>
            <li><a href="<?=site_url('signup'); ?>">Inscription</a></li>
            <li class="submenu">
                <a href="">Aide</a>
                <ul>
                    <li><a href="<?php echo site_url('help/creercompte')?>">Comment creer mon compte ?</a></li>
                    <li><a href="<?php echo site_url('help/expediercolis')?>">Comment expedier un colis ?</a></li>
                    <li><a href="<?php echo site_url('help/transportercolis')?>">Comment transporter un colis ?</a></li>
                    <li><a href="<?php echo site_url('help/transportercolis')?>">Combien dois-je payer pour expédier un colis ?</a></li>
                    <li><a href="<?php echo site_url('help/transportercolis')?>">Qu'est-ce qu'une identification vérifiée ?</a></li>
                    <li><a href="<?php echo site_url('help/motdepasseoublie')?>">Mot de passe oublié ?</a></li>
                    <li><a href="<?php echo site_url('help/contact')?>">Contact</a></li>
                    <li><a href="<?php echo site_url('help')?>">Voir toutes les FAQ</a></li>
                </ul>
            </li>
            <li><a href="<?=site_url('annonce/newannonce'); ?>" class="button special">Publier votre annonce</a></li>
        </ul>
    </nav>
</header>

