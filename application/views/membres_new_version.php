
<?// $this->load->view('includes/second_nav_inner_bar'); ?><br/>

<?// $this->load->view('includes/second_nav_inner_bar'); ?>
<div class="container-fluid">

        <!--<div class="content" style="background-color:#f3f3ed;width: 900px; height:1920px;margin-left: 160px; margin-top: 15px;">


        </div>-->
    <br>
    <div class="row" style="width: 1200px;margin-left: 95px;">
    <br/>
       <!--
        <h3><i class="icon-home"></i>Tableau de bord</h3>
        <h5><i>Annonces en ligne</i> :<?php echo $number_annonce;?></h5>
-->
        <div class="row" style="width: 1500px;">
        <div class=span17">
           <div class="span17">
               <div class="tabbable span17">
                   <ul class="nav nav-tabs">
                       <li class="active"><a href="#tab1" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tableau de bord&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                       <li><a href="#tab2" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vos annonces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                       <li><a href="#tab3" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Messages&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                       <li><a href="#tab4" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alertes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                       <li><a href="#tab5" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Avis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                   </ul>
                   <div class="tab-content">
                       <div class="tab-pane active" id="tab1">
                            <?
                                $this->load->view('dashboard',$user_info,$number_annonce);
                            ?>
                       </div>

                       <div class="tab-pane" id="tab2">
                           <div class="span17">
                               <div class="tabbable"> <!-- Only required for left/right tabs -->
                                    <ul class="nav nav-tabs">
                                       <li class="active"><a href="#tab5" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Toutes vos annonces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                               </b></a></li>
                                       <li><a href="#tab6" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vos Expéditions&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                                               </b></a></li>
                                       <li><a href="#tab7" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vos Transports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               </b></a></li>
                                    </ul>
                                   <div class="tab-content">
                                       <div class="tab-pane active" id="tab5">
                                           <br/>
                                           <br/>
                                           <br/><br/>
                                           <table class="table" id="annonces">
                                               <thead>
                                               <tr>
                                                   <th>Image </th>
                                                   <th> Date</th>
                                                   <th> Type</th>
                                                   <th> Titre</th>
                                                   <th> Départ</th>
                                                   <th> Arrivée</th>
                                                   <th> Prix</th>
                                                   <th> Options</th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                               <?php if ($toutes_mes_annonces !=null):?>
                                                   <?php foreach($toutes_mes_annonces as $r): ?>
                                                       <tr style="cursor:pointer;" onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'" onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">

                                                           <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                                               <td><img class="img-rounded" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                               <td>Du <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?> Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?></td>                                                               <td><?php echo 'Transport';?></td>
                                                               <td><?php echo $r->TITREANNONCE;?></td>
                                                               <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                               <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                               <td><b><?php echo $r->PRIX;?></b></td>
                                                               <td>

                                                                   <ul class=" nav nav-list">
                                                                       <li><a href="<?php echo site_url('annonce/editannonce/'.$r->NUMANNONCE);?>"><i class="icon-pencil"></i> Editer</a></li>
                                                                       <li><a href="<?php echo site_url('annonce/deleteannonce/'.$r->NUMANNONCE);?>"><i class="icon-trash"></i> Supprimer</a></li>
                                                                       <?php
                                                                       if($r->PREMIUM!='1'):
                                                                           ?>
                                                                           <li><a href="<?php echo site_url('annonce/premium/'.$r->NUMANNONCE);?>"><i class="icon-arrow-up"></i>A la une</a></li>
                                                                       <?php
                                                                       endif;
                                                                       ?>                                                    </ul>

                                                               </td>
                                                           <?php else: ?>
                                                               <td><img class="img-rounded" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                               <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                                               <td><?php echo  'Envoi';?></td>
                                                               <td><?php echo $r->TITREANNONCE;?></td>
                                                               <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                               <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                               <td><b><?php echo $r->PRIX;?></b></td>
                                                               <td>

                                                                   <ul class=" nav nav-list">
                                                                       <li><a href="<?php echo site_url('annonce/editannonce/'.$r->NUMANNONCE);?>"><i class="icon-pencil"></i> Editer</a></li>
                                                                       <li><a href="<?php echo site_url('annonce/deleteannonce/'.$r->NUMANNONCE);?>""><i class="icon-trash"></i> Supprimer</a></li>

                                                                       <?php
                                                                       if($r->PREMIUM!='1'):
                                                                           ?>
                                                                           <li><a href="<?php echo site_url('annonce/premium/'.$r->NUMANNONCE);?>"><i class="icon-arrow-up"></i>A la une</a></li>
                                                                       <?php
                                                                       endif;
                                                                       ?>
                                                                   </ul>

                                                               </td>

                                                           <?php endif;?>
                                                       </tr>
                                                   <?php endforeach; endif;?>
                                               </tbody>
                                           </table>

                                       </div>
                                       <div class="tab-pane" id="tab6">

                                           <br/>
                                           <br/>
                                           <br/><br/>
                                           <table class="table" id="annonces">
                                               <thead>
                                               <tr>
                                                   <th>Image</th>
                                                   <th> Date</th>
                                                   <th> Type</th>
                                                   <th> Titre</th>
                                                   <th> Départ</th>
                                                   <th> Arrivée</th>
                                                   <th> Prix</th>
                                                   <th> Options</th>

                                               </tr>
                                               </thead>
                                               <tbody>
                                               <?php if ($toutes_mes_annonces_envoi !=null):?>
                                                   <?php foreach($toutes_mes_annonces_envoi as $r): ?>
                                                       <tr style="cursor:pointer;" onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'" onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">
                                                           <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                                               <td><img class="img-rounded" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                               <td>Du <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?> Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?></td>                                                               <td><?php echo 'Transport';?></td>
                                                               <td><?php echo $r->TITREANNONCE;?></td>
                                                               <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                               <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                               <td><b><?php echo $r->PRIX;?></b></td>
                                                               <td>
                                                                   <ul class=" nav nav-list">
                                                                       <li><a href="<?php echo site_url('annonce/editannonce/'.$r->NUMANNONCE);?>"><i class="icon-pencil"></i> Editer</a></li>
                                                                       <li><a href="<?php echo site_url('annonce/deleteannonce/'.$r->NUMANNONCE);?>""><i class="icon-trash"></i> Supprimer</a></li>
                                                                       <?php
                                                                       if($r->PREMIUM!='1'):
                                                                           ?>
                                                                           <li><a href="<?php echo site_url('annonce/premium/'.$r->NUMANNONCE);?>"><i class="icon-arrow-up"></i>A la une</a></li>
                                                                       <?php
                                                                       endif;
                                                                       ?>                                                        </ul>
                                                               </td>
                                                           <?php else: ?>
                                                               <td><img class="img-rounded" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                               <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                                               <td><?php echo  'Envoi';?></td>
                                                               <td><?php echo $r->TITREANNONCE;?></td>
                                                               <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                               <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                               <td><b><?php echo $r->PRIX;?></b></td>
                                                               <td>
                                                                   <ul class=" nav nav-list">
                                                                       <li><a href="<?php echo site_url('annonce/editannonce/'.$r->NUMANNONCE);?>'"><i class="icon-pencil"></i> Editer</a></li>
                                                                       <li><a href="<?php echo site_url('annonce/deleteannonce/'.$r->NUMANNONCE);?>'""><i class="icon-trash"></i> Supprimer</a></li>
                                                                       <?php
                                                                       if($r->PREMIUM!='1'):
                                                                           ?>
                                                                           <li><a href="<?php echo site_url('annonce/premium/'.$r->NUMANNONCE);?>"><i class="icon-arrow-up"></i>A la une</a></li>
                                                                       <?php
                                                                       endif;
                                                                       ?>                                                        </ul>
                                                               </td>

                                                           <?php endif;?>
                                                       </tr>
                                                   <?php endforeach; endif;?>
                                               </tbody>
                                           </table>

                                       </div>
                                       <div class="tab-pane" id="tab7">
                                           <br/>
                                           <br/>
                                           <br/><br/>
                                           <table class="table" id="annonces">
                                               <thead>
                                               <tr>
                                                   <th>Image</th>
                                                   <th> Date</th>
                                                   <th> Type</th>
                                                   <th> Titre</th>
                                                   <th> Départ</th>
                                                   <th> Arrivée</th>
                                                   <th> Prix</th>
                                                   <th> Options</th>

                                               </tr>
                                               </thead>
                                               <tbody>
                                               <?php if ($toutes_mes_annonces_transport !=null):?>
                                                   <?php foreach($toutes_mes_annonces_transport as $r): ?>
                                                       <tr style="cursor:pointer;" onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'" onclick="document.location.href='<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>'">

                                                           <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                                               <td><img class="img-rounded" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                               <td>Du <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?> Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?></td>                                                               <td><?php echo 'Transport';?></td>
                                                               <td><?php echo $r->TITREANNONCE;?></td>
                                                               <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                               <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                               <td><b><?php echo $r->PRIX;?></b></td>
                                                               <td>
                                                                   <ul class=" nav nav-list">
                                                                       <li><a href="<?php echo site_url('annonce/editannonce/'.$r->NUMANNONCE);?>'"><i class="icon-pencil"></i> Editer</a></li>
                                                                       <li><a href="<?php echo site_url('annonce/deleteannonce/'.$r->NUMANNONCE);?>'""><i class="icon-trash"></i> Supprimer</a></li>
                                                                       <?php
                                                                       if($r->PREMIUM!='1'):
                                                                           ?>
                                                                           <li><a href="<?php echo site_url('annonce/premium/'.$r->NUMANNONCE);?>"><i class="icon-arrow-up"></i>A la une</a></li>
                                                                       <?php
                                                                       endif;
                                                                       ?>
                                                                   </ul>
                                                               </td>
                                                           <?php else: ?>
                                                               <td><img class="img-rounded" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/></td>
                                                               <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                                               <td><?php echo  'Envoi';?></td>
                                                               <td><?php echo $r->TITREANNONCE;?></td>
                                                               <td><?php echo $r->NOMVILLEDEPART;?></td>
                                                               <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                                               <td><b><?php echo $r->PRIX;?></b></td>
                                                               <td>
                                                                   <ul class=" nav nav-list">
                                                                       <li><a href="<?php echo site_url('annonce/editannonce/'.$r->NUMANNONCE);?>'"><i class="icon-pencil"></i> Editer</a></li>
                                                                       <li><a href="<?php echo site_url('annonce/deleteannonce/'.$r->NUMANNONCE);?>'""><i class="icon-trash"></i> Supprimer</a></li>
                                                                       <?php
                                                                       if($r->PREMIUM!='1'):
                                                                           ?>
                                                                           <li><a href="<?php echo site_url('annonce/premium/'.$r->NUMANNONCE);?>"><i class="icon-arrow-up"></i>A la une</a></li>
                                                                       <?php
                                                                       endif;
                                                                       ?>
                                                                   </ul>
                                                               </td>
                                                           <?php endif;?>
                                                       </tr>
                                                   <?php endforeach; endif;?>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="tab3">
                            <?php //echo $this->load->view('messages');?>
                       </div>
                       <div class="tab-pane" id="tab4">
                           <?
                           $this->load->view('alertes',$user_info,$alertes);
                           ?>
                       </div>
                       <div class="tab-pane" id="tab5">
                            <?php //$this->load->view('advices');?>
                       </div>

                   </div>
               </div>
           </div>

        </div>
        </div>


    </div>


</div>
    <script src="<?=base_url('js/jquery.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.tablesorter.js'); ?>"></script>


    <script>
        $(document).ready(function() {
            $('.content').fadeIn(1000);
            $('.carousel').carousel();
            // $("#annonceForm").validationEngine('attach', {promptPosition : "centerRight", scroll: false});
            $("#formID").validationEngine('attach');
            $('#annonces').tablesorter();

        });
    </script>
<?php $this->load->view('includes/footer'); ?>