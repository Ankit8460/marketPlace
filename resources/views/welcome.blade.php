@extends('layouts.app')

@section('content')
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <!-- Start Header Text -->
                    <div class="col-md-7 col-sm-7">
                        <h1><strong></strong>Payroll Service</h1>
                        <p>Be paid on time, every time guaranteed at one flat fee.…… no hidden charges.

                        We pay you before we are paid by your recruitment company, even if your timesheet is late. That way you can safely plan direct debits for pay Fridays.</p>

                        <p>CRHUB offer financial service such as.</p>
                        <ul class="banner-list">
                            <li><i class="fa fa-check"></i>Contractor Management</li>
                            <li><i class="fa fa-check"></i>Outsourcing Payroll</li>
                            <li><i class="fa fa-check"></i>Technology Solutions</li>
                            <li><i class="fa fa-check"></i>Payroll Financing </li>
                        </ul>
                    </div>
                    <!-- End Header Text -->
                    <!-- Start Banner Optin Form-->
                    <div class="col-lg-4 col-md-4 col-md-offset-1 col-sm-5">
                        <div class="banner-form">
                            <div class="form-title">
                                <h2>Enquire Now</h2>
                            </div>
                            <div class="form-body">
                                <p>To stay tuned to our updates, enter Your Name and Email Address!</p>
                                <form id="banner-form" class="form" method="post" action="form.php">
                                    <div class="form-group">
                                        <input name="banner-name" id="banner-name" type="text" class="form-control" required placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input name="banner-email" id="banner-email" type="text" class="form-control" required placeholder="Your E-mail">
                                    </div>
                                    <div class="form-group contactInput">
                                     <input type="text" value="+234" class="countryFes" placeholder="+234" style="width: 55px;height: 55px;" disabled="disabled">
                                   <input type="text" name="mobile_no" placeholder="Mobile No" validator="required" autocomplete="off">
                              </div>
                                    <button type="submit" class="btn btn-default btn-submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Banner Optin Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    
    <!-- Clients Logo -->
    
    <!-- End Clients Logo -->
    
    <!-- Intro -->
    <section id="intro" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 headline">
                    <h2>A simple <span class="blue">Payment</span> Process!</h2>
                    <p>CR HUB gives organizations both household and around the world with coordinated, hand crafted finance arrangements and HR administration apparatuses.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 serviceIMG">
                    <img src="{{ url('/') }}/assets/front/img/service.svg" class="img-responsive" alt="" title="">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="features"><!-- Main Points -->
                        <i class="line-font blue icon-bar-chart"></i><!-- Main Point Icon -->
                        <h3>Contractor Management</h3><!-- Main Title -->
                        <p>We can draw in temporary workers for the benefit of your association. This reaches out to the assistance of outsider sellers. Our innovation offers bespoke conveyance and we can meet any client necessity.</p><!-- Main Text -->
                    </div><!-- End Main Points -->
                    <div class="features">
                        <i class="line-font blue fa fa-money""></i>
                        <h3>Outsourced Payroll</h3>
                        <p>Our Outsourced Payroll benefit incorporates finance computations, leave administration, statutory commitments and oversee worker benefits. We will guarantee that the procedure runs easily, with full consistence.</p>
                    </div>
                    <div class="features">
                        <i class="line-font blue fa fa-desktop""></i>
                        <h3>Technology Solutions</h3>
                        <p>Our innovation administrations and framework coordination mastery are accessible as independent arrangements. From customisable finance programming to cloud workforce administration frameworks, our SaaS items offer the effectiveness required to mechanize the secure to pay prepare. </p>
                    </div>
                </div>
            </div>
            <hr class="separator60"><!-- Separator -->
        </div>
    </section>
    <!-- End Intro -->
    
    <!-- How It Works -->
    <section id="how-it-works" class="section bg-blue-pattern white-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="headline">
                        <h2>How it works</h2>
                        <p>Remodel arrangements that improve your workforce administration experience.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <!-- How It Works List -->
                    <ul class="steps-list">
                        <li>
                            <span>1</span><!-- Step Number -->
                            <h4>Signup online or contact our business team</h4><!-- Step Title -->
                            <p>CR HUB business team provides excellent pre consultation with our client to understand their business model</p><!-- Step Description -->
                        </li>
                        <li>
                            <span>2</span>
                            <h4>Choose a plan that works for your Organisation</h4>
                            <p>Different industry has different need, CR HUB provides diverse product package the will suit your organisation needs.</p>
                        </li>
                        <li>
                            <span>3</span>
                            <h4>Launch your dashboard to monitor your spending</h4>
                            <p>Our seamless customer dashboard provides our client with a strong business decision analytics</p>
                        </li>
                    </ul>                   
                    <!-- End How It Works List -->
                </div>
                <div class="col-md-7">
                    <div class="video-container">
                        <img src="{{ url('/') }}/assets/front/img/dashboard1.svg" class="img-responsive" alt="" title=""> <!-- Responsive video iframe -->
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <!-- End How it Works -->   
    
    <!-- Portfolio -->
    <!-- End Portfolio -->

    <!-- Features -->
    <section id="features" class="section" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="headline">
                        <h2>Features</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquando posse.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 features"><!-- Start Feature -->
                    <i class="line-font blue icon-speech"></i><!-- Feature Icon -->
                    <h3>Easily adaptable</h3><!-- Feature Title -->
                    <p>Nullam mo  arcu ac molestie scelerisqu vulputate molestie mpus ipsum.</p><!-- Feature Text -->
                </div><!-- End Feature -->
                <div class="col-md-4 col-sm-4 features">
                    <i class="line-font blue icon-envelope"></i>
                    <h3>Fully Responsive</h3>
                    <p>Nullam mo  arcu ac molestie scelerisqu vulputate molestie mpus ipsum.</p>
                </div>
                <div class="col-md-4 col-sm-4 features">
                    <i class="line-font blue icon-pie-chart"></i>
                    <h3>Multipurpose</h3>
                    <p>Nullam mo  arcu ac molestie scelerisqu vulputate molestie mpus ipsum.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 features">
                    <i class="line-font blue icon-map"></i>
                    <h3>Minimalistic</h3>
                    <p>Nullam mo  arcu ac molestie scelerisqu vulputate molestie mpus ipsum.</p>
                </div>
                <div class="col-md-4 col-sm-4 features">
                    <i class="line-font blue icon-call-out"></i>
                    <h3>24/7 Support</h3>
                    <p>Nullam mo  arcu ac molestie scelerisqu vulputate molestie mpus ipsum.</p>
                </div>
                <div class="col-md-4 col-sm-4 features">
                    <i class="line-font blue icon-reload"></i>
                    <h3>Documentataion</h3>
                    <p>Nullam mo  arcu ac molestie scelerisqu vulputate molestie mpus ipsum.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 features">
                    <i class="line-font blue icon-lock"></i>
                    <h3>Line Icons</h3>
                    <p>Nullam mo  arcu ac molestie scelerisqu vulputate molestie mpus ipsum.</p>
                </div>
                <div class="col-md-4 col-sm-4 features">
                    <i class="line-font blue icon-bar-chart"></i>
                    <h3>Assured Revenue</h3>
                    <p>Nullam mo  arcu ac molestie scelerisqu vulputate molestie mpus ipsum.</p>
                </div>
                <div class="col-md-4 col-sm-4 features">
                    <i class="line-font blue icon-layers"></i>
                    <h3>Hotline</h3>
                    <p><strong>1-234-567-890 - </strong> Plestie scelerisqu vulputate molestie ligula gravida .</p>
                </div>
            </div>
        </div>
    </section>
    <!--End Features -->
    
    <!-- Three Main Points -->
    <!--End Three Main Points -->
    
    <!--Testimonials -->
    <!-- End Testimonials -->
    
    <!-- Pricing -->
    <!-- End Pricing -->
    
    <!-- FAQ -->    
    <!-- End FAQ -->
        
    <!-- Call To Action -->
    <!-- End Call To Action -->

    <!-- Footer Top -->
    <section class="footer footer-top">
        <div class="container">
            <div class="row">
                <!-- Footer Intro  -->
                <div class="col-md-4">
                    <h3>CR HUB</h3>
                    <p>Modern employee financial service </p>
                    <p>Improve your experience within pay period. use CR HUB for easy pay day planning</p>
                </div>
                <!-- End Footer Intro  -->
                <!-- Contact Details  -->
                <div class="col-md-3">
                    <div class="contact-info">
                        <h3>Reach Us</h3>
                        <ul class="contact-list">
                            <li><i class="icon-directions"></i>Business Team</li>
                            <li><i class="icon-call-in"></i> + 23408268494</li>
                            <li><i class="icon-envelope-open"></i><a href="mailto:contact@simplesphere.net.com">contact@crhub.com</a></li>
                        </ul>
                    </div>
                </div>  
                <!-- End Contact Details  -->
                <!-- Quick Links -->
                <div class="col-md-2">              
                    <h3>Quick Links</h3>
                    <ul class="quick-links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- End Quick links -->
                <!-- Social Links -->
                <div class="col-sm-3">
                    <h3>Stay in Touch!</h3>
                    <p>Follow us on our social networks!</p>
                    <ul class="social">
                        <li class="facebook"> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
                        <li class="twitter"> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
                        <li class="google-plus"> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
                        <li class="linkedin"> <a href="#"> <i class="fa fa-linkedin"></i> </a> </li>
                        <li class="youtube"> <a href="#"> <i class="fa fa-youtube-play"></i> </a> </li>
                    </ul>
                </div>
                <!--End Social Links  -->
            </div>
        </div>
    </section>
@endsection