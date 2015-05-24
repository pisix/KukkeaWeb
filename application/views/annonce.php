<?php  $this->load->view('includes/analyticstracking'); ?>

<div class="content">
    <?php //$this->load->view('includes/second_nav_inner_bar'); ?><br/>
    <div class="row 100%">

        <div class="col-md-12 100%" style="background-color: white;">
            <div style="text-align: center;color: #233140"><h4><i>Kukkea vous permet de gagner de l'argent en mettant en vente l'espace disponible dans vos valises.</i></h4></div>
            <div style="text-align: center;color: #233140"><h4><i>Kukkea vous connecte à des millions de voyageurs afin d'expédier vos colis par ces derniers.</i></h4>
            </div>
        </div>

    </div>
</div>
<br/>
<article id="main">
    <section class="wrapper style4 container">
        <div class="content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <!-- <div id="loading">
                <img id="loading-image" src="<?=base_url().'images/site/loader.gif'?>" alt="Loading..." />
            </div>-->

                    <?php if(isset($success)): ?>
                        <div class="row">
                            <div class="col-md-9">
                                <div id="successMessage" class="alert alert-success">
                                    <p><strong><?php echo $success;?></p>
                                    <a href="<?=site_url(''); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i> Retour aux annonces</a>
                                </div>
                            </div>
                        </div>
                    <?php elseif(isset($error)):?>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="alert alert-danger">
                                    <strong>Inscription</strong> echouée!.<br/>
                                    <?php echo $error;?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div id="form">
                        <?php
                        $attributes = array('class'=>'formular add-annonce-form','id' => 'annonceForm');
                        echo form_open('annonce/addannonce', $attributes);
                        ?>
                        <br/>
                        <fieldset>
                            <legend class="scheduler-border" >CATEGORIE</legend>
                            <div class="row 50%">

                                <label class="3u 7u(mobile)">Type d'annonce<span style="color:red">*</span>:</label>

                                <div class="6u 12u(mobile)">
                                        <input type="radio" name="typeannonce" id="optionsRadios2" value="Envoi" class="validate[required]" >Expedition
                                        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

                                    <input type="radio" name="typeannonce" id="optionsRadios2" value="Transport" class="validate[required]">Transport
                                </div>


                            </div>

                            <?php foreach($user_connecte_info as $i):?>
                                <input type="hidden" name="id_user" value="<?php echo $i->NUMUSER;?>"/>
                            <?php endforeach;?>
                        </fieldset>
                        <br/>
                        <fieldset>
                            <legend class="scheduler-border">LOCALISATION</legend>
                            <div class="col-md-4">
                                <h2><span class="label label-danger">Départ</span></h2><br/><br/>
                                <div style="margin-top: -50px">

                                    <label for="villedepart" >Ville de départ<span style="color:red">*</span>: </label>

                                    <input type="text" name="villedepart" onfocus="geolocate()" placeholder="Ville de départ" id="autocomplete"  class="validate[required]" autocomplete="off" />
                                </div>
                                <div>
                                    <label for="villedepart">Date de départ<span style="color:red">*</span>: </label>
                                    <input id="startDate" class="validate[required,custom[date]]" data-date-format="dd-mm-yyyy" type="text" size="16" name="datedebutannonce" value="<?php echo set_value('datedebutannonce');?>">
                                </div>
                            </div>

                            <div class="col-md-4 col-md-push-1 ">
                                <h2><span class="label-danger label label-default"style="background-color: #990000"> >>>>>>></span></h2>
                            </div>

                            <div class="col-md-4 col-md-push-1">
                                <h2> <span class="label label-default label-info">Arrivée</span></h2><br/><br/>

                                <div style="margin-top: -50px">
                                    <label for="villearrivee">Ville d'arrivée<span style="color:red">*</span>: </label>

                                    <input type="text" name="villearrivee" onfocus="geolocate()" placeholder="Ville d'arrivée"  class="validate[required]" id="autocomplete2" autocomplete="off" />


                                </div>
                                <div>
                                    <label for="villedepart">Date de d'arrivée<span style="color:red">*</span>: </label>
                                    <input id="endDate" class="validate[required,custom[date]]" data-date-format="dd-mm-yyyy" size="16" type="text" name="datefinannonce" value="<?php echo set_value('datedebutannonce');?>">

                                </div>


                            </div>
                        </fieldset>
                        <br/>
                        <fieldset>
                            <legend class="scheduler-border">VOTRE ANNONCE</legend>
                            <?php if(isset($error_titre)):?>
                                <span class="alert-danger"> <?php  echo $error_titre;?></span>
                            <?php endif;?>
                            <label for="titreannonce">Titre de l'annonce<span style="color:red">*</span>:</label>
                            <div class="8u 12u(mobile)">
                                <input type="text" class="validate[required, maxSize[1000]]" name="titreannonce" value="<?php echo set_value('titreannonce');?>"/>
                                </div>


                            <?php if(isset($error_annonce)):?>
                                <span class="alert alert-danger"> <?php  echo $error_annonce;?></span>
                            <?php endif;?>
                            <label for="texteannonce">Texte de l'annonce<span style="color:red">*</span>:</label>
                            <div class="8u 12u(mobile)">
                                <textarea rows="7" cols="6" placeholder="Attention, pas d'email, pas de N° de tél dans l'annonce." class=" input validate[required, maxSize[1000]]" name="texteannonce" value="<?php echo $this->input->post('texteannonce');?>">
                                </textarea>
                             </div>
                                </br>
                            <div class="row 50%">
                                <label class="3u 7u(mobile)" for="poids">Poids du colis<span style="color:red">*</span>(Kg):</label>
                                <div class="6u 12u(mobile)">
                                        <input type="text" class="validate[required,custom[integer],max[50]]" name="poids" style="width:100px" step="any" value="<?php echo set_value('poids');?>"/>
                                </div>
                            </div>
                            <div class="row 50%">
                            <label class="3u 7u(mobile)" for="prix">Prix<span style="color:red">*</span>(Euro):</label>
                                <div class="6u 12u(mobile)">
                                    <input type="text" class="validate[required,custom[integer],max[500]]" style="width:100px" name="prix" value="<?php echo set_value('prix');?>"/>
                                </div>
                        </fieldset>
                        <br/>
                        <div class=" col-md-4 col-md-push-4">
                            <input type="submit" id="soumettre" class="button special"  value="Publier"/>

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

        </div>

    </section>
