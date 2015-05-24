
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/analyticstracking'); ?>
<?php $this->load->view('includes/nav_inner_bar.php'); ?>

<div class="container-fluid">
    <?php $this->load->view('includes/second_nav_inner_bar'); ?>
    <?php $this->load->view('includes/finder');?>

    <!--<div class="span8">-->
            <div class="row">
                <!--<div class="col-md-2">
                    <ul class="nav nav-tabs nav-stacked" style="background-color: #339BB9; " >
                        <li>
                            <a href="<?php echo site_url('help/howitworks');?>" style="color:white;">Comment ça marche</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('help/experience');?>" style="color: white;/*#339BB9;*/">Niveaux d'Expérience</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('help/confident');?>" style="color: white">Confiance et sérénité</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('help/questions');?>"  style="color: white">Questions Fréquentes</a>
                        </li>
                    </ul>
                </div>-->
                <div class="col-md-7 col-md-offset-2" style="background-color: white">
                <div class="content">

                    <div class="page-header" style="background-color: #339AB8; color:white;margin-top: 1px;">
                        <h4>CREATION COMPTE</h4>
                    </div>
                    <?php //echo $titre; ?>
                    <?php if(isset($success)):?>
                        <div class="success">
                            <?php //echo $success;?>
                            <div class="row succes-message">
                                <div class="col-md-12">
                                    <div id="successMessage" class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <p><strong><?php echo $success.' Un lien de confirmation a été envoyé à votre adresse cliquez sur ce lien pour terminer votre inscription';?></p>
                                        <!--   <a href="<?=site_url('signup/login'); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i> Mon espace perso</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif(isset($error)):?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Inscription</strong> echouée!.<br/>
                                    <?php echo $error;?>
                                    <strong></strong>.
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                            <div id="form">
                            <?php
                            $attribute=array('class'=>'formular signup-form','id'=>'form-signup-id');
                            echo form_open_multipart('signup/adduser',$attribute); ?>

                            <fieldset class="signup-form" style="width: 650px;" >
                                <legend class="scheduler-border">VOS COORDONNEES</legend>
                                <dl>
                                    <label for="civilite"><span>Civilite<span style="color:red">*</span>:</span> </label>
                                    <?php echo form_error('civilite','<span class="alert-danger">','</span>');?>
                                    <select class="validate[required]" name="civilite" style="width: 100px;"  value="<?php echo set_value('civilite');?>" >
                                        <option value="" >Civilite</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mme">Mme</option>
                                        <option value="Mlle">Mlle</option>
                                    </select>
                                </dl>

                                <dl>
                                    <label for="nom"><span>Nom<span style="color:red">*</span>:</span> </label>
                                    <?php echo form_error('nom','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,length[2,50]]  text-input" type="text" name="nom" value="<?php echo set_value('nom');?>"/>
                                </dl>
                                <dl>
                                    <label for="prenom">
                                        <span>Prenom<span style="color:red">*</span>:</span></label>
                                    <?php echo form_error('prenom','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,length[2,50]]  text-input" type="text" name="prenom" value="<?php echo set_value('prenom');?>"/>

                                </dl>
                                <!--
                                <dl>
                                    <label for="pseudo"><span>Pseudonyme<span style="color:red">*</span>:</span> </label>
                                    <?php echo form_error('pseudo','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,length[2,50]]  text-input" type="text" name="pseudo" value="<?php echo set_value('pseudo');?>"/>
                                </dl>
                                -->
                                <!--<dl>

                                    <label for="pays"> <span>Pays de residence<span style="color:red">*</span>:</span> </label>

                                    <?php
                                    if($pays != null):
                                        ?>
                                        <select class="validate[required]" name="pays" value="<?php echo set_value('pays');?>" >
                                            <option value="" >Choisissez votre pays de résidence</option>
                                            <?php
                                            foreach($pays as $r):
                                                ?>
                                                <option  value="<?php echo $r->NOMPAYS ?>"><?php echo $r->NOMPAYS ?></option>
                                            <?php endforeach;
                                            ?>
                                        </select>
                                    <?php else:?>
                                        <?php echo form_error('pays','<span class="error">','</span>');?>
                                        <input class="validate[required,length[2,100] ] text-input" type="text" name="pays" value="<?php echo set_value('pays');?>"/>
                                    <?php endif;?>
                                </dl>-->
                                <dl>
                                    <label for="ville">
                                        <span>Ville de residence<span style="color:red">*</span>:</span>    </label>
                                    <?php echo form_error('ville','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,length[2,100]] text-input" type="text" name="villederesidence" id="villederesidence" onfocus="geolocate()" value="<?php echo set_value('ville');?>"/>
                                </dl>
                                <dl>
                                    <label for="adresse">
                                        <span>Adresse<span style="color:red">*</span>:</span> </label>
                                    <?php echo form_error('adresse','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,length[0,50]]  text-input" type="text" name="adresse" value="<?php echo set_value('adresse');?>"/>

                                </dl>
                                <dl>
                                    <label for="codepostal">
                                        <span>Code postal<span style="color:red">*</span>:</span></label>
                                    <?php echo form_error('codepostal','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,number,custom[onlyNumberSp],length[4,6]]  text-input" type="text" name="codepostal" value="<?php echo set_value('codepostal');?>"/>
                                </dl>
                                <!--
                                        <dl>
                                            <label for="paysorigine">
                                                <span>Pays d'origine:</span></label>
                                                    <?php
                                                    if($pays != null):
                                                        ?>
                                                    <select class="validate[optional]" name="paysorigine"   value="<?php echo set_value('paysorigine');?>" >
                                                    <option value="" >Choisissez votre pays d'origine</option>

                                                        <?php
                                                    foreach($pays as $r):
                                                        ?>
                                                        <option value="<?php echo $r->NOMPAYS ?>"><?php echo $r->NOMPAYS ?></option>
                                                    <?php endforeach;
                                                        ?>
                                                        </select>
                                                    <?php else:?>
                                                <?php //echo form_error('paysorigine','<span class="error">','</span>');?>
                                                <input class="validate[optional,length[2,50]]  text-input" type="text" name="paysorigine" value="<?php echo set_value('paysorigine');?>"/>
                                                <?php endif;?>

                                        </dl>
                                        <dl>
                                            <label for="villeorigine">
                                                <span>Ville d'origine:</span> </label>
                                                <?php //echo form_error('villeorigine','<span class="error">','</span>');?>
                                                <input class="validate[optional,length[2,50]]  text-input" type="text" name="villeorigine" value="<?php echo set_value('villeorigine');?>"/>
                                        </dl>
                                        <dl>
                                            <label for="quartierorigine">
                                                <span>Quartier d'origine:</span></label>
                                                <?php //echo form_error('quartierorigine','<span class="error">','</span>');?>
                                                <input class="validate[optional,length[2,50]]  text-input"type="text" name="quartierorigine" value="<?php echo set_value('quartierorigine');?>"/>

                                        </dl>
                                        -->
                                <dl>
                                    <label for="telephone">
                                        <span>Téléphone<span style="color:red">*</span>:</span> </label>
                                    <?php echo form_error('telephone','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,phone,custom[onlyNumberSp]] text-input" type="text" name="telephone" value="<?php echo set_value('telephone');?>"/>

                                </dl>
                                <dl>
                                    <label for="date">
                                        <span>Date de naissance<span style="color:red">*</span>: (format DD-MM-YYYY)</span></label>
                                    <input id="dp3" class="validate[required,custom[date]] text-input" data-date-format="dd-mm-yyyy" size="16" type="text" name="date" value="<?php echo set_value('date');?>">
                                    <!-- <span class="add-on"><i class="icon-th"></i></span>-->
                                </dl>
                            </fieldset>
                            <fieldset style="width: 650px;">
                                <legend class="scheduler-border">Information d'Authentification</legend>
                                <dl>
                                    <label for="email">
                                        <span>Email<span style="color:red">*</span>:</span> </label>
                                    <?php echo form_error('email','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,custom[email]] text-input" type="text" id="email" name="email" value="<?php echo set_value('email');?>"/>
                                </dl>

                                <dl>
                                    <label for="motdepasse">
                                        <span>Mot de passe<span style="color:red">*</span>:</span> </label>
                                    <?php echo form_error('motdepasse','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required,length[6,12],custom[passwordLength]] text-input" type="password" name="motdepasse" id="motdepasse" value="<?php  echo set_value('motdepasse');?>"/>
                                </dl>
                                <dl>
                                    <label for="motdepasse">
                                        <span>Confirmer Mot de passe<span style="color:red">*</span>:</span> </label>
                                    <input class="validate[required,equals[motdepasse]] text-input" type="password" name="motdepasse2" value=""/>
                                </dl>

                                <!-- <label>
                                     <span>Confirmation email<span style="color:red">*</span>: </span>
                                     <input class="validate[required,custom[email],confirm[email], custom[equals]] text-input" type="text" name="email2"  id="email2" />
                                 </label>-->

                            </fieldset>
                            <!--<fieldset>
                                        <legend class="scheduler-border">Mot de passe</legend>
                                        <label for="motdepasse">
                                            <span>Mot de passe<span style="color:red">*</span>:</span>
                                            <?php echo form_error('motdepasse','<span class="error">','</span>');?>
                                            <input class="validate[required,length[6,12],custom[passwordLength]] text-input" type="password" name="motdepasse" value="<?php  echo set_value('motdepasse');?>"/>
                                        </label>
                                        <!--<label>
                                            <span>Confirmer le Mot de passe<span style="color:red">*</span>: </span>
                                            <input class="validate[required,confirm[equals]] text-input" type="password" name="motdepasse2"  id="motdepasse2" />
                                        </label>
                                     </fieldset>-->
                            <fieldset style="width: 650px;">
                                <legend class="scheduler-border">Votre Photo</legend>

                                <dl>
                                    <label for="photo">
                                        <span>photo(Elle apparaitra lorsque vous posterez une annonce)<span style="color:red">*</span>:</span>
                                        <span>Une annonce avec photo est 7 fois plus consultée qu'une annonce sans photo. </span>
                                    </label>
                                    <!--<?php if(isset($error_upload)):?>
                                                    <div class="error"><?php echo $error_upload;?></div>
                                                <?php endif;?>-->
                                    <?php echo form_error('check_photo_error','<span class="alert-danger">','</span>');?>
                                    <input class="validate[required, custom[onlyImageFile]]" type="file" name="photo"/>

                                </dl>
                            </fieldset>
                            <fieldset style="width: 650px;">
                                <legend class="scheduler-border">Conditions</legend>
                                <dl>
                                    <div class="infos">Accepter les conditions d'utilisation, ci-dessous : <br/>en cochant la case j'accepte les <a href="<?php echo site_url('help/cgu') ?>">conditions d'utilisation</a> de ce site</div>
                                    <label>
                                        <span class="checkbox">J'accepte les conditions : </span>
                                        <input class="validate[required] checkbox" type="checkbox"  id="agree"  name="agree"/>

                                    </label>
                                </dl>
                                <dl>
                                    <div class="infos">Je souhaite recevoir des offres des partenaires du site kukkea.com susceptibles de m'intéresser</div>
                                    <label for="agreepartenaire" >
                                        <span class="checkbox">recevoir des offres des partenaires: </span>
                                        <input class="validate[optional] checkbox" type="checkbox"  value="1" id="agreepartenaire"  name="agreepartenaire"/>

                                    </label>
                                </dl>
                                <?php //echo $captcha; ?>

                                <!--<p>
                                    <label for="name">Captcha:
                                        <input id="captcha" name="captcha" type="text" />
                                    </label>
                                </p>-->
                            </fieldset>

                            <fieldset style="width: 650px;">
                                <input id="valider" class=" center-block btn-large btn-primary"   type="submit" value="S'inscrire" name="Valider"/>
                            </fieldset>


                            <?php echo form_close(); ?>
                            <?php //echo anchor('signup/login','Me Connecter');?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div >
                        <h2>Confiance</h2>
                    </div>
                    <div >
                        <img class="img-responsive" src="<?php echo base_url().'images/site/eval.png';?>" alt="Evaluation"/>
                    </div>
                    <div class=" clearfix">
                        <div >
                            <h2>Confidentialité</h2>
                        </div>
                        <div >
                            <img class="img-responsive" src="<?php echo base_url().'images/site/phone.png';?>" alt="Téléphone"/>
                        </div>
                    </div>
                    <div class=" clearfix">
                        <div >
                            <h2>Rapidité</h2>
                        </div>
                        <div >
                            <img class="img-responsive" src="<?php echo base_url().'images/site/rapidite.jpg';?>" alt="Livraison Rapide"/>
                        </div>
                    </div>
                    <div class=" clearfix">
                        <div >
                            <h2>Economique</h2>
                        </div>
                        <div >
                            <img class="img-responsive" src="<?php echo base_url().'images/site/economique.jpg';?>" alt="A petit prix"/>
                        </div>
                    </div>
                </div>
           </div>

         <!-- <div class="span3" style="margin-left: 800px; margin-top: -1450px;">
            <div class="content" style="height:10px;">
            toto
            </div>

        </div>-->
</div>
<script type="text/javascript" src="<?=base_url('js/jquery.1.8.min.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap-datepicker.js');?>"></script>
<script>
        $(document).ready(function() {
            $('.content').fadeIn(1000);
            $("#form-signup-id").validationEngine('attach');
            $('#dp3').datepicker();
        });
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places&language=fr"></script>
<script type="text/javascript">
    var placeSearch,autocomplete;
    function initialize() {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('villederesidence'), { types: [ 'geocode' ] });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            fillInAddress();
        });

    }
    function fillInAddress() {
        var place = autocomplete.getPlace();

        for (var component in component_form) {
            document.getElementById(component).value = "";
            document.getElementById(component).disabled = false;
        }

        for (var j = 0; j < place.address_components.length; j++) {
            var att = place.address_components[j].types[0];
            if (component_form[att]) {
                var val = place.address_components[j][component_form[att]];
                document.getElementById(att).value = val;
            }
        }
    }
    window.onload=initialize;
</script>
<?php $this->load->view('includes/footer'); ?>