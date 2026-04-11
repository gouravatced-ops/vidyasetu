<!-- ═══ TOP HEADER ═══ -->
<header class="top-header">
    <button class="hdr-mobile-toggle" onclick="openMobileSidebar()"><i class="fas fa-bars"></i></button>
    <div class="hdr-title">Welcome To <span>Vidyasetu</span> School Management System</div>

    <div class="hdr-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Search here...">
    </div>

    <div class="hdr-actions">
        <!-- Language -->
        <div style="position:relative;">
            <button class="hdr-icon-btn" title="Language" onclick="toggleDD('langDD')"><i
                    class="fas fa-globe"></i></button>
            <div class="hdr-dropdown" id="langDD" style="min-width:140px;">
                <div class="dd-item"><i class="fas fa-check" style="color:var(--green);"></i> English</div>
                <div class="dd-item"><i class="fas fa-circle" style="opacity:0;"></i> हिंदी</div>
                <div class="dd-item"><i class="fas fa-circle" style="opacity:0;"></i> বাংলা</div>
            </div>
        </div>

        <!-- Messages -->
        <div style="position:relative;">
            <button class="hdr-icon-btn" onclick="toggleDD('msgDD')">
                <i class="fas fa-envelope"></i>
                <span class="hdr-badge badge-yellow">5</span>
            </button>
            <div class="hdr-dropdown notif-dd" id="msgDD">
                <div class="notif-head">
                    <h6>Messages</h6><span style="font-size:.75rem;color:var(--blue);cursor:pointer;">Mark
                        all read</span>
                </div>
                <div class="notif-item">
                    <div class="notif-dot" style="background:var(--blue);"></div>
                    <div>
                        <div class="notif-text">Priya Gupta sent you a message</div>
                        <div class="notif-time">2 min ago</div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-dot" style="background:var(--green);"></div>
                    <div>
                        <div class="notif-text">Fee reminder sent to parents</div>
                        <div class="notif-time">15 min ago</div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-dot" style="background:var(--yellow);"></div>
                    <div>
                        <div class="notif-text">New admission request received</div>
                        <div class="notif-time">1 hr ago</div>
                    </div>
                </div>
                <div class="notif-foot">View all messages</div>
            </div>
        </div>

        <!-- Notifications -->
        <div style="position:relative;">
            <button class="hdr-icon-btn" onclick="toggleDD('notifDD')">
                <i class="fas fa-bell"></i>
                <span class="hdr-badge badge-red">8</span>
            </button>
            <div class="hdr-dropdown notif-dd" id="notifDD">
                <div class="notif-head">
                    <h6>Notifications</h6><span
                        style="font-size:.75rem;color:var(--blue);cursor:pointer;">Clear all</span>
                </div>
                <div class="notif-item">
                    <div class="notif-dot" style="background:var(--green);"></div>
                    <div>
                        <div class="notif-text">Exam schedule published for Class 10</div>
                        <div class="notif-time">5 min ago</div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-dot" style="background:var(--red);"></div>
                    <div>
                        <div class="notif-text">3 students marked absent today</div>
                        <div class="notif-time">20 min ago</div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-dot" style="background:var(--blue);"></div>
                    <div>
                        <div class="notif-text">Fee collection report ready</div>
                        <div class="notif-time">1 hr ago</div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-dot" style="background:var(--yellow);"></div>
                    <div>
                        <div class="notif-text">New teacher Anjali Kumari onboarded</div>
                        <div class="notif-time">2 hr ago</div>
                    </div>
                </div>
                <div class="notif-foot">View all notifications</div>
            </div>
        </div>

        <!-- Profile -->
        <div style="position:relative;">
            <button class="profile-btn" onclick="toggleDD('profileDD')">
                <img src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&color=7F9CF5&background=EBF4FF' }}"
                        alt="Profile" class="profile-avatar">
                <div class="profile-info d-none d-md-block">
                    <div class="profile-name">{{ auth()->user()->name }}</div>
                    <div class="profile-role">{{ auth()->user()->role->display_name }}</div>
                </div>
                <i class="fas fa-chevron-down"
                    style="font-size:.65rem;color:var(--muted);margin-left:4px;"></i>
            </button>
            <div class="hdr-dropdown" id="profileDD" style="right:0;">
                <div class="dd-header">
                    <div
                        style="font-family:'Sora',sans-serif;font-size:.85rem;font-weight:700;color:var(--navy);">
                        {{ auth()->user()->name }}</div>
                    <div style="font-size:.75rem;color:var(--muted);">{{ auth()->user()->email }}</div>
                    <div style="font-size:.72rem;color:var(--blue);margin-top:2px;">{{ auth()->user()->role->display_name }}</div>
                </div>
                <div class="dd-item"><i class="fas fa-user"></i> My Profile</div>
                <div class="dd-item"><i class="fas fa-cog"></i> Settings</div>
                <div class="dd-item"><i class="fas fa-shield-alt"></i> Privacy & Security</div>
                <div class="dd-item"><i class="fas fa-question-circle"></i> Help Center</div>
                <div class="dd-divider"></div>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf

                    <button
                        type="submit"
                        class="dd-item dd-danger"
                        style="border:none; background:none;"
                        onclick="showToast('Logged out', 'You have been signed out successfully', 'info')">
                        <i class="fas fa-sign-out-alt"></i> Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>