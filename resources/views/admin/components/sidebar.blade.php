<aside id="sidebar">
    <!-- Brand -->
    <div class="sb-brand">
        <div class="sb-logo">
            <svg viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
        </div>
        <span class="sb-name">Vidyasetu<sup class="sb-tm">TM</sup></span>
        <button class="sb-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    </div>

    <!-- Nav -->
    <nav class="sb-nav">
        <ul style="list-style:none;padding:0;">

            <li class="nav-item">
                <div class="nav-link-item active open" data-tip="Dashboard"
                    onclick="toggleMenu(this,'menu-dash');navTo('page-dashboard')">
                    <span class="nav-icon"><i class="fas fa-th-large"></i></span>
                    <span class="nav-label">Dashboard</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </div>
                <ul class="sub-menu open" id="menu-dash">
                    <li><a href="#" class="active" onclick="return false">Admin</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Parents</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Students"
                    onclick="toggleMenu(this,'menu-students');navTo('page-students')">
                    <span class="nav-icon"><i class="fas fa-user-graduate"></i></span>
                    <span class="nav-label">Students</span>
                    <span class="nav-badge">50K</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </div>
                <ul class="sub-menu" id="menu-students">
                    <li><a href="#" onclick="navTo('page-students');return false">All Students</a></li>
                    <li><a href="#">Student Details</a></li>
                    <li><a href="#">Admit Form</a></li>
                    <li><a href="#">Student Promotion</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Teachers" onclick="toggleMenu(this,'menu-teachers')">
                    <span class="nav-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                    <span class="nav-label">Teachers</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </div>
                <ul class="sub-menu" id="menu-teachers">
                    <li><a href="#">All Teachers</a></li>
                    <li><a href="#">Add Teacher</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Parents" onclick="toggleMenu(this,'menu-parents')">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    <span class="nav-label">Parents</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </div>
                <ul class="sub-menu" id="menu-parents">
                    <li><a href="#">All Parents</a></li>
                    <li><a href="#">Add Parent</a></li>
                </ul>
            </li>

            <li>
                <div class="sb-section">Academic</div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Library" onclick="toggleMenu(this,'menu-lib')">
                    <span class="nav-icon"><i class="fas fa-book"></i></span>
                    <span class="nav-label">Library</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </div>
                <ul class="sub-menu" id="menu-lib">
                    <li><a href="#">Books</a></li>
                    <li><a href="#">Issue / Return</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Class" onclick="toggleMenu(this,'menu-class')">
                    <span class="nav-icon"><i class="fas fa-layer-group"></i></span>
                    <span class="nav-label">Class</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </div>
                <ul class="sub-menu" id="menu-class">
                    <li><a href="#">Manage Classes</a></li>
                    <li><a href="#">Sections</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Subject">
                    <span class="nav-icon"><i class="fas fa-flask"></i></span>
                    <span class="nav-label">Subject</span>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Class Routine">
                    <span class="nav-icon"><i class="fas fa-calendar-alt"></i></span>
                    <span class="nav-label">Class Routine</span>
                </div>
            </li>

            <li>
                <div class="sb-section">Operations</div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Attendance">
                    <span class="nav-icon"><i class="fas fa-clipboard-check"></i></span>
                    <span class="nav-label">Attendance</span>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Exam" onclick="toggleMenu(this,'menu-exam')">
                    <span class="nav-icon"><i class="fas fa-file-alt"></i></span>
                    <span class="nav-label">Exam</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </div>
                <ul class="sub-menu" id="menu-exam">
                    <li><a href="#">Schedule</a></li>
                    <li><a href="#">Results</a></li>
                    <li><a href="#">Report Card</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Transport">
                    <span class="nav-icon"><i class="fas fa-bus"></i></span>
                    <span class="nav-label">Transport</span>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Hostel">
                    <span class="nav-icon"><i class="fas fa-building"></i></span>
                    <span class="nav-label">Hostel</span>
                </div>
            </li>

            <li>
                <div class="sb-section">Communication</div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Notice">
                    <span class="nav-icon"><i class="fas fa-bell"></i></span>
                    <span class="nav-label">Notice</span>
                    <span class="nav-badge">3</span>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Message">
                    <span class="nav-icon"><i class="fas fa-envelope"></i></span>
                    <span class="nav-label">Message</span>
                </div>
            </li>

            <li>
                <div class="sb-section">More</div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Account">
                    <span class="nav-icon"><i class="fas fa-rupee-sign"></i></span>
                    <span class="nav-label">Account</span>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="Map">
                    <span class="nav-icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="nav-label">Map</span>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-item" data-tip="UI Elements">
                    <span class="nav-icon"><i class="fas fa-puzzle-piece"></i></span>
                    <span class="nav-label">UI Elements</span>
                </div>
            </li>

        </ul>
    </nav>

    <!-- Footer -->
    <div class="sb-footer">
        <div class="sb-footer-avatar">KF</div>
        <div class="sb-footer-text"><strong>Kazi Fahim</strong>Administrator</div>
    </div>
</aside>