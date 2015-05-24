
<br>
<nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url();?>">Kukkea.com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left navbar-link ">
                <?php if(isset($statut_confirm_by_courrier) && isset($number_annonce)):?>
                    <?php if($statut_confirm_by_courrier=='false'): ?>
                            <li> <blink><?=anchor('signup/confirmation', " Activer votre compte",array('class' => 'blink_me','style'=>"color:white;")); ?></blink></li>
                    <?php endif;?>
                <?php endif;?>
                <li><a href="<?php echo site_url('signup/membres');?>" style="color: #ffffff;">Tableau de bord</a> </li>

                <?php if(isset($statut_confirm_by_courrier)&& isset($number_annonce)):?>
                    <?php if($statut_confirm_by_courrier=='true'): ?>
                        <li ><?=anchor('annonce/newannonce', 'Publier une annonce',array('title'=>'Mes annonces','style'=>"color:white;",'class'=>'col-md-offset-1')); ?></li>
                    <?php elseif($statut_confirm_by_courrier=='false' && $number_annonce<1):?>
                            <li ><?=anchor('annonce/newannonce', 'Publier une annonce',array('title'=>'Mes annonces','style'=>"color:white;",'class'=>'col-md-offset-1')); ?></li>
                    <?php else:?>
                            <li ><?=anchor('annonce/newannonce', 'Publier une annonce',array('title'=>'Mes annonces','disabled'=>"true",'style'=>"color:white;",'onclick'=>"alert('Vous avez depassé le nombre dannonce autorisé sans avoir verifié votre adresse de résidence. Veuillez activez votre compte en cliquant sur le lien en surbrillance sur la gauche. Merci!');return false;",'class'=>'col-md-offset-1')); ?></li>
                    <?php endif;?>
                <?php else:?>
                    <li ><?=anchor('annonce/newannonce', 'Publier une annonce',array('title'=>'Mes annonces','style'=>"color:white;",'class'=>'col-md-offset-1')); ?></li>
                <?php endif;?>
                <!--<li id="nav-profil"><?=anchor("account/editprofil/".encryptor('encryp',$iduser), 'Mon Profil',array('style'=>"color:white;",'class'=>'col-md-offset-1')); ?></li>-->
                <li id="nav-profil"> <a class="col-md-offset-1" style="color: white;" href="<?php echo site_url('account/editprofil/'.encryptor('encrypt',$iduser))?>">Mon Profil</a></li>

            </ul>
            <!--<ul class="nav navbar-nav navbar-left">
                <li class="dropdown"><a href="#" style="color: #ffffff" class="dropdown-toggle" data-toggle="dropdown">
                        Messages<span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('')?>"><i class="glyphicon glyphicon-question-sign"></i>Questions Publiques</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php site_url(''); ?>"><i class="glyphicon glyphicon-envelope"></i>Messages Privés</a></li>
                     </ul>
                </li>
            </ul>-->

            <ul class="nav navbar-nav navbar-right">
                <?php foreach($user_info as $u):?>
                    <li class="dropdown"><a href="#" style="margin-left: -250px; color: #ffffff;white-space: nowrap;display: inline-block;" class="dropdown-toggle" data-toggle="dropdown"> <img style="white-space: nowrap;display: inline-block;" class="img-rounded img-responsive" width="40px" height="40px"  src="<?php echo base_url();?>images/thumbs/<?php echo $u->CHEMINPHOTO;?>" alt="<?php echo $u->NOMUSER;?>"/>
                            <?php echo $this->session->userdata('login'); ?><span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url().'account/editprofil/'.encryptor('encrypt',$iduser)?>"><i class="glyphicon glyphicon-cog"></i> Profil</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=site_url('signup/logout'); ?>"><i class="glyphicon glyphicon-lock"></i> Se déconnecter</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('help/contact');?>"><i class="glyphicon glyphicon-hand-up"></i> Aide</a></li>
                            <li class="divider"></li>
                            <li>
                                    <a href="<?php echo site_url('account/profil/'. encryptor('encrypt',$iduser))?>"><i class="glyphicon glyphicon-heart"></i>Les avis recus</a>
                            </li>
                        </ul>
                    </li>
                <?php endforeach;?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>