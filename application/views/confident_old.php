<?php $this->load->view('includes/analyticstracking'); ?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-1"></div>

    <div class="col-md-2">
         <ul class="nav nav-tabs nav-stacked" style="background-color: #339BB9;">
             <li>
                 <a href="<?php echo site_url('help/howitworks');?>" style="color:white;">Comment ça marche</a>
             </li>
             <li>
                 <a href="<?php echo site_url('help/experience');?>" style="color: white">Niveaux d'Expérience</a>
             </li>
             <li class="active">
                 <a href="<?php echo site_url('help/confident');?>" style="color: #339BB9;">Confiance et sérénité</a>
             </li>
             <li>
                 <a href="<?php echo site_url('help/questions');?>"  style="color: white">Questions Fréquentes</a>
             </li>
         </ul>
    </div>
    <div class="col-md-8"  style="background-color: white;">
        <section class="col-md-12">
            <div >
                <h2 style="color: #339AB8;" >Confiance & Sérénité</h2>
                <div class="blog-intro">
                    <p  style="text-align: justify;">Nous mettons tout en oeuvre pour que Kukkea soit le plus sûr possible. D'abord nous vérifions au maximum l'identité de nos membres grâce par exemple à la certification de leur numéro de téléphone mobile, la certification de leur lieu de résidence. Ensuite la communauté utilise les profils et les avis pour évaluer les membres et mettre de côté ceux qui ne respectent pas l'esprit de la consommation collaborative. Enfin, Kukkea prévoit la mise sur pieds d'une équipe Relations Membres dédiée, disponible tous les jours pour aider nos membres à utiliser au mieux notre service de d'expedition de colis entre particuliers.</p>
                </div>
            </div>
            <div >
                <div class=" clearfix">
                    <div >
                        <h2>Authenticité</h2>
                       <p  style="text-align: justify;">Kukkea est un véritable réseau de transport de colis entre particulier basé sur une communauté de confiance. C’est pourquoi lors de l’inscription, Kukkea vous demande votre vrai nom  et une vraie photo (avatar interdit). En plus de certifier votre email et votre numéro de téléphone et votre adresse de résidence, Kukkea vous proposera  le « Facebook connect ». Cette fonctionnalité permettra d’afficher votre réseau social, ce qui rassurera les autres expediteurs et les transporteurs de colis car vous confirmerez ainsi votre véritable identité.</p>
                    </div>
                </div>
                <div class=" clearfix">
                    <div >
                        <h2>Avis des membres</h2>
                        <p  style="text-align: justify;">La confiance est au coeur de toutes les communautés et Kukkea ne fait pas exception. La confiance est visible dans Kukkea puisque à chaque fois que deux membres se rencontrent lors d'une expédition de colis, ils s'évaluent sur le site et construisent ainsi leur réputation. Cela signifie que avant de prévoir l'expédition d'un colis vous pouvez lire les avis des autres membres et bénéficier de l'expérience des autres membres.</p>
                    </div>
                    <div >
                        <img src="<?php echo base_url().'images/site/eval.png';?>" alt="Evaluation"/>
                    </div>
                </div>
                <div class=" clearfix">
                    <div >
                        <h2>Confidentialité</h2>
                        <p  style="text-align: justify;">Kukkea a besoin de votre numéro de téléphone et de votre adresse de résidence pour vérifier votre identité et pour vous envoyer des alertes quand vous organisez un trajet. Mais cela ne veut pas dire que n'importe qui pourra vous appeler ! Si vous préférez recevoir des emails ou que vous n'avez juste pas le temps de répondre, il suffit d'activer l'option Numéro Masqué pour que votre numéro ne soit pas affiché sur votre profil.</p>
                    </div>
                    <div >
                        <img src="<?php echo base_url().'images/site/phone.png';?>" alt="Téléphone"/>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <div class="col-md-1"></div>
</div>

<!--<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>-->
<?php
$this->minify->js(array('jquery.js', 'bootstrap.js'));
echo $this->minify->deploy_js();
?>
