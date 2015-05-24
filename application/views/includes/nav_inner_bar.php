
<!-- Header -->

<header id="header" class="alt">
    <h1 id="logo"><a href="<?php echo site_url();?>" style="margin-top: 40px" class="no-decoration"><img src="<?php echo base_url('images/site/logo2.png')?>" height="25px" width="25px"/>Kukkea<span>.com</span></a></h1>
    <nav id="nav">
        <ul>

            <!--<li><a id="modal_trigger" href="#modallogin">Connexion</a></li>
            <li><a id="modal_trigger2" href="#modalregister">Inscription</a></li>-->

            <li><a href="<?=site_url('signup/login'); ?>" >Connexion</a></li>
            <li><a href="<?=site_url('signup'); ?>" >Inscription</a></li>
                <li class="submenu">
                <a class="" href="">Aide</a>
                    <ul>
                        <li><a href="<?php echo site_url('help/creercompte')?>">Creer mon compte ?</a></li>
                        <li><a href="<?php echo site_url('help/expediercolis')?>">Expedier un colis ?</a></li>
                        <li><a href="<?php echo site_url('help/transportercolis')?>">Transporter un colis ?</a></li>
                        <li><a href="<?php echo site_url('help/motdepasseoublie')?>">Mot de passe oublié ?</a></li>
                        <li><a href="<?php echo site_url('help/contact')?>">Contact</a></li>
                        <!--<li class="submenu">
                            <a href="">Submenu</a>
                            <ul>
                                <li><a href="#">Dolore Sed</a></li>
                                <li><a href="#">Consequat</a></li>
                                <li><a href="#">Lorem Magna</a></li>
                                <li><a href="#">Sed Magna</a></li>
                                <li><a href="#">Ipsum Nisl</a></li>
                            </ul>
                        </li>-->
                    </ul>
            </li>
            <li><a href="<?=site_url('annonce/newannonce'); ?>" class="button special">Publier votre annonce</a></li>

        </ul>
    </nav>
</header>
        <div class="container">
            <div id="modallogin" class="popupContainer" style="display:none;">
                <header class="popupHeader" style="display:none;">
                    <span class="header_title">Login</span>
                </header>
                  <section class="popupBody">
                      <div class="user_login" style="display: block">
                            <div class="">
                                <div>
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
                                        <?php echo form_error('email','<span class="error">','</span>');?>
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i> </div>
                                                <input  type="email" required placeholder="Adresse email" name="email" value="<?php echo set_value('email');?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php echo form_error('motdepasse','<span class="error">','</span>');?>
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </div>
                                                <input  pattern=".{5,}"  title="Saisir 5 Caractères minimum" type="password" required placeholder="Mot de passe" name="motdepasse" value="<?php  echo set_value('motdepasse');?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <button type="submit"  id="login_form" class="button special btn-sm no-decoration"> <i class="glyphicon glyphicon-home"></i> Connexion</button>
                                    </div>
                                    <?php echo form_close(); ?>

                                    <a id="forget_password_form" href="#"  style="text-align: right;" class="no-decoration">Mot de passe oublié?</a>
                                    <footer>
                                        Vous n'avez pas de compte Kukkea ? <a href="#" id="register_form" class="no-decoration">Inscription</a><br/>
                                    </footer>

                            </div>
                      </div>


                    <!-- Register Form -->
                    <div class="user_register">
                        <form>
                            <label>Full Name</label>
                            <input type="text" />
                            <br />

                            <label>Email Address</label>
                            <input type="email" />
                            <br />

                            <label>Password</label>
                            <input type="password" />
                            <br />


                        </form>
                        <div class="action_btns">
                            <button  class="button special no-decoration">Inscription</button>
                        </div>
                        <footer class="inline">
                            Déjà membre Kukkea ? <a href="#" class="no-decoration connexion"> Connexion</a>
                        </footer>

                    </div>

                      <div class="user_forget_password" style="display:none;">
                          <?php
                          $attribute=array('class'=>'','id'=>'formrecoveraccountID');
                          echo form_open('account/forgotpassword',$attribute)?>
                          <section>
                               Entrez l'adresse e-mail associée à votre compte, et nous vous enverrons par e-mail un lien pour réinitialiser votre mot de passe.
                               </section>
                                <br/>
                             <input type='email' class='validate[required,custom[email]]' name='email' placeholder="Votre email" required />
                          <br/>

                                  <div class="one_half last"><button type="submit" class="button special no-decoration">Envoyer lien Reset</button></div>
                          <a href="#" class="connexion  no-decoration"><i class="fa fa-angle-double-left"></i> Connexion</a>

                          <br/>
                            <?php echo form_close();?>
                      </div>
                </section>
            </div>
            <div id="modalregister" class="popupContainer" style="display:none;">
                <header class="popupHeader_r" style="display:none;">
                    <span class="header_title_r">Login</span>
                </header>
                  <section class="popupBody">
                    <!-- Social Login -->
                      <div class="user_register_r" style="display: block">
                          <div class=""
                            <form>
                                <label>Full Name</label>
                                <input type="text" />
                                <br />

                                <label>Email Address</label>
                                <input type="email" />
                                <br />

                                <label>Password</label>
                                <input type="password" />
                                <br />
                                <button type="submit" class="button special">Inscription</button>
                            </form>
                            <footer class="inline">
                                Déjà membre Kukkea ? <a href="#" class="no-decoration connexion_r"> Connexion</a>
                            </footer>
                          </div>
                      </div>
                      <div class="user_forget_password_r" style="display:none;">
                          <?php
                          $attribute=array('class'=>'','id'=>'formrecoveraccountID');
                          echo form_open('account/forgotpassword',$attribute)?>
                          <section>
                              Entrez l'adresse e-mail associée à votre compte, et nous vous enverrons par e-mail un lien pour réinitialiser votre mot de passe.
                          </section>
                          <br/>

                          <input type='email' class='validate[required,custom[email]]' name='email' placeholder="Votre email" required />
                          <br/>

                          <div class="one_half last"><button type="submit" class="button special no-decoration">Envoyer lien Reset</button></div>
                          <a href="#" class="connexion_r  no-decoration"><i class="fa fa-angle-double-left"></i> Connexion</a>

                          <br/>
                          <?php echo form_close();?>
                      </div>
                      <div class="user_login_r" style="display:none;">
                          <form>
                              <label>Email</label>
                              <input type="text" />
                              <br />

                              <label>Password</label>
                              <input type="password" />
                              <br />

                          </form>
                          <div class="action_btns">
                              <a href="#" id="login_form" class="button special no-decoration">Login</a>
                          </div>
                          <a id="forget_password_form_r" href="#"  style="text-align: right;" class="no-decoration">Mot de passe oublié?</a>
                          <footer>
                              Vous n'avez pas de compte Kukkea ? <a href="#" id="register_form_r" class="no-decoration">Inscription</a><br/>
                          </footer>
                      </div>
                  </section>
            </div>

        </div>
