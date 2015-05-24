<?php $this->load->view('includes/analyticstracking'); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="container-fluid">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="background-color: white;">


               <div style="text-align: center; color: #233140"> <h1>Publiez votre annonce</h1></div>

               <div style="text-align: center;color: #233140"><h4><i>Kukkea vous permet de gagner de l'argent en mettant en vente l'espace disponible dans vos valises.</i></h4></div>
            <div style="text-align: center;color: #233140"><h4><i>Kukkea vous permet d'envoyer vos colis par des particuliers moyennant une petite participation financiere.</i></h4>
            </div><br/><br/>
        </div>

        <div class="col-md-1"></div>
        <div class="col-md-10 col-md-push-1">
            <br/>
            <div class="col-md-3">
                <h3><a href="<?php echo site_url('help/howitworks'); ?>"> Comment ça marche</a> </h3>
                <div class="flex-video widescreen" >
                <iframe allowfullscreen="" src="http://www.youtube.com/embed/z9t9N9xWM30?feature=player_detailpage" frameborder="0"></iframe>
            </div>
            </div>
            <div class="col-md-1">
                <div class="divider-vertical"></div>
            </div>
            <div class="col-md-4">
                <h3><a href="#"> Derniere annonces</a> </h3>
                <div id="myCarousel" class="carousel slide " data-interval="3000" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="active item inline" style="color: #339AB8; text-align: center; font-weight: bold">
                            <h3>Actuellement <?php echo $number_all_annonce?> annonces sur le site</h3>

                        </div>
                        <?php if ($rowsParticulier !=null):?>
                             <?php foreach($rowsParticulier as $r): ?>
                                <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                     <div class="item">
                                            <a href="<?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>">
                                                <div class="col-md-4">
                                               <h3><span class="label-success label label-default "><?php echo $r->NOMVILLEDEPART;?></span></h3><h3><span class="label-danger label label-default "> >>>></span></h3><h3> <span class="label-warning label label-default "><?php echo $r->NOMVILLEARRIVEE;?></span></h3><br/>
                                                </div>
                                                <div class="col-md-4" style="margin-top: 50px; margin-left: 20px">
                                                    <h3><span class="label-info label label-default "><b><?php echo $r->PRIX;?></b> € / KG</span></h3>
                                                </div>
                                            </a>
                                     </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="divider-vertical"></div>
            </div>
            <div class="col-md-2">
                <!--<h3><a href="#"> Téléchargez l'appli</a> </h3>
               <h2>Coming soon...</h2>
                <img class="img-responsive" src="<?php echo base_url().'images/site/logo.png';?>" alt="Kukkea"/>-->
                <div class="fb-like-box" data-href="https://www.facebook.com/KukkeaShare" data-width="260" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>            </div>
        <br/>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10 col-md-push-1" style="background-color: #233140; color: white">
             <div class="col-md-4">
                 <h4>Expediteurs: </h4>
                 <h4>Expediez vos colis moins cher</h4>
                 Réservez facilement vos Kg  en ligne et Expediez à prix reduit votre colis, même à la dernière minute !
                 <div class="col-md-6">
                     <a href="<?php echo site_url('/help/howitworks');?>">En savoir plus sur l'envoi de colis pour expediteur</a>
                 </div>
                 <div class="col-md-7">
                     <img class="img-responsive" src="<?php //echo base_url().'images/site/economique.jpg';?>" alt=""/>
                 </div>

             </div>
            <div class="col-md-4">
                <h4>Voyageurs:</h4>
                <h4>Réduisez vos frais de voyages</h4>
                <div class="col-md-6">
                    <a href="<?php echo site_url('/help/howitworks#transporteur');?>">En savoir plus sur l'envoi de colis pour voyageur</a>
                </div>
                <div class="col-md-7">
                    <img class="img-responsive" src="<?php //echo base_url().'images/site/economique.jpg';?>" alt=""/>
                </div>

            </div>

             <div class="col-md-4">
                 <h4>Kukkea C'est:</h4>
                 <h4>La Confiance , La Serénite, l'Economie et la Rapidité</h4>
                 <div class="col-md-6">
                     <a href="<?php echo site_url('/help/confident');?>">En savoir plus sur la confiance et la serénité</a>
                 </div>

                 <div class="col-md-7">
                     <img class="img-responsive" src="<?php //echo base_url().'images/site/rapidite.jpg';?>" alt=""/>
                 </div>
             </div>
        </div>

</div>
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>

<!--<script src="<?=base_url('js/jquery.tablesorter.js'); ?>"></script>-->


<script>
    $(document).ready(function() {
        $('.content').fadeIn(1000);
        <?php //$('#annonces').tablesorter();?>
        $('#dp3').datepicker();

    });
</script>

