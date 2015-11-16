<section id="section-contact">
    <div class="section-content bg-pattern dark-screen">
        <div class="container">
            <h1 class="onscroll-animate" data-animation="fadeInRight">Contact Us</h1>
            <div class="margin-10"></div>
            <div class="row">
                <div class="col-md-3 onscroll-animate content-column" data-animation="fadeInUp">
                    <address>
                        <p>123A, Molestie Lorem Avenue, Aliquam AAA0010</p>
                        <p>Tel: (+20) 21 301 524</p>
                        <p><a href="#">info@smarty.com</a></p>
                        <p><a href="#" class="popup-window-trigger" data-popup="#popup-map">Location on Google Maps</a></p>
                    </address>
                </div>
                <div class="col-md-9 content-column">
                    <form id="form-contact" action="php/send_email.php" method="post" data-email-not-set-msg="Email is required" data-message-not-set-msg="Message is required" data-ajax-fail-msg="Request could not be sent, try later" data-success-msg="Email successfully sent.">
                        <div class="row">
                            <div class="col-md-5 onscroll-animate" data-animation="fadeInUp" data-delay="350">
                                <div class="input-container input-name">
                                    <input type="text" name="name" placeholder="Full Name">
                                </div>
                                <div class="input-container input-email">
                                    <input type="text" name="email" placeholder="Email Address">
                                </div>
                                <div class="input-container input-phone">
                                    <input type="text" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-7 onscroll-animate" data-animation="fadeInUp" data-delay="500">
                                <div class="input-container input-message">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <p class="return-msg"></p>
                        <div class="clearfix onscroll-animate" data-delay="500">
                            <input class="pull-right" type="submit" value="Submit">
                            <p class="note pull-left">* Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</p>
                        </div>
                    </form>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .section-content -->
</section>