<footer id="footer" style="height: 452px;text-align: center; margin-left: auto;margin-right: auto;background-color: #313334;">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-md-4 col-sm-3 col-lg-4">
                    <div class="" style="margin-left: 110px">
                        <h3>Nous</h3>
                        <ul  style="text-align: justify;" class="no-decoration">
                            <li><a href="<?php echo site_url('help/about') ?>" class="no-decoration">À propos</a> </li>
                            <li><a href="<?php echo site_url('help/cgu') ?>" class="no-decoration">Conditions  d'utilisation</a></li>
                            <li><a href="<?php echo site_url('help/security_recommendations') ?>" class="no-decoration">Recommandations de sécurité</a></li>
                            <li> <a href="<?php echo site_url('help/legal_mentions') ?>" class="no-decoration">Mentions légales</a></li>
                            <li> <a href="<?php echo site_url('help') ?>" class="no-decoration">Aides</a></li>
                            <li><a href="<?php echo site_url('help/contact') ?>" class="no-decoration">Contactez-nous</a></li>
                            <!-- <a href="<?php echo site_url('help/contact') ?>>Blog</a>&nbsp;|&nbsp;-->
                            <li> <a href="http://peers.org/" class="no-decoration"><span style="color:#EF4B4B;text-decoration: none">Peers</span> Member</a></li>

                        </ul>
                    </div>
                    <div class="footer">
                        <h3>Rejoignez-nous sur:</h3>
                        <ul class="icons">
                            <li> <a href="https://twitter.com/KukkeaCommunity" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
                            <li><a href="http://www.facebook.com/kukkeaShare" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
                            <li><a href="https://www.google.com/+KukkeaCommunity" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
                            <li><a href="#" class="icon circle fa-foursquare fa-github"><span class="label">Foursquare</span></a></li>
                            <li><a href="#" class="icon circle fa-youtube fa-google-plus"><span class="label">Youtube</span></a></li>

                        </ul>

                     </div>
                    <div class="footer">
                        <h3>Informations</h3>
                        <ul  style="text-align: justify;margin-left: 50px" >
                            <a href="<?php if ($this->session->userdata('login')) echo site_url('signup/membres'); else echo site_url('signup');  ?>" class="no-decoration">Devenir membre</a><br/>
                            <a href="<?php echo site_url('help/howitworks') ?>" class="no-decoration">Comment ca marche</a><br/>
                            <a href="<?php echo site_url('help/confident') ?>" class="no-decoration">Confiance et sérénité</a><br/>
                            <a href="<?php echo site_url('help/experience') ?>"class="no-decoration">Niveau d'expérience</a><br/>
                            <li><a href="<?php echo site_url('help/regledetransport') ?>" class="no-decoration">Les règles de transport d’un colis</a><br/></li>
                            <!--<a href="#"class="no-decoration">A quoi ca sert</a><br/>-->
                            <!--<a href="#" style="text-decoration: none; color: white;">Témoignage de membres</a><br/>-->
                            <a href="<?php echo site_url('help/questions') ?>" class="no-decoration">Foire aux questions</a></br>
                            <!--<a href="#" style="text-decoration: none; color: white;">Charte</br></a>-->
                           <!-- <a href="#" style="text-decoration: none; color: white;">Partenaires</br></a>-->
                        </ul>
                    </div>
                </div>
            </div>
    </div>

                      <ul class="copyright">
                          <li>&copy;  kukkea.com</li>
                      </ul>
   </footer>

</body>
  </html>