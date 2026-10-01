<section id="contact" class="contact">

      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>Contact</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <div class="info mt-4">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Antsiranana Madagasacar</br> LOT 133 BIS MA CITE OUVRIERE</p>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+261 34 78 264 01</p>
                </div>
              </div>
            </div>

            <form data-parsley-validate action="<?php echo site_url('Societevolazara/contact_message');?>" method="post" role="form" class="php-email-form mt-4">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input data-parsley-minlength="3" type="text" name="input_val[visiteur][nom_visiteur]" class="form-control" id="name" placeholder="Votre nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="input_val[visiteur][email_visiteur]" id="email" placeholder="Votre Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input data-parsley-minlength="3" type="text" class="form-control" name="input_val[message_contact][objet]" id="subject" placeholder="Objet" required>
              </div>
              <div class="form-group mt-3">
                <textarea data-parsley-minlength="6" class="form-control" name="input_val[message_contact][message]" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                
              </div>
              <div class="text-center"><button type="submit">Envoyer</button></div>
            </form>
          </div>
        </div>

      </div>
    </section>