<div class="container-fluid">
    <br/><br/>
    <div class="content" style="display:none;background-color:;width: 900px; height:500px;margin-left: 160px; margin-top: 15px;"">



            <div class="page-header" style="background-color:#339AB8; color:white;">
                <h4>Renseignez votre nouveau mot de passe</h4>
            </div>
            <?php if(isset($success_get_password)):?>
                <div class="success">
                    <div class="row">
                        <div class="span12">
                            <div id="successMessage" class="alert alert-success">
                                <strong>Votre mot de passe a été  changé.<br/>
                                    <a href="<?=site_url('signup/login'); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i>Connectez-vous</a>
                            </div>
                        </div>
                    </div>

                </div>
            <?php elseif(isset($error_get_password)):?>
                <div class="row">
                    <div class="span9">
                        <div class="alert alert-error">
                            <strong>Recupération</strong> Mot de passe echouée!.<br/>
                            <?php //echo $error_changepassword;?>
                            <strong></strong>.
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <?php
            $attributes = array('id'=>'getPasswordForm');
            echo form_open('account/get_password/'.$this->uri->segment(3), $attributes);
            ?>
                    <table class="table">

                        <tbody>
                        <tr>
                            <td><?php echo "Nouveau mot de passe:";?></td>
                            <td><?php
                                $attributes=array('name'=>'npassword','id'=>'npassword','class'=>'validate[required,length[6,12],custom[passwordLength]]');
                                echo form_password($attributes);?></td>
                        </tr>
                        <tr>
                            <td><?php echo "Confirmer le nouveau mot de passe:";?></td>
                            <td><?php
                                $attributes=array('name'=>'cpassword','id'=>'cpassword','class'=>'validate[required,length[6,12],equals[npassword],custom[passwordLength]]');
                                echo form_password($attributes);?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
    <br/>
    <br/>
                    &nbsp;&nbsp;<div id="some"style="position:relative;"><button type="submit" class="btn btn-primary"><i class=" icon-ok-sign icon-white"></i>&nbsp;Sauvegarder</button></div>
            <?php echo form_close();
            ?>
    </div>
</div>

<?php
$this->minify->js(array('jquery.js', 'bootstrap.js','jquery.validationEngine-fr.js','jquery.validationEngine.js'));
echo $this->minify->deploy_js();
?>


<script>
    $(document).ready(function() {
        $('.content').fadeIn(1000);
        $('.carousel').carousel();
        $("#getPassword").validationEngine('attach');
        $('#dp3').datepicker();
    });


</script>
