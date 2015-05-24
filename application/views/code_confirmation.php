<?php $this->load->view('includes/analyticstracking'); ?>
<div class="container-fluid">
    <div class="col-md-1"></div>
    <?php if($statut_confirm_by_courrier=='false'): ?>

    <div class="col-md-10">
        <br/> <br/> <br/> <br/>
            <div class="page-header" style="background-color:#339AB8; color:white;">
               <h4>Renseignez code d'activation recu par courrier</h4>
            </div>
            <?php if(isset($success_confirm_inscription_courrier)):?>
                <div class="success">
                    <div class="row">
                        <div class="span12">
                            <div id="successMessage" class="alert alert-success">
                                <strong>Votre compte est activé.BIENVENUE SUR kukkea.COM<br/>
                                    <a href="<?=site_url('signup/login'); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i>Connectez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif(isset($echec_confirm_inscription_courrier)):?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-error">
                            <strong>Le code d'activation</strong> saisie n'est pas correcte!.<br/>
                            <strong></strong>.
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            $attributes = array('id'=>'activatecodeForm');
            echo form_open('account/activatecode', $attributes);
            ?>
                    <?php  echo validation_errors();?>
                    <div class="col-md-12">
                       <b><h4> <span class="alert alert-info col-md-12"> Vous êtes sur cette page car vour avez depassé le nombre d'annonce autorisé avant que la verification de votre domicile<br/>
                                             Ne soit faite.
                         Nous vous avons envoyé un code via courrier à votre adresse postale, utilisez ce code pour activer votre compte</span></h4></b>
                       <br/>
                        <br/>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td><b>CODE D'ACTIVATION DE VOTRE COMPTE:</b></td>
                            <td>
                                <?php echo form_error('codeconfirmation','<span class="alert-error">','</span>');?>
                                <input class="validate[required, minSize[6]] text-input" type="number" id="codeconfirmation" name="codeconfirmation" value="<?php echo set_value('codeconfirmation');?>"/>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                    &nbsp;&nbsp;<div id="some"style="position:relative;"><button type="submit" class="btn btn-primary"><i class=" glyphicon glyphicon-ok-sign"></i>&nbsp;ACTIVER LE COMPTE</button></div>
            <?php echo form_close(); ?>
            <br/> <br/> <br/><br/> <br/> <br/><br/> <br/>
        </div>
    </div>
    <?php else: ?>
    <div class="col-md-10">
        <div class="success">
            <br/><br/> <br/><br/>
                <div id="successMessage" class="alert alert-success">
                    <p>
                        Vous avez déjà Terminé votre Inscritption sur Kukkea.com
                     <a href="<?=site_url('signup/login'); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i> Mon espace perso</a>
                    </p>
                </div>
            <br/><br/> <br/>
        </div>
    </div>
    <?php endif;?>
    <div class="col-md-1"></div>
</div>

<!--<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
-->
<?php
$this->minify->js(array('jquery.js', 'bootstrap.js','jquery.validationEngine-fr.js','jquery.validationEngine.js','bootstrap-datepicker.js'));
echo $this->minify->deploy_js();
?>


<script>
    $(document).ready(function() {
        $("#activatecodeForm").validationEngine('attach');
    });


</script>
