
<?php $this->load->view('includes/analyticstracking'); ?>
<br/>
<br/>

<article id="main">
    <section class="wrapper style4 container">
    <div class="container-fluid">

    <div class="sidebar">
        <div class="col-md-3" >
            <div class="well" style="background-color: #313334; color: #ffffff;">
                Publiez une annonce en  cliquant sur le bouton ci-dessous:<br/>
                <a href="<?php echo site_url('annonce/newannonce'); ?>" class="button special small no-decoration "> Publier une Annonce</a>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="col-md-9" style="margin-top: -38px;">
            <?php if ($all_annonce_envoi !=null):?>
                <div class="col-md-12 page-header" style="background-color: #313334;font-color:white;">
                    <div class="col-md-4">
                        <h3 style="color:#ffffff;"><?php if ($total_number_annonce_envoi>1) echo $total_number_annonce_envoi .' Expéditions';else echo $total_number_annonce_envoi .' Expédition' ?></h3>
                    </div>
                    <!--<div class=" col-md-2 col-md-push-5">
                        <a href="" class="button"><i class="glyphicon glyphicon-euro"></i> </a>
                    </div>
                    -->

                </div>

                <?php foreach($all_annonce_envoi as $r): ?>
                    <div class="col-md-12 divider-horizontal-annonce">
                        <div class="col-md-2 ">

                                <div class="col-md-2 col-md-pull-4 " >
                                    <p  class=" infobulle no-decoration">
                                        <span style="color: #ffffff; font-size: 15px; line-height: 120%;"><?php echo $r->PRENOMUSER ?>&nbsp;&nbsp;<?php echo $r->NOMUSER[0]; ?><br/><?php echo $r->PAYSUSER ?>, <?php echo $r->VILLEUSER ?> <a href="<?php echo site_url('account/profil/'.encryptor('encrypt',$r->NUMUSER))?>" class="no-decoration">Voir profil</a> </span>
                                        <img  alt="image" style="text-align: right" width="72px" height="72px" class="img-rounded  no-decoration"  src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>" alt="<?php echo $r->NOMUSER;?>"/>
                                    </p>
                                </div>
                                <div class="col-md-5 col-md-push-1 col-md-offset-2" >
                                    <span style="color:#233140"><?php echo $r->PRENOMUSER ?>&nbsp;&nbsp;<?php echo $r->NOMUSER[0]; ?></span>
                                    <span style="color:#233140"><?php echo getAge($r->DATENAISSANCEUSER)?>&nbsp;&nbsp;Ans</span>
                                    <span class="label label-primary"><?php echo $r->EXPERIENCE;?></span>
                                </div>
                        </div>
                        <a  onmouseover="this.style.backgroundColor='#E4F3FE'; class="description-globale" href="<?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" >

                        <div class="col-md-1 divider-vertical-annonce"></div>
                        <div class="col-md-5   description">
                            <Span class="date-expiration" ><?php echo  strftime('%A %d %B %Y',strtotime($r->DATEDEBUTANNONCE));?></span><br/>
                            <b><?php echo $r->TITREANNONCE;?></b><br/>
                            <span class="villedepart"><?php echo $r->NOMVILLEDEPART;?></span> <b>>>></b><span class="villearrivee"><?php echo $r->NOMVILLEARRIVEE;?></span><br/>
                        </div>
                        <div class="col-md-2  price-red">
                            <div class="price"  id="prix"><?php echo $r->PRIX;?>€</div><br/>
                            <!--<span class="price-unit" >par kg</span><br/>-->

                            <span class="kg-restant"  >
                                Poids:<?php echo $r->POIDS;?>kg
                            </span>
                            <!--<span style="color: black">kg restant</span>-->
                        </div>

                        </a>
                    </div>
                <?php endforeach;?>
            <div class="col-md-11">
                <!--<div class="col-md-4">
                    <p><?php echo $start?> à <?php echo $limit;?> Sur <?php echo $total_number_annonce_envoi; ?> résultats</p>
                </div>
                -->

                <div class="col-md-7">
                            <ul class="tsc_pagination" style="margin-top: -15px">
                                <?php echo $links;?>
                            </ul>
                 </div>
            </div>

            <?php else:?>
            <div class="col-md-11">
                <h3 class="col-md-11">Désolé, aucune annonce  d'expédition disponible.<br/></h3>
                <div class="col-md-11 alert alert-info">
                    <i style="font-size: 1.2em;" class="glyphicon glyphicon-info-sign"></i>&nbsp;Les voyageurs publient pour la plupart leur annonce seulement quelques jours avant le depart.<br/> Créez une alerte maintenant pour être averti(e) par email des nouvelles annonces.
                </div>
            </div>
            <?php endif;?>
            <div class="col-md-11">
                <span id="results" style="display:none; color:#0C0">L'alerte a été crée avec succès</span>

                <div class="well col-md-12" style="background-color:#313334;">
                    <h3 style="margin-top:-10px;">
                    <span style="color: white">
                        Créer une alerte pour recevoir chaque nouvelle annonce <?php if(isset($villedepartalerte)) :echo $villedepartalerte; endif;?> - <?php if(isset($villearriveealerte)) :echo $villearriveealerte; endif;?> par email.
                    </span>
                    </h3>
                    <!-- <ol>
                         <li><span style="color:white">Choisissez un type de transaction</span></li>
                         <li><span style="color:white">Choisissez une ville de depart et une ville d'arrivée</span></li>
                         <li><span style="color:white">Chosissez une date d'expédiation/de depart(transport)</span></li>
                         <li><span style="color:white">Cliquez sur le bouton pour créer un alerte email</span></li>
                         <li><span style="color:white">Vous recevrez automatiquement un email quand une nouvelle annonce pour ce trajet sera publiée</span></li>
                     </ol>-->

                    <?php //echo form_open('', array('id'=>'alert-form'));?>
                    <?php $this->load->view('includes/alert_form')?>
                    <?php //echo form_close();?>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!--
    <div class="row" >
        <div class="span12">
            <div class="tabbable"> <!-- Only required for left/right tabs
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOUTES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                echo $total_number_annonce_envoi;
                                ?> &nbsp; annonces
                            </b></a></li>
                    <li><a href="#tab2" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARTICULIERS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;
                                <?php
                                echo $number_annonce_envoi_by_type_user;
                                ?> &nbsp; annonces
                            </b></a></li>
                    <li><a href="#tab3" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;PROFESSIONNELS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                echo $number_annonce_envoi_by_type_user_pro;
                                ?> &nbsp; annonces</b></a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <br/>
                        <br/>
                        <br/><br/>
                        <table class="table" id="annonces">
                            <thead>
                            <tr>
                                <th>Photo </th>
                                <th> Date</th>
                                <th> Type</th>
                                <th> Titre</th>
                                <th> Ville de départ</th>
                                <th> Ville d'arrivée</th>
                                <th> Prix</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($all_annonce_envoi !=null):?>
                                <?php foreach($all_annonce_envoi as $r): ?>
                                    <tr style="cursor:pointer;" onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'" onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">

                                        <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                            <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                                <td><img  width="80" height="80"  class="img-circle" alt="image" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                <td>Du <?php echo date('d/m/y',strtotime($r->DATEDEBUTANNONCE));?> Au <?php echo date('d/m/y',strtotime($r->DATEFINANNONCE));?></td>
                                                <td><?php echo 'Transport';?></td>
                                                <td><?php echo $r->TITREANNONCE;?></td>
                                                <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                <td><?php echo $r->PRIX;?></td>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                                <td><img width="80" height="80"  class="img-circle" alt="image" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                <td><?php echo date('d/m/y',strtotime($r->DATEDEBUTANNONCE));?></td>
                                                <td><?php echo  'Envoi';?></td>
                                                <td><?php echo $r->TITREANNONCE;?></td>
                                                <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                <td><?php echo $r->PRIX;?></td>
                                            </a>
                                        <?php endif;?>
                                    </tr>
                                <?php endforeach; endif;?>
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane" id="tab2">

                        <br/>
                        <br/>
                        <br/><br/>
                        <table class="table " id="annonces">
                            <thead>
                            <tr>
                                <th>Photo </th>
                                <th> Date</th>
                                <th> Type</th>
                                <th> Titre</th>
                                <th> Ville de départ</th>
                                <th> Ville d'arrivée</th>
                                <th> Prix</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($all_annonce_envoi_by_type_user !=null):?>
                                <?php foreach($all_annonce_envoi_by_type_user as $r): ?>
                                    <tr style="cursor:pointer;" onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'" onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">

                                        <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                            <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                                <td><img width="80" height="80"  class="img-circle" alt="image" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                <td>Du <?php echo date('d/m/y',strtotime($r->DATEDEBUTANNONCE));?> Au <?php echo date('d/m/y',strtotime($r->DATEFINANNONCE));?></td>
                                                <td><?php echo 'Transport';?></td>
                                                <td><?php echo $r->TITREANNONCE;?></td>
                                                <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                <td><?php echo $r->PRIX;?></td>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                                <td><img width="80" height="80"  class="img-circle" alt="image" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                <td><?php echo date('d/m/y',strtotime($r->DATEDEBUTANNONCE));?></td>
                                                <td><?php echo  'Envoi';?></td>
                                                <td><?php echo $r->TITREANNONCE;?></td>
                                                <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                <td><?php echo $r->PRIX;?></td>
                                            </a>
                                        <?php endif;?>
                                    </tr>
                                <?php endforeach; endif;?>
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane" id="tab3">
                        <br/>
                        <br/>
                        <br/><br/>
                        <table class="table" id="annonces">
                            <thead>
                            <tr>
                                <th>Logo</th>
                                <th> Date</th>
                                <th> Type</th>
                                <th> Titre</th>
                                <th> Ville de départ</th>
                                <th> Ville d'arrivée</th>
                                <th> Prix</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($all_annonce_envoi_by_type_user_pro !=null):?>
                                <?php foreach($all_annonce_envoi_by_type_user_pro as $r): ?>
                                    <tr style="cursor:pointer;" onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'" onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">

                                        <?php if($r->NUMCATEGORIE=='Transport'):?>
                                            <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                                <td><img width="80" height="80"  class="img-circle" alt="image" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                <td>Du <?php echo date('d/m/y',strtotime($r->DATEDEBUTANNONCE));?> Au <?php echo date('d/m/y',strtotime($r->DATEFINANNONCE));?></td>
                                                <td><?php echo 'Transport';?></td>
                                                <td><?php echo $r->TITREANNONCE;?></td>
                                                <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                <td><?php echo $r->PRIX;?></td>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                                <td><img width="80" height="80"  class="img-circle" alt="image" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                <td><?php echo date('d/m/y',strtotime($r->DATEDEBUTANNONCE));?></td>
                                                <td><?php echo  'Envoi';?></td>
                                                <td><?php echo $r->TITREANNONCE;?></td>
                                                <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                <td><?php echo $r->PRIX;?></td>
                                            </a>
                                        <?php endif;?>
                                    </tr>
                                <?php endforeach; endif;?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('includes/right',$all_annonce_premium);?>

    </div>


    <!--
    <div id="content">
        <a href="<?php echo site_url('signup/login');?>">Se connecter</a>
        <h1><?php echo $heading; ?></h1>
        <?php
            if($rows != null):
            foreach($rows as $r):
        ?>
        <div class="annonce">
            <h2><?php echo $r->TITREANNONCE;?></h2>
            <p><?php echo nl2br($r->CONTENUANNONCE);?></p>
            <span class="delete"><a href="<?php echo site_url('site/delete/'.$r->NUMANNONCE);?>">X</a></span>
            <span class="update"><a href="<?php echo site_url('site/update/'.$r->NUMANNONCE);?>">Modifier</a></span>
            <span class="date"><?php echo date('d/m/Y H:i', strtotime($r->DATEANNONCE)); ?></span>
        </div>
        <?php endforeach; endif; ?>

        <?php echo form_open(base_url());?>
        <label for="titre">Titre:</label>
        <?php echo form_error('titre','<span class="error">','</span>') ?>
        <input type="text" name="titre" value="<?php echo set_value('titre')?>"/>

        <label for="contenu">Contenu:</label>
        <?php echo form_error('contenu','<span class="error">','</span>') ?>

        <textarea name="contenu"><?php echo set_value('contenu');?></textarea>

        <input type="submit" value="Envoyer"/>
        <?php echo form_close() ;?>

    </div>-->
    <!--<script src="<?=base_url('js/jquery.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.tablesorter.js'); ?>"></script>-->
    <?php
    //$this->minify->js(array('jquery.js', 'bootstrap.js','jquery.tablesorter.js','jquery.validationEngine-fr.js','jquery.validationEngine.js'));
   // echo $this->minify->deploy_js();
    ?>


    <script>
        $(document).ready(function() {
            $('.content').fadeIn(1000);
            $('.carousel').carousel();
            // $("#annonceForm").validationEngine('attach', {promptPosition : "centerRight", scroll: false});
            $("#formID").validationEngine('attach');
            $('#annonces').tablesorter();

        });
    </script>


    </section>
</article>
