<div class="container-fluid">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOUTES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;<?php
                            echo $number_all_annonce;
                            ?> &nbsp; annonces
                        </b></a></li>
                <li><a href="#tab2" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARTICULIERS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; <?php
                            echo $number_annonce_particulier;
                            ?> &nbsp; annonces
                        </b></a></li>
                <li><a href="#tab3" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROFESSIONNELS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; <?php
                            echo $number_annonce_professionnel;
                            ?> &nbsp; annonces</b></a></li>

            </ul>
            <div class="tab-content table-res">
                <div class="tab-pane active" id="tab1">
                    <br/>
                    <br/>
                    <br/><br/>
                    <table class="table table-hover table-condensed table-responsive" id="annonces">
                        <thead>
                        <tr>
                            <th></i>Photo </th>
                            <th></i> Date</th>
                            <th></i> Type</th>
                            <th></i> Titre</th>
                            <th></i> Départ</th>
                            <th></i> Arrivée</th>
                            <th></i> Prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($rows !=null):?>
                            <?php foreach($rows as $r): ?>
                                <tr style="cursor:pointer;"  onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">

                                    <!--<!<div class="row">
                                        <div class="span3">
                                            <img  width="80" height="80"  class="img-rounded" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/>
                                        </div>
                                        <div class="span2" style="margin-left: -60px;">
                                            <b><?php echo $r->PRENOMUSER;?> <?php echo $r->NOMUSER[0];?></b>
                                        </div>
                                        <div class="traitvertical"> test</div>
                                    </div>
                                    <div class="span13" style="margin-left: 10px">
                                        <hr>
                                    </div>-->
                                    <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                        <td><img  width="80" height="80"  class="img-circle" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                        <td><!--Du--> <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?> <!--Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?></td>-->
                                        <td><?php echo 'Transport';?></td>
                                        <td><?php echo $r->TITREANNONCE;?></td>
                                        <td><?php echo $r->NOMVILLEDEPART;?></td>
                                        <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                        <td><b><?php echo $r->PRIX;?></b></td>
                                    <?php else: ?>
                                        <td><img  width="80" height="80" class="img-circle" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                        <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                        <td><?php echo  'Envoi';?></td>
                                        <td><?php echo $r->TITREANNONCE;?></td>
                                        <td><?php echo $r->NOMVILLEDEPART;?>'</td>
                                        <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                        <td><b><?php echo $r->PRIX;?></b></td>
                                    <?php endif;?>
                                </tr>
                            <?php endforeach; endif;?>
                        </tbody>

                    </table>
                    <ul class="pagination border-b-none">
                        <?php echo $links; ?>
                    </ul>
                </div>
                <div class="tab-pane" id="tab2">

                    <br/>
                    <br/>
                    <br/><br/>
                    <table class="table table-striped  tablesorter" id="annonces">
                        <thead>
                        <tr>
                            <th></i>Photo </th>
                            <th></i> Date</th>
                            <th></i> Type</th>
                            <th></i> Titre</th>
                            <th></i> Départ</th>
                            <th></i> Arrivée</th>
                            <th></i> Prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($rowsParticulier !=null):?>
                            <?php foreach($rowsParticulier as $r): ?>
                                <tr style="cursor:pointer;" onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">

                                    <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                        <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                            <td><img  width="80" height="80" class="img-circle" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                            <td><!--Du--> <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?> <!--Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?></td>-->

                                            <td><?php echo 'Transport';?></td>
                                            <td><?php echo $r->TITREANNONCE;?></td>
                                            <td><?php echo $r->NOMVILLEDEPART;?></td>
                                            <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                            <td><b><?php echo $r->PRIX;?></b></td>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                            <td><img  width="80" height="80" class="img-circle" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                            <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                            <td><?php echo  'Envoi';?></td>
                                            <td><?php echo $r->TITREANNONCE;?></td>
                                            <td><?php echo $r->NOMVILLEDEPART;?></td>
                                            <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                            <td><b><?php echo $r->PRIX;?></b></td>
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
                    <table class="table table-striped  tablesorter" id="annonces">
                        <thead>
                        <tr>
                            <th></i>Logo</th>
                            <th></i> Date</th>
                            <th></i> Type</th>
                            <th></i> Titre</th>
                            <th></i> Départ</th>
                            <th></i> Arrivée</th>
                            <th></i> Prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($rowsProfessionnel !=null):?>
                            <?php foreach($rowsProfessionnel as $r): ?>
                                <tr style="cursor:pointer;"  onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">

                                    <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                        <a href="<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>">
                                            <td><img  width="80" height="80" class="img-circle" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                            <td><!--Du--> <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?> <!--Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?></td>-->
                                            <td><?php echo 'Transport';?></td>
                                            <td><?php echo $r->TITREANNONCE;?></td>
                                            <td><?php echo $r->NOMVILLEDEPART;?></td>
                                            <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                            <td><b><?php echo $r->PRIX;?></b></td>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo site_url('site/view_annonce/'.$r->NUMANNONCE);?>">
                                            <td><img  width="80" height="80" class="img-circle" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                            <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                            <td><?php echo  'Envoi';?></td>
                                            <td><?php echo $r->TITREANNONCE;?></td>
                                            <td><?php echo $r->NOMVILLEDEPART;?></td>
                                            <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                            <td><b><?php echo $r->PRIX;?></b></td>
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
    <div class="col-md-1"></div>

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
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>

<script src="<?=base_url('js/jquery.tablesorter.js'); ?>"></script>


<script>
    $(document).ready(function() {
        $('.content').fadeIn(1000);
        $('#annonces').tablesorter();
        $('#dp3').datepicker();

    });
</script>

