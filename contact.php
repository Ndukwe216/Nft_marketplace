<?php 
    include 'header.php';
 ?>
                
            <!-- title page -->
            <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">Contact </h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li>Contact </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>

            <section class="tf-contact tf-section">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="box-feature-contact">
                                <img src="assets/images/blog/thumb-8.png" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h2 class="tf-title-heading style-2 mg-bt-12">
                                Drop Up A Message
                            </h2>
                            <h5 class="sub-title style-1">
                               "Hey there! Just dropping a quick message, drop a message and will get back to you as soon a possible 
                            </h5>
                            <div class="form-inner">
                                <form action="https://themesflat.co/html/axiesv/contact/contact-process2.php"  method="post" id="contactform" novalidate="novalidate" class="form-submit">
                                    <input id="name" name="name" tabindex="1" value="" aria-required="true" required type="text" placeholder="Your Full Name">
                                    <input id="email" name="email" tabindex="2"  value="" aria-required="true" required type="email" placeholder="Your Email Address">
                                    <div class="row-form style-2" id="subject">
                                        <select>
                                            <option value="1">Select subject</option>
                                            <option value="2">Select subject</option>
                                            <option value="3">Select subject</option>
                                        </select>
                                        <i class="icon-fl-down"></i>
                                    </div>
                                    <textarea id="message" name="message" tabindex="3" aria-required="true" required placeholder="Message"></textarea>
                                    <button class="submit">Send message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php 
    include 'footer.php';
 ?>