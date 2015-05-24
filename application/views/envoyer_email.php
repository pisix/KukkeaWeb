<br/>
    <div class="container-fluid">
        <div class="content" style="display:none;/*background-color:#f3f3ed;*/width: 900px; height:800px;margin-left: 160px; margin-top: 15px;"">

            <?php foreach ($rows as $r):  ?>
                <p>
                <h3><?php echo $r->TITREANNONCE;?></h3>
                <h5><b>Envoyer un message à "<?php echo $r->PSEUDOUSER;?>"</b></h5>
                Pensez à indiquer vos coordonnées téléphoniques pour que l'annonceur puisse vous contacter facilement.<br/>
                Tout démarchage publicitaire ou spamming sera éliminé.

                </p>
            <?php endforeach;?>
        <?php if(isset($success)):?>
            <div class="success">

                <div class="row">
                    <div class="span9">
                        <div id="successMessage" class="alert alert-success">
                            <p><strong><?php echo $success;?></p>
                            <a href="<?=site_url(''); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i> Retour aux annonce</a>
                        </div>
                    </div>
                </div>

            </div>
        <?php elseif(isset($error)):?>
            <div class="row">
                <div class="span9">
                    <div class="alert alert-error">
                        <strong>Envoi du message</strong> echoué!.<br/>
                        <?php echo $error;?>
                        <strong></strong>.
                    </div>
                </div>
            </div>
        <?php endif;?>
           <div class="well" style="width: 400px; height:60px; margin-left: 205px;">
                   <b><span style="color:#dc143c">Attention : Soyez attentifs !<br/>
                       Assurez-vous de ne pas être victime d'une tentative<br/> d'escroquerie en lisant notre <a href="">page d'avertissement.</a>
                   </span>
                   </b>
           </div>

        <div id="form">
            <?php foreach ($rows as $r):  ?>
                <?php
                    $attribute=array('class'=>'formular','id'=>'formID');
                    echo form_open('annonce/envoyer_email/'.$r->NUMANNONCE,$attribute);
                ?>
            <?php endforeach;?>

                 <div class="control-group">
                    <label  class="control-label" for="nom">Votre Nom:<span style="color: red">*</span>:</label>
                       <?php echo form_error('nom','<span class="error">','</span>');?>
                        <input  class="validate[required,length[2,50]]  text-input" type="text" name="nom" placeholder="Votre nom" value="<?php echo set_value('nom');?>"/>
                 </div>
                 <div class="control-group">
                    <label class="control-label" for="email">Votre email:<span style="color: red">*</span>:</label>
                       <?php echo form_error('prenom','<span class="error">','</span>');?>
                     <input class="validate[required,custom[email]] text-input" type="text" id="email" name="email" placeholder="Votre adresse mail" value="<?php echo set_value('email');?>"/>
                 </div>
                <div class="control-group">
                    <label class="control-label" for="telephone">Votre Téléphone:</label>
                        <?php echo form_error('telephone','<span class="error">','</span>');?>
                        <input class="text-input" type="text" name="telephone"  placeholder="Votre téléphone(Facultatif)" value="<?php echo set_value('telephone');?>"/>

                </div>
                <?php foreach ($rows as $r):  ?>
                    <input class="text-input" type="hidden" name="emailuser"  value="<?php echo $r->EMAILUSER;?>"/>
                    <input class="text-input" type="hidden" name="titreannonce"  value="<?php echo $r->TITREANNONCE;?>"/>

                <?php endforeach;?>
                <div class="control-group">
                    <label  class="control-label" for="message">Votre message:<span style="color: red">*</span>:</label>

                    <textarea rows="8" cols="100" placeholder="Veuillez saisir votre message" name="message" value="<?php echo set_value('message');?>">
                    </textarea>
               </div>

                <input class=" center-block btn-large btn-primary"  style="float: center;" type="submit" name="Valider"/>
            </div>

            <?php echo form_close(); ?>
            <?php //echo anchor('signup/login','Me Connecter');?></br>
        <div class="well" style="width: 450px; height:60px; margin-left: 205px;">
           <b> <span style="color:blue">Important : Méfiez-vous des propositions trop alléchantes et  des prix trop bas. Ne payez jamais à l'avance un voyageur que vous ne connaissez pas (ne versez pas d'acompte).
            </span></b>
        </div>
        </div>

    </div>
   <!-- <script src="<?=base_url('js/jquery.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap-datepicker.js'); ?>"></script>-->

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

