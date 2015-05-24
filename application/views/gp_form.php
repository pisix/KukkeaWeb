
<br/>
<article id="main">
    <section class="wrapper style4 container">
        <div class="content">

            <header class="special">
                <span class="icon fa-lock"></span>
                <h4>Renseignez votre nouveau mot de passe</h4>
            </header>
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
            <?php  echo validation_errors();?>

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
            &nbsp;&nbsp;<div id="some"style="position:relative; margin-left: 350px; margin-top: -100px;"><button type="submit" class="button special"><i class=" icon-ok-sign icon-white"></i>&nbsp;Valider</button></div>
            <?php echo form_close();
            ?>
        </div>
    </section>
</article>

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
