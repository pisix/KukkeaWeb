<br/>
<div class="col-md-1">

</div>
<div class="well col-md-10 "  style=" text-align: center;background-color:#339bb9;">

        <?php
       $attribute=array('id'=>'formID','class'=>'form-inline','role'=>'form');
       echo form_open('annonce/search',$attribute);
        ?>
        <div class="radio" >
            <label style="color: white;">
                <input type="radio" name="typecolis" id="envoi" value="Envoi" required/>
                Expedier un colis
            </label>
        </div>
        <div class="radio-inline">
            <label  style="margin-left: 100px;color: white; font-weight: normal">
                <input type="radio"  name="typecolis" id="transport" value="Transport" required/>
                Transporter un colis
            </label>

        </div>
       <br/>
        <div class="finder-form"
            <span class="inline " style="color: white">De:</span><input type="text" style="background-image: url(<?php echo base_url().'images/site/icon-pin-depart.png';?>); background-repeat:no-repeat; padding-left:30px;height: 32px;" required  value="<?php echo $this->input->post('villedepartsearch');?>" onfocus="geolocate()" id="villedepartsearch" name="villedepartsearch" placeholder="Ville départ">
            <span class="inline" style="color: white">à:</span><input type="text" style="background-image: url(<?php echo base_url().'images/site/icon-pin-arrivee.png';?>) ; background-repeat:no-repeat; padding-left:30px;height: 32px;" required  value="<?php echo $this->input->post('villearriveesearch');?>"name="villearriveesearch" onfocus="geolocate()" id="villearriveesearch" placeholder="Ville arrivée">
            <!--<span class="inline datepicker" style="color: white">le:</span><input id="dp11" data-provide="datapicker"  style="background-image: url(<?php echo base_url().'images/site/calendrier-icone.png';?>) ; background-repeat:no-repeat; padding-left:35px;  height: 32px;" name="date" value="<?php echo $this->input->post('date');?>" data-date-format="dd/mm/yyyy" type="date"    placeholder="Date (JJ/MM/AAAA)">-->
            <span class="inline datepicker" style="color: white">le:</span><input id="datesearch" type="date" class="validate[required,custom[date],future[NOW]]" data-date-format="dd-mm-yyyy" size="16" style="background-image: url(<?php echo base_url().'images/site/calendrier-icone.png';?>) ; background-repeat:no-repeat; padding-left:35px;  height: 32px;" name="date" value="<?php echo set_value('date');?>">

    <button type="submit" class="btn btn-default btn-primary"><i class="glyphicon glyphicon-search"></i> Recherche</button>
        </div>
    <?php echo form_close();?>

</div>
<div class="col-md-1">

</div>

<script type="text/javascript" src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap-datepicker.js'); ?>"></script>
<script>
    $(document).ready(function() {
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
