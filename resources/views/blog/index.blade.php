@extends('blog.layouts.master')

@section('title')
    {{ __('Home') }}
@endsection

@section('carousel')
    @include('blog.includes.carousel')
@endsection

@section('content')
    <section class="edica-landing-section edica-landing-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up-right">
                    <h4 class="edica-landing-section-subtitle-alt">ABOUT US</h4>
                    <h2 class="edica-landing-section-title">1000+ customer using Our application.</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipng elit, sed do eiusmod tempor incididunt ut labore aliqua. Ut enim que minim veniam, quis nostrud exercitation.</p>
                    <ul class="landing-about-list">
                        <li>Powerful and flexible theme</li>
                        <li>Simple, transparent pricing</li>
                        <li>Build tools and full documention</li>
                    </ul>
                </div>
                <div class="col-md-6" data-aos="fade-up-left">
                    <img src="assets/images/phone-copy.png" width="468px" alt="about" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="edica-landing-section edica-landing-clients">
        <div class="container">
            <h4 class="edica-landing-section-subtitle-alt">PARTNER WITH US</h4>
            <div class="partners-wrapper">
                <img src="assets/images/Partner_1.png" alt="client logo" data-aos="flip-right" data-aos-delay="250">
                <img src="assets/images/Partner_2.png" alt="client logo" data-aos="flip-right" data-aos-delay="500">
                <img src="assets/images/Partner_3.png" alt="client logo" data-aos="flip-right" data-aos-delay="750">
                <img src="assets/images/Partner_4.png" alt="client logo" data-aos="flip-right" data-aos-delay="1000">
                <img src="assets/images/Partner_5.png" alt="client logo" data-aos="flip-right" data-aos-delay="1250">
                <img src="assets/images/Partner_6.png" alt="client logo" data-aos="flip-right" data-aos-delay="1500">
            </div>
        </div>
    </section>
    <section class="edica-landing-section edica-landing-services">
        <div class="container">
            <h4 class="edica-landing-section-subtitle">Service We Offer</h4>
            <h2 class="edica-landing-section-title">What features you will <br> Get from App.</h2>
            <div class="row">
                @foreach($randomPosts as $randomPost)
                <div class="col-md-6 landing-service-card" data-aos="fade-left">
                    <img src="{{ url('storage/'.$randomPost->image) }}" alt="card img" class="img-fluid service-card-img">
                    <h4 class="service-card-title">{{ $randomPost->title }}</h4>
                    <p class="service-card-description">{!! Str::limit($randomPost->content, 100) !!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="edica-landing-section edica-landing-blog">
        <div class="container">
            <h4 class="edica-landing-section-subtitle" data-aos="fade-up">{{ __('Blog posts') }}</h4>
            <h2 class="edica-landing-section-title" data-aos="fade-up">{{ __('Most popular posts') }}</h2>
            <div class="row">
                @foreach($likedPosts as $likedPost)
                <div class="col-md-4 landing-blog-post" data-aos="fade-right">
                    <img src="{{ url('storage/'.$likedPost->image) }}" alt="blog post" class="blog-post-thumbnail">
                    <p class="blog-post-category">{{ $likedPost->category->title }}</p>
                    <h4 class="blog-post-title">{{ $likedPost->title }}</h4>
                    <a href="{{ route('blog.post.show', $likedPost->id) }}" class="blog-post-link">Learn more</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
