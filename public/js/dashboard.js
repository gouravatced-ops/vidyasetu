
/* ═══════════════════════════════
    PAGE LOADER
═══════════════════════════════ */
window.addEventListener('load', function () {
    setTimeout(function () {
        var l = document.getElementById('pageLoader');
        if (l) {
            l.style.opacity = '0';
            setTimeout(function () { l.style.display = 'none'; }, 400);
        }
        if (document.getElementById('statCards')) {
            loadStatCards();
        }
        if (document.getElementById('studentTbody')) {
            loadStudentTable();
        }
    }, 2000);
});

/* ═══════════════════════════════
    SIDEBAR TOGGLE
═══════════════════════════════ */
var sidebarCollapsed = false;
document.getElementById('sidebarToggle').addEventListener('click', function () {
    sidebarCollapsed = !sidebarCollapsed;
    document.getElementById('sidebar').classList.toggle('collapsed', sidebarCollapsed);
    document.getElementById('mainWrap').classList.toggle('collapsed', sidebarCollapsed);
});
function openMobileSidebar() {
    document.getElementById('sidebar').classList.add('mobile-open');
    document.getElementById('sidebarOverlay').classList.add('show');
}
function closeMobileSidebar() {
    document.getElementById('sidebar').classList.remove('mobile-open');
    document.getElementById('sidebarOverlay').classList.remove('show');
}

/* sub-menu toggle */
function toggleMenu(el, menuId) {
    var all = document.querySelectorAll('.nav-link-item');
    all.forEach(function (i) { if (i !== el) { i.classList.remove('active', 'open'); } });
    el.classList.toggle('open');
    el.classList.add('active');
    var menus = document.querySelectorAll('.sub-menu');
    menus.forEach(function (m) { if (m.id !== menuId) m.classList.remove('open'); });
    var menu = document.getElementById(menuId);
    if (menu) menu.classList.toggle('open');
}

/* ═══════════════════════════════
    NAVIGATION PAGES
═══════════════════════════════ */
function navTo(pageId) {
    document.querySelectorAll('[id^="page-"]').forEach(function (p) { p.style.display = 'none'; });
    document.getElementById(pageId).style.display = 'block';
    if (pageId === 'page-students') loadStudentTable();
    closeMobileSidebar();
}

/* ═══════════════════════════════
    HEADER DROPDOWNS
═══════════════════════════════ */
function toggleDD(id) {
    var all = ['langDD', 'msgDD', 'notifDD', 'profileDD'];
    all.forEach(function (did) {
        var el = document.getElementById(did);
        if (el && did !== id) el.classList.remove('show');
    });
    var target = document.getElementById(id);
    if (target) target.classList.toggle('show');
}
document.addEventListener('click', function (e) {
    if (!e.target.closest('.hdr-actions')) {
        ['langDD', 'msgDD', 'notifDD', 'profileDD'].forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.classList.remove('show');
        });
    }
});

/* ═══════════════════════════════
    TOAST NOTIFICATIONS
═══════════════════════════════ */
var toastIcons = { success: 'fa-check-circle', error: 'fa-exclamation-circle', info: 'fa-info-circle', warning: 'fa-exclamation-triangle' };
function showToast(title, msg, type) {
    type = type || 'info';
    var wrap = document.getElementById('toastWrap');
    var div = document.createElement('div');
    div.className = 'toast-item ' + type;
    div.innerHTML = '<i class="fas ' + toastIcons[type] + ' toast-icon"></i><div><div class="toast-title">' + title + '</div><div class="toast-msg">' + msg + '</div></div><button class="toast-close" onclick="this.closest(\'.toast-item\').remove()"><i class="fas fa-times"></i></button>';
    wrap.appendChild(div);
    setTimeout(function () { if (div.parentNode) div.style.opacity = '0'; setTimeout(function () { if (div.parentNode) div.remove(); }, 400); }, 4000);
}

/* ═══════════════════════════════
    STAT CARDS (skeleton → real)
═══════════════════════════════ */
function loadStatCards() {
    var container = document.getElementById('statCards');
    if (!container) return;
    var stats = [
        { icon: 'fa-user-graduate', val: '50,000', lbl: 'Students', trend: '+320 this month', up: true, ic: 'si-green', bc: 'sc-green' },
        { icon: 'fa-chalkboard-teacher', val: '10,000', lbl: 'Teachers', trend: '+45 this month', up: true, ic: 'si-blue', bc: 'sc-blue' },
        { icon: 'fa-users', val: '15,000', lbl: 'Parents', trend: '+210 this month', up: true, ic: 'si-orange', bc: 'sc-orange' },
        { icon: 'fa-rupee-sign', val: '₹30,000', lbl: 'Total Earnings', trend: '+₹4,200 this week', up: true, ic: 'si-yellow', bc: 'sc-yellow' },
    ];
    container.innerHTML = '';
    stats.forEach(function (s) {
        var col = document.createElement('div');
        col.className = 'col-6 col-lg-3';
        col.innerHTML = '<div class="stat-card ' + s.bc + '"><div class="stat-icon ' + s.ic + '"><i class="fas ' + s.icon + '"></i></div><div><div class="stat-val">' + s.val + '</div><div class="stat-lbl">' + s.lbl + '</div><div class="stat-trend ' + (s.up ? 'trend-up' : 'trend-dn') + '"><i class="fas fa-arrow-' + (s.up ? 'up' : 'down') + '"></i> ' + s.trend + '</div></div></div>';
        container.appendChild(col);
    });
}

/* ═══════════════════════════════
    CALENDAR
═══════════════════════════════ */
var calDate = new Date(); // current date
function buildCalendar() {
    var widget = document.getElementById('calendarWidget');
    if (!widget) return;
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var todayDate = new Date(); // current date object
    var today = todayDate.getDate(); // current day number
    var events = [18]; var highlight = [27];
    var y = calDate.getFullYear(), m = calDate.getMonth();
    var first = new Date(y, m, 1).getDay();
    var daysInMonth = new Date(y, m + 1, 0).getDate();
    var daysInPrev = new Date(y, m, 0).getDate();
    var html = '<div class="cal-nav">';
    html += '<button class="cal-nav-btn" onclick="prevMonth()"><i class="fas fa-angle-left"></i></button>';
    html += '<span class="cal-title">' + months[m] + ' ' + y + '</span>';
    html += '<button class="cal-nav-btn" onclick="nextMonth()"><i class="fas fa-angle-right"></i></button>';
    html += '</div><div class="cal-grid">';
    days.forEach(function (d) { html += '<div class="cal-day-hdr">' + d + '</div>'; });
    for (var i = 0; i < first; i++) { html += '<div class="cal-day other-month">' + (daysInPrev - first + i + 1) + '</div>'; }
    for (var d = 1; d <= daysInMonth; d++) {
        var cls = 'cal-day';
        if (d === today) cls += ' today';
        else if (events.indexOf(d) > -1) cls += ' has-event';
        else if (highlight.indexOf(d) > -1) cls += ' has-event';
        html += '<div class="' + cls + '">' + d + '</div>';
    }
    var rem = (7 - ((first + daysInMonth) % 7)) % 7;
    for (var r = 1; r <= rem; r++)html += '<div class="cal-day other-month">' + r + '</div>';
    html += '</div>';
    widget.innerHTML = html;
}
function prevMonth() { calDate.setMonth(calDate.getMonth() - 1); buildCalendar(); }
function nextMonth() { calDate.setMonth(calDate.getMonth() + 1); buildCalendar(); }
if (document.getElementById('calendarWidget')) {
    buildCalendar();
}

