@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - VidyaSetu')

@section('content')
<!-- ─────────────────────────
    PAGE: DASHBOARD
───────────────────────── -->
<div id="page-dashboard">
    <div class="page-breadcrumb">
        <a href="#">Home</a>
        <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
        <span>Admin Dashboard</span>
    </div>
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

    <!-- CHART + SOCIAL -->
    <div class="row g-3 mb-3">
        <!-- Fee Chart -->
        <div class="col-lg-8">
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-chart-bar"
                            style="color:var(--blue);margin-right:8px;"></i>Fees Collection &
                        Expenses</span>
                    <div class="panel-actions">
                        <button class="pa-btn"><i class="fas fa-chevron-down"></i></button>
                        <button class="pa-btn green"><i class="fas fa-rotate-right"></i></button>
                        <button class="pa-btn red"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="chart-legend">
                        <div class="cl-item">
                            <div class="cl-dot" style="background:#3b82f6;"></div>₹10,000 Collections
                        </div>
                        <div class="cl-item">
                            <div class="cl-dot" style="background:#ef4444;"></div>₹8,000 Fees
                        </div>
                        <div class="cl-item">
                            <div class="cl-dot" style="background:#f5a623;"></div>₹5,000 Expenses
                        </div>
                    </div>
                    <div style="display:flex;gap:0;align-items:flex-end;">
                        <div class="chart-y">
                            <span>100</span><span>75</span><span>50</span><span>25</span><span>0</span>
                        </div>
                        <div class="chart-bars" style="flex:1;">
                            <div class="bar-grp">
                                <div class="bar-item" data-val="₹10,000"
                                    style="background:#3b82f6;height:120px;"></div>
                                <div class="bar-lbl">Collections</div>
                            </div>
                            <div class="bar-grp">
                                <div class="bar-item" data-val="₹8,000"
                                    style="background:#ef4444;height:96px;"></div>
                                <div class="bar-lbl">Fees</div>
                            </div>
                            <div class="bar-grp">
                                <div class="bar-item" data-val="₹5,000"
                                    style="background:#f5a623;height:60px;"></div>
                                <div class="bar-lbl">Expenses</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Social -->
        <div class="col-lg-4">
            <div class="row g-3">
                <div class="col-6 col-lg-12 col-xl-6">
                    <div class="social-card sc-fb">
                        <i class="fab fa-facebook-f sc-icon"></i>
                        <div class="sc-divider"></div>
                        <div class="sc-info">
                            <div class="sc-label">Like us on Facebook</div>
                            <div class="sc-num">30,000</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-12 col-xl-6">
                    <div class="social-card sc-tw">
                        <i class="fab fa-twitter sc-icon"></i>
                        <div class="sc-divider"></div>
                        <div class="sc-info">
                            <div class="sc-label">Follow us on Twitter</div>
                            <div class="sc-num">13,000</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-12 col-xl-6">
                    <div class="social-card sc-gp">
                        <i class="fab fa-google-plus-g sc-icon"></i>
                        <div class="sc-divider"></div>
                        <div class="sc-info">
                            <div class="sc-label">Follow on Google+</div>
                            <div class="sc-num">9,000</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-12 col-xl-6">
                    <div class="social-card sc-li">
                        <i class="fab fa-linkedin-in sc-icon"></i>
                        <div class="sc-divider"></div>
                        <div class="sc-info">
                            <div class="sc-label">Follow on LinkedIn</div>
                            <div class="sc-num">18,000</div>
                        </div>
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

<!-- ─────────────────────────
    PAGE: ALL STUDENTS
