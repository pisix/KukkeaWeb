<!-- Header -->
    <header id="header" class="skel-layers-fixed">
        <h1 id="logo" style="margin-left: -20px"><a href="<?php echo site_url();?>" style="margin-top: 40px" class="no-decoration"><img src="<?php echo base_url('images/site/logo.png')?>" height="20px" width="20px"/>Kukkea<span>.com</span></a>&nbsp;&nbsp;</a></h1>
        <nav id="nav">
            <ul style="margin-top: -10px;">

                <li ><a href="<?php echo site_url('signup/membres');?>" ><span class="glyphicon glyphicon-folder-open yellow-admin"> </span> &nbsp;&nbsp;&nbsp;&nbsp;Tableau de bord&nbsp;<span class="badge "><?php echo $number_annonce_user_connecte;?></span> </a> </li>
                <li> <a href="<?php echo site_url('annonce/newannonce')?>" title="Publier une annonce" ><span class="glyphicon glyphicon-plus green"></span> Publier une annonce</a></li>
                <li> <a  title="Mon profil"  href="<?php echo site_url('account/editprofil/'.$iduser)?>"><span class="glyphicon glyphicon-user red"></span> Mon profil</a></li>

                <li class="submenu">
                    <a href="#">
                            Les annonces </a>
                        <ul >
                            <li> <a  title="Voir toutes les annonces d'expéditions"  href="<?php echo site_url('/annonce/envoi')?>"><span class="glyphicon glyphicon-send"></span> Toutes les Expditions</a></li>
                            <li class="divider"></li>
                            <li> <a  title="Voir toutes les annonces de transport"  href="<?php echo site_url('/annonce/transport')?>"><span class="glyphicon glyphicon-plane"></span> Tous les Transports</a></li>

                        </ul>
                    </li>
                </li>

                <li class="submenu">
                    <?php foreach($user_connecte_info as $u):?>
                        <a href="#">
                            <img style="display: inline-block; margin-top: -15px" class="img-rounded img-responsive" width="30px" height="30px"  src="<?php echo base_url();?>images/thumbs/<?php echo $u->CHEMINPHOTO;?>" alt="<?php echo $u->NOMUSER;?>"/>
                                <?php echo $u->NOMUSER .' '.$u->PRENOMUSER ?></a>
                            <ul >
                                <li><a href="<?php echo site_url().'account/editprofil/'.$iduser?>"><i class="glyphicon glyphicon-cog"></i> Profil</a></li>
                                <li class="divider"></li>
                                <li><a href="<?=site_url('auth/logout'); ?>"><i class="glyphicon glyphicon-lock"></i> Se déconnecter</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('help/contact');?>"><i class="glyphicon glyphicon-hand-up"></i> Aide</a></li>
                                <li class="submenu">
                                <!--<a href=""><i class="glyphicon glyphicon-hand-up"></i> Aide</a>
                                <ul>
                                        <li><a href="right-sidebar.html">Comment expedier un colis ?</a></li>
                                        <li><a href="no-sidebar.html">Comment transporter un colis ?</a></li>
                                </ul>
                                </li>-->
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo site_url('account/profil/'.$iduser)?>"><i class="glyphicon glyphicon-heart"></i>Les avis recus</a>
                                </li>
                            </ul>
                    <?php endforeach;?>
                </li>
            </ul>
        </nav>
    </header>
<br/>
