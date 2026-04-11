@extends('layouts.app')

@section('content')
<x-hero
    title="Empowering Education Through Technology"
    subtitle="Complete School Management Solution for Modern Educational Institutions"
    buttonText="Start Free Trial"
    buttonLink="/register"
    image="https://via.placeholder.com/600x500/4F46E5/FFFFFF?text=School+Management" />

<!-- ══ FEATURES ══ -->
<section class="section" id="features">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-tag">Core Features</div>
            <h2 class="section-title">Everything Your School Needs</h2>
            <p class="section-sub">From admissions to alumni — Vidyasetu covers every workflow so your staff can focus on
                education, not paperwork.</p>
        </div>
        <div class="features-grid">
            <div class="feat-card">
                <div class="feat-icon fi-blue"><i class="fas fa-user-plus"></i></div>
                <h3 class="feat-title">Admission Management</h3>
                <p class="feat-desc">Online inquiry forms, application tracking, document collection, and admission
                    confirmation — fully digital and paperless.</p>
                <a href="#demo" class="feat-link">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="feat-card">
                <div class="feat-icon fi-green"><i class="fas fa-calendar-check"></i></div>
                <h3 class="feat-title">Attendance & Timetable</h3>
                <p class="feat-desc">Biometric, RFID, or app-based attendance. Automatic parent notifications via SMS/WhatsApp
                    for absences.</p>
                <a href="#demo" class="feat-link">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="feat-card">
                <div class="feat-icon fi-orange"><i class="fas fa-rupee-sign"></i></div>
                <h3 class="feat-title">Fee Management</h3>
                <p class="feat-desc">Automated fee reminders, online payment gateway (UPI, NetBanking), receipts, and overdue
                    tracking with reports.</p>
                <a href="#demo" class="feat-link">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="feat-card">
                <div class="feat-icon fi-red"><i class="fas fa-file-alt"></i></div>
                <h3 class="feat-title">Exam & Result Portal</h3>
                <p class="feat-desc">Schedule exams, upload marks, generate report cards with customizable templates. Parent
                    access via mobile app.</p>
                <a href="#demo" class="feat-link">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="feat-card">
                <div class="feat-icon fi-purple"><i class="fas fa-chalkboard-teacher"></i></div>
                <h3 class="feat-title">Staff & HR Module</h3>
                <p class="feat-desc">Teacher profiles, payroll, leave management, performance reviews, and training records in
                    one unified dashboard.</p>
                <a href="#demo" class="feat-link">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="feat-card">
                <div class="feat-icon fi-teal"><i class="fas fa-mobile-alt"></i></div>
                <h3 class="feat-title">Parent & Student App</h3>
                <p class="feat-desc">Real-time updates, homework, fee receipts, and direct messaging between parents and
                    teachers on Android & iOS.</p>
                <a href="#demo" class="feat-link">Learn more <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ══ MODULES ══ -->
