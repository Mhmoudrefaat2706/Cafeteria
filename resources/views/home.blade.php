@extends('layouts.app')
@section('navbar')
            <li class="nav-item">
                <a class="nav-link nav-item-custom" href="{{ route('orders.index') }}">
                    <i class="fas fa-home me-2"></i>My Orders
                </a>

            </li>
            @endsection
@section('content')
    <section id="home" class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <div class="hero-badge mb-3">
                            <span class="badge bg-warning text-dark px-3 py-2">Premium Coffee Experience</span>
                        </div>
                        <h1 class="display-3 fw-bold text-coffee mb-4">Golden Bean Cafeteria</h1>
                        <p class="hero-subtitle text-coffee mb-3">Where Excellence Meets Comfort</p>
                        <p class="lead text-muted mb-4">We deliver exceptional coffee experiences through premium beverages,
                            professional service, and thoughtfully designed spaces. Join our community of coffee enthusiasts
                            and business professionals.</p>
                        <div class="hero-actions">
                            <a href="#services" class="btn btn-warning btn-lg me-3">Explore Services</a>
                            <a href="#contact" class="btn btn-outline-warning btn-lg">Get In Touch</a>
                        </div>
                        <div class="hero-stats mt-4">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div class="stat-number text-coffee fw-bold">500+</div>
                                    <div class="stat-label text-muted small">Happy Clients</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="stat-number text-coffee fw-bold">50+</div>
                                    <div class="stat-label text-muted small">Beverage Options</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="stat-number text-coffee fw-bold">5★</div>
                                    <div class="stat-label text-muted small">Customer Rating</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-visual">
                        <div class="hero-image-main">
                            <div class="coffee-icon-container">
                                <i class="fas fa-mug-hot"></i>
                            </div>
                        </div>
                        <div class="hero-features">
                            <div class="feature-item">
                                <i class="fas fa-award text-warning"></i>
                                <span>Premium Quality</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-clock text-warning"></i>
                                <span>Quick Service</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-wifi text-warning"></i>
                                <span>Free WiFi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section bg-light-cream">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-coffee">Our Services</h2>
                    <p class="lead text-muted">Discover what makes Golden Bean special</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Order Drinks -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 service-card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-coffee fa-3x text-warning"></i>
                            </div>
                            <h5 class="card-title fw-bold text-coffee">Order Drinks</h5>
                            <p class="card-text text-muted">Premium coffee, fresh juices, and specialty beverages crafted by
                                our expert baristas. From espresso to smoothies, we have something for everyone.</p>
                            <a href="#" class="btn btn-outline-warning">Order Now</a>
                        </div>
                    </div>
                </div>

                <!-- Rooms for Enjoyment -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 service-card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-couch fa-3x text-warning"></i>
                            </div>
                            <h5 class="card-title fw-bold text-coffee">Cozy Rooms</h5>
                            <p class="card-text text-muted">Private and comfortable spaces perfect for meetings, study
                                sessions, or catching up with friends. Book your ideal spot for quality time.</p>
                            <a href="#" class="btn btn-outline-warning">Book Room</a>
                        </div>
                    </div>
                </div>

                <!-- Offers & More -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 service-card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-gift fa-3x text-warning"></i>
                            </div>
                            <h5 class="card-title fw-bold text-coffee">Special Offers</h5>
                            <p class="card-text text-muted">Enjoy exclusive deals, loyalty rewards, and seasonal promotions.
                                Join our community and never miss out on great savings and special events.</p>
                            <a href="#" class="btn btn-outline-warning">View Offers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--     <footer class="bg-coffee text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-coffee me-2"></i>Golden Bean Cafeteria</h5>
                    <p class="mb-0">Your perfect coffee experience awaits.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">© 2025 Golden Bean. All rights reserved.</p>
                    <div class="mt-2">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
    <!-- <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                {{ __('You are logged in!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
@endsection
