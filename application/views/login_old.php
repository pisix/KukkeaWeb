
<?php $this->load->view('includes/analyticstracking'); ?>

        <div class="container-fluid" >
            <?php $this->load->view('includes/second_nav_inner_bar'); ?>
            <?php //$this->load->view('includes/finder');?><br/><br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-5" style="background-color: #233140;" >
                        <span style="color:white"><b>S'inscrire :<br/><br/>
                                La création de votre compte personnel est gratuite</b><br/>
                            Ce service vous permet de retrouver toutes vos annonces au même endroit. Déposez à présent plus simplement et plus rapidement vos annonces et améliorez leur gestion.
                            <br/>
                            <br/>
                        </span>

                       <div class="alert alert-info">
                           <p><strong>Vous</strong> n'êtes pas connecté!</p>
                           <small>Pas de Compte? </small>
                           <!--<a href="<?=site_url('signup'); ?>" class="btn btn-primary btn-info"><i class="icon-arrow-right icon-white"></i> M'inscrire</a>-->
                           <a href="#" onclick="show('signup')" class="btn btn-primary btn-info"> M'inscrire</a>

                       </div>
                       <div id="signup" style="display: none;"class="alert alert-danger">
                          <a href="<?=site_url('signup'); ?>" class="inline  btn btn-danger "><i class="icon-arrow-right icon-white"></i> Particulier</a>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=site_url('signup/pro'); ?>" class="inline btn btn-danger disabled "><i class="icon-arrow-right icon-white"></i> Professionnel</a>
                       </div>
                       <br/><br/>
                    </div>
                    <div class="col-md-5" style="background-color: #339AB8;">
                        <br/>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger">
                                <strong>Authentification</strong> echouée!.<br/>
                                <strong>Votre identifiant ou mot de passe est incorrect.</strong><br/>
                                <strong>Si vous venez de vous inscrire, pensez à activer votre compte via le lien envoyé à votre adresse email</strong>
                            </div>
                        <?php endif; ?>
                        <?php
                        $attribute=array('class'=>' form-horizontal','id'=>'login-form-id','role'=>'form');
                        echo form_open('signup/login',$attribute); ?>
                        <div class="form-group">
                            <label class="col-sm-4 control-label " style="color: #ffffff" for="email">Email:</label>
                            <?php echo form_error('email','<span class="error">','</span>');?>
                            <div class="col-sm-8">
                                 <input class="validate[required,custom[email]] text-input form-control input-sm" type="text"  placeholder="Entrer votre adresse email" name="email" value="<?php echo set_value('email');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="motdepasse" style="color: #ffffff">Mot de passe:</label>
                            <?php echo form_error('motdepasse','<span class="error">','</span>');?>
                           <div class="col-sm-8">
                                <input class="validate[required,length[6,12],custom[passwordLength]] text-input form-control input-sm" type="password" class="form-control" placeholder="Entrez votre mot de passe" name="motdepasse" value="<?php  echo set_value('motdepasse');?>"/>
                           </div>
                        </div>
                        <br/><br/>
                        <div class="clearfix">
                          <button type="submit" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-home"></i> Se connecter</button>
                        </div>
                        <br/><br/>
                           <div  style="color: #ffffff">
                              <a style="color: #ffffff; font-weight: bold" href="<?php echo site_url('account/forgotpassword')?>">> Mot de passe oublié ?</a>
                              <?php echo form_close(); ?>
                           </div>
                   </div>

                    <div class="col-md-1"></div>
                </div>
            </div>



        <div class="row">
            <div class="col-md-12">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <p><span style="color:black">
                           <h2>Les avantages du Compte Personnel:</h2>

                            <li>Un tableau de bord personnalisé pour piloter l'ensemble de vos annonces en ligne.</li>
                            <li>Un dépôt d'annonce simplifié avec vos données personnelles pré remplies.</li>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        </span>

                    </p>
                    <br/>
                    <div id="myCarousel" class="carousel slide" >
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                           <!-- <li data-target="#myCarousel" data-slide-to="2"></li>-->
                        </ol>
                        <div class="carousel-inner">
                            <div class="active item"><img style="text-align: center" width="700px" height="150px" src="<?php echo base_url();?>images/site/ajouter-annonce.png" alt="Ajoutez une annonce"/></div>
                            <div class="item"><img style="text-align: center" width="700px" height="150px" src="<?php echo base_url();?>images/site/tableau-de-bord.png" alt="Tableau de Bord"/></div>
                            <!--<div class="item"><img width="300px" height="10px" src="../../images/site/bg2.jpg" alt="image3"/></div>-->
                        </div>

                        <!--<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>-->
                    </div>
                </div>
                <div class="col-md-1"></div>
             </div>
        </div>
            <br/>
</div>

    <script src="<?=base_url('js/jquery.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>

<script>
        $(document).ready(function() {
            $('.carousel').carousel();
            $("#login-form-id").validationEngine('attach');
        });
        function show(ele) {
            var srcElement = document.getElementById(ele);
            if(srcElement != null) {
                if(srcElement.style.display == "block") {
                    srcElement.style.display= 'none';
                }
                else {
                    srcElement.style.display='block';
                }
                return false;
            }
        }
    </script>
