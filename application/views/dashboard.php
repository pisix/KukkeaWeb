<div class="span15">
    <?php foreach($user_info as $u):?>
        <div class="well" style="margin-left: -10px;height: 55px; background-color: #F1F1E9;">
            <div class="span2" >
                <img style="text-align: right;" width="70px" height="70px" class="img-rounded"  src="<?php echo base_url();?>images/thumbs/<?php echo $u->CHEMINPHOTO;?>" alt="<?php echo $u->NOMUSER;?>"/>
            </div>
            <div class="span3" style="margin-left: -20px; font-family: Georgia;">
                <b>Bonjour, <?php echo $u->PRENOMUSER?></b><br/>
                 <i class="icon-arrow-right"></i><a href="<?php echo site_url().'account/editprofil/'.$u->NUMUSER?>">Modifier votre profil</a>
            </div>
        </div>
        <div class="content" style="width:200px;">
            <div class="row">
                <div class="span5">
                    <h4>Vérifications</h4>
                    <span class="icon-"></span><span style="color:#006400">Téléphone vérifié</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon-ok "></span><br/>
                    <br/><span style="color:#006400"> <span class="icon-envelope"></span> Email vérifié</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon-ok "></span><br/>
                    <br/><span style="color:#006400"><span class="icon-home"></span> Boite postale</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon-ok "></span>
                </div>
                <div class="span4" style="margin-left: 15px;">
                    <hr class="bs-docs-separator">
                </div>
                <div class="span6">
                    <h4>Activité</h4>
                    <span style="color:#006400"><span class="icon-globe"></span>Annonces publiées: <?php echo $number_annonce;?><br/></span>
                    <br/><span style="color:#006400"><span class="icon-lock"></span>Dernière connexion:<br/></span>
                   <br/> <span style="color:#006400"><span class="icon-calendar"></span>Date d'inscription:
                        <?php foreach($user_info as $u):?>
                            <?php
                            echo strftime("%d %B %Y",strtotime($u->DATEINSCRIPTION));
                            ?>
                        <?php endforeach;?> </span>
                </div>
            </div>
        </div>
        <div class="content span12" style="margin-top: -407px; margin-left: 245px; width: 600px;">
            <span  style="background-image: url(<?php echo base_url().'images/site/icon-pin-depart.png';?>); background-repeat:no-repeat;" >
                 <h3>Nouveaux messages(0)</h3>
            </span>
            <div class="span10" style="margin-left: 15px;">
                <hr class="bs-docs-separator">
            </div>

        </div>

    <?php endforeach?>
</div>
