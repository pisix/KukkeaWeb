﻿<br/><br/>
<div class="container-fluid">

    <?php if(!$facebook_login): ?>

        <h5><i style="font-weight: bold">Annonces en ligne</i> :<b><?php echo $number_annonce_user_connecte;?></b></h5>
        <div class="col-md-3">
            <?php foreach($user_connecte_info as $u):?>
                <img class="img-rounded img-responsive"  src="<?php echo base_url();?>images/thumbs/<?php echo $u->CHEMINPHOTO;?>" alt="<?php echo $u->NOMUSER;?>"/>
                <span style=" color:#666666"><?php echo $u->NOMUSER;?> <?php echo $u->PRENOMUSER;?></span><br/>
                <a href="<?php echo site_url().'account/editprofil/'.$iduser?>" class="no-decoration"><i class="glyphicon glyphicon-cog"></i> Modifier mon profil</a><br/>
               <!-- <?php if ($u->VERIFNUMTEL !=0):?>
                    <a href="#" onclick="checkPhoneNumber('<?php echo $u->TELUSER?>','<?php  encryptor('encrypt',$u->NUMUSER)?>')" class="no-decoration" STYLE="color: red"><i class="glyphicon glyphicon-phone"></i> Vérifiez mon numéro<br/>de téléphone</a><br/>
                <?php endif;?>-->

                <hr class="bs-docs-separator">
                <i class="glyphicon glyphicon-time blue-small"></i> Inscrit le <?php echo  strftime("%d %B %Y",strtotime($u->DATEINSCRIPTION)); ?><br/>
                <hr class="bs-docs-separator">
                <?php foreach($user_connecte_info as $u):?>
                    <a class="no-decoration" href="<?php echo site_url('account/profil/'.encryptor('encrypt',$u->NUMUSER))?>">
                                <span class="label label-info">
                                        <?php echo $nombre_avis; ?> Avis recu(s)
                                   </span>
                    </a>
                <?php endforeach;?>
                <br/>
                <hr class="bs-docs-separator">
                Moyenne des notes recus:<br/>
                <?php if (isset($average_avis)):?>
                    <?php if ($average_avis>=1 && $average_avis<2):?>
                        <span class="label">Mauvais</span>
                    <?php elseif($average_avis>=2 && $average_avis<3):?>
                        <span class="label label-warning">Moyen</span>
                    <?php elseif($average_avis>=3 && $average_avis<4):?>
                        <span class="label label-info">Bien</span>
                    <?php elseif($average_avis>=4 && $average_avis<5):?>
                        <span class="label label-important">Très Bien</span>
                    <?php elseif($average_avis==5): ?>
                        <span class="label label-success">Excellent</span>
                    <?php else:?>
                        <span class="label label-info">Vous n'avez recu aucune note</span>
                    <?php endif;?>
                    <b style="color:#339AB8; "> <?php echo $average_avis.'/5'; ?></b><br/>
                <?php else:?>
                    <span class="label">Vous n'avez recu aucun avis</span>
                <?php endif;?>
                <hr class="bs-docs-separator">
                <a style="text-decoration: none;" href="<?=site_url('auth/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i>Déconnexion</a>
                <hr class="bs-docs-separator">
                <?php if ($u->VERIFNUMTEL !=0 || $u->VERIFNUMTEL !=null ):?>
                    <?php  echo "<script type='text/javascript'>
                    $(document).ready(function(){
                        $('#myModal').modal('show');
                    });
                </script>";
                    ?>
                <?php endif;?>


            <?php endforeach?>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                        <h4 class="modal-title" id="myModalLabel">VéRIFICATION DE VOTRE NUMERO DE TELEPHONE</h4>
                    </div>
                    <div class="modal-body">

                        <?php if ($this->session->flashdata('telephoneko1')):?>
                            <div class="alert alert-danger" id="success-alerte">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('telephoneko1');?>
                            </div>
                        <?php endif;?>
                        <?php if ($this->session->flashdata('telephoneko2')):?>
                            <div class="alert alert-danger" id="success-alerte">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('telephoneko2');?>
                            </div>
                        <?php endif;?>
                        <?php if ($this->session->flashdata('regenerationok')):?>
                            <div class="alert alert-info" id="success-alerte">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('regenerationok');?>
                                Si vous n'avez rien reçu, veuillez cliquer sur le lien ci-après <a href="<?php echo site_url('help/certificationdutelephone')?>" class="no-decoration">Comment verifier mon numéto de téléphone</a>
                            </div>
                        <?php endif;?>
                        <?php
                        $attributes = array('class'=>'modal-code-box-form ','id' => 'modal-code-box-form');

                        echo form_open('account/activatecodetelephonique', $attributes);
                        ?>
                        Saississez le code que vous avez reçu par SMS:
                        <input type="hidden" value="<?php echo $this->session->userdata('email');?>" name="email"/>
                        <?php echo form_error('codetelephonique','<span class="alert-danger">','</span>');?>
                        <input style="width: 250px;margin-left: 150px" placeholder="Code" class="validate[number,required,length[4,4]]" type="text" name="codetelephonique" id="codetelephonique" />
                    </div>
                    <div class="modal-footer">
                        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>-->
                        <button type="submit" class="button">Valider le code</button>
                    </div>
                    <?php echo form_close();?>
                    <div class="modal-footer">
                        <?php foreach($user_connecte_info as $u):?>
                            <a href="<?php echo site_url('account/generatecode?tel='.encryptor('encrypt',$u->TELUSER).'&user='.encryptor('encrypt',$u->NUMUSER))?>" style="margin-right: 300px" class=" button special no-decoration">Regenerer le code</a>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
        <h3 class="section-title" style="text-align: center"><span class="fa fa-home"></span> Tableau de bord</h3>


        <?php if ($this->session->flashdata('telephoneok')):?>
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <?php echo $this->session->flashdata('telephoneok');?>
            </div>
        <?php endif;?>
        <?php if ($this->session->flashdata('bienvenue')):?>
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <?php echo $this->session->flashdata('bienvenue');?>
            </div>
            <?php  echo "<script type='text/javascript'>
                    $(document).ready(function(){
                        $('#myModal').modal('show');
                    });
                </script>";
            ?>
        <?php endif;?>

        <?php if ($this->session->flashdata('motdepasseajour')):?>
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <?php echo $this->session->flashdata('motdepasseajour');?>
            </div>
        <?php endif;?>
        <?php if ($this->session->flashdata('profilmisajour')):?>
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <?php echo $this->session->flashdata('profilmisajour');?>
            </div>
        <?php endif;?>
        <?php if ($this->session->flashdata('ajoutannonce')):?>
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <?php echo $this->session->flashdata('ajoutannonce');?>
            </div>
        <?php endif;?>
        <?php if ($this->session->flashdata('annoncemisajour')):?>
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <?php echo $this->session->flashdata('annoncemisajour');?>
            </div>
        <?php endif;?>
        <?php if ($this->session->flashdata('messagedelete')):?>
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <?php echo $this->session->flashdata('messagedelete');?>
            </div>
        <?php endif;?>
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mes annonces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        </b></a></li>
                <li><a href="#tab2" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mes Expéditions&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                        </b></a></li>
                <li><a href="#tab3" data-toggle="tab"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mes  transports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </b></a></li>


            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <br/>

                    <table class="table" id="annonces">
                        <?php if(isset($toutes_mes_annonces)):?>
                            <thead>
                            <tr>
                                <th> Date</th>
                                <th> Type</th>
                                <th> Titre</th>
                                <th> Départ</th>
                                <th> Arrivée</th>
                                <th> Prix</th>
                                <th> Editer</th>
                                <th> Supprimer</th>
                                <th> Voir</th>
                            </tr>
                            </thead>
                        <?php else:?>
                            <div class="alert alert-info"> Vous n'avez publié aucune annonce</div>
                        <?php endif;?>
                        <tbody class="white">
                        <?php if ($toutes_mes_annonces !=null):?>
                            <?php foreach($toutes_mes_annonces as $r): ?>
                                <tr onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'" onclick="/*document.location.href='<?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>'*/">

                                    <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                        <td><!--Du--> <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?><!-- Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?></td>-->
                                        <td><?php echo 'Transport';?></td>
                                        <td><?php echo $r->TITREANNONCE;?></td>
                                        <td><?php echo $r->NOMVILLEDEPART;?></td>
                                        <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                        <td><b><?php echo $r->PRIX;?></b></td>
                                        <td><a href="<?php echo site_url('annonce/editannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editer</a></td>
                                        <td> <a href="javascript:void(0);" class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span> Supprimer</a> </td>
                                        <td><a href=" <?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span> Voir</a></td>

                                    <?php else: ?>
                                        <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                        <td><?php echo  'Envoi';?></td>
                                        <td><?php echo $r->TITREANNONCE;?></td>
                                        <td><?php echo $r->NOMVILLEDEPART;?></td>
                                        <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                        <td><b><?php echo $r->PRIX;?></b></td>
                                        <td><a href="<?php echo site_url('annonce/editannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editer</a></td>
                                        <td> <a href="javascript:void(0);" class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span> Supprimer</a> </td>
                                        <td><a href=" <?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span> Voir</a></td>
                                    <?php endif;?>
                                </tr>
                            <?php endforeach; endif;?>
                        </tbody>
                    </table>

                </div>
                <div class="tab-pane" id="tab2">

                    <br/>

                    <table class="table   tablesorter" id="annonces">
                        <?php if(isset($toutes_mes_annonces_envoi)):?>
                            <thead>
                            <tr>
                                <th> Date</th>
                                <th> Type</th>
                                <th> Titre</th>
                                <th> Départ</th>
                                <th> Arrivée</th>
                                <th> Prix</th>
                                <th> Editer</th>
                                <th> Supprimer</th>
                                <th> Voir</th>
                            </tr>
                            </thead>
                        <?php else:?>
                            <div class="alert alert-info"> Vous n'avez publié aucune annonce de type expédition</div>
                        <?php endif;?>
                        <tbody class="white">
                        <?php if ($toutes_mes_annonces_envoi !=null):?>
                            <?php foreach($toutes_mes_annonces_envoi as $r): ?>
                                <tr  onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'">
                                    <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                        <td><!--Du--> <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?> <!--Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?>--></td>
                                        <td><?php echo 'Transport';?></td>
                                        <td><?php echo $r->TITREANNONCE;?></td>
                                        <td><?php echo $r->NOMVILLEDEPART;?></td>
                                        <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                        <td><b><?php echo $r->PRIX;?></b></td>
                                        <td><a href="<?php echo site_url('annonce/editannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editer</a></td>
                                        <td> <a href="javascript:void(0);" class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span> Supprimer</a> </td>
                                        <td><a href=" <?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span> Voir</a></td>
                                    <?php else: ?>
                                        <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                        <td><?php echo  'Envoi';?></td>
                                        <td><?php echo $r->TITREANNONCE;?></td>
                                        <td><?php echo $r->NOMVILLEDEPART;?></td>
                                        <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                        <td><b><?php echo $r->PRIX;?></b></td>
                                        <td><a href="<?php echo site_url('annonce/editannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editer</a></td>
                                        <td> <a href="javascript:void(0);" class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span> Supprimer</a> </td>
                                        <td><a href=" <?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span> Voir</a></td>
                                    <?php endif;?>
                                </tr>
                            <?php endforeach; endif;?>
                        </tbody>
                    </table>

                </div>
                <div class="tab-pane" id="tab3">
                    <br/>
                    <table class="table   tablesorter" id="annonces">
                        <?php if(isset($toutes_mes_annonces_transport)):?>
                            <thead>
                            <tr>
                                <th> Date</th>
                                <th> Type</th>
                                <th> Titre</th>
                                <th> Départ</th>
                                <th> Arrivée</th>
                                <th> Prix</th>
                                <th> Editer</th>
                                <th> Supprimer</th>
                                <th> Voir</th>

                            </tr>
                            </thead>
                        <?php else:?>
                            <div class="alert alert-info"> Vous n'avez publié aucune annonce de type transport</div>
                        <?php endif;?>
                        <tbody class="white">
                        <?php if ($toutes_mes_annonces_transport !=null):?>
                            <?php foreach($toutes_mes_annonces_transport as $r): ?>
                                <tr onmouseout="this.style.backgroundColor='#FFFFFF';this.style.color='#333333'" onmouseover="this.style.backgroundColor='#E4F3FE';this.style.color='black'" onclick="/*document.location.href='<?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>'*/">

                                    <?php if($r->TYPE_ANNONCE=='Transport'):?>
                                        <td><!--Du--> <?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?> <!--Au <?php echo strftime("%d %B %Y",strtotime($r->DATEFINANNONCE));?></td>-->
                                        <td><?php echo 'Transport';?></td>
                                        <td><?php echo $r->TITREANNONCE;?></td>
                                        <td><?php echo $r->NOMVILLEDEPART;?></td>
                                        <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                        <td><b><?php echo $r->PRIX;?></b></td>
                                        <td><a href="<?php echo site_url('annonce/editannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editer</a></td>
                                        <td> <a href="javascript:void(0);" class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span> Supprimer</a> </td>
                                        <td><a href=" <?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span> Voir</a></td>

                                    <?php else: ?>
                                        <td><?php echo strftime("%d %B %Y",strtotime($r->DATEDEBUTANNONCE));?></td>
                                        <td><?php echo  'Envoi';?></td>
                                        <td><?php echo $r->TITREANNONCE;?></td>
                                        <td><?php echo $r->NOMVILLEDEPART;?></td>
                                        <td><?php echo $r->NOMVILLEARRIVEE;?></td>
                                        <td><b><?php echo $r->PRIX;?></b></td>
                                        <td><a href="<?php echo site_url('annonce/editannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editer</a></td>
                                        <td> <a href="javascript:void(0);" class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span> Supprimer</a> </td>
                                        <td><a href=" <?php echo site_url('annonce/showannonce/'.encryptor('encrypt',$r->NUMANNONCE));?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span> Voir</a></td>
                                    <?php endif;?>
                                </tr>
                            <?php endforeach; endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Suppression annonce</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Voulez-vous vraiment supprimer cette annonce?</div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-success"  onclick="deleteannonce(<?php echo $r->NUMANNONCE; ?>)"><span class="glyphicon glyphicon-ok-sign"></span> Oui</button>
                        <button type="button" class="btn btn-default" onclick="return false;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Non</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        </div>

   <?php else: ?>
    <div>You logged in using facebook <a href="<?php echo $logout_url; ?>">Logout</a></div>
   <?php endif; ?> <!-- End standard login -->

</div>
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.tablesorter.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>

<script type="text/javascript">
    function deleteannonce(id){
        window.location ="<?php echo site_url('annonce/deleteannonce/')?>"+"/"+id ;
    }
</script>

<script>

    $(document).ready(function() {
        // $("#annonceForm").validationEngine('attach', {promptPosition : "centerRight", scroll: false});
        $('#annonces').tablesorter();
        $("#modal-code-box-form").validationEngine('attach');

    });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").alert('close');
        });

        checkPhoneNumber = function(number,user)
        {
            $.ajax({
                type: "POST",
                asynch : true,
                url: <?php echo site_url();?>+ "signup/send_sms_membres",
                data: {numero_telephone: number,user: user},
                dataType: "JSON",
                success:
                    function(data){
                        $('#myModal').modal('show');
                    }
            });
        }

    });
</script>