───────────────────────── -->
<div id="page-students">
    <div class="page-breadcrumb">
        <a href="#" onclick="navTo('page-dashboard');return false;">Home</a>
        <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
        <span>All Students</span>
    </div>

    <div class="panel">
        <!-- toolbar -->
        <div class="tbl-toolbar">
            <div
                style="font-family:'Sora',sans-serif;font-size:.95rem;font-weight:700;color:var(--navy);flex:1;">
                All Students
            </div>
            <div class="tbl-search">
                <i class="fas fa-hashtag"></i>
                <input type="text" placeholder="# Roll Type Here..." id="rollSearch"
                    oninput="filterTable()">
            </div>
            <div class="tbl-search">
                <i class="fas fa-layer-group"></i>
                <input type="text" placeholder="Type Section..." id="sectionSearch"
                    oninput="filterTable()">
            </div>
            <button class="btn-search"
                onclick="showToast('Searching...','Filtering student records','info')"><i
                    class="fas fa-search" style="margin-right:5px;"></i>SEARCH</button>
            <button class="btn-add"
                onclick="showToast('Add Student','Opening admission form','success')"><i
                    class="fas fa-plus"></i> Add Student</button>
        </div>

        <!-- table skeleton -->
        <div id="tblSkeleton">
            <div class="sk-row">
                <div class="skeleton sk-circle"></div>
                <div class="skeleton sk-cell" style="max-width:80px;"></div>
                <div class="skeleton sk-cell"></div>
                <div class="skeleton sk-cell" style="max-width:60px;"></div>
                <div class="skeleton sk-cell"></div>
            </div>
            <div class="sk-row">
                <div class="skeleton sk-circle"></div>
                <div class="skeleton sk-cell" style="max-width:70px;"></div>
                <div class="skeleton sk-cell"></div>
                <div class="skeleton sk-cell" style="max-width:50px;"></div>
                <div class="skeleton sk-cell"></div>
            </div>
            <div class="sk-row">
                <div class="skeleton sk-circle"></div>
                <div class="skeleton sk-cell" style="max-width:90px;"></div>
                <div class="skeleton sk-cell"></div>
                <div class="skeleton sk-cell" style="max-width:70px;"></div>
                <div class="skeleton sk-cell"></div>
            </div>
            <div class="sk-row">
                <div class="skeleton sk-circle"></div>
                <div class="skeleton sk-cell" style="max-width:60px;"></div>
                <div class="skeleton sk-cell"></div>
                <div class="skeleton sk-cell" style="max-width:80px;"></div>
                <div class="skeleton sk-cell"></div>
            </div>
            <div class="sk-row">
                <div class="skeleton sk-circle"></div>
                <div class="skeleton sk-cell" style="max-width:85px;"></div>
                <div class="skeleton sk-cell"></div>
                <div class="skeleton sk-cell" style="max-width:55px;"></div>
                <div class="skeleton sk-cell"></div>
            </div>
        </div>

        <!-- actual table -->
        <div class="table-responsive" id="studentTableWrap" style="display:none;">
            <table class="custom-table" id="studentTable">
                <thead>
                    <tr>
                        <th class="chk"><input type="checkbox" id="checkAll" onchange="toggleAll(this)">
                        </th>
                        <th>Roll <button class="sort-btn" onclick="sortTable(1)"><i
                                    class="fas fa-sort"></i></button></th>
                        <th>Photo</th>
                        <th>Name <button class="sort-btn" onclick="sortTable(3)"><i
                                    class="fas fa-sort"></i></button></th>
                        <th>Gender</th>
                        <th>Parents Name</th>
                        <th>Class <button class="sort-btn" onclick="sortTable(6)"><i
                                    class="fas fa-sort"></i></button></th>
                        <th>Section</th>
                        <th>Address</th>
                        <th>Date of Birth <button class="sort-btn"><i class="fas fa-sort"></i></button>
                        </th>
                        <th>Mobile No</th>
                        <th>E-mail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="studentTbody"></tbody>
            </table>
        </div>

        <!-- pagination -->
        <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 18px;border-top:1px solid var(--border);flex-wrap:wrap;gap:10px;"
            id="tblPagination" style="display:none;">
            <span style="font-size:.8rem;color:var(--muted);">Showing <strong>1-17</strong> of
                <strong>50,000</strong> students</span>
            <div style="display:flex;gap:4px;">
                <button class="btn-search" style="padding:5px 10px;"><i
                        class="fas fa-angle-left"></i></button>
                <button class="btn-search">1</button>
                <button class="btn-search"
                    style="background:var(--yellow);color:var(--navy);">2</button>
                <button class="btn-search">3</button>
                <button class="btn-search" style="padding:5px 10px;"><i
                        class="fas fa-angle-right"></i></button>
            </div>
        </div>
    </div>
</div><!-- /page-students -->
@endsection