<script type="text/javascript" src=<?=base_url('js/jquery-1.11.0.min.js')?>></script>
<script type="text/javascript" src="<?=base_url('js/jquery.leanModal.min.js')?>"></script>
        <script type="text/javascript">
            $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
            $("#modal_trigger2").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });


            $(function(){
               /* $("#login_form").click(function(){
                    $("user_register").hide();
                    $(".popupHeader").hide();
                    $(".user_login").show();
                    $(".user_forget_password").hide();

                    return false;
                });*/

                $("#register_form").click(function(){

                    $(".user_login").hide();
                    $(".popupHeader").hide();
                    $(".user_register").show();
                    $(".user_forget_password").hide();

                    return false;
                });

                $("#forget_password_form").click(function(){

                    $(".user_login").hide();
                    $(".user_register").hide();
                    $(".popupHeader").show();
                    $(".header_title").text('Reinitialiser votre mot de passe');
                    $(".user_forget_password").show();

                    return false;
                });

                $(".connexion").click(function(){
                    $(".user_register").hide();
                    $(".popupHeader").hide();
                    $(".user_login").show();
                    $(".user_forget_password").hide();

                    return false;
                });
                $("#login_form_r").click(function(){
                    $(".user_register_r").hide();
                    $(".user_forget_password").hide();
                    $(".popupHeader_r").hide();
                    $(".user_login_r").show();
                    return false;
                });

               $("#register_form_r").click(function(){
                    $(".user_register_r").show();
                    $(".user_login_r").hide();
                   $(".popupHeader_r").hide();
                   $(".user_forget_password").hide();
                    return false;
                });

                $("#forget_password_form_r").click(function(){

                    $(".user_register_r").hide();
                    $(".user_login_r").hide();
                    $(".popupHeader_r").show();
                    $(".header_title").text('Reinitialiser votre mot de passe');
                    $(".user_forget_password_r").show();

                    return false;
                });

                $(".connexion_r").click(function(){
                    $(".user_login_r").show();
                    $(".user_register_r").hide();
                    $(".popupHeader_r").hide();
                    $(".user_forget_password_r").hide();
                    return false;
                });

            })
        </script>
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $("#formrecoveraccountID").validationEngine('attach');
    });
</script>


