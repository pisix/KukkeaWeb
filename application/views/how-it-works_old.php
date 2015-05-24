<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/analyticstracking'); ?>

<div class="container-fluid" >
            <div class="col-md-1"></div>
             <div class="col-md-2">
                 <ul class="nav nav-tabs nav-stacked" style="background-color: #339BB9;">
                     <li class="active">
                         <a href="<?php echo site_url('help/howitworks');?>" style="color:#339BB9;">Comment ça marche</a>
                     </li>
                     <li>
                         <a href="<?php echo site_url('help/experience');?>" style="color: white">Niveaux d'Expérience</a>
                     </li>
                     <li>
                         <a href="<?php echo site_url('help/confident');?>" style="color: white">Confiance et sérénité</a>
                     </li>
                     <li>
                         <a href="<?php echo site_url('help/questions');?>"  style="color: white">Questions Fréquentes</a>
                     </li>
                 </ul>

             </div>
            <div class="col-md-8 col-md-offset-0" style="background-color: white;">
                <h2 style="color: #339AB8;">Comment ça marche</h2>
                <div>
                    <ul class="nav nav-tabs"  >
                        <li class="active col-md-6" ><a data-toggle="tab" href="#expediteur" style="/*background-color: #339BB9;"><p style="/*color: #ffffff;*/ text-align:center;font-weight: bold;">Vous êtes un expediteur ?<br/>
                                <span>› Réservez votre Kg</span></p></a></li>
                        <li class="col-md-6"><a data-toggle="tab" href="#transporteur" style="/*background-color: #339BB9;"> <p style="/*color: #ffffff;*/text-align: center; font-weight: bold;">Vous êtes transporteur ?<br/>
                                <span>› Proposez vos Kg </span></p></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="expediteur" class="tab-pane fade in active"><br/><br/><br/><br/>
                            <div class="col-md-12 alert alert-info">
                                Simple et économique : réservez facilement votre Kg en ligne et envoyez des colis  moins cher, en toute confiance. Même en dernière minute !</p>
                            </div>
                            <!--<img src="https://d1ovtcjitiy70m.cloudfront.net/vi-1/images/blog/booking/illustration-passenger.jpg" class="display-block" alt=""/>-->
                            <ol>
                                    <div class=" pull-left ">
                                        <h3>
                                            <li class="glyphicon glyphicon-search" style="font-size: 1.2em"></li>1.
                                            <a href="<?php echo site_url("annonce/search");?>" target="_blank">Recherchez</a>
                                            un voyage
                                        </h3>

                                        <p>Entrez vos villes de départ et de destination, ainsi que la date de voyage et choisissez parmi les conducteurs proposant des trajets qui vous conviennent. Si vous voulez des précisions sur un voyage, vous pouvez envoyer un message au transporteur, ou le contactez par téléphone.</p>
                                    </div>
                                    <div class="pull-right">
                                        <p>
                                            Consultez le profil vérifié des transporteurs: photo, avis, note, expérience.
                                            <a href="<?php echo site_url("help/confident");?>"  target="_blank">En savoir plus sur la confiance dans la communauté</a>
                                            .
                                        </p>
                                    </div>
                                    <div class=" pull-left ">
                                        <h3 class="no-bold size20">
                                            <li class="glyphicon glyphicon-plus red" style="font-size: 1.2em;"></li> 2.<a href="<?php echo site_url("annonce/newannonce")?>" target="_blank">Publiez</a>
                                            votre annonce si vous ne trouvez pas de transporteur correspondant au trajet de votre colis
                                        </h3>
                                        <p>Indiquez la date et l'horaire de votre trajet, l'itinéraire, le texte qui accompagne votre annonce et le prix que vous proposez pour le transport de votre colis. la confirmation est immédiate et vous n'avez rien à faire.</p>
                                    </div>
                                    <div class="pull-left ">
                                    <h3 >   <li class="glyphicon glyphicon-ok blue" style="font-size: 1.2em"></li> 3. Réservez vos  Kg</h3>
                                        <p>
                                            Vous réservez vos Kg en entrant en contact avec le transporteur soit via téléphone, soit par adresse email.
                                        </p>
                                    </div>

                                    <div class=" pull-left ">
                                        <h3><li class="glyphicon glyphicon-plane green" style="font-size: 1.2em"></li> 4. Expediez votre colis</h3>
                                        <p>
                                            Rendez-vous au lieu de départ convenu, bien à l'heure. Donnez votre
                                            <strong>Colis</strong>
                                            au transporteur et la somme d'argent convenu ainsi que toute les informations necessaire pour remettre le colis à son arrivé. Bonne route à votre colis !
                                        </p>
                                    </div>
                                    <div class="hint-rating-review pull-right ">
                                        <p class="size13">
                                            Une fois le colis expedié, laissez un avis à votre transporteur, afin d'en recevoir un en retour, et d'augmenter votre
                                            <a href="<?php echo site_url("help/experience");?>" target="_blank">Niveau d'expérience</a>

                                        </p>
                                    </div>
                            </ol>
                        </div>
                        <div id="transporteur" class="tab-pane fade"><br/><br/><br/><br/>
                            <div class="col-md-12 alert alert-info" style="margin-left: 0px;">
                                Économique et convivial: partagez vos frais de voyage en prenant des Kg.
                            </div>

                            <ol >
                                    <div class=" pull-left ">
                                        <h3 class="no-bold size20">
                                            <li class="glyphicon glyphicon-plus blue" style="font-size: 1.2em;"></li> 1.<a href="<?php echo site_url("annonce/newannonce")?>" target="_blank">Publiez</a>
                                            votre annonce
                                        </h3>
                                        <p>Indiquez la date et l'horaire de votre trajet, l'itinéraire, le texte qui accompagne votre annonce et le prix par Kg. la confirmation est immédiate et vous n'avez rien à faire.</p>
                                    </div>
                                    <div class=" pull-left ">
                                        <h3 class="no-bold "><li class="glyphicon glyphicon-phone green" style="font-size: 1.2em;"></li> 2. Vos expéditeurs réservent par téléphone</h3>
                                    </div>
                                    <div class=" pull-left ">
                                        <h3 class="no-bold size20"><li class="glyphicon glyphicon-euro blue" style="font-size: 1.2em;"></li> 3. Recevez votre argent</h3>
                                        <p>
                                            Rendez-vous au lieu de rencontre convenu, bien à l'heure ! Récupérez le
                                            <strong>Colis</strong>
                                            de l'expéditeur
                                        </p>
                                    </div>

                                    <div class=" pull-left ">
                                        <h3 class="no-bold size20"><li class="glyphicon glyphicon-road green" style="font-size: 1.2em;"></li> 4. Transportez les colis</h3>

                                    </div>
                                    <div class="pull-left">
                                        <h3 class="no-bold size20"><li class="glyphicon glyphicon-certificate blue" style="font-size: 1.2em;"></li> 5. Remettez  les colis</h3>
                                        <p>
                                            Rendez-vous au lieu de rencontre convenu avec la personne devant recuperer le colis, bien à l'heure ! Rémettez le
                                            <strong>Colis</strong>
                                            de l'expéditeur
                                        </p>
                                    </div>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
</div>
<script type="text/javascript" src="<?=base_url('js/jquery.1.8.min.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
