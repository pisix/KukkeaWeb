<?
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 10/07/14
 * Time: 06:57
 */?>
<?php $this->load->view('includes/analyticstracking'); ?>

<div class="container-fluid">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <br/><br/><br/><br/>
     </div>
    <div class="col-md-1"></div>
</div>

<article id="main">
    <section class="wrapper style4 container">
        <?php
        $attribute=array('class'=>'','id'=>'formrecoveraccountID');
        echo form_open('account/forgotpassword',$attribute)?>
        <?php if(isset($success_email)):?>
            <div class="success" style="text-align: center" >
                <div class="col-md-12" style="text-align: center">
                    <div id="successMessage" class="alert alert-success" style="text-align: left; ">
                        <strong>Votre compte a été retrouvé et le lien de reinitialisation de votre mot de passe a été envoyé  à l'adresse mail <?php echo $mail_user;?><br/>
                        </strong>
                    </div>
                </div>
            </div>
        <?php elseif(isset($error_email)):?>
            <div class="col-md-12">
                <div class="alert alert-danger" style="text-align: left;">
                    <?php echo $error_email;?><br/>

                    <strong> Veuillez recommencez en saisissant l'adresse email que vous avez renseigné lors de l'inscription sur kukkea.com.<br/>
                    </strong>
                </div>
            </div>
        <?php endif;?>
        <div style="margin-left: 300px" >

            <header>
                <h2 style="font-weight: bold">RETROUVEZ VOTRE COMPTE</h2>
            </header>
            <!--<label>Votre adresse mail</label>-->
            <div class="input-group">
                <!-- <div class="input-group-addon"><i class="icon-envelope"></i></div>-->
               <!-- <?php
                $attribute=array('name'=>'email','id'=>'inputIcon','class'=>'validate[required,custom[email]] form-control span2 text-input','placeholder'=>'Votre email');
                echo form_input($attribute);
                ?>-->
                <div class="row 25%">
                    <label class="10u 7u(mobile)" for="date">
                        <span>Votre email<span style="color:red">*</span>:</span></label>
                    <div class="12u 24u(mobile)">
                        <input class="validate[required,custom[email]] form-control span2 text-input" placeholder="Votre email"name="email"/>
                        <!-- <span class="add-on"><i class="icon-th"></i></span>-->
                    </div>
                </div>
            </div>
            <div class="btn-toolbar">
                <div class="btn-group">
                    &nbsp;&nbsp;<div id="some"style="position:relative;"><button type="submit" class="button "><i class="glyphicon glyphicon-search white"></i>&nbsp;Rechercher</button></div>
                </div>
                <?php echo form_close()?>
                <div class="btn-group">
                    &nbsp;&nbsp;<div id="some"style="position:relative;"><a class="button no-decoration" href=<?php echo site_url()."signup/login"?>><i class=" glyphicon glyphicon-off white"></i>&nbsp;Annuler</a></div>
                </div>
            </div>
        </div>

    </section>
</article>
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>


<script>
    $(document).ready(function() {
        $("#formrecoveraccountID").validationEngine('attach');
    });
</script>
