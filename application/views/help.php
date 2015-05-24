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
                                <a href="<?php echo site_url('help');?>" class="no-decoration">Débuter avec Kukkea</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/creercompte');?>" class="no-decoration">Compte</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/confident');?>" class="no-decoration">Profil</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/questions');?>"class="no-decoration">Expéditions de colis</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/questions');?>"class="no-decoration">Transports de colis</a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('help/questions');?>"class="no-decoration">Confiance et sécurité</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/questions');?>"class="no-decoration">Communauté</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('help/questions');?>"class="no-decoration">Contacter Kukkea</a>
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
                    <section class="col-md-12">
                        <header>
                            <h3  style="font-weight: bold">Debuter avec Kukkea</h3>
                        </header>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne" style="background-color: #95DAD1">
                                    <h4 class="panel-title" >
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Mode d'emploi
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div>
                                        <header>
                                            <h3  style="font-weight: bold"> Une communauté basée sur le partage <li class="icon  fa fa-share-square-o green" style="font-size: 1.2em"></li></h3>
                                        </header>
                                        <p>
                                            Une communauté basée sur le partage
                                            Kukkea est né en 2014, lorsque un voyageur disposant d'espace dans sa valise à accepter de transporter un colis d'une famille pesant 5kg, qui cherchait comment expédiez un colis à leur fils en France pour ses études. Aujourd'hui, des millions d'expéditeurs et de voyageurs choisissent de créer un compte Kukkea gratuit pour publier leur annonce ou réserver des Kg partout dans le monde.
                                        </p>
                                    </div>
                                    <div>
                                        <header>
                                            <h3  style="font-weight: bold">Des services sécurisés <li class="icon  fa fa-lock blue" style="font-size: 1.2em"></li></h3>
                                        </header>
                                        <p>
                                            Avec Kukkea, le partage est simple, agréable et sûr. Nous vérifions les profils personnels , nous proposons un système de notation intelligent qui permet aux expéditeurs et voyageurs d'évaluer les autres utilisateurs.
                                        </p>
                                    </div>

                                    <div>
                                        <header>
                                            <h3  style="font-weight: bold">Une assistance utilisateurs 24h/24 <li class="icon  fa fa-support red" style="font-size: 1.2em"></li></h3>
                                        </header>
                                        <p>
                                            Que vous soyez expéditeur ou voyageur, nous sommes là pour vous accompagner tout au long de votre expérience. Nous avons répondu aux questions les plus courantes sur Kukkea dans notre Centre d'aide. Pour tout le reste, vous pouvez nous contacter en vous rendant sur kukkea.com/help/contact.                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo" style="background-color: #95DAD1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Comment expédier un colis
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <?php $this->load->view('comment-expedier')?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree" style="background-color: #95DAD1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Comment transporter un colis
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" >
                                    <div class="panel-body">
                                        <?php $this->load->view('comment-transporter')?>

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

