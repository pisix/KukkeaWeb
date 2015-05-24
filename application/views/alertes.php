<?php $this->load->view('includes/analyticstracking'); ?>
<div class="span15">
    <!--<?php //foreach($alertes as $a):?>-->
        <?php if($alertes==''):?>
            <div class="row">
                <?php foreach($user_info as $u):?>
                     Vous n'avez pas encore créé d'alertes. Les emails seront envoyés à l'adresse <b><?php echo $u->EMAILUSER;?></b><br/>
                <?php endforeach?>
                <br/>
            </div>

            <div class="content" style="margin-left: -30px; height: 100px;">
                <div class="page-header" style="font-color:white;">
                    <h4>Créez une alerte <!--pour une Expédition ou un Transport--> et recevez par email toutes les annonces correspondantes à la votre </h4>
                </div>
                <div class="">
                   <b>C'est pratique</b> : Vous pouvez créer votre alerte plusieurs semaines/mois à l'avance.<br/>
                    <b>C'est simple</b> : Une fois l'alerte créée, vous recevrez directement par email chaque nouvelle annonce correspondant à votre alerte
                    <br/>
                </div>
                <br/>
                <div class="well" style="background-color: #E1F5FA; height: 160px;">
                    <b>Comment créer une alerte email ?</b><br/>
                    <ol>
                        <li><span style="color:#000000">Choisissez un type de transaction</span></li>
                        <li><span style="color:#000000">Choisissez une ville de depart et une ville d'arrivée</span></li>
                        <li><span style="color:#000000">Chosissez une date d'expédition/de depart(transport)</span></li>
                        <li><span style="color:#000000">Cliquez sur le bouton pour créer un alerte email</span></li>
                        <li><span style="color:#000000">Vous recevrez automatiquement un email quand une nouvelle annonce pour ce trajet sera publiée</span></li>
                    </ol>
                    <a  href="#myModal" role="button"  data-toggle="modal" class="btn btn-info ">Créer une alerte</a>

                </div>
                <div id="myModal" class="modal hide fade"  style="margin-top: 0px;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel"> CREER UNE ALERTE</h3>
                    </div>
                    <div class="modal-body">
                        <div id="fromID">
                            <?php
                            $attribute=array('id'=>'formID');
                            echo form_open('annonce/create_alerte',$attribute);
                            ?>

                            <div class="radio inline">
                                <label>
                                    <input type="radio" name="typecolis" id="envoi" value="Envoi" required>
                                    Expedition colis
                                </label>
                            </div>
                            <div class="radio inline">
                                <label  style="margin-left: 100px;">
                                    <input type="radio"  name="typecolis" id="transport" value="Transport" required>
                                    Transport colis
                                </label>
                            </div>

                            <div>
                                <input type="text" style="background-image: url(<?php echo base_url().'images/site/icon-pin-depart.png';?>); background-repeat:no-repeat; padding-left:30px;" required style="height: 20px; width: 45px;" value="" name="villedepartalerte" placeholder="De">
                                <input type="text" style="background-image: url(<?php echo base_url().'images/site/icon-pin-arrivee.png';?>) ; background-repeat:no-repeat; padding-left:30px;" required style="height: 20px; width: 45px;" value=""name="villearriveealerte" placeholder="A">
                                <input id="dp5" data-provide="datapicker"  style="background-image: url(<?php echo base_url().'images/site/calendrier-icone.png';?>) ; background-repeat:no-repeat; padding-left:35px;  height: 20px;" name="date" value="" data-date-format="dd/mm/yyyy" type="date" class="text-input datepicker" required placeholder="Date Expedition/Date Transport">
                                <input style="background-image: url(<?php echo base_url().'images/site/email-icon.png';?>) ; background-repeat:no-repeat; padding-left:35px;  height: 20px;" name="date" value=""  type="email"  placeholder="Votre email">
                               <!-- <button type="submit"  style="height: 30px;margin-bottom: 10px;" class="btn btn-warning">Créer une alerte</button>-->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <input type="submit" class="btn btn-primary"  name="Creer l'alerte" value="Creer l'alerte"/>
                        <?php echo form_close();?>
                    </div>
                </div>

            </div>


        <?php else:?>

        <?php endif;?>
    <?php //endforeach?>
</div>
