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
                            <h3  style="font-weight: bold">Niveau d'expérience</h3>
                        </header>
                        <div >
                            <table class="table table-responsive ">
                                <thead>
                                <tr>
                                    <th/>
                                    <th class="beginner" id="beginner">Débutant</th>
                                    <th class="regular"  id="regular">Habitué</th>
                                    <th class="confirmed"  id="confirmed">Confirmé</th>
                                    <th class="expert"  id="expert">Expert</th>
                                    <th class="voyageur"  id="ambassador">Voyageur</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Email & mobile vérifiés</th>
                                    <td  style="background-color: #F8F8F8;">Bienvenue !</td>
                                    <td style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-ok-sign greenLight"></i>
                                        <i class="glyphicon glyphicon-ok-sign greenLight"></i>

                                    </td>
                                    <td style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-ok-sign greenLight"></i>
                                        <i class="glyphicon glyphicon-ok-sign greenLight"></i>
                                    </td>
                                    <td style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-ok-sign greenLight"></i>
                                        <i class="glyphicon glyphicon-ok-sign greenLight"></i>
                                    </td>
                                    <td style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-ok-sign greenLight"></i>
                                        <i class="glyphicon glyphicon-ok-sign greenLight"></i>
                                    </td>
                                </tr>
                                <!--<tr>
                                    <th>Adresse de residence</th>
                                    <td style="background-color: #F8F8F8;">
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-home greenLight" ></i>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-home greenLight" ></i>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-home greenLight" ></i>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-home greenLight" ></i>
                                    </td>
                                </tr>-->
                                <tr>
                                    <th>Avis reçus</th>
                                    <td  style="background-color: #F8F8F8;">
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-star greenLight"></i>
                                        <div>1 avis</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-star greenLight"></i>
                                        <div>3 avis</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-star greenLight"></i>
                                        <div>6 avis</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-star greenLight"></i>
                                        <div>12 avis</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Part d'avis positifs reçus</th>
                                    <td style="background-color: #F8F8F8;">
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-star greenLight"></i>
                                        <div>100%</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-star greenLight"></i>
                                        <div>>70%</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-star greenLight"></i>
                                        <div>>80%</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-star greenLight"></i>
                                        <div>>90%</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ancienneté</th>
                                    <td  style="background-color: #F8F8F8;">
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-calendar greenLight"></i>
                                        <div>1 mois</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-calendar greenLight"></i>
                                        <div>3 mois</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-calendar greenLight"></i>
                                        <div>6 mois</div>
                                    </td>
                                    <td  style="background-color: #F8F8F8;">
                                        <i class="glyphicon glyphicon-calendar greenLight"></i>
                                        <div>12 mois</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <h3 class="padding-top margin-bottom">Votre niveau d’Expérience sur Kukkea</h3>
                            <p>Avoir un niveau d’Expérience élevé sur le site indique que vous êtes un membre de confiance de la communauté Kukkea. Votre niveau est calculé en fonction de 3 facteurs :</p>
                            <ul>
                                <li class="glyphicon glyphicon-phone" >&nbsp;La vérification de votre email, de votre numéro de téléphone</li><br/><br/>
                                <li class="glyphicon glyphicon-home" >&nbsp;La vérification de votre adresse de residence</li><br/><br/>
                                <li class="glyphicon glyphicon-star" >&nbsp;Les avis positifs reçus (un avis positif = 3 à 5 étoiles)</li><br/><br/>
                                <li class="glyphicon glyphicon-calendar">&nbsp;Votre ancienneté sur le site depuis votre inscription</li>
                            </ul>
                            <br/>
                            <h3 class="padding-top margin-bottom">La confiance, c’est la clé !</h3>
                            <div class=" clearfix">
                                <p>
                                    En augmentant notre niveau d’Expérience, en laissant des avis, et en renseignant votre adresse de residence  Kukkea, nous créons ensemble encore plus de confiance au sein de la communauté. La confiance est un élément très puissant qui nous permet de partager toujours plus. Plus nous partageons, plus nous profitons !
                                    <br/>
                                    <br/>
                                </p>
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

