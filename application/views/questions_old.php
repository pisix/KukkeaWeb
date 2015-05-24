<?php $this->load->view('includes/analyticstracking'); ?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-1"></div>
    <div class="col-md-2">
        <ul class="nav nav-tabs nav-stacked" style="background-color: #339BB9;">
            <li >
                <a href="<?php echo site_url('help/howitworks');?>" style="color:white;">Comment ça marche</a>
            </li>
            <li>
                 <a href="<?php echo site_url('help/experience');?>" style="color: white">Niveaux d'Expérience</a>
            </li>
            <li>
                <a href="<?php echo site_url('help/confident');?>" style="color: white">Confiance et sérénité</a>
            </li>
            <li class="active">
                <a href="<?php echo site_url('help/questions');?>"  style="color: #339BB9;">Questions Fréquentes</a>
            </li>
        </ul>
    </div>
    <div class="col-md-8"  style="background-color: white;">
        <div class="col-md-12" style="text-align: justify">
             <h2 style="color:#339BB9;">Questions fréquentes</h2>
            <div style="font-weight: bold" class="alert alert-info"> Kukkea connecte les personnes souhaitant recevoir ou expedier quelque chose avec des voyageurs.<br/>
            Il peut s'agir de n'importe quel type ou categorie d'objet en provenance et à destination de partout dans le monde.<br/><br/><br/>
            </div>
            <b>Je souhaite faire transporter un objet, je suis un <span style="color: #339AB8">Expediteur</span> <br/><br/></b>
            <ul>
                <li>Je publie l’objet que vous souhaitez obtenir ou expédier.</li>
                <li>Afin de remercier et "de motiver" le voyageur à la livraison ou à la reception du colis, j'ajoute le prix que je pourrais offrir pour avoir accepter de transporter mon colis.
                </li>
                <li>Kukkea vous connectera par email avec le(s) voyageur(s) qui effectu(ent) cet itinéraire en vue de finaliser la transaction et régler les détails pratiques.
                </li>
            </ul>
            <br/>
            <b>Je suis un <span style="color:#339AB8">Voyageur</span></b><br/><br/>
            <ul>
                <li>
                    Je publie mes  itinéraires(Ville de depart >>>>>> Ville d'arrivée)
                </li>
                <li>
                    j'ajoute l'espace disponible que je souhaite partager.<br/>
                </li>
                <li>
                    Je renseigne le montant "symbolique" par Kg<br/>
                </li>
                <li>
                    Kukkea vous connectera par email avec le(s) demandeur(s).<br/><br/>
                </li>
            </ul>
             <br/>

            <div style="font-weight: bold" class="alert alert-danger"> Les questions de confiance et sécurité sont prise très au serieux par Kukkea.</div><br/>
            <div class="alert alert-info">
                <ul>
                    <li>Tout utilisateur doit respecter nos conditions générales</li>
                    <li>Le demandeur fournit à son voyageur un maximum de détails sur l’objet à transporter</li>
                    <li>Le voyageur précise ce qu’il peut transporter sur cet itinéraire (tels taille, poids et valeur)</li>
                    <li>Considérez l’heure et l’endroit de rendez-vous (tel un lieu public)</li>
                </ul>

            </div>
           <b> Kukkea est un service gratuit.</b><br/><br/>

            Dans le cas où vous demandez à un voyageur d’acheter un objet provenant d’un magasin (local ou en ligne), convenez clairement du prix de l’objet et des modalités de paiement tels à l’avance, à la livraison.
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<br/>

<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>

