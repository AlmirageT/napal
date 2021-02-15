<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>

                    <ul class="contact-info">
                        <li>
                            Address: 20/F Green Road, Dhanmondi, Dhaka
                        </li>
                        <li>
                            Email: <a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                        </li>
                        <li>
                            Phone: <a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                        </li>
                        <li>
                            Fax: +0477 85X6 552
                        </li>
                    </ul>

                    <ul class="social-list clearfix">
                        <li><a href="{{ $redesSociales->where('nombreRedSocial','Facebook')->pluck('rutaRedSocial')->first() }}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $redesSociales->where('nombreRedSocial','Twitter')->pluck('rutaRedSocial')->first() }}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $redesSociales->where('nombreRedSocial','Google')->pluck('rutaRedSocial')->first() }}" class="google"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="{{ $redesSociales->where('nombreRedSocial','Instagram')->pluck('rutaRedSocial')->first() }}" class="rss"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ $redesSociales->where('nombreRedSocial','Linkedin')->pluck('rutaRedSocial')->first() }}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>About Us</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Services</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>properties Details</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>My Account</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>properties Details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>
                        Gallery
                    </h4>

                    <ul class="gallery">
                        <li>
                            <a href="#">
                                <img src="http://placehold.it/70x70" alt="sub-properties">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://placehold.it/70x70" alt="sub-properties">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://placehold.it/70x70" alt="sub-properties">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://placehold.it/70x70" alt="sub-properties">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://placehold.it/70x70" alt="sub-properties">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://placehold.it/70x70" alt="sub-properties">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://placehold.it/70x70" alt="sub-properties">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="http://placehold.it/70x70" alt="sub-properties">
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="Subscribe-box">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        <form action="#" method="GET">
                            <p>
                                <input type="text" class="form-contact" name="email" placeholder="Enter Address">
                            </p>
                            <p>
                                <button type="submit" name="submitNewsletter" class="btn btn-block button-theme">
                                    Subscribe
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <hr>
                <div class="separador-60 h-separator-60"></div>
                <div class="separador-0-grey h-separator-20--horizontal-grey"></div>
                {!! $footerLorem->textoMisionEmpresa !!}
            </div>
        </div>
    </div>
</footer>