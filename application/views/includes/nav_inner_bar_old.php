<?php if(!$this->session->userdata('login')):?>
<!--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container-fluid" style="background-color:#339AB8;">
        <h3 ><a class="navbar-brand" style="color:white;font-family: Helvetica Neue Light; font-weight: bold;font-size: 1.1em;" href="<?php echo site_url();?>">kukkea.com</a></h3>
          <!--  <p class="navbar-text pull-right">not logged in</p>
        <a class="navbar-brand pull-right" style="color:white" href="<?=site_url('signup/login'); ?>" class="btn btn-primary"><i class="icon-lock icon-white"></i> <font color="white">Se Connecter</font></a>
    </div>

</nav>-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url();?>">Kukkea.com </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse " style="color: #ffffff" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                    <li class="page-scroll" >
                        <a href="<?=site_url('signup/login'); ?>" style="color: #ffffff; "><i class="glyphicon glyphicon-lock"></i>Connexion</a>
                    </li>
                    <li class="page-scroll" >
                        <a href="<?=site_url('signup'); ?>" style="color: #ffffff; "><i class="glyphicon glyphicon-user"></i>Inscription</a>
                    </li>
                    <li class="page-scroll" >
                        <a href="<?=site_url('annonce/newannonce'); ?>" style="color: #ffffff;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-lock"></i>Publiez votre annonce</a>
                    </li>
                </ul>
            </div>


            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container-fluid -->
    </nav>
<?php else:?>
    <?php $this->load->view('includes/navbar'); ?>
<?php endif;?>
<!--
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
           <!-- <a class="brand" href="<?=site_url('site'); ?>"><img src="<?=base_url('css/img/yourcontacts.png'); ?>"></a>
            <h3><a  class="brand" href="<?php echo site_url();?>">Bring Moi Ca</a></h3>

            <?php if(!$this->session->userdata('login')):?>
                <p class="navbar-text pull-right">not logged in</p>
            <?php else:?>
                <p>
                    <small class="pull-right"><a href="<?=site_url('signup/logout'); ?>" class="btn btn-primary"><i class="icon-road icon-white"></i> Se déconnecter</a></small>
                    <small class="navbar-text pull-right">Utilisateur: <?=anchor('signup/membres', $this->session->userdata('login')); ?> </small>
                </p>
            <?php endif;?>
       </div>
    </div>
</div>
-->
<br/>