/* ═══════════════════════════════
    STUDENT TABLE
═══════════════════════════════ */
var studentData = [
    { roll: '#2901', name: 'Richi Rozario', gender: 'Female', parent: 'David Smith', cls: '1', sec: 'A', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'RR', avc: '#3b82f6' },
    { roll: '#2902', name: 'Kazi Fahim', gender: 'Male', parent: 'Mike Hussy', cls: '2', sec: 'B', addr: '59, Street, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'KF', avc: '#10b981' },
    { roll: '#2903', name: 'Richi Rozario', gender: 'Female', parent: 'David Smith', cls: '1', sec: 'A', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'RR', avc: '#f97316' },
    { roll: '#2904', name: 'Kazi Fahim', gender: 'Male', parent: 'Mike Hussy', cls: '2', sec: 'B', addr: '59, Street, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'KF', avc: '#7c3aed' },
    { roll: '#2905', name: 'Richi Rozario', gender: 'Female', parent: 'David Smith', cls: '1', sec: 'C', addr: '90 Street, Heavy, Resde', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'RR', avc: '#ef4444' },
    { roll: '#2906', name: 'Richi Rozario', gender: 'Female', parent: 'David Smith', cls: '3', sec: 'A', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'RR', avc: '#0891b2' },
    { roll: '#2907', name: 'Nchi Rozario', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'NR', avc: '#f5a623' },
    { roll: '#2908', name: 'Mchi Rozario', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'MR', avc: '#3b82f6' },
    { roll: '#2909', name: 'Kazi Fahim', gender: 'Male', parent: 'Mike Hussy', cls: '2', sec: 'B', addr: '59, Street, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'KF', avc: '#10b981' },
    { roll: '#2910', name: 'Nchi Rozario', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'NR', avc: '#7c3aed' },
    { roll: '#2911', name: 'Nchi Rozario', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'NR', avc: '#f97316' },
    { roll: '#2912', name: 'Kazi Fahim', gender: 'Male', parent: 'Mike Hussy', cls: '2', sec: 'B', addr: '59, Street, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'KF', avc: '#ef4444' },
    { roll: '#2913', name: 'Dchi Rozario', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'DR', avc: '#0891b2' },
    { roll: '#2914', name: 'Bchi Rozario', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'BR', avc: '#f5a623' },
    { roll: '#2915', name: 'Nchi Rozario', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'NR', avc: '#3b82f6' },
    { roll: '#2916', name: 'Rozario Geo', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'RG', avc: '#10b981' },
    { roll: '#2917', name: 'Nchi Rozario', gender: 'Female', parent: 'David Smith', cls: '5', sec: 'D', addr: 'TA-110, North Sydney', dob: '10/03/2010', mob: '+8812005098', email: 'ndisons@gmail.com', av: 'NR', avc: '#7c3aed' },
];
var tableLoaded = false;
function loadStudentTable() {
    if (tableLoaded) return;
    document.getElementById('tblSkeleton').style.display = 'block';
    document.getElementById('studentTableWrap').style.display = 'none';
    setTimeout(function () {
        renderTable(studentData);
        document.getElementById('tblSkeleton').style.display = 'none';
        document.getElementById('studentTableWrap').style.display = 'block';
        document.getElementById('tblPagination').style.display = 'flex';
        tableLoaded = true;
        showToast('Students Loaded', 'Showing 17 of 50,000 records', 'success');
    }, 1800);
}
function renderTable(data) {
    var tbody = document.getElementById('studentTbody');
    if (!tbody) return;
    var canManageStudents = ['admin', 'school_admin', 'super_admin', 'teacher'].includes(window.userRole);
    tbody.innerHTML = '';
    data.forEach(function (s, i) {
        var tr = document.createElement('tr');
        tr.innerHTML = '<td><input type="checkbox" class="row-check"></td>' +
            '<td><strong>' + s.roll + '</strong></td>' +
            '<td><div class="tbl-avatar" style="background:' + s.avc + ';">' + s.av + '</div></td>' +
            '<td><strong>' + s.name + '</strong></td>' +
            '<td>' + s.gender + '</td>' +
            '<td>' + s.parent + '</td>' +
            '<td><span style="background:#dbeafe;color:#1e40af;padding:2px 8px;border-radius:50px;font-size:.75rem;font-weight:700;">' + s.cls + '</span></td>' +
            '<td>' + s.sec + '</td>' +
            '<td style="max-width:140px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="' + s.addr + '">' + s.addr + '</td>' +
            '<td>' + s.dob + '</td>' +
            '<td>' + s.mob + '</td>' +
            '<td style="color:var(--blue);">' + s.email + '</td>' +
            '<td><div class="tbl-actions">' +
            '<button class="tbl-act-btn tbl-view" title="View" onclick="showToast(\'View Student\',\'Opening ' + s.name + '\\\'s profile\',\'info\')"><i class="fas fa-eye"></i></button>' +
            '<button class="tbl-act-btn tbl-edit" title="Edit" onclick="showToast(\'Edit Student\',\'Opening edit form for ' + s.name + '\',\'info\')"><i class="fas fa-pen"></i></button>' +
            '<button class="tbl-act-btn tbl-del" title="Delete" onclick="confirmDelete(this,\'' + s.name + '\')"><i class="fas fa-trash"></i></button>' +
            '</div></td>';
        tbody.appendChild(tr);
    });
    if (!canManageStudents) {
        tbody.querySelectorAll('.tbl-edit, .tbl-del').forEach(function (btn) { btn.style.display = 'none'; });
    }
}
function toggleAll(cb) {
    document.querySelectorAll('.row-check').forEach(function (c) { c.checked = cb.checked; });
}
function filterTable() {
    var roll = document.getElementById('rollSearch').value.toLowerCase();
    var sec = document.getElementById('sectionSearch').value.toLowerCase();
    var rows = document.querySelectorAll('#studentTbody tr');
    rows.forEach(function (row) {
        var cells = row.querySelectorAll('td');
        var rollVal = cells[1] ? cells[1].textContent.toLowerCase() : '';
        var secVal = cells[7] ? cells[7].textContent.toLowerCase() : '';
        var show = (!roll || rollVal.includes(roll)) && (!sec || secVal.includes(sec));
        row.style.display = show ? '' : 'none';
    });
}
function confirmDelete(btn, name) {
    if (confirm('Delete student: ' + name + '?')) {
        btn.closest('tr').style.opacity = '0.4';
        showToast('Deleted', 'Student ' + name + ' has been removed', 'error');
        setTimeout(function () { btn.closest('tr').remove(); }, 600);
    }
}
var sortDir = {};
function sortTable(col) {
    var tbody = document.getElementById('studentTbody');
    var rows = Array.from(tbody.querySelectorAll('tr'));
    sortDir[col] = !sortDir[col];
    rows.sort(function (a, b) {
        var av = a.querySelectorAll('td')[col].textContent.trim();
        var bv = b.querySelectorAll('td')[col].textContent.trim();
        return sortDir[col] ? av.localeCompare(bv) : bv.localeCompare(av);
    });
    rows.forEach(function (r) { tbody.appendChild(r); });
}

const userName = window.userName;

/* welcome toast on load */
setTimeout(function () { showToast('Welcome back!', userName + ' – Dashboard loaded successfully', 'success'); }, 2600);