</article>
</div>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places&language=fr"></script>
<script type="text/javascript">
    var placeSearch,autocomplete;
    function initialize() {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'), { types: [ 'geocode' ] });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            fillInAddress();
        });

        autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('autocomplete2'), { types: [ 'geocode' ] });
        google.maps.event.addListener(autocomplete2, 'place_changed', function() {
            fillInAddress();
        });
    }
    function fillInAddress() {
        var place = autocomplete.getPlace();

        for (var component in component_form) {
            document.getElementById(component).value = "";
            document.getElementById(component).disabled = false;
        }

        for (var j = 0; j < place.address_components.length; j++) {
            var att = place.address_components[j].types[0];
            if (component_form[att]) {
                var val = place.address_components[j][component_form[att]];
                document.getElementById(att).value = val;
            }
        }
    }
    window.onload=initialize;
</script>
<script type="text/javascript" src="<?=base_url('js/jquery.1.8.min.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.content').fadeIn(1000);
        $("#annonceForm").validationEngine('attach');

        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        $('#startDate').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        });
        var nowTemp2= new Date ();
        nowTemp2.setDate(nowTemp2.getDate()+1);
        var startDate = new Date(nowTemp2.getFullYear(), nowTemp2.getMonth(), nowTemp2.getDate(), 0, 0, 0, 0);
        $('#endDate').datepicker({
            onRender: function(date) {
                return date.valueOf() < startDate.valueOf() ? 'disabled' : '';
            }
        });
        $('#loading').hide();
    });
</script>

