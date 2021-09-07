@extends('front.layouts.main')

@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active"
                     style="background-image: url({{ asset('front/assets/img/slide/slide-1.jpeg') }}) !important;">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">
                            <h2>Selamat Datang di <span>Desa Jambesari</span></h2>
                            <p>Desa Jambesari adalah salah satu dari dua desa yang ada di Kecamatan Giri. Wilayah desa
                                ini terdiri dari area pemukiman warga dan lahan pertanian</p>
                            {{-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> --}}
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item"
                     style="background-image: url({{ asset('front/assets/img/slide/slide-2.jpeg') }}) !important;">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">
                            <h2>Akses ke Desa</h2>
                            <p>Desa ini dapat diakses dari beberapa desa lainnya, seperti dari Desa Kemiren di Kecamatan
                                Glagah, Boyolangu dan Grogol. Akses dari Kemiren adalah dari Jalur Banyuwangi-Kalibendo
                                lalu membelok pada Simpang Tiga Wisata Osing (belok kiri jika dari arah Kalibendo, belok
                                kanan dari arah Banyuwangi). Kemudian melewati Desa Wisata Osing dan sampai di batas
                                desa Kemiren-Jambesari. </p>
                            {{-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> --}}
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item"
                     style="background-image: url({{ asset('front/assets/img/slide/slide-3.jpeg') }}) !important;">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">
                            <h2>Bentang Alam dan Budaya</h2>
                            <p>Pemukiman warga dapat ditemui di Dusun Jambean, Mangli dan beberapa dusun lainnya.
                                Sedangkan lahan pertanian disini banyak ditanami padi, palawija dan buah-buahan seperti
                                pepaya, pisang dan lain-lain. Karena banyaknya lahan padi (sawah) dan seperti desa-desa
                                di Kecamatan Giri, Glagah dan Kalipuro, maka berdiri tempat penggilingan dan penjemuran
                                gabah. </p>
                            {{-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> --}}
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
    </section><!-- End Hero -->
@endsection

@section('content')
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>Kekayaan Alam Desa Jambesari</h2>
                    <h3>Desa ini memiliki kekayaan alam yang begitu beragam</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <p>
                        Desa Jambesari adalah salah satu dari dua desa yang ada di Kecamatan Giri. Wilayah desa ini
                        terdiri dari area pemukiman warga dan lahan pertanian. Pemukiman warga dapat ditemui di Dusun
                        Jambean, Mangli dan beberapa dusun lainnya. Seperti:
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Dusun Delik I</li>
                        <li><i class="ri-check-double-line"></i> Dusun Delik II</li>
                        <li><i class="ri-check-double-line"></i> Dusun Jambean</li>
                        <li><i class="ri-check-double-line"></i> Dusun Langring</li>
                        <li><i class="ri-check-double-line"></i> Dusun Mangli</li>
                    </ul>
                </div>
            </div>

            <div class="row mt-4">
                <div class="section-title">
                    <h2>Find Us</h2>
                </div>
                <div class="map-section">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19313.6476107938!2d114.31279023571183!3d-8.191023616820997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd14f9b2f8cedeb%3A0x271c9895800f0d69!2sJambesari%2C%20Kec.%20Giri%2C%20Kabupaten%20Banyuwangi%2C%20Jawa%20Timur!5e1!3m2!1sid!2sid!4v1630777277343!5m2!1sid!2sid"
                        style="border:0; width: 100%; height: 350px" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section><!-- End About Us Section -->
@endsection
