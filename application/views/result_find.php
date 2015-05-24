
<?php $this->load->view('includes/analyticstracking'); ?>
<br/>
<br/>
<article id="main">
    <!-- One -->
    <section class="wrapper style4 container">
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
                <?php if ($this->session->flashdata('erreurbdd')):?>
                    <div class="alert alert-danger" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <?php echo $this->session->flashdata('erreurbdd');?>
                    </div>
                <?php endif;?>
                    <?php if  (isset ($result_find) && $result_find !=null):?>
                        <div class="col-md-12 page-header" style="background-color: #313334;font-color:white;">
                            <h3 style="color:#ffffff;">Annonces de <?php echo $villedepartalerte;?> à <?php echo $villearriveealerte;?></h3>

                        </div>

                        <?php foreach($result_find as $r): ?>
                            <div class="col-md-12 divider-horizontal-annonce">
                                <div class="col-md-2 ">

                                    <div class="col-md-2 col-md-pull-4 " >
                                        <p  class=" infobulle no-decoration">
                                            <span style="color: #ffffff; font-size: 15px; line-height: 120%;"><?php echo $r->PRENOMUSER ?>&nbsp;&nbsp;<?php echo $r->NOMUSER[0]; ?><br/><?php echo $r->PAYSUSER ?>, <?php echo $r->VILLEUSER ?> <a href="<?php echo site_url('account/profil/'.encryptor('encrypt',$r->NUMUSER))?>" class="no-decoration">Voir profil</a> </span>
                                            <img  alt="image" style="text-align: right" width="72px" height="72px" class="img-rounded  no-decoration"  src="<?php  echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>" alt="<?php echo $r->NOMUSER;?>"/>
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
                                <div class="col-md-5  description">
                                    <Span class="date-expiration" ><?php echo  strftime('%A %d %B %Y',strtotime($r->DATEDEBUTANNONCE));?></span><br/>
                                    <b><?php echo $r->TITREANNONCE;?></b><br/>
                                    <span class="villedepart"><?php echo $r->NOMVILLEDEPART;?></span> <b>>>></b><span class="villearrivee"><?php echo $r->NOMVILLEARRIVEE;?></span><br/>
                                </div>
                                <div class="col-md-2  price-red">
                                    <div class="price"   id="prix"><?php echo $r->PRIX;?>€/Kg</div>
                                    <!--<span class="price-unit" >par kg</span><br/>-->

                                <span class="kg-restant"  >
                                    Dispo:<?php echo $r->POIDS;?>kg
                                </span>
                                    <!--<span style="color: black">kg restant</span>-->
                                </div>

                                </a>
                            </div>
                        <?php endforeach;?>
                        <div class="col-md-11">
                            <!--<div class="col-md-4">
                        <p><?php echo $start?> à <?php echo $limit;?> Sur <?php echo $total_number_annonce_transport; ?> résultats</p>
                    </div>-->

                            <!--<div class="col-md-7 ">
                                <ul class="tsc_pagination" style="margin-top: -15px">
                                    <?php echo $links;?>
                                </ul>
                            </div>-->
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
                    <?php if ($this->session->flashdata('alertsuccess')):?>
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?php echo $this->session->flashdata('alertsuccess');?>
                        </div>
                    <?php endif;?>

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
         </div>
    </section>

    <!-- Two -->

</article>


<script type="text/javascript" src="<?=base_url('js/jquery.1.8.min.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap-datepicker.js'); ?>"></script>

<script>
    $(document).ready(function() {
        // $("#annonceForm").validationEngine('attach', {promptPosition : "centerRight", scroll: false});
        $('#annonces').tablesorter();
        // $('#dp6').datepicker();


        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        $('#dp6').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        });

        $('#submit').click(function(e){
            e.preventDefault();
            var typecolis= $("input[name=typecolis]:checked").val();
            var villedepartalerte = $('#villedepartalerte').val();
            var villearriveealerte = $('#villearriveealerte').val();
            var date= $('#dp6').val();
            var emailalerte = $('#emailalerte').val();
            //  alert('inside');
            $.post("<?php echo base_url(); ?>annonce/search", {typecolis: typecolis,villearriveealerte:villearriveealerte,villedepartalerte:villedepartalerte,date:date,emailalerte:emailalerte}, function(r) {
                //do something with r... log it for example.
                console.log(r);
            });
        });

    });
</script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places&language=fr"></script>

<script type="text/javascript">
    var placeSearch,autocomplete;
    function initialize()
    {
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