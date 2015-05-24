<?php //$this->load->view('includes/header'); ?>
<?php //$this->load->view('includes/menu_page_no_log'); ?>
<?php $this->load->view('includes/analyticstracking'); ?>
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
<!-- <ul class="breadcrumb" style="width: 900px;margin-left: 160px;">
     <li><a href="#">Home</a> <span class="divider">>></span></li>
     <li><a href="#">Library</a> <span class="divider">>></span></li>
     <li class="active">Data</li>
 </ul>-->
<br/>
<br/>

<div class="row">
    <div class="col-md-1"></div>
    <?php foreach($rows as $r):?>

    <div class="col-md-12" style="margin-top: -40px;">

        <div id="navigation_container">
            <?php if ($this->session->flashdata('avisprisencompte')):?>
                <div class="alert alert-danger" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php echo $this->session->flashdata('avisprisencompte');?>
                </div>
            <?php endif;?>
            <?php if ($this->session->flashdata('annonceenvoye')):?>
                <div class="alert alert-danger" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php echo $this->session->flashdata('annonceenvoye');?>
                </div>
            <?php endif;?>
            <div class="rectangle" style="background-color: white" >

                <header class="special-alt">
                        <?php if($r->TYPE_ANNONCE=='Envoi'):?>
                            <h5 style="text-align: center; font-size: 22px; font-weight: bold"><span > <?php echo $r->PRENOMUSER;?> &nbsp;<?php echo $r->NOMUSER[0]; ?>, aimerait envoyer  un colis pour <?php echo $r->PRIX;?> € au départ de <?php echo $r->NOMVILLEDEPART;?>&nbsp;&nbsp; pour la ville de &nbsp;&nbsp;<?php echo $r->NOMVILLEARRIVEE;?></span></h5>
                        <?php else: ?>
                            <h5  style="text-align: center;  font-size: 22px;"><span><?php echo $r->PRENOMUSER;?> &nbsp;<?php echo $r->NOMUSER[0]; ?>,  propose de transporter un colis pour <?php echo $r->PRIX;?> €, de <?php echo $r->NOMVILLEDEPART;?>à <?php echo $r->NOMVILLEARRIVEE;?></span></h5>
                        <?php endif;?>
                </header>
            </div>

        </div>
    </div>
