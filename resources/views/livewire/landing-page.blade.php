<div>
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('daka-asset/img/bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container d-flex flex-column align-items-center">
            <h2 data-aos="fade-up" data-aos-delay="100">Kelola Gudang</h2>
            <p data-aos="fade-up" data-aos-delay="200">Selamat datang di apk LaDang | Kelola Gudang</p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
            @if (Auth::check())
                <a href="{{ route('dashboard') }}" class="btn-get-started">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-get-started">Login</a>
            @endif
        </div>
        </div>

    </section>
    <!-- /Hero Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Kontak Admin</p>
        </div>
        <!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
            <div class="col-lg-6 ">
                <div class="row gy-4">

                <div class="col-lg-12">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Alamat Gudang</h3>
                    <p>Mustika Wanasari, Kab.Bekasi, 17520</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone"></i>
                    <h3>Telepon Kami</h3>
                    <p>+62 81234567891</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Kami</h3>
                    <p>putrawebdev@gmail.com</p>
                    </div>
                </div><!-- End Info Item -->

                </div>
            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
                <div class="row gy-4">

                    <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                    </div>

                    <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                    </div>

                    <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                    </div>

                    <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit">Send Message</button>
                    </div>

                </div>
                </form>
            </div><!-- End Contact Form -->

            </div>

        </div>
    </section>
    <!-- /Contact Section -->
</div>
