    <!--<div class="col-md-6 col-sm-6">
        <div id="map">
        </div>
    </div> <!-- /.col-md-6 -->
    <?php $this->load->view('includes/analyticstracking'); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="section-title">Contactez nous</h1>
    </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div  class="col-md-5 col-sm-5">
            <?php echo $map['js']; ?>
            <?php echo $map['html']; ?>
        </div>
        <div class="col-md-6 col-sm-6">
            <?php if(isset($success)):?>
                <div class="col-md-11">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Nous avons bien recu votre message. <br/>Nous vous contacterons dans un delai de 48h.</strong>
                    </div>
                </div>
            <?php endif;?>
            <div class="contact-form" id="contact-form">
                <?php $attribute=array('id'=>'contact-form-id');?>
                <?php echo form_open('help/contact',$attribute)?>
                    <fieldset class="col-md-5 col-sm-5">
                        <input class="validate[required,length[5,50]]  text-input" id="nomprenom" type="text" name="nomprenom" placeholder="Nom & Prenom">
                    </fieldset>
                    <fieldset class="col-md-6 col-sm-6">
                        <input type="email" name="email" id="email" class="validate[required,custom[email]] text-input" placeholder="Email">
                    </fieldset>
                    <fieldset class="col-md-11">
                        <input class="validate[required,length[5,100]]  text-input"type="text" name="sujet" id="subject" placeholder="Sujet">
                    </fieldset>
                    <fieldset class="col-md-11">
                        <textarea class="validate[required,minSize[10],maxSize[500]]  text-input" name="message" id="message" placeholder="Saisissez votre message"></textarea>
                    </fieldset>
                    <fieldset class="col-md-11">
                        <input type="submit" name="send" value="Envoyer votre message" id="submit" class="btn btn-info">
                    </fieldset>
                <? echo form_close();?>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
    <br/>
<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $("#contact-form-id").validationEngine('attach');
    });
</script>
