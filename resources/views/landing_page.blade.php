@extends('layouts.app')

@section('css')
@endsection
@section('content')

    {{-- ======= Hero Section ======= --}}
    <section id="hero">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h1>We help you find digitized medieval manuscripts</h1>
                        <h2>We have collected 500+ links to fully digitized books, fragments, IIIF repositories, etc.</h2>
                        <a href="{{ route('data') }}" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>{{-- End Hero --}}

    <main id="main">

        {{-- ======= About Section =======
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6" data-aos="zoom-in">
                        <img src="img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
                        <div class="content pt-4 pt-lg-0">
                            <h3>Explore thousands of digitized medieval manuscripts</h3>
                            <p class="fst-italic">
                                We love (digitized) medieval manuscripts, and we do our best to make them easy to find.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> A map full of repositories to be explored</li>
                                <li><i class="bi bi-check-circle"></i> More than 500 links to digitized repositories.</li>
                                <li><i class="bi bi-check-circle"></i> An API to implement our data into your own
                                    applications (coming soon!)</li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate tera noden carma palorp mades tera.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>End About Section --}}

        {{-- ======= Features Section =======
        <section id="features" class="features">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item" data-aos="fade-up">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                                    <h4>Modi sit est</h4>
                                    <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                                    <h4>Unde praesentium sed</h4>
                                    <p>Voluptas vel esse repudiandae quo excepturi.</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                                    <h4>Pariatur explicabo vel</h4>
                                    <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                                    <h4>Nostrum qui quasi</h4>
                                    <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <figure>
                                    <img src="img/features-1.png" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <figure>
                                    <img src="img/features-2.png" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <figure>
                                    <img src="img/features-3.png" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <figure>
                                    <img src="img/features-4.png" alt="" class="img-fluid">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>End Features Section --}}

        {{-- ======= Services Section ======= --}}
        <section id="services" class="services section-bg">
            <div class="container">

                <div id="tools" class="section-title" data-aos="fade-up">
                    <h2>Tools</h2>
                    <p>Every year, hundreds of new manuscripts are made available online, repositories change URLs, new catalogs appear. The DMMapp collects and makes available as many links as possible.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">Map</a></h4>
                            <p class="description">The world is full of manuscripts! Go explore hundreds of repositories thanks to our map.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class="bx bx-data"></i></div>
                            <h4 class="title"><a href="">Data</a></h4>
                            <p class="description">Search, filter, or simply browse all the digitized medieval manuscripts repositories we have added to the DMMapp.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class="bx bxl-dev-to"></i></div>
                            <h4 class="title"><a href="">API (coming soon)</a></h4>
                            <p class="description">Need the DMMapp data for your own application? We are working at API just for you!</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>{{-- End Services Section --}}

        {{-- ======= Team Section ======= --}}
        <section id="team" class="team mt-3">
            <div class="container ">

                <div class="section-title" data-aos="fade-up">
                    <h2>DMMapp Team</h2>
                    <p>Medieval manuscript lovers at your service!</p>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="zoom-in">
                            <div class="pic"><img src="img/team/reference.jpg" class="img-fluid" alt="" style="display: none">
                            </div>
                            <div class="member-info">
                                <h4>Giulio Menna</h4>
                                <span>The developer</span>
                                <div class="social">
                                    <a href="https://twitter.com/Giulio_Menna"><i class="bi bi-twitter"></i></a>
                                    <a href="https://www.linkedin.com/in/giuliomenna/"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic"><img src="img/team/reference.jpg" class="img-fluid" alt="" style="display: none">
                            </div>
                            <div class="member-info">
                                <h4>Marjolein de Vos</h4>
                                <span>The editor</span>
                                <div class="social">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        {{-- End Team Section --}}

        {{-- ======= Cta Section ======= --}}
        <div class="mt-3">
            <x-patreon />
        </div>

        {{-- End Cta Section --}}

        {{-- ======= Portfolio Section =======
        <section id="portfolio" class="portfolio">
          <div class="container">

            <div class="section-title" data-aos="fade-up">
              <h2>Portfolio</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
              <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-app">App</li>
                  <li data-filter=".filter-card">Card</li>
                  <li data-filter=".filter-web">Web</li>
                </ul>
              </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>App 1</h4>
                    <p>App</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>App 2</h4>
                    <p>App</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Card 2</h4>
                    <p>Card</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Web 2</h4>
                    <p>Web</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>App 3</h4>
                    <p>App</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Card 1</h4>
                    <p>Card</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Card 3</h4>
                    <p>Card</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                  <img src="img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </section>
        End Portfolio Section --}}

        {{-- ======= Testimonials Section =======
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Testimonials</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                    duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                    minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                    labore illum veniam.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section> End Testimonials Section --}}



        {{-- ======= Clients Section =======
        <section id="clients" class="clients">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Clients</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in">
                            <img src="img/clients/client-1.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="100">
                            <img src="img/clients/client-2.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="150">
                            <img src="img/clients/client-3.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="200">
                            <img src="img/clients/client-4.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="250">
                            <img src="img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="300">
                            <img src="img/clients/client-6.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="350">
                            <img src="img/clients/client-7.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="client-logo">
                            <img src="img/clients/client-8.png" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>

            </div>
        </section>
        End Clients Section --}}

        {{-- ======= F.A.Q Section ======= --}}
        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Frequently Asked Questions</h2>
                </div>

                <ul class="faq-list">

                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Is the DMMapp owned by an institution? <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                No, the DMMapp (and the Sexy Codicology blog) are privately maintained and supported by the donations coming via Patreon, or our RedBubble store.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Are the DMMapp and its data free? <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Yes, the DMMapp data, its code, and basically everything we do is shared with an Attribution 2.0 Generic (CC BY 2.0) License.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Where do you get your data and links from? <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Some links were easy to find via a search engine, other links came from a list we created while studying, but many links are crowd-sourced: users inform us of a new repository, we test test, collect information, and add it to our database.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section>
        {{-- End Frequently Asked Questions Section --}}

        {{-- ======= Contact Section =======
        <section id="contact" class="contact section-bg">
          <div class="container">

            <div class="section-title" data-aos="fade-up">
              <h2>Contact Us</h2>
            </div>

            <div class="row">

              <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
                <div class="info">
                  <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Location:</h4>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>

                  <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>info@example.com</p>
                  </div>

                  <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Call:</h4>
                    <p>+1 5589 55488 55s</p>
                  </div>

                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

              </div>

              <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Your Name</label>
                      <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group col-md-6 mt-3 mt-md-0">
                      <label for="name">Your Email</label>
                      <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Message</label>
                    <textarea class="form-control" name="message" rows="10" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div>

            </div>

          </div>
        </section>

        End Contact Section --}}

    </main>{{-- End #main --}}

@endsection
{{-- Optional JavaScript --}}
@section('javascript')
@endsection
