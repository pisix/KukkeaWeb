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
                            <h3  style="font-weight: bold">Compte</h3>
                        </header>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne" style="background-color: #95DAD1">
                                    <h4 class="panel-title" >
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Comment créer mon compte ?                                         </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div>
                                        Si vous n'avez pas encore de compte Kukkea, rendez-vous sur : <a class="no-decoration" href="<?php echo site_url('signup');?>"><?php echo site_url('signup');?></a><br/>

                                        Vous aurez besoin de  votre adresse e-mail. L'inscription à Kukkea est totalement gratuite, que vous cherchiez à expédier, transporter ou à publier votre annonce !

                                        Après vous être identifié, merci de bien compléter et mettre à jour  votre profil.

                                    </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo" style="background-color: #95DAD1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Est-ce que Kukkea peut supprimer mon compte ?                                         </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <p>
                                            Kukkea se réserve le droit, conformément à ses <a href="<?php echo site_url('help/cgu')?>" class="no-decoration">conditions générales</a>, de limiter, suspendre ou désactiver votre compte.<br/><br/>

                                            <span class="bold"> Votre compte peut être temporairement désactivé en raison de votre <a href="<?php echo site_url('help/experience');?>"> taux de d'avis</a> positif. Pour réactiver votre compte dans ce cas, suivez les étapes indiquées dans l'e-mail que vous avez reçu.</span><br/><br/>

                                            <span class="bold"> Votre compte peut être désactivé au cours d'un contrôle des comptes de Kukkea.</span> Les contrôles participent à l'effort que nous menons pour établir une communauté de confiance et pour faire respecter nos conditions générales,<br/>

                                            Il peut se produire ce qui suit, et vous en serez ou non prévenu directement :
                                            <ul>
                                                <li>Votre compte peut être désactivé ou suspendu</li>
                                                <li>Vous risquez de ne plus avoir accès à la plate-forme, à votre compte ou à votre contenu, ni recevoir l'aide de l'assistance utilisateurs de Kukkea.</li>
                                            </ul>
                                        </p>

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

