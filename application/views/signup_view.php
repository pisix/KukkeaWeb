
<?php $this->load->view('includes/analyticstracking'); ?>
<div id="fb-root" xmlns="http://www.w3.org/1999/html"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<br/>
<br/>
<article id="main">
<section class="wrapper style4  container">
<div class="content" >
    <!--<div class="span8">-->
            <div class="row 150%">
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
                <div class="8u 12u(narrower)">
                    <div class="content">

                    <header class="special">
                        <span class="icon fa fa-user"></span>
                        <h2>Inscription</h2>
                    </header>
                        <?php //echo $titre; ?>

                                <section >

                                    <?php if ($this->session->flashdata('captchaerror')):?>
                                        <div class="alert alert-danger" id="success-alerte">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <?php echo $this->session->flashdata('captchaerror');?>
                                        </div>
                                    <?php endif;?>
                                    <?php if ($this->session->flashdata('erreurinscription')):?>
                                        <div class="alert alert-danger" id="success-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <?php echo $this->session->flashdata('erreurinscription');?>
                                        </div>
                                    <?php endif;?>

                                    <?php if ($this->session->flashdata('erreurdatabase')):?>
                                        <div class="alert alert-danger" id="success-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <?php echo $this->session->flashdata('erreurdatabase');?>
                                        </div>
                                    <?php endif;?>

                                <?php
                                $attribute=array('class'=>'formular signup-form','id'=>'form-signup-id');
                                echo form_open_multipart('signup/adduser',$attribute); ?>
                                <?php if(isset($success)):?>
                                    <div class="success">
                                        <?php //echo $success;?>
                                        <div class="row succes-message">
                                            <div class="col-md-12">
                                                <div id="successMessage" class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                    <p><strong><?php echo $success.' Un lien de confirmation a été envoyé à votre adresse de messagerie cliquez sur ce lien pour terminer votre inscription';?></p>
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

                                <fieldset class="signup-form" style="width: 650px;" >
                                    <legend class="scheduler-border" style="font-weight: bold">VOS COORDONNEES</legend>
                                    <div class="row 50%">
                                        <label  class="3u 7u(mobile)" for="civilite"><span>Civilite<span style="color:red">*</span>:</span> </label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('civilite','<span class="alert-danger">','</span>');?>
                                            <select class="validate[required]" name="civilite"  value="<?php echo set_value('civilite');?>" >
                                                <option value="" >Civilite</option>
                                                <option value="M" <?php if (set_value('civilite')=='M'): echo 'selected'; endif;?>>M</option>
                                                <option value="Mme" <?php if (set_value('civilite')=='Mme'): echo 'selected' ; endif;?>>Mme</option>
                                                <option value="Mlle" <?php if (set_value('civilite')=='Mlle'): echo 'selected'; endif;?>>Mlle</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row 50%">
                                        <label class="3u 7u(mobile)" for="nom"><span>Nom<span style="color:red">*</span>:</span> </label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('nom','<span class="alert-danger">','</span>');?>
                                            <input class="validate[required,length[2,50]]  text-input size-inscription-input "  type="text" name="nom" value="<?php echo set_value('nom');?>"/>
                                        </div>
                                    </div>
                                    <div class="row 50%">
                                        <label  class="3u 7u(mobile)" for="prenom">
                                            <span>Prenom<span style="color:red">*</span>:</span></label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('prenom','<span class="alert-danger">','</span>');?>
                                            <input class="validate[required,length[2,50]]  text-input"  type="text" name="prenom" value="<?php echo set_value('prenom');?>"/>
                                        </div>
                                    </div>

                                    <div class="row 50%">
                                        <label class="3u 7u(mobile)" for="ville">
                                            <span>Ville de residence<span style="color:red">*</span>:</span>    </label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('ville','<span class="alert-danger">','</span>');?>
                                            <input class="validate[required,length[2,100]] text-input" type="text" name="villederesidence" id="villederesidence" onfocus="geolocate()" value="<?php echo set_value('villederesidence');?>"/>
                                        </div>
                                    </div>
                                    <div class="row 50%">
                                        <label  class="3u 7u(mobile)" for="adresse">
                                            <span>Adresse:</span> </label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('adresse','<span class="alert-danger">','</span>');?>
                                            <input class="validate[length[0,50]]  text-input" type="text" name="adresse" value="<?php echo set_value('adresse');?>"/>
                                        </div>
                                    </div>
                                    <div class="row 50%">
                                        <label  class="3u 7u(mobile)" for="codepostal">
                                            <span>Code postal:</span></label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('codepostal','<span class="alert-danger">','</span>');?>
                                            <input class="validate[number,custom[onlyNumberSp],length[4,6]]  text-input" type="text" name="codepostal" value="<?php echo set_value('codepostal');?>"/>
                                        </div>
                                    </div>
                                    <div class="row 50%">
                                        <label class="3u 7u(mobile)" for="telephone">
                                            <span>Téléphone<span style="color:red">*</span>:</span> </label>
                                        <div class="2u 12u(mobile)">
                                            <?php echo form_error('indicatiftelephonique','<span class="alert-danger">','</span>');?>
                                            <input class="validate[required,custom[onlyNumberSp]] text-input" type="text" name="indicatiftelephonique" placeholder="Indice" value="<?php echo set_value('indicatiftelephonique');?>"/>

                                        </div>
                                        <div class="4u 12u(mobile)">
                                            <?php echo form_error('telephone','<span class="alert-danger">','</span>');?>
                                            <input class="validate[required,phone,custom[onlyNumberSp]] text-input" type="text" name="telephone" placeholder="606060606" value="<?php echo set_value('telephone');?>"/>
                                        </div>
                                        <label class="3u 7u(mobile)" for="telephone">
                                            <a   class="link tooltip-link no-decoration not-active" data-toggle="tooltip" data-original-title="Le numéro de téléphone doit être au format International dans le premier champ renseignez l'indice téléphonique de votre pays et dans le second champ renseignez votre numéro de téléphone."><span class="fa fa-info-circle"></span></a> </label>
                                    </div>
                                    <div class="row 50%">
                                        <label class="3u 7u(mobile)" for="date">
                                            <span>Date de naissance<span style="color:red">*</span>:</span>
                                        </label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('date','<span class="alert-danger">','</span>');?>
                                            <input id="dp3" class="validate[required,custom[date]] text-input" placeholder="DD-MM-YYYY" data-date-format="dd-mm-yyyy" size="16" type="text" name="date" value="<?php echo set_value('date');?>">
                                        <!-- <span class="add-on"><i class="icon-th"></i></span>-->
                                        </div>
                                    </div>
                                </fieldset><br/>
                                <fieldset style="width: 650px;">
                                    <legend class="scheduler-border" style="font-weight: bold">Information d'Authentification</legend>
                                    <div class="row 50%">
                                       <label class="3u 7u(mobile)" for="email">
                                            <span>Email<span style="color:red">*</span>:</span>
                                          </label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('email','<span class="alert-danger">','</span>');?>
                                            <input class="validate[required,custom[email]] text-input" type="text" id="email" name="email" value="<?php echo set_value('email');?>"/>
                                         </div>
                                </div>

                                    <div class="row 50%">

                                        <label class="3u 7u(mobile)"for="motdepasse">
                                            <span>Mot de passe<span style="color:red">*</span>:</span>
                                           </label>
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('motdepasse','<span class="alert-danger">','</span>');?>
                                            <input class="validate[required,length[6,12],custom[passwordLength]] text-input" type="password" name="motdepasse" id="motdepasse" value="<?php  echo set_value('motdepasse');?>"/>
                                        </div>
                                    </div>
                                    <div class="row 50%">
                                        <label  class="3u 7u(mobile)" for="motdepasse">
                                            <span>Confirmer Mot de passe<span style="color:red">*</span>:</span> </label>
                                        <div class="6u 12u(mobile)">
                                            <input class="validate[required,equals[motdepasse]] text-input" type="password" name="motdepasse2" value="<?php  echo set_value('motdepasse2');?>"/>
                                        </div>
                                    </div>

                                 </fieldset><br/>

                                <fieldset style="width: 650px;">
                                    <legend class="scheduler-border" style="font-weight: bold">Votre Photo</legend>

                                    <div class="row 50%">
                                        <div class="infos">Une annonce avec photo est 7 fois plus consultée qu'une annonce sans photo,
                                       elle apparaitra lorsque vous posterez une annonce</div>

                                        <label class="3u 7u(mobile)"for="photo">
                                            Photo<span style="color:red">*</span>:

                                        </label>
                                        <!--<?php if(isset($error_upload)):?>
                                                        <div class="error"><?php echo $error_upload;?></div>
                                                    <?php endif;?>-->
                                        <div class="6u 12u(mobile)">
                                            <?php echo form_error('check_photo_error','<span class="alert-danger">','</span>');?>
                                            <input class="validate[required, custom[onlyImageFile]]" type="file" name="photo"/>
                                         </div>
                                    </div>
                                </fieldset><br/>
                                <fieldset style="width: 650px;">
                                    <legend class="scheduler-border" style="font-weight: bold">Conditions</legend>
                                    <div class="row 50%">
                                        <div class="infos">Accepter les conditions d'utilisation, ci-dessous : <br/>en cochant la case j'accepte les <a href="<?php echo site_url('help/cgu') ?>">conditions d'utilisation</a> de ce site</div>
                                        <label class="6u 7u(mobile)">
                                            J'accepte les conditions <span style="color:red">*</span>:
                                        </label>
                                        <div cclass="1u 4u(mobile)">
                                            <input class="validate[required] checkbox" type="checkbox" <?php if (set_value('agree')): echo 'checked'; endif;?> id="agree"  name="agree"/>
                                         </div>
                                    </div>
                                    <div class="row 50%">
                                        <div class="infos">Je souhaite recevoir des offres des partenaires du site kukkea.com susceptibles de m'intéresser</div>
                                        <label for="agreepartenaire" class="6u 7u(mobile)">
                                          recevoir des offres des partenaires:
                                        </label>
                                        <div class="1u 4u(mobile)">
                                            <input class="validate[optional] checkbox" type="checkbox"  value="1" id="agreepartenaire"  name="agreepartenaire"/>
                                        </div>
                                    </div>
                                    <?php //echo $captcha; ?>

                                    <!--<p>
                                        <label for="name">Captcha:
                                            <input id="captcha" name="captcha" type="text" />
                                        </label>
                                    </p>-->
                                </fieldset><br/>
                                <div class="row 50%">
                                    <script src='https://www.google.com/recaptcha/api.js'></script>
                                    <label class="6u 7u(mobile)">
                                        <?php echo form_error('g-recaptcha-response','<span class="alert-danger">','</span>');?>
                                        <div class="g-recaptcha" data-sitekey="6LdzrwQTAAAAALE_XXxLsCtjhZA3SYUY2LmVqZPY"></div>
                                    </label>
                                    <label class="3u 7u(mobile)" for="telephone">
                                        <a   class="link tooltip-link no-decoration not-active" data-toggle="tooltip" data-original-title="Cette captcha  permet de verifier que vous n'êtes pas un robot,ou un spider. Ceci fait partir des elements de sécurité mis en place afin de garantir votre protection numérique"><span class="fa fa-info-circle"></span></a> </label>

                                </div>

                                    <br/>
                                    <fieldset style="width: 650px;">
                                    <input id="valider" class="button"   type="submit" value="Valider" name="Valider"/>
                                </fieldset>


                                <?php echo form_close(); ?>
                                <?php //echo anchor('signup/login','Me Connecter');?>
                            </section>
                        </div>
                </div>
                 <div class="4u 12u(narrower)">
                    <div class="sidebar">
                        <section style="margin-top: 100px;">
                            <!--<header><h3>Retrouvez-nous sur Facebook</h3></header>-->
                            <div class="fb-like-box" data-href="https://www.facebook.com/KukkeaShare" data-width="260" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                        </section>
                        <section >
                            <header><h3><a href="<?php echo site_url('help/howitworks'); ?>" class="no-decoration"> NOUS </a></h3></header>
                            <div class="flex-video widescreen" >
                                <iframe allowfullscreen="" src="http://www.youtube.com/embed/vpeRfqBOd44?feature=player_detailpage" frameborder="0"></iframe>
                            </div>
                        </section>
                        <section>
                            <header><h3>Confiance</h3></header>
                            <img class="img-responsive size-img-signup" src="<?php echo base_url().'images/site/eval.png';?>" alt="Evaluation"/>
                        </section>
                        <section >
                            <header><h3>Confidentialité</h3></header>
                            <img class="img-responsive size-img-signup" src="<?php echo base_url().'images/site/confidentialite.png';?>" alt="Confidentialité"/>
                        </section>
                        <!--<section >
                            <header><h3>Rapidité</h3></header>
                            <img class="img-responsive size-img-signup" src="<?php echo base_url().'images/site/rapidite.png';?>" alt="Livraison Rapide"/>
                        </section>-->
                        <section >
                            <header><h3>Economie</h3></header>
                            <img class="img-responsive size-img-signup" src="<?php echo base_url().'images/site/economique.png';?>" alt="A petit prix"/>
                            <section >
                </div>
           </div>

         <!-- <div class="span3" style="margin-left: 800px; margin-top: -1450px;">
            <div class="content" style="height:10px;">
            toto
            </div>

        </div>-->
</div>
</section>
</article>
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
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#success-alert").alert('close');
            });
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

<script>$(function(){ $(".tooltip-link").tooltip();});</script>
