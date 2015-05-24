
<?php $this->load->view('includes/analyticstracking'); ?>
<br/>
<br/>
<article id="main">
    <section class="wrapper style4  container">
        <?php if ($this->session->flashdata('getpasswordsuccess')):?>
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <label><?php echo $this->session->flashdata('getpasswordsuccess');?></label>
            </div>
        <?php endif;?>
        <?php if ($this->session->flashdata('getpasswordfailed')):?>
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <label ><?php echo $this->session->flashdata('getpasswordfailed');?></label>
            </div>
        <?php endif;?>
        <div class="content" >
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-5">
                        <header class="special">
                            <span class="icon fa fa-user"></span>
                            <h2>Inscription</h2>
                        </header>

                        <span>
                                <p style="text-align: justify">La création de votre compte personnel est gratuit. Ce service vous permet de retrouver toutes vos annonces au même endroit. Déposez à présent plus simplement et plus rapidement vos annonces et améliorez leur gestion.</p>

                        </span>

                       <div >
                           <!--<p><strong>Vous</strong> n'êtes pas connecté!</p>
                           <small>Pas de Compte? </small>-->
                           <!--<a href="<?=site_url('signup'); ?>" class="btn btn-primary btn-info"><i class="icon-arrow-right icon-white"></i> M'inscrire</a>-->
                           <!--<a href="#" onclick="show('signup')" class="button special"> M'inscrire</a>-->
                           <a href="<?=site_url('signup'); ?>" class="button special no-decoration" style="background-color: #313334; border: none"> M'inscrire</a>

                       </div>
                       <div id="signup" style="display: none;"class="alert alert-danger">
                          <a href="<?=site_url('signup'); ?>" class="inline  btn btn-danger no-decoration"><i class="icon-arrow-right icon-white"></i> Particulier</a>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=site_url('signup/pro'); ?>" class="inline btn btn-danger disabled "><i class="icon-arrow-right icon-white"></i> Professionnel</a>
                       </div>
                       <br/><br/>
                    </div>
                    <div class="col-md-6  col-md-push-1">
                        <header class="special">
                            <span class="icon fa-lock"></span>
                            <h2>Connexion</h2>
                        </header>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger">
                                <strong>Authentification</strong> echouée!<br/>
                                <p>Votre identifiant ou mot de passe est incorrect.
                                Si vous venez de vous inscrire, pensez à activer votre compte via le lien envoyé à votre adresse email.</p>
                            </div>
                        <?php endif; ?>
                        <?php
                        $attribute=array('class'=>' form-horizontal','id'=>'login-form-id','role'=>'form');
                        echo form_open('signup/login',$attribute); ?>
                        <div class="row 50%">
                            <?php echo form_error('email','<span class="error">','</span>');?>
                            <label class="col-sm-4 6u 12u(mobile)"  for="email">Email:</label>
                            <div class=" 6u 12u(mobile)"">
                                 <input class="validate[required,custom[email]] text-input " type="text"  placeholder="Adresse email" name="email" value="<?php echo set_value('email');?>"/>
                            </div>
                        </div>
                        <div class="row 50%">
                            <?php echo form_error('motdepasse','<span class="error">','</span>');?>
                            <label class="col-sm-4 6u 12u(mobile)" for="motdepasse" >Mot de passe:</label>
                           <div class="6u 12u(mobile)"">
                                <input class="validate[required,length[6,12],custom[passwordLength]] text-input" type="password" class="form-control" placeholder="Mot de passe" name="motdepasse" value="<?php  echo set_value('motdepasse');?>"/>
                           </div>
                        </div>
                        <br/><br/>
                        <div class="clearfix">
                          <button type="submit" class="button special" style="background-color: #313334;border: none"> <i class="glyphicon glyphicon-home"></i> Se connecter</button>
                        </div>
                        <div>
                              <!--<a  class="no-decoration" href="<?php echo site_url('account/forgotpassword')?>">> Mot de passe oublié ?</a>-->
                              <a href="#"  id="forgotpassword-form-trigger" class="no-decoration"> Mot de passe oublié ?</a>
                              <?php echo form_close(); ?>
                               <div id="forgotpassword" style="display: none">
                                   <?php
                                   $attribute=array('class'=>'','id'=>'formrecoveraccountID');
                                   echo form_open('account/forgotpassword',$attribute)?>
                                   <p>Entrez votre adresse e-mail et nous vous enverrons immédiatement la procédure pour reiinitialisez votre mot de passe par e-mail (vérifiez le dossier "Spam" si besoin) </p>
                                       <?php echo form_error('email','<span class="error">','</span>');?>
                                       <label class="col-sm-4 6u 12u(mobile)"  for="email">Email:</label>
                                       <div class=" 6u 12u(mobile)">
                                            <input  type="email"  placeholder="Adresse email" name="email" value="<?php echo set_value('email');?>"/>
                                       </div>
                                   <br/>
                                   <div class=" 4u 8u(mobile)">
                                        <button type="submit" class="button special" style="background-color: #313334;border: none; width: 10px; margin-left: 250px">Envoyer<i class="glyphicon glyphicon-arrow-right"></i> </button>
                                   </div>
                                   <?php echo form_close();?>
                               </div>

                        </div>
                    </div>
            </div>
                    <div class="col-md-1" ></div>
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
                            <li>Une mise en relation simple avec un expéditeur ou un transporteur</li>

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
    </section>
</article>

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
      function showSlide(ele)
      {
          var srcElement = document.getElementById(ele);
          if(srcElement != null) {
              if(srcElement.style.display == "block") {
                  srcElement.slideDown();
                  srcElement.style.display= 'none';
              }
              else {
                  srcElement.slideUp();
                  srcElement.style.display='block';
              }
              return false;
          }

      }
</script>
<script>
        $(document).ready(function(){
            var forgotpassword = $('#forgotpassword');
            $('#forgotpassword-form-trigger').click(function(event){
                event.preventDefault();
                event.stopPropagation();
                if (forgotpassword.is(":visible"))
                {
                    forgotpassword.slideUp(400);
                }
                else
                {
                    forgotpassword.slideDown(400);
                }
            });

            $(document).not('#forgotpassword').click(function(event) {
                event.preventDefault();
                if (forgotpassword.is(":visible"))
                {
                    forgotpassword.slideUp(400);
                }
            });


        })
    </script>
<script>
    function signInCallback(authResult) {
        if (authResult['code']) {
            alert('test');

            // Hide the sign-in button now that the user is authorized, for example:
            $('#signinButton').attr('style', 'display: none');

            // Send the code to the server
            $.ajax({
                type: 'POST',
                url: 'plus.php?storeToken',
                contentType: 'application/octet-stream; charset=utf-8',
                success: function(result) {
                    // Handle or verify the server response if necessary.

                    // Prints the list of people that the user has allowed the app to know
                    // to the console.
                    console.log(result);
                    if (result['profile'] && result['people']){
                        $('#results').html('Hello ' + result['profile']['displayName'] + '. You successfully made a server side call to people.get and people.list');
                    } else {
                        $('#results').html('Failed to make a server-side call. Check your configuration and console.');
                    }
                },
                processData: false,
                data: authResult['code']
            });
        } else if (authResult['error']) {
            // There was an error.
            // Possible error codes:
            //   "access_denied" - User denied access to your app
            //   "immediate_failed" - Could not automatially log in the user
            // console.log('There was an error: ' + authResult['error']);
        }
    }
</script>

