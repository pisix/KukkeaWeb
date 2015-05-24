<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav_inner_bar.php'); ?>
    <div class="container-fluid">
    <?php $this->load->view('includes/second_nav_inner_bar'); ?><br/>
    <div class="content" style="display:none;background-color:#f3f3ed;width: 900px; height:1600px;margin-left: 160px; margin-top: 15px;">
    <div class="page-header" style="background-color: #cd6e00; font-color:white;">
        <h4>CREATION COMPTE PRO</h4>
    </div>
    <?php //echo $titre; ?>


    <?php if(isset($success)):?>
        <div class="success">
            <script>
                $(document).ready(function() {
                    $('#form').hide();
                });
            </script>
            <?php //echo $success;?>
            <div class="row">
                <div class="span9">
                    <div id="successMessage" class="alert alert-success">
                        <p><strong>Inscription</strong> Réussie!</p>
                        <a href="<?=site_url('signup/login'); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i> Mon espace pro</a>
                    </div>
                </div>
            </div>

        </div>
    <?php elseif(isset($error)):?>
      <div class="row">
        <div class="span9">
            <div class="alert alert-error">
                <strong>Inscription</strong> echouée!.<br/>
                <?php echo $error; ?>
                <strong></strong>.
            </div>
        </div>
    </div>
