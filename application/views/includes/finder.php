<section id="searchbox">

<div class="innersearch container-fluid">
            <div class="text-center">
                    <h2 style="margin-top:-50px; font-weight: bold;" >Trouvez votre Transporteur ou un expéditeur</h2>
             </div>
            <?php
            $attribute=array('id'=>'searchform', 'class'=>'form-horizontal','role'=>'form');
            echo form_open('annonce/search',$attribute);
            ?>
                <div class="row 100% col-sm-10 col-lg-10 col-md-push-2" style="margin-top:40px;text-align: center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="inputPassword" class="col-md-4 control-label" >Expedier</label>
                            <div class="col-md-8">
                                <input class="form-control" type="radio" name="typecolis" id="envoi" value="Envoi" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="inputLabel3" class="col-md-4 control-label">Transporter</label>
                            <div class="col-md-8">
                                <input class="form-control" type="radio"  name="typecolis" id="transport" value="Transport" required/>
                            </div>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <div class=" form-group" >
                            <label class="col-md-8 control-label">
                                Expedier un colis
                            </label>
                            <div class="col-md-8">
                                <input class="form-control" type="radio" name="typecolis" id="envoi" value="Envoi" required/>
                             </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-8 control-label">
                                 Transporter un colis
                            </label>
                            <div class="col-md-8">
                                <input class="form-control" type="radio"  name="typecolis" id="transport" value="Transport" required/>
                            </div>

                        </div>
                    </div>-->
                </div>
                <div class="row 100%" style="margin-top:-110px; ">
                    <div class="form-group"  style="margin-top:-40px; ">
                        <div class="col-xs-9 col-md-9">
                            <input  type="text" class="validate[required]" style="background-image: url(<?php echo base_url().'images/site/icon-pin-depart.png';?>); background-repeat:no-repeat;padding-left:35px; "   value="<?php echo $this->input->post('villedepartsearch');?>" onfocus="geolocate()" id="villedepartsearch" name="villedepartsearch" placeholder="Ville de départ">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-40px; ">
                        <div class="col-xs-9 col-md-9">
                            <input type="text" class="validate[required]" style="background-image: url(<?php echo base_url().'images/site/icon-pin-arrivee.png';?>) ; background-repeat:no-repeat;padding-left:35px;"   value="<?php echo $this->input->post('villearriveesearch');?>"name="villearriveesearch" onfocus="geolocate()" id="villearriveesearch" placeholder="Ville d'arrivée">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:-40px; ">
                        <div class="col-xs-10 col-md-9">
                            <input id="datesearch" type="text" class="validate[custom[date]]" data-date-format="dd-mm-yyyy" size="16" style="background-image: url(<?php //echo base_url().'images/site/calendrier-icone.png';?>) ; background-repeat:no-repeat; padding-left:35px; margin-top:" placeholder="JJ-MM-YYYY" name="datesearch" value="<?php echo set_value('datesearch');?>">
                        </div>
                    </div>


                    <!--
                    <div class="3u 12u(mobile)">
                        <input  type="text" class="validate[required]" style="background-image: url(<?php echo base_url().'images/site/icon-pin-depart.png';?>); background-repeat:no-repeat;padding-left:35px; "   value="<?php echo $this->input->post('villedepartsearch');?>" onfocus="geolocate()" id="villedepartsearch" name="villedepartsearch" placeholder="Ville de départ">
                    </div>

                    <div class="3u 12u(mobile)">
                        <input type="text" class="validate[required]" style="background-image: url(<?php echo base_url().'images/site/icon-pin-arrivee.png';?>) ; background-repeat:no-repeat;padding-left:35px;"   value="<?php echo $this->input->post('villearriveesearch');?>"name="villearriveesearch" onfocus="geolocate()" id="villearriveesearch" placeholder="Ville d'arrivée">
                    </div>

                    <div class="3u 12u(mobile)">
                        <input id="datesearch" type="text" class="validate[custom[date]]" data-date-format="dd-mm-yyyy" size="16" style="background-image: url(<?php //echo base_url().'images/site/calendrier-icone.png';?>) ; background-repeat:no-repeat; padding-left:35px; margin-top:" placeholder="JJ-MM-YYYY" name="datesearch" value="<?php echo set_value('datesearch');?>">
                    </div>-->
                    <div class="form-group" style="margin-top:-40px; ">
                        <div class="col-xs-4 col-md-9">
                            <button type="submit" class="button btn-xs">Recherche</button>
                        </div>
                    </div>

                </div>
            <?php echo form_close();?>
        </div>
    </section>


<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap-datepicker.js'); ?>"></script>


<script>
    $(document).ready(function() {

        $("#searchform").validationEngine('attach');

        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        $('#datesearch').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        });
    });
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places&language=fr"></script>
<script type="text/javascript">
    var placeSearch,autocomplete;
    function initialize() {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('villedepartsearch'), { types: [ 'geocode' ] });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            fillInAddress();
        });
        autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('villearriveesearch'), { types: [ 'geocode' ] });
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
