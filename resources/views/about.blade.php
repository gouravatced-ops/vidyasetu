@extends('layouts.app')

@section('title', 'About Us - VidyaSetu')

@section('content')

<x-page-hero
    title="Transforming Education for the Digital Age"
    breadcrumb-title="About Us"
    paragraph="VidyaSetu is revolutionizing school management with cutting-edge technology, making education more accessible, efficient, and engaging for everyone involved."
/>

<!-- Mission & Vision Section (replaces Bootstrap row/col) -->
<div class="vs-container vs-px-4 vs-py-5">
    <div class="vs-row vs-align-items-center" style="row-gap: 2rem;">
        <!-- Left Column: Mission and Vision Cards (flex column gap) -->
        <div class="vs-col-lg-6">
            <div class="vs-d-flex vs-flex-column" style="gap: 1.5rem;">
                <!-- Mission Card -->
                <div class="vs-rounded-4 vs-transition-all">
                    <div class="vs-card-body" style="padding: 1.75rem;">
                        <div class="vs-d-flex vs-align-items-center vs-mb-4">
                            <div class="vs-icon-bg-primary vs-rounded-4 vs-d-flex vs-align-items-center vs-justify-content-center vs-me-3 vs-w-64">
                                <i class="fas fa-bullseye vs-text-primary vs-fs-1"></i>
                            </div>
                            <h2 class="vs-display-6 vs-fw-bold vs-text-dark vs-mb-0">Our Mission</h2>
                        </div>
                        <p class="vs-text-secondary vs-fs-5 vs-lh-base">
                            To democratize quality education by providing schools with powerful,
                            user-friendly management tools that streamline operations and enhance
                            the learning experience for students, teachers, and administrators alike.
                        </p>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="vs-rounded-4 vs-transition-all">
                    <div class="vs-card-body" style="padding: 1.75rem;">
                        <div class="vs-d-flex vs-align-items-center vs-mb-4">
                            <div class="vs-icon-bg-success vs-rounded-4 vs-d-flex vs-align-items-center vs-justify-content-center vs-me-3 vs-w-64">
                                <i class="fas fa-eye vs-text-success vs-fs-1"></i>
                            </div>
                            <h2 class="vs-display-6 vs-fw-bold vs-text-dark vs-mb-0">Our Vision</h2>
                        </div>
                        <p class="vs-text-secondary vs-fs-5 vs-lh-base">
                            To become the global leader in educational technology, creating a world
                            where every school has access to world-class management solutions that
                            foster academic excellence and innovation.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Image with stats badge (custom positioning) -->
        <div class="vs-col-lg-6 vs-position-relative" style="margin-top: 0;">
            <div class="vs-position-relative">
                <img src="https://images.unsplash.com/photo-1489486501123-5c1af10d0be6?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="About VidyaSetu"
                    class="vs-img-fluid vs-rounded-4 vs-shadow-lg">
                <!-- Stats badge (absolute positioning using custom classes + inline fallback) -->
                <div class="vs-position-absolute vs-stats-badge" style="bottom: 0; right: 0; transform: translate(10%, 20%); z-index: 2;">
                    <div class="vs-bg-white vs-rounded-4 vs-shadow-lg vs-min-w-240" style="padding: 10px;">
                        <div class="vs-d-flex vs-justify-content-around vs-gap-3">
                            <div class="vs-text-center">
                                <div class="vs-display-6 vs-fw-bold vs-text-primary">500+</div>
                                <div class="vs-small vs-text-secondary">Schools</div>
                            </div>
                            <div class="vs-text-center">
                                <div class="vs-display-6 vs-fw-bold vs-text-success">50K+</div>
                                <div class="vs-small vs-text-secondary">Students</div>
                            </div>
                            <div class="vs-text-center">
                                <div class="vs-display-6 vs-fw-bold" style="color: #8b5cf6;">98%</div>
                                <div class="vs-small vs-text-secondary">Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Team Section -->
<section class="vs-py-5  teamsection">
    <div class="vs-container vs-px-4 vs-py-4">
        <x-section-header 
            tag="Teams"
            title="Meet Our Team"
            subtitle="The experts behind VidyaSetu"
        />

        <div class="vs-row" style="row-gap: 1.5rem;">
            <!-- Team Member 1: CEO -->
            <div class="vs-col-md-6 vs-col-lg-4">
                <div class="vs-h-100 vs-rounded-4 vs-text-center" style="padding: 1.25rem;">
                    <div class="vs-card-body">
                        <img src="https://plus.unsplash.com/premium_photo-1723496422025-81438721b9f2?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dGVhbXN8ZW58MHx8MHx8fDA%3D"
                            alt="Dr. Priya Sharma"
                            class="vs-rounded-circle vs-mx-auto vs-mb-3 vs-object-cover vs-w-128">
                        <h3 class="vs-fs-4 vs-fw-semibold vs-text-dark vs-mb-1">Dr. Priya Sharma</h3>
                        <p class="vs-text-primary vs-fw-medium vs-mb-2">Chief Executive Officer</p>
                        <p class="vs-text-secondary">Former education administrator with 15+ years of experience in educational technology.</p>
                    </div>
                </div>
            </div>
            <!-- Team Member 2: CTO -->
            <div class="vs-col-md-6 vs-col-lg-4">
                <div class="vs-h-100 vs-rounded-4 vs-text-center" style="padding: 1.25rem;">
                    <div class="vs-card-body">
                        <img src="https://images.unsplash.com/photo-1630487656049-6db93a53a7e9?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGVhbXN8ZW58MHx8MHx8fDA%3D"
                            alt="Rajesh Kumar"
                            class="vs-rounded-circle vs-mx-auto vs-mb-3 vs-object-cover vs-w-128">
                        <h3 class="vs-fs-4 vs-fw-semibold vs-text-dark vs-mb-1">Rajesh Kumar</h3>
                        <p class="vs-text-success vs-fw-medium vs-mb-2">Chief Technology Officer</p>
                        <p class="vs-text-secondary">Tech innovator with expertise in scalable software solutions and cloud architecture.</p>
                    </div>
                </div>
            </div>
            <!-- Team Member 3: COO -->
            <div class="vs-col-md-6 vs-col-lg-4">
                <div class="vs-h-100 vs-rounded-4 vs-text-center" style="padding: 1.25rem;">
                    <div class="vs-card-body">
                        <img src="https://images.unsplash.com/photo-1630487656049-6db93a53a7e9?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGVhbXN8ZW58MHx8MHx8fDA%3D"
                            alt="Meera Patel"
                            class="vs-rounded-circle vs-mx-auto vs-mb-3 vs-object-cover vs-w-128">
                        <h3 class="vs-fs-4 vs-fw-semibold vs-text-dark vs-mb-1">Meera Patel</h3>
                        <p class="vs-fw-medium vs-mb-2" style="color: #8b5cf6;">Chief Operations Officer</p>
                        <p class="vs-text-secondary">Operations expert focused on delivering exceptional customer experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection