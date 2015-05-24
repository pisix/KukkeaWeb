<br/><br/><br/>
<div class="col-md-1">
</div>
<div class="col-md-10" style="background-color: #233140; color: white">
        <a class="second_nav_inner_bar" style="text-decoration : none" href="<?php echo site_url('site')?>"><span style="color: white">ACCUEIL</a> &nbsp;&nbsp;&nbsp;&nbsp;|</span>&nbsp;&nbsp;&nbsp;&nbsp;
         <?php if(!$this->session->userdata('login')):?>
             <a class="second_nav_inner_bar"style="text-decoration : none" href="<?php echo site_url("annonce/newannonce")?>"><span style="color: white">DEPOSER UNE ANNONCE</a>&nbsp;&nbsp;&nbsp;&nbsp;|</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endif?>
        <a  class="second_nav_inner_bar"style="text-decoration : none" href="<?php echo site_url("annonce/envoi");?>"><span style="color: white">RECHERCHER UN EXPEDITEUR</a>&nbsp;&nbsp;&nbsp;&nbsp;|</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="second_nav_inner_bar" style="text-decoration : none" href="<?php echo site_url("annonce/transport");?>"><span style="color: white">RECHERCHER UN TRANSPORTEUR</a>&nbsp;&nbsp;&nbsp;&nbsp;|</span>&nbsp;&nbsp;&nbsp;&nbsp;
       <!-- <?php echo anchor('annonce','MES ANNONCES ');?>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:blue">|</span>&nbsp;&nbsp;&nbsp;&nbsp;-->
        <a  class="second_nav_inner_bar" style="text-decoration : none" href="<?php echo site_url("signup/membres");?>"><span style="color: white">MON COMPTE</a>&nbsp;&nbsp;&nbsp;&nbsp;|</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="second_nav_inner_bar" style="text-decoration : none" href="<?php echo site_url("help/contact")?>"><span style="color: white">AIDE</span></a>


</div>
<div class="col-md-1">
</div>