</div>
<div class="row" style="margin-top: -80px">
<div class="col-md-1"></div>
    <div class="col-md-10" >
        <div class="col-md-12">
            <div class="col-md-7 col-md-pull-1-small" style="margin-top: -10px; background-color: #ffffff" >
                <div class="content">
                    <div class="page-header" style="background-color: #83D3C9;font-color:white; margin-bottom: 10px;margin-top: 0.7em">
                        <h4 style="color:#ffffff;font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r->NOMVILLEDEPART;?><!--, <?php echo $PAYSVILLEDEPART?>-->&nbsp;&nbsp;&nbsp;&nbsp;<span>>>>>></span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r->NOMVILLEARRIVEE;?><!--, <?php echo $PAYSVILLEARRIVEE?>-->&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-road"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--<a style="color: white; font-size: 0.8em;" href="#" onclick="show('show_map');">La carte</a>--></h4>
                    </div>
                    <div id="show_map" style="display:none;">
                        <?php //echo $map['js']; ?>
                        <?php //echo $map['html']; ?>
                        <div id="directionsDiv"></div>
                    </div>
                    <table class="table" >
                        <tbody>
                        <tr>
                            <td>Départ</td>
                            <td><img alt="depart" src="<?php echo base_url().'images/site/icon-pin-depart.png';?>"/><span style="color:black"><b><?php echo $r->NOMVILLEDEPART;?>, <?php echo $r->NOMPAYSDEPART?> </b></span></td>
                        </tr>
                        <tr>
                            <td>Arrivée</td>
                            <td><img alt="arrivee" src="<?php echo  base_url().'images/site/icon-pin-arrivee.png';?>"/><span style="color:black"><b><?php echo $r->NOMVILLEARRIVEE;?>, <?php echo $r->NOMPAYSARRIVEE?></b></span>
                            </td>
                        </tr>
                        <tr>
                            <?php if($r->TYPE_ANNONCE=='Envoi'):?>
                                <td>Date d'expédition</td>
                                <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?>
                                </td>                                <?php else: ?>
                                <td>Date de départ</td>
                                <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?>
                                </td>                                <?php endif;?>

                        </tr>
                        <tr>
                            <td>Titre</td>
                            <td><?php echo 'Transport d\'un colis';?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="well" style="height:auto;margin-top: 20px; background-color:#E4F3FE">
                        <div style=" text-align: justify;">
                            <h4><u>Détails de l'annonce:</u></h4>
                            <?php echo $r->CONTENUANNONCE;?>
                        </div>
                    </div>
                    <div style="text-align: right">
                        <span style="font-style: italic">Annonce publiée le <?php echo strftime("%d %B %Y à %Hh %M",strtotime($r->DATEAJOUTANNONCE));?></span> <!--- Vue-->
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- <div class="well" style="height: 5px; background-color: #233140;">
                         <p style="font-weight: bold; margin-top: -10px; color: #ffffff">Questions publiques ()</p>
                     </div>-->

                    <div>
                        <!--<a href="<?=site_url('#'); ?>" class="inline  btn btn-info "><i class="glyphicon glyphicon-arrow-right"></i> SAUVEGARDER L'ANNONCE</a>-->
                        <a  href="#myModal" role="button"  data-toggle="modal" class="btn btn-info "><i class="glyphicon glyphicon-arrow-right"></i> CONSEILLER L'ANNONCE A UN AMI</a>
                        <div class="fb-like" data-href="<?php site_url('annonce/showannonce/').encryptor('encrypt',$r->NUMANNONCE)?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    </div>

                    <!-- Modal Box-->

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 150px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                    <h4 class="modal-title" id="myModalLabel">CONSEILLER L'ANNONCE A UN AMI(E)</h4>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $attributes = array('class'=>'modal-box-form ','id' => 'modal-box-form');

                                    echo form_open('annonce/send_annonce_to_friend', $attributes);
                                    ?>
                                    <input type="hidden" value="<?php echo $r->NUMANNONCE?>" name="idannonce"/>
                                    <input placeholder="votre adresse email" class="validate[required,custom[email]]" type="text" name="email" id="email" />
                                    <input placeholder="L'adresse email de votre ami(e)" class="validate[required,custom[email]]" type="text" name="emailfriend" id="date" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <div class="col-md-5 border-b-none " style="margin-top: -10px; background-color: #ffffff" >
      <div class="sidebar">
            <section>
                <div class="page-header" style="background-color: #313334;margin: 3%">
                    <span style="color:#C93634; font-weight: bold"><h3 style="color:#ffffff;font-weight: bold"><?php echo $r->PRIX; ?> €</h3></span>
                    <?php if($r->TYPE_ANNONCE=='Envoi'):?>
                        <span style="color:#C93634"><h4 style="color:#ffffff;font-weight: bold">Poids du colis:<?php echo $r->POIDS;?> Kg</h4></span>
                    <?php else: ?>
                        <span style="color:#C93634"><h4 style="color:#ffffff;font-weight: bold">Place disponible:<?php echo $r->POIDS;?> Kg restants</h4></span>
                    <?php endif;?>
                </div>
            </section>


            <div class="row">
                    <div class="col-md-6">
                        <section>

                            <div style="margin: 7%">
                                <?php foreach($rows as $r):?>
                                    <?php if ($this->session->userdata('login')):?>
                                        <a href="<?=site_url("annonce/envoyeremail/".encryptor('encrypt',$r->NUMANNONCE))?>" class="inline  btn btn-danger "><i class="glyphicon glyphicon-envelope"></i> Envoyer un Email</a><br/><br/>
                                        <!-- <a href="#" onload="show('telephone')" class="inline  btn btn-danger"><i class="icon-arrow-right icon-white"></i> Voir le numéro de téléphone</a>-->
                                        <div id="telephone" style="display: block;">
                                            <?php if (!$r->VISUNUMEROTEL !=1):?><button class="btn btn-danger"><i class="glyphicon glyphicon-phone"></i>Téléphone: <?php echo $r->TELUSER;?></button><?php else:?><div class="col-md-12 alert alert-info">l'utilisateur ne souhaite pas communiquer son numéro de téléphone</div> <?php endif;?>
                                        </div>
                                    <?php else:?>
                                        <a href="#" onclick="show('loginbox')" class="inline  btn btn-danger "><i class="glyphicon glyphicon-envelope"></i> Envoyer un Email</a><br/><br/>
                                        <a href="#" onmouseover="show('loginbox')" class="inline  btn btn-danger"><i class="glyphicon glyphicon-phone"></i> Voir le numéro de téléphone</a>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </div>
                         </section>

                        <div id="loginbox"  style="display:none;">
                            <?php
                            $attribute=array('id'=>'formID');
                            echo form_open('signup/login',$attribute); ?>
                            <span class="alert-error">Connectez-vous pour voir le numéro ou pour envoyer un mail à l'annonceur</span><br/>
                            <input style="margin-bottom: 15px;" class="validate[required,custom[email]] text-input" type="email"  placeholder="@Adresse email" name="email" value="<?php echo set_value('email');?>" required/>
                            <input style="margin-bottom: 15px;" class="validate[required,length[6,12],custom[passwordLength]] text-input" type="password"  placeholder="Mot de passe" name="motdepasse" value="<?php  echo set_value('motdepasse');?>" required min="6"/><br/>
                            <input class="button special" value="Connexion" type="submit">

                            <?php echo form_close();?>
                            <!--<a href="<?=site_url('signup'); ?>"> S'inscrire</a>-->

                        </div>


                        <div id="telephone" style="display: none;">
                            <button class="btn btn-danger"><i class="glyphicon glyphicon-arrow-right"></i><?php echo $r->TELUSER;?></button>
                        </div>

                    </div>
            </div>
            </div>
            <div class="content col-md-12">
                <section>
                    <div class="page-header" style="background-color: #313334;font-color:white;">

                        <?php if($r->TYPE_ANNONCE=='Envoi'):?>
                            <h4 style="color:#ffffff; font-weight: bold">Expéditeur</h4>
                        <?php else: ?>
                            <h4 style="color:#ffffff; font-weight: bold">Transporteur</h4>
                        <?php endif;?>
                    </div>
                </section>

            <div class="row">
                <div class="col-md-5">

                    <img  alt="image" style="text-align: right" width="100px" height="100px" class="img-rounded"  src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>" alt="<?php echo $r->NOMUSER;?>"/><br/>
                    <span class="glyphicon glyphicon-star yellow"></span> <span style="color:#5f9ea0" style="font-weight: bold;"><?php echo $average_avis;?></span>  <span style="color:#a9a9a9"> -<?php echo $nombre_avis;?> Avis</span>
                </div>
                <div class="col-md-4 col-md-pull-2" >
                    <address>
                        <strong>
                                <span style="color:#233140">
                                      <?php echo $r->PRENOMUSER;?> &nbsp;<?php echo $r->NOMUSER[0]; ?><br/>
                                </span>
                        </strong>
                        <strong>
                            <span><?php echo $age_user_annonce . ' Ans'?></span>
                        </strong>
                        <h4><span class="col-lg-12 label label-primary"><?php echo $r->EXPERIENCE;?></span></h4>
                    </address>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <section>
                    <header>
                        <h4 style="font-weight: bold">Vérifications</h4>
                    </header>
                        <span class="glyphicon glyphicon-envelope"></span> 	<a href="#" style="text-decoration: none; color: #2A642A; cursor:text;" data-toggle="tooltip" data-placement="top" data-html="true" title="Nous avons verififé que l'adresse email indiquée par ce membre existe bien">Email vérifiée</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok blue"></span><br/>
                        <?php if($statut_confirm_by_phone=='true'): ?>
                            <span class="glyphicon glyphicon-phone"></span>	<a href="#" style="text-decoration: none; color: #2A642A; cursor:text;" data-toggle="tooltip" data-placement="top" data-html="true" title="Nous avons verififé que le numéro de téléphone renseigné par ce membre permet bien de le joindre">Téléphone vérifié</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok blue"></span><br/>
                        <?php else:?>
                            <span class="glyphicon glyphicon-phone"></span>	<a href="#" style="text-decoration: none; color: #2A642A; cursor:text;" data-toggle="tooltip" data-placement="top" data-html="true" title="Nous avons verififé que le numéro de téléphone renseigné par ce membre permet bien de le joindre">Téléphone vérifié</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove red"></span><br/>
                       <?php endif;?>
                    </section>
                </div>

                <div class="col-md-12">
                    <h4 style="font-weight: bold">Activité</h4>
                    <span class="glyphicon glyphicon-globe"></span>&nbsp;Annonces publiées: <?php echo $number_annonce_user_annonce;?><br/></font>
                    <span class="glyphicon glyphicon-log-in"></span>&nbsp;Dernière connexion: <?php echo strftime("%A %d %B à %Hh%M",strtotime($r->DERNIERECONNEXION));?><br/></font>
                    <span class="glyphicon glyphicon-calendar"></span>&nbsp;Date d'inscription:
                    <?php
                    echo strftime("%d %B %Y",strtotime($r->DATEINSCRIPTION));
                    ?>
                    </font><br/><br/>
                    <a href="<?php echo site_url('account/profil/'.encryptor('encrypt',$r->NUMUSER))?>" class="no-decoration"><span class="glyphicon glyphicon-arrow-right"></span> Voir le profil public</a>
                </div>
            </div>
            </div>

            <div class="col-md-12">
            <br/>
            <div class="row">
                <div class="page-header"  style="background-color: #313334;margin: 9%">
                    <h4 style="color:#ffffff; font-weight: bold" >Derniers avis sur le membre</h4>
                </div>
                <?php if(isset($avis)):?>
                    <?php foreach(array_slice($avis, 0, 3) as $a):?>
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
                                <p class="comment_paragraph" contenteditable="true"><?php echo $a->CONTENU;?></p>
                                <a href="#" class="reply"></a> <span class="date">
                                                                <?php echo strftime("%d %B %Y",strtotime($a->DATEAJOUTAVIS));?>
                                                            </span>
                            </div>
                            <div class="tsc_clear"></div>

                        </div>
                    <?php endforeach?>
                <?php else:?>
                    <p>Aucun avis pour ce membre</p>
                <?php endif;?>
                <br/>
                <?php if($this->session->userdata('login') && $this->session->userdata('login')!=$r->EMAILUSER && $number_avis_by_user_for_annonce==0):?>
                    <?php
                    $attributes = array('id' => 'avisForm');
                    echo form_open('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE),$attributes);
                    ?>
                    <input type="hidden" name="numannonce" value="<?php echo $r->NUMANNONCE;?>"/>
                    <input type="hidden" name="iduserannonce" value="<?php echo $r->NUMUSER;?>"/>
                    <input type="hidden" name="emailuseravis" value="<?php echo $this->session->userdata('login');?>"/>
                    <textarea class="validate[required,minSize[6],maxSize[100]]" rows="2" style="width: 200px;height: 55px" type="text" name="contenu" placeholder="Votre avis sur ce membre">
                    </textarea><br/>
                    <input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
                           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa">                                            <button class="btn btn-default">Ajouter</button>

                    <?php echo form_close();?>
                <?php endif;?>
                <?php if (isset($avis)):?>
                    <a href="<?php echo site_url('account/profil/'.encryptor('encrypt',$r->NUMUSER))?>" style="margin: 2%" class="no-decoration"><span class="glyphicon glyphicon-arrow-right"></span>Voir tous les avis</a>
                <?php endif;?>

            </div>
            </div>
        </div>
        </div>
</div>
<div class="col-md-1"></div>
</div>
<br/>

<!-- <div class="span5" style="margin-top: 115px; margin-left: 50px;" >
                    <div class="page-header" style="background-color: #1f6377;" >
                        <font color="#faebd7" style="text-align: center"><h4>Contacter l'annonceur</h4></font>
                    </div>
                    <div>
                        <?php foreach($rows as $r):?>
                        <a href="<?=site_url("annonce/envoyeremail/$r->NUMANNONCE")?>" class="inline  btn btn-danger "><i class="icon-envelope icon-white"></i> Envoyer un Email</a><br/><br/>
                        <?php endforeach; ?>
                        <a href="#" onclick="show('telephone')" class="inline  btn btn-danger"><i class="icon-arrow-right icon-white"></i> Voir le numéro de téléphone</a>
                    </div>
                    <div id="telephone" style="display: none;">
                        <button class="btn btn-danger"><i class="icon-arrow-right icon-white"></i><?php echo $r->TELUSER;?></button>
                    </div>
                </div>-->
</div>
<?php endforeach;?>
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
<script src="<?=base_url('js/star-rating.min.js'); ?>"></script>

<script>
    jQuery(document).ready(function() {
        $("#modal-box-form").validationEngine('attach');
        $("#cguForm").validationEngine('attach');
        $("#formID").validationEngine('attach');
        $("#avisForm").validationEngine('attach');
        // $('#myModal').modal('show');
        $("[data-toggle=tooltip]").tooltip();
        /*$(document.body).tooltip({ selector: "[title]" });*/


    });
</script>
<script>
    function show(ele) {
        var srcElement = document.getElementById(ele);
        if(srcElement != null) {
            if(srcElement.style.display == "block") {
                srcElement.style.display= 'none';
            }
            else {
                srcElement.style.display='block';
            }
            return false;
        }
    }
</script>
<script>
    jQuery(document).ready(function () {
        $("#input-21b").rating();
        $("#input-21c").rating();

        $("#input-21a").rating({
            starCaptions: function(val){
                if(val==1){
                    $("#note").val(val);
                    return "Mauvais";
                }else if (val==2){
                    $("#note").val(val);
                    return "Moyen";
                }else if(val==3){
                    $("#note").val(val);
                    return "Bien";
                }else if(val==4){
                    $("#note").val(val);
                    return "Très Bien";
                }else{
                    $("#note").val(val);
                    return "Excellent";
                }
            }/*,
             starCaptionClasses: function (val){
             if(val<6){
             return val;
             }else{
             return 0
             }
             }*/

        });
    });
</script>
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").alert('close');
        });

    });
</script>
