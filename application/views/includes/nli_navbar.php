<?php if(!$this->session->userdata('login')):?>
<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><a href="<?php echo site_url();?>">kukkea</a></h3>
                <p class="navbar-text pull-right">not logged in</p>
                <!--<p>
                    <small class="pull-right"><a href="<?=site_url('signup/logout'); ?>" class="btn btn-primary"><i class="icon-road icon-white"></i> Se déconnecter</a></small>
                    <small class="navbar-text pull-right">Utilisateur: <?=anchor('signup/membres', $this->session->userdata('login')); ?> </small>
                </p>-->

        </div>
    </div>
</div>
<?php else:?>
    <?php $this->load->view('includes/navbar'); ?>
<?php endif;?>

