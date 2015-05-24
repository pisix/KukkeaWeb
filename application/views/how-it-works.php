<?php $this->load->view('includes/analyticstracking'); ?>

<br/>
<br/>
<article id="main">
    <!-- One -->
    <section class="wrapper style4 container">

        <div class="row 0%">
            <div class="4u 12u(narrower)">

                <!-- Sidebar -->
                <div class="sidebar">
                    <section>
                        <!--<header>
                            <h3>Magna Feugiat</h3>
                        </header>-->
                        <ul class="" >
                            <li class="active">
                                <a href="<?php echo site_url('help/howitworks');?>" class="no-decoration">Comment ça marche</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/experience');?>" class="no-decoration">Niveaux d'Expérience</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/confident');?>" class="no-decoration">Confiance et sérénité</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/questions');?>"class="no-decoration">Questions Fréquentes</a>
                            </li>
                        </ul>                        <footer>
                            <!-- <ul class="buttons">
                                 <li><a href="#" class="button small">Learn More</a></li>
                             </ul>-->
                        </footer>
                    </section>


                </div>

            </div>
                <div class="8u 12u(narrower) important(narrower)">

                    <!-- Content -->
                    <div class="content" style="text-align: justify">
                        <section >
                            <header>
                                <h3  style="font-weight: bold">Comment ça marche</h3>
                            </header>
                            <div class="" style="background-color: white;">
                                <div>
                                    <ul class="nav nav-tabs">
                                        <li class="active col-md-6" ><a data-toggle="tab" href="#expediteur"  class="no-decoration" style="text-align:center;font-weight: bold;"><p>Vous êtes un expediteur ?<br/>
                                                    <span>› Réservez vos Kg</span></p></a></li>
                                        <li class="col-md-6"><a data-toggle="tab" href="#transporteur" class="no-decoration"> <p style="text-align: center; font-weight: bold;">Vous êtes transporteur ?<br/>
                                                    <span>› Proposez vos Kg </span></p></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="expediteur" class="tab-pane fade in active"><br/>
                                                Simple et économique : réservez facilement votre Kg en ligne et envoyez des colis  moins cher, en toute confiance. Même en dernière minute !</p>
                                            <!--<img src="https://d1ovtcjitiy70m.cloudfront.net/vi-1/images/blog/booking/illustration-passenger.jpg" class="display-block" alt=""/>-->
                                            <ol>
                                                <div class=" pull-left ">
                                                    <h3>
                                                        <li class="icon fa fa-search" style="font-size: 1.2em"></li><span class="bold">1.</span>
                                                        <a href="<?php echo site_url("annonce/search");?>" target="_blank" class="bold">Recherchez</a>
                                                        <span class="bold">un voyage</span>
                                                    </h3>

                                                    <p>Entrez vos villes de départ et de destination, ainsi que la date de voyage et choisissez parmi les conducteurs proposant des trajets qui vous conviennent. Si vous voulez des précisions sur un voyage, vous pouvez envoyer un message au transporteur, ou le contactez par téléphone.</p>
                                                </div>
                                                <div class="pull-right">
                                                    <p>
                                                        Consultez le profil vérifié des transporteurs: photo, avis, note, expérience.
                                                        <a href="<?php echo site_url("help/confident");?>"  target="_blank" class="no-decoration">En savoir plus sur la confiance dans la communauté</a>
                                                        .
                                                    </p>
                                                </div>
                                                <div class=" pull-left ">
                                                    <h3 class="no-bold size20">
                                                        <li class="icon fa fa-plus red" style="font-size: 1.2em;"></li> <span class="bold">2. </span><a href="<?php echo site_url("annonce/newannonce")?>" target="_blank" class="bold">Publiez</a>
                                                        <span  class="bold">votre annonce si vous ne trouvez pas de transporteur correspondant au trajet de votre colis<span>
                                                    </h3>
                                                    <p>Indiquez la date et l'horaire de votre trajet, l'itinéraire, le texte qui accompagne votre annonce et le prix que vous proposez pour le transport de votre colis. la confirmation est immédiate et vous n'avez rien à faire.</p>
                                                </div>
                                                <div class="pull-left ">
                                                    <h3 class="bold">   <li class="icon fa fa-check blue" style="font-size: 1.2em"></li> 3. Réservez vos  Kg</h3>
                                                    <p>
                                                        Vous réservez vos Kg en entrant en contact avec le transporteur soit via téléphone, soit par adresse email.
                                                    </p>
                                                </div>

                                                <div class=" pull-left ">
                                                    <h3 class="bold"><li class="icon  fa fa-plane green" style="font-size: 1.2em"></li> 4. Expediez votre colis</h3>
                                                    <p>
                                                        Rendez-vous au lieu de départ convenu, bien à l'heure. Donnez votre
                                                        <strong>Colis</strong>
                                                        au transporteur et la somme d'argent convenu ainsi que toute les informations necessaire pour remettre le colis à son arrivé. Bonne route à votre colis !
                                                    </p>
                                                </div>
                                                <div class="hint-rating-review pull-right ">
                                                    <p class="size13">
                                                        Une fois le colis expedié, laissez un avis à votre transporteur, afin d'en recevoir un en retour, et d'augmenter votre
                                                        <a href="<?php echo site_url("help/experience");?>" target="_blank" class="no-decoration">Niveau d'expérience</a>

                                                    </p>
                                                </div>
                                            </ol>
                                        </div>
                                        <div id="transporteur" class="tab-pane fade"><br/>
                                                Économique et convivial: partagez vos frais de voyage en prenant des Kg.
                                            <ol >
                                                <div class=" pull-left ">
                                                    <h3 class="no-bold size20">
                                                        <li class="icon fa fa-plus red" style="font-size: 1.2em;"></li><span class="bold">1.<a href="<?php echo site_url("annonce/newannonce")?>" target="_blank" class="bold">Publiez</a>
                                                        votre annonce</span>
                                                    </h3>
                                                    <p>Indiquez la date et l'horaire de votre trajet, l'itinéraire, le texte qui accompagne votre annonce et le prix par Kg. la confirmation est immédiate et vous n'avez rien à faire.</p>
                                                </div>
                                                <div class=" pull-left ">
                                                    <h3 class="no-bold "><li class="icon fa fa-phone green" style="font-size: 1.2em;"></li><span class="bold"> 2. Vos expéditeurs réservent par téléphone</span></h3>
                                                </div>
                                                <div class=" pull-left ">
                                                    <h3 class="no-bold size20" ><li class="icon fa fa-euro blue" style="font-size: 1.2em;"></li> <span class="bold">3. Recevez votre argent</span></h3>
                                                    <p>
                                                        Rendez-vous au lieu de rencontre convenu, bien à l'heure ! Récupérez le
                                                        <strong>Colis</strong>
                                                        de l'expéditeur
                                                    </p>
                                                </div>

                                                <div class=" pull-left ">
                                                    <h3 class="no-bold size20"><li class="icon fa fa-road green" style="font-size: 1.2em;"></li> <span class="bold">4. Transportez les colis</span></h3>

                                                </div>
                                                <div class="pull-left">
                                                    <h3 class="no-bold size20"><li class="icon fa fa-send  blue" style="font-size: 1.2em;"></li><span class="bold">5. Remettez  les colis</span> </h3>
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

                        </section>
                    </div>

                </div>
        </div>
    </section>

    <!-- Two -->

</article><script type="text/javascript" src="<?=base_url('js/jquery.1.8.min.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>