<section class="modules" id="modules">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-tag">Modules</div>
            <h2 class="section-title">Explore All Modules</h2>
            <p class="section-sub">Choose the modules that fit your school. Each module works seamlessly with the others.
            </p>
        </div>
        <div class="modules-layout">
            <div class="mod-tabs">
                <div class="mod-tab active" onclick="switchTab('admission',this)">
                    <div class="mod-tab-icon"><i class="fas fa-user-plus"></i></div>
                    <div class="mod-tab-text">Admission</div>
                </div>
                <div class="mod-tab" onclick="switchTab('library',this)">
                    <div class="mod-tab-icon"><i class="fas fa-book"></i></div>
                    <div class="mod-tab-text">Library</div>
                </div>
                <div class="mod-tab" onclick="switchTab('transport',this)">
                    <div class="mod-tab-icon"><i class="fas fa-bus"></i></div>
                    <div class="mod-tab-text">Transport</div>
                </div>
                <div class="mod-tab" onclick="switchTab('hostel',this)">
                    <div class="mod-tab-icon"><i class="fas fa-building"></i></div>
                    <div class="mod-tab-text">Hostel</div>
                </div>
                <div class="mod-tab" onclick="switchTab('inventory',this)">
                    <div class="mod-tab-icon"><i class="fas fa-boxes"></i></div>
                    <div class="mod-tab-text">Inventory</div>
                </div>
                <div class="mod-tab" onclick="switchTab('communication',this)">
                    <div class="mod-tab-icon"><i class="fas fa-comments"></i></div>
                    <div class="mod-tab-text">Communication</div>
                </div>
            </div>
            <div class="mod-content">
                <div class="mod-panel active" id="tab-admission">
                    <h3 class="mod-panel-title">Admission Management</h3>
                    <p class="mod-panel-sub">Streamline your entire admission cycle — from online inquiry to seat confirmation.
                        Reduce manual work and improve parent experience.</p>
                    <div class="mod-features">
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Online inquiry & registration forms</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Document upload & verification</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Admission status tracking</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Waiting list management</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Bulk communication to applicants</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Integration with fee module</div>
                    </div>
                    <a href="#demo" class="btn btn-primary">Get a Demo <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="mod-panel" id="tab-library">
                    <h3 class="mod-panel-title">Library Management</h3>
                    <p class="mod-panel-sub">Digital catalogue, barcode-based issue/return, overdue alerts, and student reading
                        history — all automated.</p>
                    <div class="mod-features">
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Book catalogue & barcode system</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Issue / return tracking</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Overdue fine management</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Student reading reports</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Digital e-book integration</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Reservation & availability alerts</div>
                    </div>
                    <a href="#demo" class="btn btn-primary">Get a Demo <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="mod-panel" id="tab-transport">
                    <h3 class="mod-panel-title">Transport Management</h3>
                    <p class="mod-panel-sub">Live GPS tracking, route management, driver details, and parent notifications to
                        ensure student safety on the road.</p>
                    <div class="mod-features">
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Real-time GPS bus tracking</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Route & stop management</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Driver & vehicle records</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Parent bus arrival alerts</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Transport fee integration</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Maintenance scheduling</div>
                    </div>
                    <a href="#demo" class="btn btn-primary">Get a Demo <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="mod-panel" id="tab-hostel">
                    <h3 class="mod-panel-title">Hostel Management</h3>
                    <p class="mod-panel-sub">Room allotments, mess management, visitor logs, and warden reports — complete
                        residential school solution.</p>
                    <div class="mod-features">
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Room & bed allocation</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Mess menu & attendance</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Visitor log & gate pass</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Leave & outing requests</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Hostel fee management</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Warden daily reports</div>
                    </div>
                    <a href="#demo" class="btn btn-primary">Get a Demo <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="mod-panel" id="tab-inventory">
                    <h3 class="mod-panel-title">Inventory Management</h3>
                    <p class="mod-panel-sub">Track school assets, stationery stock, lab equipment, and uniforms with low-stock
                        alerts and purchase orders.</p>
                    <div class="mod-features">
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Asset & stock register</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Low stock alerts</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Purchase order management</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Vendor management</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Uniform & book store</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Audit trail & reports</div>
                    </div>
                    <a href="#demo" class="btn btn-primary">Get a Demo <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="mod-panel" id="tab-communication">
                    <h3 class="mod-panel-title">Communication Hub</h3>
                    <p class="mod-panel-sub">Send bulk SMS, WhatsApp messages, in-app notices, and email newsletters to parents,
                        students, and staff instantly.</p>
                    <div class="mod-features">
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Bulk SMS & WhatsApp</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> In-app announcements</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Event & holiday calendar</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Parent-teacher messaging</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Push notifications</div>
                        <div class="mod-feat-item"><i class="fas fa-check"></i> Email newsletter builder</div>
                    </div>
                    <a href="#demo" class="btn btn-primary">Get a Demo <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<x-demorequest></x-demorequest>
<x-testimonial></x-testimonial>
<x-pricing></x-pricing>
<x-cta></x-cta>
@endsection