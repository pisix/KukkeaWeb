<?php $this->load->view('includes/analyticstracking'); ?>

<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-1"></div>

    <div class="col-md-2">
         <ul class="nav nav-tabs nav-stacked" style="background-color: #339BB9;">
             <li>
                 <a href="<?php echo site_url('help/howitworks');?>" style="color:white;">Comment ça marche</a>
             </li>
             <li class="active">
                 <a href="<?php echo site_url('help/experience');?>" style="color: #339BB9;">Niveaux d'Expérience</a>
             </li>
             <li>
                 <a href="<?php echo site_url('help/confident');?>" style="color: white">Confiance et sérénité</a>
             </li>
             <li>
                 <a href="<?php echo site_url('help/questions');?>"  style="color: white">Questions Fréquentes</a>
             </li>
         </ul>
    </div>
    <div class="col-md-8"  style="background-color: white;">
    <h2 style="margin-top: -5px; color: #339AB8;"> Qu’est-ce que le niveau d’Expérience ?</h2><br/>
    <div class="col-md-12 alert alert-info" style="margin-left: -10px;">
        Lorsque vous envoyez un colis sur Kukkea, vous l'evnoyez via avec un membre faisant partie d’une communauté de confiance. Chaque membre dispose de son propre niveau d’Expérience, niveau qui évolue en fonction de son ancienneté et de son activité sur le site. Les niveaux d’Expérience vous aident à choisir le transporteur idéal pour votre colis avec Kukkea. Il existe 5 niveaux :
    </div>
    <h3> Niveaux d'Expérience sur Kukkea</h3>
         <div  class="col-md-12">
             <table class="table table-responsive ">
                 <thead>
                 <tr>
                     <th/>
                     <th class="beginner" id="beginner" style="background-color:  #EFF5FB; padding: 12px;">Débutant</th>
                     <th class="regular" style="background-color: #E0ECF8; padding: 12px;" id="regular">Habitué</th>
                     <th class="confirmed" style="background-color: #CED8F6;padding: 12px;" id="confirmed">Confirmé</th>
                     <th class="expert" style="background-color:  #A9BCF5;padding: 12px;" id="expert">Expert</th>
                     <th class="ambassador" style="background-color: #819FF7;padding: 12px;" id="ambassador">Voyageur</th>
                 </tr>
                 </thead>
                 <tbody>
                 <tr>
                     <th>Email & mobile vérifiés</th>
                     <td  style="background-color: #F8F8F8;">Bienvenue !</td>
                     <td style="background-color: #F8F8F8;">
                        <i class="glyphicon glyphicon-ok-sign blue"></i>
                        <i class="glyphicon glyphicon-ok-sign blue"></i>

                     </td>
                     <td style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-ok-sign blue"></i>
                         <i class="glyphicon glyphicon-ok-sign blue"></i>
                     </td>
                     <td style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-ok-sign blue"></i>
                         <i class="glyphicon glyphicon-ok-sign blue"></i>
                     </td>
                     <td style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-ok-sign blue"></i>
                         <i class="glyphicon glyphicon-ok-sign blue"></i>
                     </td>
                 </tr>
                 <tr>
                     <th>Adresse de residence</th>
                     <td style="background-color: #F8F8F8;">
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-home blue" ></i>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-home blue" ></i>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-home blue" ></i>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-home blue" ></i>
                     </td>
                 </tr>
                 <tr>
                     <th>Avis reçus</th>
                     <td  style="background-color: #F8F8F8;">
                     <td  style="background-color: #F8F8F8;">
                        <i class="glyphicon glyphicon-star blue"></i>
                         <div>1 avis</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-star blue"></i>
                         <div>3 avis</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-star blue"></i>
                         <div>6 avis</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-star blue"></i>
                         <div>12 avis</div>
                     </td>
                 </tr>
                 <tr>
                     <th>Part d'avis positifs reçus</th>
                     <td style="background-color: #F8F8F8;">
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-star blue"></i>
                         <div>100%</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-star blue"></i>
                         <div>>70%</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-star blue"></i>
                         <div>>80%</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-star blue"></i>
                         <div>>90%</div>
                     </td>
                 </tr>
                 <tr>
                     <th>Ancienneté</th>
                     <td  style="background-color: #F8F8F8;">
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-calendar blue"></i>
                         <div>1 mois</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-calendar blue"></i>
                         <div>3 mois</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-calendar blue"></i>
                         <div>6 mois</div>
                     </td>
                     <td  style="background-color: #F8F8F8;">
                         <i class="glyphicon glyphicon-calendar blue"></i>
                         <div>12 mois</div>
                     </td>
                 </tr>
                 </tbody>
             </table>
             <h3 class="padding-top margin-bottom">Votre niveau d’Expérience sur Kukkea</h3>
             <p>Avoir un niveau d’Expérience élevé sur le site indique que vous êtes un membre de confiance de la communauté Kukkea. Votre niveau est calculé en fonction de 3 facteurs :</p>
             <ul class="unstyled">
                 <li class="glyphicon glyphicon-phone" style="font-size:1.2em; color: #339AB8;">&nbsp;La vérification de votre email, de votre numéro de téléphone</li><br/><br/>
                 <li class="glyphicon glyphicon-home" style="font-size:1.2em; color: #339AB8;">&nbsp;La vérification de votre adresse de residence</li><br/><br/>
                 <li class="glyphicon glyphicon-star blue" style="font-size:1.2em; color: #339AB8;">&nbsp;Les avis positifs reçus (un avis positif = 3 à 5 étoiles)</li><br/><br/>
                 <li class="glyphicon glyphicon-calendar" style="font-size:1.2em; color: #339AB8;">&nbsp;Votre ancienneté sur le site depuis votre inscription</li>
             </ul>
             <br/>
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
     </div>
    <div class="col-md-1"></div>
</div>
<!--<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>-->
<?php
$this->minify->js(array('jquery.js', 'bootstrap.js'));
echo $this->minify->deploy_js();
?>
