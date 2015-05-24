<?php $this->load->view('includes/analyticstracking'); ?>

<div class="container-fluid">
     <?php $this->load->view('includes/second_nav_inner_bar'); ?><br/><br/><br/>
     <div class="row" style="width: 1000px;margin-left: 250px;">
        <div class="tabbable"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">MES ANNONCES EN LIGNE</a></li>
            <li><a href="#tab2" data-toggle="tab">MES RECHERCHES AUTOMATIQUES</a></li>
            <li><a href="#tab3" data-toggle="tab">MES ANNONCES SAUVEGARDEES</a></li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">

                <br/>   <br/>    <br/>
                <p><b>Mes annonces en ligne</b><br/>

                    Pour recevoir vos annonces actives par mail, remplissez ci-dessous <b>votre adresse email</b> renseignée lors de votre dépôt d'annonce.<br/> Si vous avez utilisé plusieurs adresses email pour des annonces différentes, vous devez faire la demande pour chaque adresse. </p>
               <?php
               $attribute=array('id'=>'formID');
               echo form_open('annonce',$attribute)?>
                <span class="inline">Votre adresse email:</span><input  class="validate[required,custom[email]] text-input" type="text" id="email" style="height: 20px;" name="email" placeholder="votre adresse email">
                <button type="submit"  style="height: 30px;margin-bottom: 10px;" class="btn btn-primary"><i class="icon-search"></i>Chercher</button>
                <?php echo form_close();?>

                <p> A tout moment, vous pouvez remonter vos annonces en tête de liste ou les modifier. Rendez-vous sur la page de votre annonce.<br/><br/>

                   <span style="color:blue">Nouveau !</span><br/><br/>

                    Vous souhaitez <b>retrouver toutes vos annonces sur un tableau de bord</b> pour une gestion plus facile ?<br/>
                    Nous vous invitons à créer un Compte gratuitement !<br/><br/>
                    <a href="<?=site_url('signup'); ?>" class="btn btn-primary btn-info"><i class="icon-arrow-right icon-white"></i> Créer un compte</a>

                </p><br/>

                Si vous avez déjà un compte, vous pouvez vous connecter en cliquant sur le bouton ci-dessous.<br/><br/>
                <a href="<?=site_url('signup/login'); ?>" class="btn btn-primary btn-info"><i class="icon-arrow-right icon-white"></i> Se connecter</a>

            </div>
            <div class="tab-pane" id="tab2">
                <br/><br/><br/>
                <p><b>Mes recherches automatiques</b><br/>

                    Vous pouvez enregistrer autant de recherches automatiques que vous le souhaitez. Pour créer une recherche automatique, choisissez une zone géographique et une catégorie. Vous pouvez affiner votre recherche en sélectionnant des critères supplémentaires ou en précisant un ou plusieurs mots-clés. </p>
                <div class="well" style="width: 900px; height:85px;margin-left: 5px; margin-top: 25px;">
                    <?php echo form_open(base_url());?>

                    <div class="radio inline" style="">
                        <label>
                            <input type="radio" name="typecolis" id="envoyer" value=envoyer">
                            Envoyer un colis
                        </label>
                    </div>
                    <div class="radio inline">
                        <label>
                            <input type="radio" name="typecolis" id="transporter" value="transporter">
                            Transporter un colis
                        </label>
                    </div>
                    <br/>
                    <br/>

                    <span class="inline">De:</span><input type="text" style="height: 20px;" name="villedepart" placeholder="Ville départ, Pays départ">
                    <span class="inline">à:</span><input type="text"  style="height: 20px;" name="villearrive" placeholder="Ville arrivée, Pays arrivée">

                    <span class="inline">le:</span><input data-provide="datapicker"  data-date-format="dd/mm/yyyy" type="date"  style="height: 20px;" placeholder="JJ/MM/AAAA">
                    <button type="submit"  style="height: 30px;margin-bottom: 10px;" class="btn btn-primary"><i class="icon-search"></i>Recherche</button>

                    <?php echo form_close();?>
                </div>
                <b>Exemples de recherche automatique:</b>

                <li>Bas-Rhin - Autos (offres) - Peugeot 206 TDI - après 2004 - 5.000 / 7.000 €</li>
                <li>Côtes d'Armor - Animaux (offres) - chiot setter irlandais</li>
                <li>Nord - Ventes Immobilières (offres) - loft - 250.000 / 350.000 €</li>


            </div>
            <div class="tab-pane" id="tab3">
                <br/>
                <br/> <br/>
                <p>
                    <b>Mes annonces sauvegardées</b><br/>

                    Pour sauvegarder des annonces, cliquez sur le lien « Sauvegarder l'annonce » sur la page de présentation du produit qui vous intéresse.<br/> Si l'annonce n'est plus active sur le site, elle disparaîtra automatiquement de votre sélection.
                    <br/>
                    <b>Attention</b> : si vous supprimez vos cookies, vous perdrez toutes vos annonces sauvegardées.
                </p>
            </div>
        </div>
    </div>
</div>
    <!--<script src="<?=base_url('js/jquery.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>-->
<?php
$this->minify->js(array('jquery.js', 'bootstrap.js','jquery.validationEngine-fr.js','jquery.validationEngine.js'));
echo $this->minify->deploy_js();
?>

    <script>
        $(document).ready(function() {
            $('.content').fadeIn(1000);
            $('.carousel').carousel();
           // $("#annonceForm").validationEngine('attach', {promptPosition : "centerRight", scroll: false});
            $("#formID").validationEngine('attach');

        });
    </script>

<?php $this->load->view('includes/footer'); ?>