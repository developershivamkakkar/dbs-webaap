@extends('layouts.app')
@section('title', 'FAQs – Frequently Asked Questions')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/show.css') }}">
    <style>
        .faq-section { padding: 60px 0; }

        .faq-category-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: .04em;
            margin: 36px 0 14px;
            padding-bottom: 6px;
            border-bottom: 2px solid var(--color-primary-light, #f5d0d0);
        }

        .accordion-button {
            font-weight: 600;
            color: #222;
            background: #fff;
        }
        .accordion-button:not(.collapsed) {
            color: var(--color-primary);
            background: #fff8f8;
            box-shadow: none;
        }
        .accordion-button::after {
            filter: none;
        }
        .accordion-button:not(.collapsed)::after {
            filter: invert(20%) sepia(90%) saturate(600%) hue-rotate(340deg);
        }
        .accordion-item {
            border: 1px solid #e8e8e8;
            border-radius: 10px !important;
            margin-bottom: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
            transition: box-shadow .2s;
        }
        .accordion-item:hover { box-shadow: 0 6px 18px rgba(140,3,5,.1); }
        .accordion-body { color: #444; line-height: 1.7; }

        .faq-empty { text-align: center; padding: 60px 20px; color: #888; }
        .faq-empty i { font-size: 3rem; display: block; margin-bottom: 12px; }
    </style>
@endsection

@section('content')
    {{-- Page Hero Banner --}}
    <div class="page-hero">
        <div class="page-hero-blob page-hero-blob-1"></div>
        <div class="page-hero-blob page-hero-blob-2"></div>
        <div class="page-hero-content">
            <h1 class="page-hero-title" data-aos="fade-up">Frequently Asked Questions</h1>
            <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="120">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.get') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                </ol>
            </nav>
        </div>
        <div class="page-hero-wave">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"><path d="M0,28 C360,56 1080,0 1440,28 L1440,56 L0,56 Z" fill="#f4f6f9"/></svg>
        </div>
    </div>

    <section class="faq-section">
        <div class="container">
            @if ($faqs->isEmpty())
                <div class="faq-empty">
                    <i class="fas fa-question-circle"></i>
                    No FAQs available at the moment. Please check back later.
                </div>
            @else
                @php
                    $grouped = $faqs->groupBy(fn($faq) => $faq->category ?: 'General');
                @endphp

                @foreach ($grouped as $category => $items)
                    <h2 class="faq-category-title">{{ $category }}</h2>

                    <div class="accordion" id="faq-accordion-{{ Str::slug($category) }}">
                        @foreach ($items as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq-heading-{{ $faq->id }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq-collapse-{{ $faq->id }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="faq-collapse-{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="faq-collapse-{{ $faq->id }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="faq-heading-{{ $faq->id }}"
                                    data-bs-parent="#faq-accordion-{{ Str::slug($category) }}">
                                    <div class="accordion-body">
                                        {!! nl2br(e($faq->answer)) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
