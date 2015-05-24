<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav_inner_bar.php'); ?>
 <?php   $this->load->helper('html');?>
<div class="container-fluid" style="margin-left:-40px;">
     <?php //$this->load->view('includes/second_nav_inner_bar'); ?><br/>
    <script type="text/javascript">// <![CDATA[
        $(document).ready(function(){
            $('#paysarrivee').change(function(){ //any select change on the dropdown with id country trigger this code
                $("#villearrivee > option").remove(); //first of all clear select items
                var country_id = $('#paysarrivee').val(); // here we are taking country id of the selected one.
                console.log(country_id);
                $.ajax({
                    type: "POST",
                    url: "get_ville_arrivee/"+country_id, //here we are calling our user controller and get_cities method with the country_id

                    success: function(cities) //we're calling the response json array 'cities'
                    {
                        if(!jQuery.isEmptyObject(cities))
                        {
                            $("#ifnotvillearriveeindatabase").hide();
                            $("#dynamicvillearrivee").show();

                            $.each(cities,function(NUMVILLEARRIVEE,NOMVILLEARRIVEE) //here we're doing a foeach loop round each city with id as the key and city as the value
                            {
                                var opt = $('<option />'); // here we're creating a new select option with for each city
                                opt.val(NUMVILLEARRIVEE);
                                opt.text(NOMVILLEARRIVEE);
                                $('#villearrivee').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                            });
                        }
                        else
                        {
                            $("#dynamicvillearrivee").hide();
                            $("#ifnotvillearriveeindatabase").show()

                        }
                    }

                });

            });

            $('#paysdepart').change(function(){ //any select change on the dropdown with id country trigger this code
                $("#villedepart > option").remove(); //first of all clear select items
                var country_id = $('#paysdepart').val(); // here we are taking country id of the selected one.
                console.log(country_id);
                $.ajax({
                    type: "POST",
                    url: "get_ville_depart/"+country_id, //here we are calling our user controller and get_cities method with the country_id

                    success: function(cities) //we're calling the response json array 'cities'
                    {
                        if(!jQuery.isEmptyObject(cities))
                        {
                           $("#ifnotvilledepartindatabase").hide();
                            $("#dynamicvilledepart").show();

                            $.each(cities,function(NUMVILLEDEPART,NOMVILLEDEPART) //here we're doing a foeach loop round each city with id as the key and city as the value
                            {

                                var opt = $('<option />'); // here we're creating a new select option with for each city
                                opt.val(NUMVILLEDEPART);
                                opt.text(NOMVILLEDEPART);
                                $('#villedepart').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                            });
                        }else
                        {

                            $("#dynamicvilledepart").hide();
                            $("#ifnotvilledepartindatabase").show()
                        }
                    }

                });

            });



        });
        // ]]>
    </script>
    <!--<div class="content" style="display:none;background-color:#f3f3ed;width: 900px; height:1600px;margin-left: 160px; margin-top: 15px;"">-->
    <div class="content" style="/*background-color:#f3f3ed;*/width: 1000px; height:1000px;margin-left: 160px; margin-top: 15px;"">

     <b> Déposer une annonce sur kukkea.com est GRATUIT.</b><br/>
            Votre annonce sera validée par notre équipe éditoriale avant mise en ligne. Elle restera sur le site pendant 60 jours.<br/>
            Pendant cette période, vous pourrez la supprimer à tout moment.<br/>
            <a href="#">Voir les règles de diffusion</a>

            <?php if(isset($success)): ?>
                <div class="row">
                    <div class="span9">
                        <div id="successMessage" class="alert alert-success">
                            <p><strong><?php echo $success;?></p>
                            <a href="<?=site_url(''); ?>" class="btn btn-success"><i class="icon-arrow-right icon-white"></i> Retour aux annonces</a>
                        </div>
                    </div>
                </div>
                <div id="loading">
                    <img id="loading-image" src="<?=base_url().'images/site/loader.gif'?>" alt="Loading..." />
                </div>
            <script>
                 //call function
               /* matching();


            function matching()
            {
                $("#loading").show();
                var pays_depart_id = $('#paysdepart').val();
                var ville_depart_id = $('#villedepart').val();
                var pays_arrivee_id = $('#paysarrivee').val();
                var ville_arrivee_id = $('#villearrivee').val();
                var date=$('#dp3').val();
                var type=$('#optionsRadios2').val();

                var request = $.ajax({
                    url: <?php base_url()?>"annonce/matching",
                    type: "GET",
                    data: {villedepart : +ville_depart_id, villearrivee: +ville_arrivee_id, date:+date, type:+type},
                    dataType: "json"
                });

                request.done(function(data) {
                    $("#resultmatching").load('annonce/show_matching?data='+data);
                    $("#loading").hide();
                    /*json_decode(data);
                    $( "#resultmatching" ).html(data);
                    //alert( "Data Saved: " +  )
                });

                request.fail(function(jqXHR, textStatus) {
                    $("#loading").hide();
                    alert( "Request failed: " + textStatus );
                });
            }
*/
        })
     });


    </script>

                <div id="resultmatching">
                    <?php $this->load->view('matching')?>
                </div>

            <?php elseif(isset($error)):?>
            <div class="row">
                <div class="span9">
                    <div class="alert alert-error">
                        <strong>Inscription</strong> echouée!.<br/>
                        <?php echo $error;?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php
                $attributes = array('class'=>'formular','id' => 'annonceForm');
                echo form_open('annonce/addannonce', $attributes);
            ?>
    <br/>
            <fieldset>
                <legend class="scheduler-border">CATEGORIE</legend>
                <label>Type d'annonce<font color="red">*</font>:</label>

                <label class="radio inline" style="margin-left: 50px;">
                  <input type="radio" name="typeannonce" id="optionsRadios2" value="Envoi" checked>Envoi
                </label>

                <label class="radio inline"style="margin-left: 150px;" >
                     <input type="radio" name="typeannonce" id="optionsRadios2" value="Transport">Transport
                </label>

                <?php foreach($user_info as $i):?>
                    <input type="hidden" name="id_user" value="<?php echo $i->NUMUSER;?>"/>
                <?php endforeach;?>
            </fieldset>
            <fieldset>
                <legend class="scheduler-border">LOCALISATION</legend>
                <div class="span4 text-center" style="margin-left: -30px;">
                    <span class="label-info label" style="text-align: center"><h4>Départ</h4></span><br/><br/>
                    <?php $countries[''] = 'Please Select'; ?>
                    <label for="paysdepart">Pays de depart<font color="red">*</font>: </label><?php echo form_dropdown('paysdepart', $countries, '', 'class="validate[required]" id="paysdepart"'); ?><br />

                    <div id="dynamicvilledepart">
                        <?php $cities[''] = 'Please Select'; ?>
                        <label for="villedepart">Ville de départ<font color="red">*</font>: </label><?php echo form_dropdown('villedepart', $cities, '', 'class="validate[required]" id="villedepart"'); ?><br />
                    </div>
                    <div id="ifnotvilledepartindatabase" style="display:none">
                        <label for="villedepart">Saisissez la ville de depart<font color="red">*</font>:</label>
                        <?php echo form_error('villedepart','<span class="error">','</span>');?>
                        <input type="text" name="villedepartsaisi" placeholder="Saisissez la ville de depart si elle n'apparait pas plus haut" value="<?php echo set_value('villedepart');?>"/>
                    </div>
                    <div>
                        <!---<span>Date de depart<font color="red">*</font>: (format DD-MM-YYYY)</span>-->
                        <label for="villedepart">Date de départ<font color="red">*</font>: </label>
                        <input id="dp3" class="validate[required,custom[date]]" data-date-format="dd-mm-yyyy" size="16" name="datedebutannonce" value="<?php echo set_value('datedebutannonce');?>">
                    </div>
                </div>

                <div class="span1" style="margin-top: 0px; margin-left: 21px;">
                    <span class="label-important label"> <h4> >>>>>>> </h4></span>
                </div>

                <div class="span4 text-center">
                    <span class="label-info label"><h4>Arrivée</h4></span><br/><br/>
                        <?php $countries[''] = 'Please Select'; ?>
                        <label for="country">Pays d'arrivée<font color="red">*</font>: </label><?php echo form_dropdown('paysarrivee', $countries, '', 'class="validate[required]" id="paysarrivee"'); ?><br />
                    <div id="dynamicvillearrivee">
                        <?php $cities[''] = 'Please Select'; ?>
                        <label for="villearrivee">Ville d'arrivée<font color="red">*</font>: </label><?php echo form_dropdown('villearrivee', $cities, '', 'class="validate[required]" id="villearrivee"'); ?><br />
                    </div>

                    <div id="ifnotvillearriveeindatabase" style="display:none">
                        <label for="villearrivee">Saisissez la ville d'arrivée<font color="red">*</font>:</label>
                        <?php echo form_error('villearrivee','<span class="error">','</span>');?>
                        <input type="text" name="villearriveesaisi" placeholder="Saisissez la ville d'arrivée" value="<?php echo set_value('villearrivee');?>"/>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                 <legend class="scheduler-border">VOTRE ANNONCE</legend>

                <label for="poids">Poids du colis<font color="red">*</font>(Kg):</label>
                <input type="number" class="validate[required]" name="poids" step="any" value="<?php echo set_value('poids');?>"/>
                <?php if(isset($error_titre)):?>
                    <span class="alert-error"> <?php  echo $error_titre;?></span>
                <?php endif;?>
                <label for="titreannonce">Titre de l'annonce<font color="red">*</font>:</label>
                 <input type="text" class="validate[required]" name="titreannonce" value="<?php echo set_value('titreannonce');?>"/>


                    <?php if(isset($error_annonce)):?>
                        <span class="alert-error"> <?php  echo $error_annonce;?></span>

                    <?php endif;?>
                               <label for="texteannonce">Texte de l'annonce<font color="red">*</font>:</label>
                 <textarea  placeholder="Attention, pas d'email, pas de N° de tél dans l'annonce." class=" input validate[required]"  name="texteannonce" value="<?php echo $this->input->post('texteannonce');?>">
                 </textarea>
                 <dl>
                     <label for="prix">Prix<font color="red">*</font>:</label>
                     <input type="number" class="validate[required]" name="prix" value="<?php echo set_value('prix');?>"/>
                 </dl>
                 <!--<dl>
                     <label>Date de depart<font color="red">*</font>: (format DD-MM-YYYY)</label>
                     <input id="dp5" class="span2  validate[required,custom[date]] text-input" data-date-format="dd-mm-yyyy" size="16"  name="datedebutannonce" value="<?php echo set_value('datedebutannonce');?>">
                     <!-- <span class="add-on"><i class="icon-th"></i></span>
                 </dl>
                 <dl>
                     <label>&nbsp;&nbsp;&nbsp;Date de fin&nbsp;&nbsp;&nbsp;<font color="red">*</font>: &nbsp;&nbsp;&nbsp;&nbsp;(format DD-MM-YYYY)</label>
                     <input id="dp4" class="span2  validate[required,custom[date]] text-input" data-date-format="dd-mm-yyyy" size="16"  name="datefinannonce" value="<?php echo set_value('datefinannonce');?>">
                     <!-- <span class="add-on"><i class="icon-th"></i></span>
                 </dl>-->
             </fieldset>
                <input type="submit" class="btn btn-primary"  value="Soumettre l'annonce"/>
               <?php echo form_close(); ?>
         </div>
