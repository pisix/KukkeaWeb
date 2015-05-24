<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <br/>
    <br/>
    <div class="col-md-1"></div>
    <div class="col-md-4" style="background-color: #ffffff">
        <div class="col-md-10">

            <h4>Vérifications</h4>
            <span style="color:#006400"> <span class="glyphicon glyphicon-envelope"></span> 	<a href="#" style="text-decoration: none; color: #2A642A; cursor:text;" data-toggle="tooltip" data-placement="top" data-html="true" title="Nous avons verififé que l'adresse email indiquée par ce membre permet existe bien">Email vérifiée</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok blue"></span><br/>
            <?php if($statut_confirm_by_phone=='true'): ?>
                <span style="color:#006400"><span class="glyphicon glyphicon-phone"></span>	<a href="#" style="text-decoration: none; color: #2A642A; cursor:text;" data-toggle="tooltip" data-placement="top" data-html="true" title="Nous avons verififé que le numéro de téléphone renseigné par ce membre permet bien de le joindre">Téléphone vérifié</a></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok blue"></span><br/>
            <?php else:?>
                <span style="color:#006400"><span class="glyphicon glyphicon-phone"></span>	<a href="#" style="text-decoration: none; color: #2A642A; cursor:text;" data-toggle="tooltip" data-placement="top" data-html="true" title="Nous avons verififé que le numéro de téléphone renseigné par ce membre permet bien de le joindre">Téléphone vérifié</a></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove red"></span><br/>
                <!-- <span class="tooltip-info"  title="Hello, I'm dangerous">
                 Hover here to see tooltip!
             </span>-->
            <?php endif;?>
        </div>
        <div class="col-md-10" >
            <hr class="bs-docs-separator">
        </div>
        <div class="col-md-10">
            <h4>Activité</h4>
            <span style="color:#006400"><span class="icon-globe"></span>Annonces publiées: <?php echo $number_annonce_user_profil;?><br/></span>
            <?php foreach($user_profil_info as $u):?>
            <span style="color:#006400"><span class="icon-lock"></span>Dernière connexion: <?php echo strftime("%A %d %B à %Hh%M",strtotime($u->DERNIERECONNEXION));?><br/></span>
           <span style="color:#006400"><span class="icon-calendar"></span>Date d'inscription:

               <?php
               echo strftime("%d %B %Y",strtotime($u->DATEINSCRIPTION));
               ?>
               <?php endforeach;?> </span><br/><br/>
        </div>
    </div>
    <div class="col-md-6" style="background-color: #ffffff; margin-left: 50px" >
        <?php foreach($user_profil_info as $u):?>
            <div class="col-md-3" >
                <img  alt="image" style="text-align: right" width="150px" height="150px" class="img-rounded"  src="<?php echo base_url();?>images/thumbs/<?php echo $u->CHEMINPHOTO;?>" alt=<?php echo $u->NOMUSER;?>"/>
            </div>
            <div class="col-md-4" style="margin-left: 10px;">
                <address>
                    <strong>
                        <?php foreach($user_profil_info as $u):?>
                            <span style="color:#233140">
                                  <?php echo $u->PRENOMUSER;?> &nbsp;<?php echo $u->NOMUSER[0]; ?><br/>
                            </span>
                            <span>
                                   <?php echo $u->VILLEUSER ?>, <?php  echo $u->PAYSUSER ?><br/>

                            </span>
                        <?php endforeach;?>
                    </strong>
                    <strong>
                      <span style="color:#233140">
                        <?php echo $age_user_profil . ' Ans'?>
                       </span>
                    </strong>
                    <br/>
                    <span class="label label-primary"><?php echo $experience?></span>

                </address>
                <b>Moyenne:</b><span class="glyphicon glyphicon-star yellow"></span> <span style="color:#5f9ea0" style="font-weight: bold;"><?php echo $average_avis;?></span> <span style="color:#a9a9a9"> </br> <?php echo $nombre_avis. ' Avis';?> </span>
            </div>
        <?php endforeach;?>
        <div class="col-md-12" >
            <div class="page-header" style="background-color: #313334; margin-top: 20px;" >
                <span style="color:white" style="text-align: center"><h4>Avis recus</h4></span>
            </div>

            <?php if(isset($avis)):?>
            <?php foreach($avis as $a):?>
            <div class="tsc_clean_comment">
                <div class="avatar_box">  <img class="img-rounded" style="width: 52px;height: 52px" src="<?php echo base_url();?>images/thumbs/<?php echo $a->CHEMINPHOTO;?>" alt="<?php echo $a->NOMUSER;?>" />
                </div>
                <div class="comment_box fr">
                    <span><?php echo $a->PRENOMUSER?> <?php echo $a->NOMUSER[0];?></span>
                    <?php if ($a->NOTE==1 || $a->NOTE==0):?>
                        <span class="label label-danger">Mauvais</span>
                    <?php elseif($a->NOTE==2):?>
                        <span class="label label-warning">Moyen</span>
                    <?php elseif($a->NOTE==3):?>
                        <span class="label label-info">Bien</span>
                    <?php elseif($a->NOTE==4):?>
                        <span class="label label-primary">Très Bien</span>
                    <?php else:?>
                        <span class="label label-success">Excellent</span>
                    <?php endif;?>
                    <p class="comment_paragraph" contenteditable="true"><?php echo $a->CONTENU; ?>.</p>
                    <a href="#" class="reply"></a> <span class="date"> <?php echo strftime("%A %d %B %Y",strtotime($a->DATEAJOUTAVIS));?></span> </div>
                <div class="tsc_clear"></div>
            </div>
                <?php endforeach?>
            <?php else:?>
                <p>Aucun avis pour ce membre</p>
            <?php endif;?>
         </div>
    </div>
    <div class="col-md-1"></div>
</div>
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>


<script>
    $(document).ready(function() {
        $('.content').fadeIn(1000);
        $('.carousel').carousel();
        $("#annonceForm").validationEngine('attach');
        $('#dp3').datepicker();
        $('#dp4').datepicker();
        $('#loading').hide();


    });
</script>


