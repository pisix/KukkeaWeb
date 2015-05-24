<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Informations</h3>
                    <ul  style="text-align: justify; margin-left: 80px;">
                        <a href="<?php if ($this->session->userdata('login')) echo site_url('signup/membres'); else echo site_url('signup');  ?>" style="text-decoration: none; color: white;">Devenir membre</a><br/>
                        <a href="<?php echo site_url('help/howitworks') ?>" style="text-decoration: none; color: white;">Comment ca marche</a><br/>
                        <a href="<?php echo site_url('help/confident') ?>" style="text-decoration: none; color: white;">Confiance et sérénité</a><br/>
                        <a href="<?php echo site_url('help/experience') ?>" style="text-decoration: none; color: white;">Niveau d'expérience</a><br/>

                        <a href="#"style="text-decoration: none; color: white;">A quoi ca sert</a><br/>
                        <!--<a href="#" style="text-decoration: none; color: white;">Témoignage de membres</a><br/>-->
                        <a href="<?php echo site_url('help/questions') ?>" style="text-decoration: none; color: white;">Foire aux questions</a></br>
                        <!--<a href="#" style="text-decoration: none; color: white;">Charte</br></a>-->
                       <!-- <a href="#" style="text-decoration: none; color: white;">Partenaires</br></a>-->
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Rejoignez-nous sur:</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="http://www.facebook.com/kukkeaShare" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook" ></i></a>
                        </li>
                        <li>
                            <a href="https://www.google.com/+KukkeaCommunity" class="btn-social btn-outline" ><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/KukkeaCommunity" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-foursquare"></i></a>
                        </li>

                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-youtube"></i></a>
                        </li>

                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Règles Pratiques</h3>
                    <ul  style="text-align: justify; margin-left: 30px;">
                        <a href="<?php echo site_url('help/regledetransport') ?>" style="text-decoration: none; color: white;">Les règles de transport d’un colis</a><br/>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  <div class="footer-below">
      <div class="container-fluid">
              <div class="col-md-12">
                  <div class="col-md-9">
                      &nbsp;<a href="<?php echo site_url('help/about') ?>" style="text-decoration: none">À propos</a>&nbsp;|&nbsp;
                      <a href="<?php echo site_url('help/cgu') ?>"style="text-decoration: none">Conditions  d'utilisation</a>&nbsp;|&nbsp;
                      <a href="<?php echo site_url('help/security_recommendations') ?>"style="text-decoration: none">Recommandations de sécurité</a>&nbsp;|&nbsp;
                     <!-- <a href="<?php echo site_url('help/legal_mentions') ?>"style="text-decoration: none">Mentions légales</a>&nbsp;|&nbsp;-->
                      <a href="<?php echo site_url('help/contact') ?>"style="text-decoration: none">Contactez-nous</a>&nbsp;|&nbsp;
                     <!-- <a href="<?php echo site_url('help/contact') ?>"style="text-decoration: none">Blog</a>&nbsp;|&nbsp;-->
                      <a href="http://peers.org/"><span style="color:#EF4B4B;text-decoration: none">Peers</span> Member</a>

                  </div>
                  <div class="col-md-3">
                      <p class="muted pull-right">© 2015 kukkea.com. Tous droits réservés</p>
                  </div>
              </div>
      </div>
  </div>
</footer>

</body>
  </html>