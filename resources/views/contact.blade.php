@extends('layouts.app')

@section('title', 'Contact Us - VidyaSetu')

@section('content')
<x-page-hero
    title="Get in Touch With Us"
    breadcrumb-title="Contact Us"
    paragraph="We’d love to hear from you. Whether you have questions, need support, or want to learn more about VidyaSetu, our team is here to help." />

<div class="vs-container vs-contact-section">
    <div class="vs-contact-grid">
        <!-- Contact Information -->
        <div class="vs-contact-left">
            <div class="vs-contact-heading">
                <h2 class="vs-contact-title">Let's Start a Conversation</h2>
                <p class="vs-contact-description">
                    Have questions about VidyaSetu? We're here to help! Reach out to us through any of the channels below.
                </p>
            </div>

            <div class="vs-contact-info-list">
                <div class="vs-contact-item">
                    <div class="vs-contact-icon-box vs-contact-icon-blue">
                        <i class="fas fa-phone"></i>
                    </div>

                    <div class="vs-contact-content">
                        <h3 class="vs-contact-label">Phone</h3>
                        <p class="vs-contact-text">+91 12345 67890</p>
                        <p class="vs-contact-small">Mon-Fri 9am-6pm IST</p>
                    </div>
                </div>

                <div class="vs-contact-item">
                    <div class="vs-contact-icon-box vs-contact-icon-green">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="vs-contact-content">
                        <h3 class="vs-contact-label">Email</h3>
                        <p class="vs-contact-text">info@vidyasetu.com</p>
                        <p class="vs-contact-small">We'll respond within 24 hours</p>
                    </div>
                </div>

                <div class="vs-contact-item">
                    <div class="vs-contact-icon-box vs-contact-icon-purple">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>

                    <div class="vs-contact-content">
                        <h3 class="vs-contact-label">Office</h3>
                        <p class="vs-contact-text">
                            123 Education Street<br>
                            Mumbai, Maharashtra 400001<br>
                            India
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="vs-contact-form">
            <div class="vs-form-bg-shape vs-form-shape-1"></div>
            <div class="vs-form-bg-shape vs-form-shape-2"></div>

            <form class="vs-form">
                <div class="vs-form-group">
                    <input type="text" class="vs-form-input" placeholder="Your Name">
                </div>

                <div class="vs-form-group">
                    <input type="email" class="vs-form-input" placeholder="Your Email">
                </div>

                <div class="vs-form-group">
                    <input type="text" class="vs-form-input" placeholder="Subject">
                </div>

                <div class="vs-form-group">
                    <textarea class="vs-form-input vs-form-textarea" placeholder="Your Message"></textarea>
                </div>

                <button type="submit" class="vs-form-button">
                    Send Message
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>
<x-cta></x-cta>
@endsection