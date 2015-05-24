<?php //$this->load->view('includes/second_nav_inner_bar'); ?><br/><br/>

<article id="main">
    <section class="wrapper style4 container">
        <div class="container-fluid">
            <div class="col-md-1"></div>
            <div class="col-md-10 edit-annonce-form ">
                <header class="special">
                    <span class="icon fa fa-edit"></span>

                    <?php foreach($annonce_edit as $i): ?>
                        <h2 class="section-title" style="text-align: center">Edition de l'annonce: <?php echo $i->TITREANNONCE;?></h2>
                    <?php endforeach;?>

                </header>
                <?php if(isset($success)): ?>
                    <div class="row">
                        <div class="span9">
                            <div id="successMessage" class="alert alert-success">
                                <p><strong><?php echo $success;?></p>
                                <a href="<?=site_url(''); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i> Retour aux annonces</a>
                            </div>
                        </div>
                    </div>

                <?php elseif(isset($error)):?>
                    <div class="row">
                        <div class="span9">
                            <div class="alert alert-error">
                                <strong>Edition de l'annonce</strong> echouée!.<br/>
                                <?php echo $error;?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                $attributes = array('class'=>'formular','id' => 'annonceForm');
                echo form_open('annonce/updateannonce', $attributes);
                ?>
                <?php foreach($annonce_edit as $i): ?>
                <div style="margin-top: 50px">
                    <fieldset>
                        <legend class="bold">CATEGORIE</legend>
                        <label>Type d'annonce<span style="color:red">*</span>:</label>
                        <div class="form-inline" role="form">
                            <?php if ($i->TYPE_ANNONCE=='Transport'):?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="typeannonce" id="optionsRadios2" value="Envoi"> Envoi
                                    </label>
                                </div>
                                <div class="radio " style="margin-left: 100px;">
                                    <label>
                                        <input type="radio" name="typeannonce" id="optionsRadios2" value="Transport" checked>Transport
                                    </label>
                                </div>
                            <?php else: ?>
                                <div class="radio-inline">
                                    <label class=" radio">
                                        <input type="radio" name="typeannonce" id="optionsRadios2" value="Envoi" CHECKED> Envoi
                                    </label>
                                </div>
                                <div class="radio inline" style="margin-left: 100px;">
                                    <label>
                                        <input type="radio" name="typeannonce" id="optionsRadios2" value="Transport">Transport
                                    </label>
                                </div>
                            <?php endif;?>
                        </div>
                        <br/>
                    </fieldset>
                    <fieldset>
                        <legend class="bold">VOTRE ANNONCE</legend>
                        <input type="hidden" value="<?php echo encryptor('encrypt',$i->NUMANNONCE)?>" name="numannonce"/>

                        <div class="row 50%">
                            <label  class="3u 7u(mobile)" for="poids">
                                <span>Poids du colis<span style="color:red">*</span>:</span></label>
                            <div class="6u 12u(mobile)">
                                <input type="number"  class="validate[required]" step="any" name="poids" value="<?php echo $i->POIDS;?>"/>
                            </div>
                        </div>

                        <div class="row 50%">
                            <label  class="3u 7u(mobile)" for="titreannonce">
                                <span>Titre de l'annonce:<span style="color:red">*</span>:</span>
                                <?php echo form_error('titreannonce','<span class="error">','</span>');?>
                            </label>
                            <div class="6u 12u(mobile)">
                                <input type="text" class="validate[required]" name="titreannonce" value="<?php echo $i->TITREANNONCE?>"/>
                            </div>
                        </div>

                        <div class="row 100%">
                            <label  class="3u 7u(mobile)" for="texteannonce">
                                <span>Texte de l'annonce<span style="color:red">*</span>:</span>
                            </label>
                            <div class="6u 12u(mobile)">
                                <textarea  cols="20" rows="5"  name="texteannonce" value="<?php echo $i->CONTENUANNONCE;?>">
                                    <?php echo $i->CONTENUANNONCE;?>
                                </textarea>
                            </div>
                        </div>

                        <div class="row 50%">
                            <label  class="3u 7u(mobile)" for="prix">
                                <span>Prix:<span style="color:red">*</span>:</span><?php echo form_error('prix','<span class="error">','</span>')."(Optionnel)";?> </label>
                            <div class="6u 12u(mobile)">
                                <input type="text" class="validate[number]" name="prix" value="<?php echo $i->PRIX?>"/>
                            </div>
                        </div>

                        <div class="row 50%">
                            <label  class="3u 7u(mobile)" for="datedepart">
                                <span>Date de départ:<span style="color:red">*</span>:</span> </label>
                            <div class="6u 12u(mobile)">
                                <input id="dp11" class="validate[required,custom[date]]" type="text" data-date-format="dd-mm-yyyy" size="16" name="datedebutannonce" value="<?php echo strftime("%d-%m-%Y",strtotime($i->DATEDEBUTANNONCE));?>">
                            </div>
                        </div>


                        <div class="row 50%">
                            <label  class="3u 7u(mobile)" for="datearrivee">
                                <span>Date arrivé:<span style="color:red">*</span>:</span> </label>
                            <div class="6u 12u(mobile)">
                                <input id="dp12" class="validate[required,custom[date]]" type="text" data-date-format="dd-mm-yyyy" size="16" name="datefinannonce" value="<?php echo strftime("%d-%m-%Y",strtotime($i->DATEFINANNONCE));?>">
                            </div>
                        </div>
                    </fieldset>
                </div>
                    <br/>
                    <input type="submit" class="button special" id="mettreajourannonce" value="Mettre à jour" name="Update"/>
                    <?php echo form_close(); ?>
                <?php endforeach;?>
            </div>
            <div class="col-md-1"></div>
        </div>

    </section>
</article>


     <script src="<?=base_url('js/jquery.js'); ?>"></script>
        <script src="<?=base_url('js/bootstrap.js'); ?>"></script>
        <script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
        <script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
        <script src="<?=base_url('js/bootstrap-datepicker.js'); ?>"></script>



        <script>
            $(document).ready(function() {
                $('.content').fadeIn(1000);
                $("#annonceForm").validationEngine('attach');
                $('#dp11').datepicker();
                $('#dp12').datepicker();
            });
        </script>

