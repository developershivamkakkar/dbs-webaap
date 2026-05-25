@extends('layouts.app')
@section('title',
    'Admissions-Dass and Brown Experiential Learning School | Best School in Panchkula, Tricity
    Chandigarh')
@section('meta-description',
    'Dass & Brown Experiential Learning School (D-Bels) is an innovative educational institution located in Panchkula,
    Tricity Chandigarh. Admissions are now Open . It offers a first-of-its-kind campus with multiple distinct educational
    pathways, each designed to
    provide students with a modern, experiential learning experience. We Offer four distinct yet interconnected
    pathways— Finnish Elementary School, YES: Young Entrepreneurs School, Dass & Brown Legacy School, and Dass & Brown
    International and Junior College — D-BELS fosters innovative and experiential learning. With a strong emphasis on ethics
    and social responsibility, our curriculum includes globally recognized programs like Cambridge AS/A Level, IB Diploma,
    and ICSE. Join us in shaping the future leaders of tomorrow through a holistic and personalized educational experience')

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

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6284058009" class="whatsapp-button" target="_blank">
        <i class="fab fa-whatsapp"></i> Contact Us
    </a>
    <div class="container-fluid p-0 m-0 d-lg-none">
        <img class="img-fluid" src="{{ asset('storage/assets/admissions-landing-banner.jpg') }}"
            alt="admissions-landing-banner">
    </div>


    <div class="container-fluid align-items-center section-min-h-1000">
        <h1 class="section-heading mt-4 pt-5 pb-5 text-center" data-aos="zoom-in">Fill the Form below for Admission Enquiry
        </h1>

        <div class="container pb-3">
            <div class="row align-items-center justify-content-center">

                <!-- Left Column -->
                <div class="col-lg-7 order-2 order-lg-1" data-aos="fade-right">
                    <div class="logo mb-3" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ asset('storage/assets/dbs.png') }}" alt="Dass & Brown Logo" loading="lazy">
                    </div>
                    <h3 class="heading-secondary" data-aos="fade-up" data-aos-delay="200">Join Us In</h3>
                    <h3 class="fw-bold" data-aos="fade-up" data-aos-delay="250">Shaping the Future of Education</h3>

                    <div class="my-3" data-aos="fade-up" data-aos-delay="300">
                        <h5 class="fw-bold">Site Office:</h5>
                        <p>HS-1, Adjoining IT Park Chandigarh, Near Dolphin Chowk, Sector-6, MDC Panchkula <br>(Tri City
                            Chandigarh)</p>
                        <p><i class="fas fa-envelope"></i> info@dassandbrownschool.com</p>
                    </div>

                    <div class="my-3" data-aos="fade-up" data-aos-delay="350">
                        <h5 class="fw-bold">Admissions Office:</h5>
                        <p>DSS No. 102, Adjoining Baskin Robbins, Sector 5, MDC Main Market, Panchkula <br>(Tri City
                            Chandigarh)</p>
                        <p><i class="fas fa-envelope"></i> admissions@dassandbrownschool.com</p>
                    </div>

                    <div class="mt-2" data-aos="fade-up" data-aos-delay="400">
                        <h4 class="fw-bold">Call us:</h4>
                        <p><i class="fas fa-phone"></i> +91 62840–58009 <br> <i class="fas fa-phone"></i> +91 62840–59009
                        </p>
                    </div>

                    <h5 class="mt-2 mb-2" data-aos="fade-up" data-aos-delay="450">Follow us on:</h5>
                    <div class="mt-2 mb-4" data-aos="fade-up" data-aos-delay="500">
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

                <!-- Right Column -->
                <div class="col-lg-5 d-flex justify-content-center align-items-center order-1 order-lg-2"
                    data-aos="fade-left" data-aos-delay="200">
                    <iframe src="https://dbels.schoolpad.in/enquiryManager/onlineOpenAdmissionForm/7" title="Admission Form"
                        class="admissions-iframe">
                    </iframe>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid pt-5 pb-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <img loading="lazy" class="pb-md-4 pb-sm-4 pb-4 img-fluid"
                                src="{{ asset('storage/assets/dbs.png') }}" alt="dbels-logo"
                                style="width: 100%; max-width: 404px; height: auto; background-color: #114b9700; object-fit: cover;">
                        </div>
                        <div class="col-9 col-sm-9 col-md-9 col-lg-9">
                            <h2 class="explore-potential-heading mb-4">
                                SHAPING FUTURE LEADERS THROUGH
                                <span class="fw-bold explore-text">INNOVATION & TECHNOLOGY</span>
                            </h2>
                        </div>
                    </div>
                    <p class="explore-potential-text">
                        Located in the serene environment of Panchkula, Chandigarh. <br> Dass & Brown Experiential
                        Learning
                        School is designed to cultivate competent & conscientious individuals who can think ahead of
                        their
                        times. DBELS is designed with modern architecture & is going to be the first of its kind,
                        centrally
                        air-conditioned, state-of-the-art, Wi-Fi enabled, digitally equipped campus.
                    </p>
                </div>
                <div class="col-lg-6 h-100 shadow-sm p-1">
                    <iframe width="100%" style="aspect-ratio: 2.02;"
                        src="https://www.youtube.com/embed/OfPGCY2k9y4?si=IEd3yUQt2zrNWZfJ" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    {{-- <iframe src="https://dbels.schoolpad.in/enquiryManager/onlineOpenAdmissionForm/7" title="Admission Form" width="100%"
        height="1500px" style="border: none; overflow: hidden;" scrolling="no">
    </iframe> --}}
    {{-- Our Education Ecosystem --}}
    <div class="container-fluid px-lg-4 py-5  bg-light">
        <div class="container mt-4">
            <h2 class="text-center mb-5">
                <span class="cool-heading">Our Education Ecosystem</span>
            </h2>
            <!-- Centered heading with margin-bottom -->
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4"> <!-- Changed to col-lg-4 for smaller cards -->
                    <div class="card h-100 d-flex flex-column shadow-lg border-0">
                        <img class="pt-2" src="{{ asset('storage/assets/finish-elementary.webp') }}" alt="image"
                            style="width:100%; height:150px; object-fit: contain; border-radius: 10px 10px 0 0;"
                            loading="lazy">
                        <!-- Reduced image height -->
                        <div class="card-body flex-grow-1">
                            <h3 class="text-center" style="font-size: 1.25rem; font-weight: bold; color: #343a40;">FINNISH
                                ELEMENTARY SCHOOL
                            </h3> <!-- Smaller font size -->
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#finishElementaryModal"
                                style="text-decoration: none;">
                                <button class="button"
                                    style="background-color: rgb(237, 98, 54); padding: 8px 15px; border-radius: 8px; border: none; transition: background-color 0.3s; color: white; font-weight: bold;">
                                    Learn More
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- FINNISH ELEMENTARY SCHOOL Modal --}}
                <div class="modal fade" id="finishElementaryModal" tabindex="-1"
                    aria-labelledby="finishElementaryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-0 position-relative">
                                <div class="col-12 p-3">
                                    <img class="img-fluid rounded-top"
                                        src="{{ asset('storage/assets/finish-elementary.webp') }}"
                                        alt="Finnish Elementary School"
                                        style="width: 100%; height: 150px; object-fit: contain; border-radius: 10px 0 0 0;"
                                        loading="lazy">
                                </div>
                                <!-- Close Button -->
                                <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <h4 class="fw-bold mb-3">FINNISH ELEMENTARY SCHOOL</h4>
                                <p class="fw-bold mb-4">Kindergarten - Grade II</p>

                                <ul class="list-unstyled text-start d-inline-block w-100">
                                    <li class="p-2 mb-2 bg-light  d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Progressive Finnish curriculum</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Bagless Inquiry-based, Resource rich Learning Approach</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Focus on Play-based, Child Centeric Learning</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Emphasis on Creativity, Critical Thinking, and Social Skills</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Outdoor Education and Nature Immersive Learning</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 d-flex flex-column shadow-lg border-0">
                        <img class="pt-2" src="{{ asset('storage/assets/yes.webp') }}" alt="image"
                            style="width:100%; height:150px; object-fit: contain; border-radius: 10px 10px 0 0;"
                            loading="lazy">
                        <div class="card-body flex-grow-1">
                            <h3 class="program-heading text-center"
                                style="font-size: 1.25rem; font-weight: bold; color: #343a40;">YOUNG ENTREPRENEURS SCHOOL
                            </h3>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#youngSchoolModal"
                                style="text-decoration: none;">
                                <button class="button"
                                    style="background-color: rgb(237, 98, 54); padding: 8px 15px; border-radius: 8px; border: none; transition: background-color 0.3s; color: white; font-weight: bold;">
                                    Learn More
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- YOUNG ENTREPRENEURS SCHOOL Modal --}}
                <div class="modal fade" id="youngSchoolModal" tabindex="-1"
                    aria-labelledby="finishElementaryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-0 position-relative">
                                <div class="col-12 p-3">
                                    <img class="img-fluid rounded-top" src="{{ asset('storage/assets/yes.webp') }}"
                                        alt="YOUNG ENTREPRENEURS SCHOOL"
                                        style="width: 100%; height: 150px; object-fit: contain; border-radius: 10px 0 0 0;"
                                        loading="lazy">
                                </div>
                                <!-- Close Button -->
                                <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <h4 class="fw-bold mb-3">YOUNG ENTREPRENEURS SCHOOL</h4>
                                <p class="fw-bold mb-4">Grade III-X</p>

                                <ul class="list-unstyled text-start d-inline-block w-100">
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Custom developed YES Curriculum focusing on Entrepreneurship &
                                            STEAM</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Apple School-integrated Pedagogy</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Emphasis on Innovation, Life Skills, and Digital Literacy</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>IGCSE (Grade IX-X)</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light  d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Preparation for Global Universities to be Future Leaders</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light  d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Exclusive access to Y-Hub, our Entrepreneurship cell & Incubators</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 d-flex flex-column shadow-lg border-0">
                        <img class="pt-2" src="{{ asset('storage/assets/legacy-school.webp') }}" alt="image"
                            style="width:100%; height:150px; object-fit: contain; border-radius: 10px 10px 0 0;"
                            loading="lazy">
                        <div class="card-body flex-grow-1">
                            <h3 class="program-heading text-center"
                                style="font-size: 1.25rem; font-weight: bold; color: #343a40;">DASS & BROWN LEGACY
                                SCHOOL
                            </h3>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" style="text-decoration: none;" data-bs-toggle="modal"
                                data-bs-target="#legacySchoolModal">
                                <button class="button"
                                    style="background-color: rgb(237, 98, 54); padding: 8px 15px; border-radius: 8px; border: none; transition: background-color 0.3s; color: white; font-weight: bold;">
                                    Learn More
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Dass & Brown Legacy SCHOOL Modal --}}
                <div class="modal fade" id="legacySchoolModal" tabindex="-1"
                    aria-labelledby="finishElementaryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-0 position-relative">
                                <div class="col-12 p-3">
                                    <img class="img-fluid rounded-top"
                                        src="{{ asset('storage/assets/legacy-school.webp') }}"
                                        alt="YOUNG ENTREPRENEURS SCHOOL"
                                        style="width: 100%; height: 150px; object-fit: contain; border-radius: 10px 0 0 0;"
                                        loading="lazy">
                                </div>
                                <!-- Close Button -->
                                <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <h4 class="fw-bold mb-3">DASS & BROWN LEGACY SCHOOL</h4>
                                <p class="fw-bold mb-4">Grades KG-X
                                </p>

                                <ul class="list-unstyled text-start d-inline-block w-100">
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>ICSE Curriculum: Strong academic foundation from KG to X.
                                        </span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>
                                            Customized Curriculum: CCLICK, SLITE, SELECT, CLASSE for experiential
                                            learning.
                                        </span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>STREAM Education: Balanced academic and practical, hands-on learning.
                                        </span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>AI-Powered Assessments: Personalized learning pathways for each student.
                                        </span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light  d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Progression after Grade X: Continue with CISCE or choose IB, or Cambridge
                                            AS/A
                                            Level.
                                        </span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light  d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Future-Ready Skills: Critical thinking, problem-solving, and
                                            leadership development.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 d-flex flex-column shadow-lg border-0">
                        <img class="pt-2" src="{{ asset('storage/assets/international-junior-college.webp') }}"
                            alt="image"
                            style="width:100%; height:150px; object-fit: contain; border-radius: 10px 10px 0 0;"
                            loading="lazy">
                        <div class="card-body flex-grow-1">
                            <h3 class="text-center" style="font-size: 1.25rem; font-weight: bold; color: #343a40;">
                                INTERNATIONAL JUNIOR
                                COLLEGE
                            </h3>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#internationalJuniorCollege"
                                style="text-decoration: none;">
                                <button class="button"
                                    style="background-color: rgb(237, 98, 54); padding: 8px 15px; border-radius: 8px; border: none; transition: background-color 0.3s; color: white; font-weight: bold;">
                                    Learn More
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Modal for Dass and brown International Junior College --}}
                <div class="modal fade" id="internationalJuniorCollege" tabindex="-1"
                    aria-labelledby="finishElementaryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-0 position-relative">
                                <div class="col-12 p-3">
                                    <img class="img-fluid rounded-top"
                                        src="{{ asset('storage/assets/international-junior-college.webp') }}"
                                        alt="international-junior-college"
                                        style="width: 100%; height: 150px; object-fit: contain; border-radius: 10px 0 0 0;"
                                        loading="lazy">
                                </div>
                                <!-- Close Button -->
                                <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <h4 class="fw-bold mb-3">INTERNATIONAL JUNIOR COLLEGE</h4>
                                <p class="fw-bold mb-4">Grade XI-XII</p>

                                <ul class="list-unstyled text-start d-inline-block w-100">
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Rigorous Academic Program with a Global Perspective</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Focus on Critical Thinking, Research Skills, and International
                                            Mindedness</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Preparation for top Universities Worldwide</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Emphasis on Community Service and Extracurricular Activities</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>IB Career Pathway Program</span>
                                    </li>
                                    <li class="p-2 mb-2 bg-light d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>Cambridge AS / A Levels and ISC (Grade XI-XII) options available</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- What Sets Apart Section --}}
    <section class="what-sets-us-apart">
        <div class="container">
            <h2 class="text-center mb-5">
                <span class="cool-heading">What Sets Us Apart...</span>
            </h2>
            <div class="row align-items-center">
                <!-- Left side with list and logo -->
                <div class="col-md-12 col-lg-5">
                    <div class="logo">
                        <img src="{{ asset('storage/assets/dbs.png') }}" alt="Dass & Brown Logo" loading="lazy">
                    </div>
                    <ul class="features-list">
                        <li><i class="fas fa-user-graduate"></i> Personalized Learning Pathways</li>
                        <li><i class="fas fa-globe"></i> Globally Recognized Curricula</li>
                        <li><i class="fas fa-chalkboard-teacher"></i> Experiential Learning Methodology</li>
                        <li><i class="fas fa-lightbulb"></i> Focus on Entrepreneurship and STREAM</li>
                        <li><i class="fas fa-apple-alt"></i> Apple School-integrated Pedagogy</li>
                        <li><i class="fas fa-school"></i> World-Class Infrastructure</li>
                        <li><i class="fas fa-users"></i> Holistic Development Approach</li>
                    </ul>
                </div>

                <!-- Right side with image -->
                <div class="col-md-12 col-lg-7">
                    <div class="image-section text-center">
                        <img class="img-fluid" src="{{ asset('storage/assets/dbels-kid.webp') }}" alt="dbels-kid"
                            loading="lazy" width="3645" height="2503">
                        <!-- Using the exact dimensions of your image -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Facilities Section --}}
    <section class="container py-5">
        <h2 class="text-center mb-4">
            <span class="cool-heading">Facilities @ D-BELS</span>
        </h2>
        <p class="text-center">DBELS offers a truly unparalleled educational experience, blending world-class facilities
            with a visionary approach to learning. The campus is a master piece of modern design ,featuring cutting edge
            science and innovation labs, fully integrated with advanced technology.</p>
        <div class="container mt-4 mb-4 text-center">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/aerospace-center.webp') }}"
                        alt="aerospace-center">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/neils-bohar-lab.webp') }}" alt="neils-bohar-lab">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/feynman-lab.webp') }}" alt="feynman-lab">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/amphitheatre.webp') }}" alt="amphitheatre">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/cad-lab.webp') }}" alt="cad-lab">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/collaborative-corners.webp') }}"
                        alt="collaborative-corners">
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center mt-4">
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/dance-studio.webp') }}" alt="dance-studio">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/dass-auditorium.webp') }}" alt="neils-bohar-lab">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/fitness-zone.png') }}" alt="fitness-zone">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/infirmary.png') }}" alt="infirmary">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/lrc.png') }}" alt="learning-resource-center">
                </div>
                <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <img loading="lazy" class="img-fluid mx-auto d-block"
                        src="{{ asset('storage/assets/facilities-images/wellbeing-center.png') }}"
                        alt="wellbeing-center">
                </div>
            </div>
        </div>
    </section>



    {{-- Download Brochure Section --}}
    <div class="container-fluid download-brochure-section">
        <div class="container d-flex align-items-center justify-content-center p-1">
            <span class="brochure-download-text">Download Brochure:</span>
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#brochureModal" class="download-button"
                download>
                <i class="fas fa-download"></i> Download Now
            </a>
        </div>
    </div>

    <x-brochure-modal />

    <x-thank-you-modal id="brochureThankYouModal" title="🎉 Thank You!" message="Your brochure request is received!"
        download="{{ asset('brochures/dbels-brochure.pdf') }}" filename="dbels-brochure.pdf" />

@endsection
