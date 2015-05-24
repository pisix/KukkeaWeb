
<br/>

<div class="content">
<div class="row">
    <br/>

    <div class="col-md-12" style="background-color: white;">
        <div style="text-align: center;color: #233140"><h4><i>Editer votre profil afin de mettre à jour vos informations personnelles.</i></h4></div>
        <div style="text-align: center;color: #233140"><h4><i>Rassurez vous de l'exactitude des informations renseignées car elles sont un gage de confiance pour les autres utilisateurs.</i></h4>
        </div>
    </div>
</div>
<br/>
<article id="main">
    <section class="wrapper style4 container">
        <div class="content">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <br/>

                    <?php if(isset($success_editprofil)):?>
                        <div class="success">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="successMessage" class="alert alert-success">
                                        <strong>Vos informations ont été bien mis à jour.<br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif(isset($error_editprofil)):?>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="alert alert-danger">
                                    <strong>Mise à jour </strong> echouée!.<br/>
                                    <?php echo $error_editprofil;?>
                                    <strong></strong>.
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php if(isset($success_changepassword)):?>
                        <div class="success">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="successMessage" class="alert alert-success">
                                        <strong>Votre mot de passe a été  bien mis à jour.<br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif(isset($error_changepassword)):?>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="alert alert-error">
                                    <strong>Mise à jour</strong> Mot de passe echouée!.<br/>
                                    <?php //echo $error_changepassword;?>
                                    <strong></strong>.
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <div class="tabbable" > <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab"><b>Mes informations personnelles

                                    </b></a></li>
                            <!--<li><a href="#tab2" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TEDST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </b></a></li>-->
                            <li><a href="#tab3" data-toggle="tab"><b> Mot de passe
                                    </b></a></li>

                        </ul>

                        <div class="tab-content" style="margin-top: -100px">
                            <div class="tab-pane active" id="tab1">
                                <?php  $attributes = array('class'=>'edit-profil-form','id' => 'editUserForm');
                                echo form_open_multipart("account/editprofil/$iduser", $attributes);
                                ?>
                                <?php if ($user_connecte_info !=null):?>
                                    <?php foreach($user_connecte_info as $i): ?>
                                         <BR/><BR/><br/><br/>
                                        <input type="hidden" name="iduser" value="<?php echo encryptor('encrypt',$i->NUMUSER)?>"/>
                                        <table class="table white">

                                            <tbody>

                                            <tr>
                                                <td><label>Nom<span style="color:red">*</span></span>:</label></td>
                                                <td><input class="col-md-2 validate[required,length[2,50]]  text-input" type="text" name="nom" value="<?php echo $i->NOMUSER?>"/></td>
                                            </tr>
                                            <tr>
                                                <td><label>Prenom<span style="color:red">*</span>:</label></td>
                                                <td><input class="col-md-2 validate[required,length[2,50]]  text-input" type="text" name="prenom"  value="<?php echo $i->PRENOMUSER;?>"/></td>
                                            </tr>

                                            <tr>
                                                <td><label>Date de naissance<span style="color:red">*</span>:</label></td>
                                                <!--   <input class="span2" type="text"  value="<?php echo $i->DATENAISSANCEUSER;?>"/>-->
                                                <td><input id="dp3" class="span2  validate[required,custom[date]] text-input" data-date-format="dd-mm-yyyy" size="16" type="text" name="date" value="<?php echo date("d-m-Y", strtotime($i->DATENAISSANCEUSER));?>"></td>
                                            </tr>
                                            <tr>
                                                <td> <label>Téléphone<span style="color:red">*</span>:</label></td>
                                                <td><input class="col-md-2 validate[required,phone,custom[onlyNumberSp]] text-input" name="telephone" type="text"  value="<?php echo $i->TELUSER?>"></td>
                                                <td>
                                                    <label>Afficher sur mon profil public</label>

                                                    <input class="validate[optional] checkbox" type="checkbox" <?php if ($i->VISUNUMEROTEL==1): ?> checked <?php endif;?> id="visunumerotel" value="1" name="visunumerotel"/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> <label>Pays<span style="color:red">*</span>:</label></td>
                                                <td> <input class="col-md-2 validate[required,length[2,100]] text-input" type="text" name="pays"  value="<?php echo $i->PAYSUSER?>"></td>
                                            </tr>
                                            <tr>
                                                <td> <label>Ville<span style="color:red">*</span>:</label>
                                                <td><input class="col-md-2 validate[required,length[2,100]] text-input" type="text"  name="ville" value="<?php echo $i->VILLEUSER?>"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Adresse:</label>
                                                <td><input class="col-md-2 validate[,length[2,100]] text-input" type="text"  name="adresse" value="<?php echo $i->ADRESSEUSER?>"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Code Postal:</label>
                                                <td><input class="col-md-2 validate[length[2,100]] text-input" type="text"  name="codepostal" value="<?php echo $i->CODEPOSTALUSER?>"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Changer votre photo:</label></td>
                                                <td><input class="validate[custom[onlyImageFile]]" type="file" name="photo"/></td>
                                                <td><img  width="80" height="80"  class="img-circle" src="<?php echo base_url();?>images/thumbs/<?php echo $i->CHEMINPHOTO;?>" alt="alt="<?php echo $i->NOMUSER;?>""/></td>

                                            </tr>


                                            <!-- <label>Changer votre photo: </label>
                                             <input class="validate[required, custom[onlyImageFile]]" type="file" name="photo"/>-->

                                            </tbody>
                                        </table>
                                        <!--<div class="control-group pull-right">
                                        <label>
                                           <!-- <?= anchor('account/delete', 'Supprimer le compte', array('class' => 'btn-link')); ?>
                                        </label>
                                    </div>-->

                                        &nbsp;&nbsp;<div id="some"style="position:relative;"><input type="submit" value="METTRE A JOUR "class="button special"/></div>

                                    <?php endforeach;?>
                                <?php  endif; ?>
                                <?php echo form_close();?>
                                <br/>
                            </div>

                            <div class="tab-pane" id="tab3">
                                <BR/><BR/><br/><br/>

                                <?php
                                $attributes = array('id'=>'changePasswordForm','class'=>'edit-profil-form');
                                echo form_open('account/changepassword', $attributes);
                                if ($user_connecte_info !=null):
                                    foreach($user_connecte_info as $i): ?>
                                        <?php  echo validation_errors();?>
                                        <input type="hidden" name="iduser" value="<?php echo $i->NUMUSER?>"/>
                                        <input TYPE="text" style="display: none" NAME="pseudouser" VALUE="<?php echo $i->PSEUDOUSER; ?>"/>

                                        <table class="table white">

                                            <tbody>

                                            <tr>

                                                <td><?php echo "Ancien mot de passe:";?></td>
                                                <td>
                                                    <?php
                                                    $attributes=array('name'=>'opassword','id'=>'opassword','class'=>'validate[required,length[6,12],custom[passwordLength]]');
                                                    echo form_password($attributes);?>
                                                </td>
                                            </tr>
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
                                        &nbsp;&nbsp;<div id="some"style="position:relative;"><input type="submit" value="mettre à jour le mot de passe" class="button special"/></div>
                                    <?php endforeach;?>
                                <?php endif; ?>
                                <?php echo form_close();?>
                                <BR/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>

    </section>
</article>
</div>
<!--<script src="<?=base_url('js/jquery.js'); ?>"></script>
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
        $("#editUserForm").validationEngine('attach');
        $("#changePasswordForm").validationEngine('attach');
        $('#dp3').datepicker();
    });
</script>
