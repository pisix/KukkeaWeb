<?php $this->load->view('includes/analyticstracking'); ?>
<br/>
<!-- Main -->
<article id="main">
    <!-- One -->
    <section class="wrapper style4 container">
        <!-- Content -->
        <div class="content" style="text-align: justify;margin-top:-70px" >

                <header>
                    <?php foreach ($rows as $r):  ?>
                        <p>
                        <!--<h3><?php echo $r->TITREANNONCE;?></h3>-->
                        <h5><b>Envoyer un message à "<?php echo $r->PRENOMUSER . ' '. $r->NOMUSER[0]?>"</b></h5>
                        Pensez à indiquer vos coordonnées téléphoniques pour que l'annonceur puisse vous contacter facilement.<br/>
                        Tout démarchage publicitaire ou spamming sera éliminé.

                        </p>
                    <?php endforeach;?>
                    <?php if(isset($success)):?>
                        <div class="success">

                            <div class="row">
                                <div class="col-md-12" style="width: auto">
                                    <div id="successMessage" class="alert alert-success"style="width: 400px; height:auto; margin-left: 300px;">
                                        <p><strong><?php echo $success;?></p>
                                        <a href="<?=site_url(''); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i> Retour à l'accueil</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php elseif(isset($error)):?>
                        <div class="row">
                            <div class="span9">
                                <div class="alert alert-error" style="width: 400px; height:auto; margin-left: 300px;">
                                    <strong>Envoi du message</strong> echoué!.<br/>
                                    <?php echo $error;?>
                                    <strong></strong>.
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                </header>
                <div class="alert alert-danger" style="width: 400px; height:auto; margin-left: 300px;">
                    <b><span style="color:#dc143c">Attention : Soyez attentifs !<br/>
                       Assurez-vous de ne pas être victime d'une tentative d'escroquerie en lisant nos <br/><a href="<?php echo site_url('help/regledetransport') ?>" class="no-decoration">règles de transport.</a>
                   </span>
                    </b>
                </div>

                <div id="form">
                    <?php foreach ($rows as $r):  ?>
                        <?php
                        $attribute=array('class'=>'formular','id'=>'formID');
                        echo form_open('annonce/envoyeremail/'.encryptor('encrypt',$r->NUMANNONCE),$attribute);
                        ?>
                    <?php endforeach;?>


                    <div class="row 50%">
                        <?php echo form_error('nom','<span class="alert-danger">','</span>');?>
                        <label class="3u 7u(mobile)" for="nom">
                       Votre Nom:<span style="color: red">*</span>:</span></label>
                        <div class="6u 12u(mobile)">
                            <input  class="validate[required,length[2,50]]  text-input" type="text" name="nom" placeholder="Votre nom" value="<?php echo set_value('nom');?>"/>
                        </div>
                    </div>

                    <div class="row 50%">
                        <?php echo form_error('email','<span class="alert-danger">','</span>');?>
                        <label class="3u 7u(mobile)" for="email">
                            Votre email:<span style="color: red">*</span>:</span></label>
                        <div class="6u 12u(mobile)">
                            <input class="validate[required,custom[email]] text-input" type="text" id="email" name="email" placeholder="Votre adresse mail" value="<?php echo set_value('email');?>"/>
                        </div>
                    </div>
                    <div class="row 50%">
                        <?php echo form_error('telephone','<span class="alert-danger">','</span>');?>
                        <label class="3u 7u(mobile)" for="email">
                            Votre Téléphone:</span></label>
                        <div class="6u 12u(mobile)">
                            <input class="text-input" type="text" name="telephone"  placeholder="Votre téléphone au format international" value="<?php echo set_value('telephone');?>"/>
                        </div>
                    </div>

                        <?php foreach ($rows as $r):  ?>
                            <input class="text-input" type="hidden" name="emailuser"  value="<?php echo $r->EMAILUSER;?>"/>
                            <input class="text-input" type="hidden" name="titreannonce"  value="<?php echo $r->TITREANNONCE;?>"/>

                        <?php endforeach;?>
                    <div class="row 50%">

                        <label class="3u 7u(mobile)" for="email">

                            Votre message:<span style="color: red">*</span>:</span>                        <?php echo form_error('message','<span class="alert-danger">','</span>');?>
                        </label>
                        <div class="6u 12u(mobile)">
                            <textarea rows="6" cols="200" placeholder="Veuillez saisir votre message" name="message" value="<?php echo set_value('message');?>">
                            </textarea>
                        </div>
                    </div>

                </div>
            <br/>
                <input  style="margin-left: 400px" class=" col-md-push-3 button special" type="submit" value="Envoyer" name="Valider"/>
<br/>
                <?php echo form_close(); ?>
                <?php //echo anchor('signup/login','Me Connecter');?></br>
                <div class="alert alert-info" style="width: 450px; height:auto; margin-left: 300px;">
                    <b> <span style="color:blue">Important : Méfiez-vous des propositions trop alléchantes et  des prix trop bas. Ne payez jamais à l'avance un voyageur avec qui vous n'êtes jamais entré en contact.
            </span></b>
                </div>
        </div>


    </section>
        </div>

    </section>


</article>

<?php
$this->minify->js(array('jquery.js', 'bootstrap.js','jquery.validationEngine-fr.js','jquery.validationEngine.js','bootstrap-datepicker.js'));
echo $this->minify->deploy_js();
?>





<script>
    $(document).ready(function() {
        $('.content').fadeIn(1000);
        $('.carousel').carousel();
        $("#formID").validationEngine('attach');
        $('#dp3').datepicker();
    });


</script>
