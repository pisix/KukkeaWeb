
    <?php $this->load->view('includes/analyticstracking'); ?>
    <br/>
    <br/>
    <article id="main">
        <header class="special">
            <span class="icon fa-envelope"></span>
            <h2>Contactez-Nous</h2>
        </header>

        <!-- One -->
        <section class="wrapper style4 special container 80% ">

            <!-- Content -->
            <div class="content">
                <div class="row">
                    <div  class="col-md-5 col-sm-5">
                        <?php echo $map['js']; ?>
                        <?php echo $map['html']; ?>
                    </div>
                <?php $attribute=array('id'=>'contact-form-id');?>
                <?php echo form_open('help/contact',$attribute)?>
                <?php if(isset($success)):?>
                    <div class="col-md-11">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Nous avons bien recu votre message. <br/>Nous vous contacterons dans un delai de 48h.</strong>
                        </div>
                    </div>
                <?php endif;?>
                    <div class="row 50%">
                            <div class="6u 12u(mobile)">
                                <input class="validate[required,length[5,50]]  text-input" id="nomprenom" type="text" name="nomprenom" placeholder="Nom & Prenom">
                            </div>
                            <div class="6u 12u(mobile)">
                                <input type="email" name="email" id="email" class="validate[required,custom[email]] text-input" placeholder="Email">
                            </div>
                        </div>
                    <div class="row 50%">
                        <div class="12u">
                            <input class="validate[required,length[5,100]]  text-input"type="text" name="sujet" id="subject" placeholder="Sujet">
                        </div>
                    </div>
                    <div class="row 50%">
                        <div class="12u">
                            <textarea rows="7" class="validate[required,minSize[10],maxSize[500]]  text-input" name="message" id="message" placeholder="Saisissez votre message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="12u">
                            <ul class="buttons">
                                <li><input type="submit" class="special" value="Envoyer votre message" /></li>
                            </ul>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>

        </section>

    </article>

<script src="<?=base_url('js/jquery.js'); ?>"></script>
<script src="<?=base_url('js/bootstrap.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine-fr.js'); ?>"></script>
<script src="<?=base_url('js/jquery.validationEngine.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $("#contact-form-id").validationEngine('attach');
    });
</script>
