@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - VidyaSetu')

@section('content')
<!-- ─────────────────────────
    PAGE: DASHBOARD
───────────────────────── -->
<div id="page-dashboard">
    <!-- STAT CARDS -->
    <div class="row g-3 mb-4" id="statCards">
        <!-- skeleton initially, replaced by JS -->
        <div class="col-6 col-lg-3">
            <div class="skeleton sk-stat"></div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="skeleton sk-stat"></div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="skeleton sk-stat"></div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="skeleton sk-stat"></div>
        </div>
    </div>

    <!-- CHART ROW -->
    <div class="row g-3 mb-3">
        <!-- Attendance Chart -->
        <div class="col-lg-7">
            <div class="panel panel-compact">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-chart-line"
                            style="color:var(--blue);margin-right:8px;"></i>Attendance Overview</span>
                </div>
                <div class="panel-body">
                    <div class="chart-legend">
                        <div class="cl-item"><div class="cl-dot" style="background:#3b82f6;"></div>Present</div>
                        <div class="cl-item"><div class="cl-dot" style="background:#ef4444;"></div>Absent</div>
                        <div class="cl-item"><div class="cl-dot" style="background:#fbbf24;"></div>Leave</div>
                    </div>
                    <div class="attendance-chart">
                        <div class="attendance-bar" style="height:92%"><span>Mon</span></div>
                        <div class="attendance-bar present" style="height:84%"><span>Tue</span></div>
                        <div class="attendance-bar" style="height:88%"><span>Wed</span></div>
                        <div class="attendance-bar absent" style="height:60%"><span>Thu</span></div>
                        <div class="attendance-bar" style="height:80%"><span>Fri</span></div>
                        <div class="attendance-bar leave" style="height:72%"><span>Sat</span></div>
                        <div class="attendance-bar" style="height:90%"><span>Sun</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fee Pie Chart -->
        <div class="col-lg-5">
            <div class="panel panel-compact">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-coins"
                            style="color:var(--orange);margin-right:8px;"></i>Fee Collection</span>
                </div>
                <div class="panel-body fee-pie-panel">
                    <div class="fee-pie-chart"></div>
                    <div class="fee-legend">
                        <div class="fee-item"><span class="fee-dot paid"></span>Paid 62%</div>
                        <div class="fee-item"><span class="fee-dot due"></span>Due 24%</div>
                        <div class="fee-item"><span class="fee-dot overdue"></span>Overdue 14%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CALENDAR + NOTICE + ACTIVITY -->
    <div class="row g-3">
        <!-- Calendar -->
        <div class="col-lg-5">
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-calendar"
                            style="color:var(--yellow2);margin-right:8px;"></i>Event Calendar</span>
                    <div class="panel-actions">
                        <button class="pa-btn"><i class="fas fa-chevron-down"></i></button>
                        <button class="pa-btn green"><i class="fas fa-rotate-right"></i></button>
                        <button class="pa-btn red"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="panel-body" id="calendarWidget"></div>
            </div>
        </div>
        <!-- Notice Board -->
        <div class="col-lg-4">
            <div class="panel" style="height:100%;">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-clipboard"
                            style="color:var(--orange);margin-right:8px;"></i>Notice Board</span>
                    <div class="panel-actions">
                        <button class="pa-btn"><i class="fas fa-chevron-down"></i></button>
                        <button class="pa-btn green"><i class="fas fa-rotate-right"></i></button>
                        <button class="pa-btn red"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="panel-body" style="max-height:320px;overflow-y:auto;">
                    <div class="notice-item">
                        <div class="notice-date">16 May, 2024</div>
                        <div><span class="notice-author" style="color:var(--blue);">Rajesh
                                Singh</span><span class="notice-ago">5 min ago</span></div>
                        <div class="notice-text">Annual Sports Day scheduled for 20th June. All students
                            must participate in at least one event.</div>
                    </div>
                    <div class="notice-item">
                        <div class="notice-date">16 May, 2024</div>
                        <div><span class="notice-author" style="color:var(--orange);">Priya
                                Gupta</span><span class="notice-ago">55 min ago</span></div>
                        <div class="notice-text">Fee submission deadline extended to 25th May. Late fee
                            ₹200 will apply after that date.</div>
                    </div>
                    <div class="notice-item">
                        <div class="notice-date">16 May, 2024</div>
                        <div><span class="notice-author" style="color:var(--blue);">Rajesh
                                Singh</span><span class="notice-ago">5 min ago</span></div>
                        <div class="notice-text">Parent-teacher meeting on 18th May at 10 AM in the
                            school auditorium.</div>
                    </div>
                    <div class="notice-item">
                        <div class="notice-date">15 May, 2024</div>
                        <div><span class="notice-author" style="color:var(--green);">Anjali
                                Kumari</span><span class="notice-ago">1 hr ago</span></div>
                        <div class="notice-text">School will remain closed on 19th May for local
                            elections. Classes resume on 20th.</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Activities -->
        <div class="col-lg-3">
            <div class="panel" style="height:100%;">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-bolt"
                            style="color:var(--purple);margin-right:8px;"></i>Recent Activities</span>
                    <div class="panel-actions">
                        <button class="pa-btn"><i class="fas fa-chevron-down"></i></button>
                        <button class="pa-btn green"><i class="fas fa-rotate-right"></i></button>
                        <button class="pa-btn red"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="panel-body" style="max-height:320px;overflow-y:auto;">
                    <div class="activity-item">
                        <div class="act-dot" style="background:var(--blue);"></div>
                        <div>
                            <div class="act-time">9 min ago</div>
                            <div class="act-text">You followed <span class="act-link">Olivia
                                    Williamson</span></div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="act-dot" style="background:var(--green);"></div>
                        <div>
                            <div class="act-time">20 min ago</div>
                            <div class="act-text">You <span class="act-link">Subscribed</span> to Harold
                                Fuller</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="act-dot" style="background:var(--yellow);"></div>
                        <div>
                            <div class="act-time">30 min ago</div>
                            <div class="act-text">You updated your profile picture</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="act-dot" style="background:var(--red);"></div>
                        <div>
                            <div class="act-time">35 min ago</div>
                            <div class="act-text">You deleted homepage.psd</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="act-dot" style="background:var(--purple);"></div>
                        <div>
                            <div class="act-time">40 min ago</div>
                            <div class="act-text">Exam schedule updated for Class 10</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="act-dot" style="background:var(--teal);"></div>
                        <div>
                            <div class="act-time">1 hr ago</div>
                            <div class="act-text">Fee report generated for April 2024</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /page-dashboard -->
@endsection