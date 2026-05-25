@extends('layouts.app')
@section('title', 'DBELS-Contact')

@section('meta-description',
    'Join Us In
    Shaping the Future of Education , Site Office Address:
    HS-1, Adjoining IT Park Chandigarh, Near Dolphin Chowk, Sector-6, MDC Panchkula
    (Tri City Chandigarh). Email us at info@dassandbrownschool.com, Call us at
    +91 62840–58009
    +91 62840–59009')

@section('meta-keywords',
    'Best School in Chandigarh, Best School in Panchkula, Top Schools in Chandigarh, Top Schools in
    Panchkula, Best ICSE School Chandigarh, Best ICSE School Panchkula, Best Cambridge School Chandigarh, Best Cambridge
    School Panchkula, Top International Schools Chandigarh, Top International Schools Panchkula, Best K-12 School
    Chandigarh, Best K-12 School Panchkula, Top Ranked Schools in Chandigarh, Top Ranked Schools in Panchkula, Best
    Education in Chandigarh, Best Education in Panchkula, World-class Schools in Chandigarh, World-class Schools in
    Panchkula, Entrepreneurship School in Tricity, Top world-class education Chandigarh, ICSE affiliated school
    Chandigarh,Finnish model school Panchkula,Best early education Panchkula,Best school for future business leaders
    Experiential Early Childhood Education, International Curriculum School, Schools in Chandigarh with Cambridge
    curriculum,Top schools near Panchkula for quality education, Best schools in Panchkula with global curriculum,Top
    schools near Chandigarh,
    Top schools near Panchkula,Top schools near Chandigarh, Best private school in Panchkula, Top English medium school in
    Panchkula
    Dass & Brown Experiential Learning School Panchkula, Dass & Brown Legacy School, Young Entrepreneurs School in
    Panchkula')

@section('content')
    <!-- Floating Strip Right Bottom -->
    <div class="floating-strip-right-bottom">
        <a target="_blank" href="{{ asset('storage/assets/dbels-brochure.pdf') }}" class="btn btn-sm"> Download Brochure
        </a>
    </div>
    <!-- Floating Strip Right -->
    <div class="floating-strip-right">
        <a class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#enquiryModal">Enquire Now</a>
    </div>


    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6284058009" class="whatsapp-button" target="_blank">
        <i class="fab fa-whatsapp"></i>
        Contact Us
    </a>

    {{-- Page Hero Banner --}}
    <div class="page-hero">
        <div class="page-hero-blob page-hero-blob-1"></div>
        <div class="page-hero-blob page-hero-blob-2"></div>
        <div class="page-hero-content">
            <h1 class="page-hero-title" data-aos="fade-up">Contact Us</h1>
            <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="120">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.get') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
        <div class="page-hero-wave">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"><path d="M0,28 C360,56 1080,0 1440,28 L1440,56 L0,56 Z" fill="#f4f6f9"/></svg>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            {{-- Success Modal --}}
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-custom-width modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <h5 class="modal-title" id="successModalLabel">Success</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <i class="fas fa-check-circle"></i>
                            <p>Your enquiry has been submitted successfully!</p>
                        </div>
                    </div>
                </div>
            </div>
            @if (Session::has('success'))
                <div id="contact-alert" class="alert alert-success contact-alert-hidden" data-bs-toggle="modal"
                    data-bs-target="#successModal">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="container mt-5 pb-5">
                <div class="row">
                    <div class="col-lg-7">
                        <h3 class="heading-secondary">Join Us In</h3>
                        <h3 class="fw-bold">Shaping the Future of Education</h3>
                        <div class="my-2">
                            <h5 class="fw-bold">Site Office:</h5>
                            <p>HS-1, Adjoining IT Park Chandigarh, Near Dolphin Chowk, Sector-6, MDC Panchkula <br> (Tri
                                City
                                Chandigarh)</p>
                            <p><i class="fas fa-envelope"></i> info@dassandbrownschool.com</p>
                        </div>

                        <div class="my-2">
                            <h5 class="fw-bold">Admissions Office:</h5>
                            <p>DSS No. 102, Adjoining Baskin Robbins, Sector 5, MDC Main Market, Panchkula <br> (Tri City
                                Chandigarh)</p>
                            <p><i class="fas fa-envelope"></i> admissions@dassandbrownschool.com</p>
                        </div>
                        <div class="mt-2">
                            <h4 class="fw-bold">Call us:</h4>
                            <p><i class="fas fa-phone"></i> +91 62840–58009 <br> <i class="fas fa-phone"></i> +91
                                62840–59009</p>
                        </div>
                        <h5 class="mt-2 mb-2">Follow us on:</h5>
                        <div class="mt-2 mb-4">
                            <a href="https://www.facebook.com/dbelschd" target="_blank" class="text-dark mx-2"><i
                                    class="fab fa-facebook fa-2x"></i></a>
                            <a href="https://www.instagram.com/dbelschd" target="_blank" class="text-dark mx-2"><i
                                    class="fab fa-instagram fa-2x"></i></a>
                            <a href="https://www.linkedin.com/company/dbelschd" target="_blank" class="text-dark mx-2"><i
                                    class="fab fa-linkedin fa-2x"></i></a>
                            <a href="https://x.com/dbelschd" target="_blank" class="text-dark mx-2"><i
                                    class="fab fa-twitter fa-2x"></i></a>
                            <a href="https://www.youtube.com/@dbelschd" target="_blank" class="text-dark mx-2"><i
                                    class="fab fa-youtube fa-2x"></i></a>
                            <a href="https://wa.me/6284058009" target="_blank" class="text-dark mx-2"><i
                                    class="fab fa-whatsapp fa-2x"></i></a>
                        </div>

                    </div>
                    <div class="col-lg-5 mb-3">
                        <form class="contact-form" method="POST" action="{{ route('contact.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <img class="rounded contact-logo" src="{{ asset('storage/assets/dbs.png') }}" alt="dbels-logo">
                            </div>
                            <div class="mb-2 mt-1">
                                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                <input type="name" class="form-control" id="name" placeholder="Enter name"
                                    name="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                    name="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="phone_number" class="form-label">Phone Number<span
                                        class="text-danger">*</span></label>
                                <input type="phone_number" class="form-control" id="phone_number"
                                    placeholder="Enter Phone Number" name="phone_number"> </textarea>
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="message" class="form-label">Message<span
                                        class="text-danger">*</span></label>
                                <textarea type="message" class="form-control" id="message" placeholder="Enter Message" name="message"> </textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-secondary-custom">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Google Maps --}}
    <div class="container pb-4" data-aos="zoom-in">
        <h1 class="section-heading pt-4 pb-5">Find Us on Google Maps</h1>
        <div class="shadow-lg">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13720.442285489698!2d76.8549515!3d30.7152918!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f933babb16cbf%3A0x3d75ae038c87404a!2sD-%20Bels%20(Dass%20%26%20Brown%20Experiential%20Learning%20School)!5e0!3m2!1sen!2sin!4v1730174267965!5m2!1sen!2sin"
                width="100%" height="450" class="map-iframe" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    {{-- Download Brochure Section --}}
    <div class="container-fluid download-brochure-section">
        <div class="container d-flex align-items-center justify-content-center p-1">
            <span class="brochure-download-text">Download Brochure:</span>
            <a href="{{ asset('storage/assets/dbels-brochure.pdf') }}" class="download-button" download>
                <i class="fas fa-download"></i> Download Now
            </a>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/show.css') }}">
@endsection
