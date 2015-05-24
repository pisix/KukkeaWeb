
<form  name="alert-form" id="alertForm" action="<?php echo site_url('annonce/create_alert');?>" method="POST" style="color: #ffffff">
                        <div class="radio inline">
                            <label>
                                <input type="radio" name="typecolis" id="typecolis" value="Envoi" required <?php if(isset($categorie) && $categorie=='Envoi') :echo ' checked'; endif;?>>
Expedition colis
</label>
<label  style="margin-left: 100px;">
    <input type="radio"  name="typecolis" id="typecolis" value="Transport" required <?php if(isset($categorie) && $categorie=='Transport') :echo ' checked'; endif;?>>
    Transport colis
</label>
</div>

<div class="alert-form">
    <div class="row 50%">
        <label  class="3u 7u(mobile)" >
            <span>Ville de départ<span style="color:red">*</span>:</span></label>
        <div class="6u 12u(mobile)">
            <input type="text" onfocus="geolocate()" style="background-image: url(<?php echo base_url().'images/site/icon-pin-depart.png';?>); background-repeat:no-repeat; padding-left:30px;" required  pattern=".{3,}" title="3 Caractères minimum" value="<?php if(isset($villedepartalerte)) :echo $villedepartalerte; endif;?>" name="villedepartalerte" id="villedepartalerte" placeholder="Depart">
        </div>
    </div>
    <div class="row 50%">
        <label  class="3u 7u(mobile)">
            <span>Ville d'arrivée<span style="color:red">*</span>:</span></label>
        <div class="6u 12u(mobile)">
            <input type="text" onfocus="geolocate()" style="background-image: url(<?php echo base_url().'images/site/icon-pin-arrivee.png';?>) ; background-repeat:no-repeat; padding-left:30px;" required  pattern=".{3,}" title="3 Caractères minimum" value="<?php if(isset($villearriveealerte)) : echo $villearriveealerte; endif;?>"name="villearriveealerte" id="villearriveealerte"  placeholder="Arrivee">
        </div>
    </div>
    <div class="row 50%">
        <label  class="3u 7u(mobile)" >
            <span>Date de depart<span style="color:red">*</span>:</span></label>
        <div class="6u 12u(mobile)">
            <input id="startDate" class="validate[required,custom[date]] text-input" placeholder="DD-MM-YYYY" data-date-format="dd-mm-yyyy" size="16" type="text" name="date" value="<?php echo set_value('date');?>">
        </div>
    </div>
    <div class="row 50%">
        <label  class="3u 7u(mobile)">
            <span>Email<span style="color:red">*</span>:</span></label>
        <div class="6u 12u(mobile)">
            <input  name="emailalerte" class="validate[required,custom[email]]" value="<?php echo $this->input->post('emailalerte');?>"  id="emailalerte" type="email"  placeholder="Votre email" >
        </div>
    </div>

    <div class="row 50%">
        <div class="6u 12u(mobile)">
            <button type="submit" id="submit"  class="button special">Créer une alerte</button>
        </div>
    </div>
</div>
</form>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places&language=fr"></script>
<script type="text/javascript">
    var placeSearch,autocomplete;
    function initialize() {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('villedepartalerte'), { types: [ 'geocode' ] });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            fillInAddress();
        });

        autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('villearriveealerte'), { types: [ 'geocode' ] });
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
        $("#alertForm").validationEngine('attach');

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
    });
</script>