</div>

    <script src="<?=base_url('js/jquery.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
    <script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
    <script src="<?=base_url('js/bootstrap-datepicker.js'); ?>"></script>

    <script>
        $(document).ready(function() {

            $('.content').fadeIn(1000);
            $('.carousel').carousel();
            $("#annonceForm").validationEngine('attach');
            $('#dp3').datepicker();
            $('#dp4').datepicker();


            //call function
            /*
                matching();


            function matching()
            {
                $("#loading").show();
                var pays_depart_id = $('#paysdepart').val();
                var ville_depart_id = $('#villedepart').val();
                var pays_arrivee_id = $('#paysarrivee').val();
                var ville_arrivee_id = $('#villearrivee').val();
                var date=$('#dp3').val();
                var type=$('#optionsRadios2').val();

                var request = $.ajax({
                    url: "matching",
                    type: "GET",
                    data: {villedepart : +ville_depart_id, villearrivee: +ville_arrivee_id, date:+date, type:+type},
                    dataType: "json"
                });

                request.done(function(data) {
                    $("#loading").hide();
                    $( "#resultmatching" ).html(data);
                    //alert( "Data Saved: " +  );
                });

                request.fail(function(jqXHR, textStatus) {
                    $("#loading").hide();
                    alert( "Request failed: " + textStatus );
                });
            }*/

        })
     });


    </script>