<?php endif; ?>
    <div id="form">
        <?php
        $attribute=array('class'=>'formular','id'=>'formID');
        echo form_open_multipart('signup/adduser_pro',$attribute); ?>

        <fieldset >
            <legend class="scheduler-border">VOS COORDONNEES</legend>
            <label for="civilite">
                <span>Civilite<font color="red">*</font>:</span>
                <?php echo form_error('civilite','<span class="error">','</span>');?>
                <select class="validate[required]" name="civilite"   value="<?php echo set_value('civilite');?>" >
                    <option value="" >Civilite</option>
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                    <option value="Mlle">Mlle</option>
                </select>
            </label>
            <label for="nom">
                <span>Nom<font color="red">*</font>:</span>
                <?php echo form_error('nom','<span class="error">','</span>');?>
                <input  class="validate[required,length[2,50]]  text-input" type="text" name="nom" value="<?php echo set_value('nom');?>"/>
            </label>
            <label for="prenom">
                <span>Prenom<font color="red">*</font>:</span>
                <?php echo form_error('prenom','<span class="error">','</span>');?>
                <input class="validate[required,length[2,50]]  text-input" type="text" name="prenom" value="<?php echo set_value('prenom');?>"/>
            </label>
            <label for="societe">
                <span>Nom de la societe<font color="red">*</font>:</span>
                <?php echo form_error('societe','<span class="error">','</span>');?>
                <input class="validate[required,length[2,50]]  text-input" type="text" name="societe" value="<?php echo set_value('societe');?>"/>
            </label>
            <label for="siren">
                <span>SIREN/SIRET<font color="red">*</font>:</span>
                <?php echo form_error('siren','<span class="alert-error">','</span>');?>
                <input class="validate[required,length[2,50]]  text-input" type="text" name="siren" value="<?php echo set_value('siren');?>"/>
            </label>

            <label for="pays">
                <span>Pays<font color="red">*</font>:</span>
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
            </label>

            <label for="ville">
                <span>Ville<font color="red">*</font>:</span>
                <?php echo form_error('ville','<span class="error">','</span>');?>
                <input class="validate[required,length[2,100]] text-input" type="text" name="ville" value="<?php echo set_value('ville');?>"/>
            </label>
            <label for="adresse">
                <span>Adresse<font color="red">*</font>:</span>
                <font color="red"><?php echo form_error('adresse','<span class="error">','</span>');?></font>
                <input class="validate[required,length[0,50]]  text-input" type="text" name="adresse" value="<?php echo set_value('adresse');?>"/>
            </label>
            <label for="codepostal">
                <span>Code postal<font color="red">*</font>:</span>
                <?php echo form_error('codepostal','<span class="error">','</span>');?>
                <input class="validate[required,number,custom[onlyNumberSp],length[0,5],custom[codePostalLength]]  text-input" type="text" name="codepostal" value="<?php echo set_value('codepostal');?>"/>
            </label>
            <label for="telephone">
                <span>Téléphone<font color="red">*</font>:</span>
                <?php echo form_error('telephone','<span class="error">','</span>');?>
                <input class="validate[required,phone,custom[onlyNumberSp]] text-input" type="text" name="telephone" value="<?php echo set_value('telephone');?>"/>
            </label>


        </fieldset>
        <fieldset>
            <legend class="scheduler-border">Information d'Authentification</legend>
            <label for="email">
                <span>Email<font color="red">*</font>:</span>
                <?php echo form_error('email','<span class="alert-error">','</span>');?>
                <input class="validate[required,custom[email]] text-input" type="text" id="email" name="email" value="<?php echo set_value('email');?>"/>
            </label>

            <label for="motdepasse">
                <span>Mot de passe<font color="red">*</font>:</span>
                <?php echo form_error('motdepasse','<span class="error">','</span>');?>
                <input class="validate[required,length[6,12],custom[passwordLength]] text-input" type="password" name="motdepasse" value="<?php  echo set_value('motdepasse');?>"/>
            </label>

            <!-- <label>
                 <span>Confirmation email<font color="red">*</font>: </span>
                 <input class="validate[required,custom[email],confirm[email], custom[equals]] text-input" type="text" name="email2"  id="email2" />
             </label>-->

        </fieldset>
        <!--<fieldset>
                <legend class="scheduler-border">Mot de passe</legend>
                <label for="motdepasse">
                    <span>Mot de passe<font color="red">*</font>:</span>
                    <?php echo form_error('motdepasse','<span class="error">','</span>');?>
                    <input class="validate[required,length[6,12],custom[passwordLength]] text-input" type="password" name="motdepasse" value="<?php  echo set_value('motdepasse');?>"/>
                </label>
                <!--<label>
                    <span>Confirmer le Mot de passe<font color="red">*</font>: </span>
                    <input class="validate[required,confirm[equals]] text-input" type="password" name="motdepasse2"  id="motdepasse2" />
                </label>
             </fieldset>-->
        <fieldset>
            <legend class="scheduler-border">Votre Logo</legend>
            <label for="logo">
                <span>Logo(Il apparaitra lorsque vous posterez une annonce)<font color="red">*</font>:</span>
                <!--<?php if(isset($error_upload)):?>
                        <div class="error"><?php echo $error_upload;?></div>
                    <?php endif;?>-->
                <?php //echo form_error('check_photo_error','<span class="error">','</span>');?>
                <input class="validate[required, custom[onlyImageFile]]" type="file" name="logo"/>
            </label>
        </fieldset>
        <fieldset>
            <legend class="scheduler-border">Conditions</legend>
            <div class="infos">Accepter les conditions d'utilisation, ci-dessous : <br/>en cochant la case j'accepte les <a href="#">conditions d'utilisation</a> de ce site</div>
            <label>
                <input class="validate[required] checkbox" type="checkbox"  id="agree"  name="agree"/>
                <span class="checkbox">J'accepte les conditions : </span>
            </label>

        </fieldset>

        <fieldset>
            <input class="  btn-danger"  style="float: center;" type="submit" value="Enregistrer vos coordonnées"/>
        </fieldset>


        <?php echo form_close(); ?>
        <?php //echo anchor('signup/login','Me Connecter');?>
    </div>

    </div>
    </div>
    <script src="<?=base_url('js/jquery.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>





    <script>
        $(document).ready(function() {
            $('.content').fadeIn(1000);
            $('.carousel').carousel();
            $("#formID").validationEngine('attach');
        });

    </script>

<?php $this->load->view('includes/footer'); ?>