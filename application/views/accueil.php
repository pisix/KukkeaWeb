<?php $this->load->view('includes/analyticstracking'); ?>
<div class=" ">

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Banner -->
<section id="banner">

    <!--
        ".inner" is set up as an inline-block so it automatically expands
        in both directions to fit whatever's inside it. This means it won't
        automatically wrap lines, so be sure to use line breaks where
        appropriate (<br />).
    -->
    <div class="inner">

        <header>
            <h2>Kukkea</h2>
        </header>
        <p><strong>Gagnez de l'argent en mettant en vente l'espace disponible dans vos valises.
            <br />
            Envoyez vos colis par des particuliers moyennant une petite participation financiere.
            <br />
        <footer>
            <ul class="buttons vertical">
                <li><a href="#main" class="button">En savoir plus</a></li>
            </ul>
        </footer>
               <br/>

         <p><span style="font-weight: bold; color: #83D3C9"><?php echo $nombre_utilisateurs;?></span> personnes utilisent Kukkea pour expedier des colis</p>

    </div>

</section>
<section class="wrapper style1 container special">

    <div class="row">

        <div class=" col-xs-8 col-md-4 col-sm-3 col-lg-4">
            <section>
                <span class="icon featured fa-plane"></span>
                <header>
                    <h3>Expéditeurs: Expédiez vos colis à bas prix</h3>
                </header>
                <p>Réservez facilement vos Kg en ligne et Expediez à prix reduit votre colis, même à la dernière minute ! .
                    <a href="<?php echo site_url('/help/howitworks');?>">En savoir plus sur l'envoi de colis pour expediteur</a>
                </p>
            </section>

        </div>
        <div class="clearfix visible-xs-block"></div>
        <div class="col-xs-8 col-md-4 col-sm-3 col-lg-4">

            <section>
                <span class="icon featured fa-money"></span>
                <header>
                    <h3>Voyageurs:
                        Réduisez vos frais de voyages</h3>
                </header>
                <p>                    <a href="<?php echo site_url('/help/howitworks#transporteur');?>">En savoir plus sur l'envoi de colis pour voyageur</a>
                </p>
            </section>

        </div>
        <div class="clearfix visible-xs-block"></div>
        <div class="col-xs-8 col-md-4 col-sm-3 col-lg-4">

            <section>
                <span class="icon featured fa-car"></span>
                <header>
                    <h3>Kukkea C'est:
                        La Confiance , La Serénite, l'Economie et la Rapidité</h4></h3>
                </header>
                <p>                     <a href="<?php echo site_url('/help/confident');?>">En savoir plus sur la confiance et la serénité.</a></p>
            </section>

        </div>
    </div>
</section>


<!-- Main -->
<article id="main" style="margin-top:-90px ">

    <!-- One -->

    <!-- Two -->

    <!-- Three -->
    <section class="wrapper style3 container special visible-md-block visible-sm-block visible-lg-block" style="width: 700px; height: 400px" >
        <header class="major" style="margin-top: -80px">
            <h2>KUKKEA</h2>
        </header>
        <div class="row embed-responsive embed-responsive-16by9" style="margin-top:-100px; margin-left: -30px">
                <!--<video style="width:100%;" src="<?php echo base_url('video/KUKKEA.mp4')?>" autoplay="true" loop="true" controls></video>-->
            <!--<iframe width="540" height="310" align="center"
                    src="http://www.youtube.com/embed/1MN5tygCSik?feature=player_detailpage">
            </iframe>-->
            <iframe width="540" height="310" allowfullscreen src="http://www.youtube.com/embed/vpeRfqBOd44?feature=player_detailpage&autoplay=1" frameborder="0"></iframe>
            <!--<div style="position: fixed; z-index: -99; width: 100%; height: 100%" class="embed-responsive">
                <iframe frameborder="0" height="100%" width="100%"
                        src="https://youtube.com/embed/z9t9N9xWM30?feature=player_detailpage?autoplay=1&controls=0&showinfo=0&autohide=1">
                </iframe>
            </div>-->
        </div>

    </section>
    <section class="wrapper style2 container special-alt" style="height: 500px;width: 1100px;">
        <div class="row 50%">
                <div class="6u 12u(narrower) col-xs-8 col-md-12 col-sm-3 col-lg-12">

                    <header>
                        <h2>Notre Communauté</h2>
                    </header>
                    <p style="text-align: justify">
                        Basé sur l'esprit de <strong>confiance</strong> et de <strong>partage</strong>, nous connectons les millions de voyageurs qui se déplacent tous les jours, aux millions d'expéditeurs désirant envoyer des colis. Vous et nous sommes le réseau d'expédition de colis le plus sur et le plus économique.
                        Chacun d'entre nous peut contribuer au developpement durable et à la sauvegarde de l'environnement en expédiant des colis entre nous, nous nous inserons dans cette démarche.
                    </p>
                    <!--<footer>
                        <ul class="buttons">
                            <li><a href="#" class="button">Find Out More</a></li>
                        </ul>
                    </footer>-->

                </div>
                <div class="3u 12u(narrower) important(narrower) col-xs-8 col-md-12 col-sm-3 col-lg-12">

                    <ul class="featured-icons">
                        <li><span class="icon fa-facebook"><span class="label">Facebbok</span></span></li>
                        <li><span class="icon fa-google-plus"><span class="label">Google Plus</span></span></li>
                        <li><span class="icon fa-twitter"><span class="label">Twitter</span></span></li>
                        <li><span class="icon fa-foursquare"><span class="label">Foursquare</span></span></li>
                        <li><span class="icon fa-instagram"><span class="label">Instagram</span></span></li>
                        <li><span class="icon fa-youtube"><span class="label">Youtube/span></span></li>
                    </ul>

                </div>
               <!-- <div class="3u 12u(narrower) important(narrower)">

                   <!-- <div class="fb-like-box" data-href="https://www.facebook.com/KukkeaShare" data-width="260" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>

               </div>-->
        </div>
    </section>
<!--<section class="wrapper style1 container special">
    <header class=>
        <h2 style="font-weight:  bold">Ils recommandent Kukkea</h2>
    </header>
    <div class="row">
             <div class="4u 12u(narrower)">


            <section>
                <img class="img-circle" src="<?php echo base_url('images/site/logo.png')?>" width="80px"height="80px"/>

                <p style="font-style: justify">
                    Recommendation 1 .
               </p>
            </section>

        </div>
        <div class="4u 12u(narrower)">

            <section>
                <img class="img-circle" src="<?php echo base_url('images/site/logo.png')?>" width="80px"height="80px"/>

                <p>
                    Recommendation 2 .
                </p>
            </section>

        </div>
        <div class="4u 12u(narrower)">

            <section>
                <img class="img-circle" src="<?php echo base_url('images/site/logo.png')?>" width="80px"height="80px"/>

                <p>
                    Recommendation 3.
                </p>
            </section>

        </div>
    </div>
</section>
-->



</article>

<!-- CTA -->
<section id="cta">

    <header>
        <h2> Pret à <strong>transporter</strong> un colis? Pret à <strong>expédier</strong> un colis?</h2>
        <p>#WhenWeShareWeGrow.</p>
    </header>
    <footer>
        <ul class="buttons">
            <li><a href="<?=site_url('signup/login'); ?>" class="button special no-decoration">Connectez-vous</a></li>
            <li><a href="<?=site_url('signup'); ?>" class="button no-decoration">Inscrivez-vous</a></li>
        </ul>
    </footer>

</section>
</div>


