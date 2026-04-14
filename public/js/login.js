/* ── FLOATING SVG EDUCATION ICONS ── */
(function () {
    var icons = [
        // Book
        '<svg viewBox="0 0 40 40"><rect x="8" y="5" width="20" height="30" rx="2" fill="none" stroke="currentColor" stroke-width="2"/><line x1="8" y1="12" x2="28" y2="12" stroke="currentColor" stroke-width="1.5"/><line x1="12" y1="17" x2="24" y2="17" stroke="currentColor" stroke-width="1.2"/><line x1="12" y1="21" x2="24" y2="21" stroke="currentColor" stroke-width="1.2"/><line x1="12" y1="25" x2="20" y2="25" stroke="currentColor" stroke-width="1.2"/></svg>',
        // Graduation cap
        '<svg viewBox="0 0 40 40"><polygon points="20,8 36,16 20,24 4,16" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M10 18v8c0 3 4.5 6 10 6s10-3 10-6v-8" fill="none" stroke="currentColor" stroke-width="2"/><line x1="36" y1="16" x2="36" y2="26" stroke="currentColor" stroke-width="2"/></svg>',
        // Pencil
        '<svg viewBox="0 0 40 40"><path d="M28 6l6 6L14 32l-8 2 2-8z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><line x1="24" y1="10" x2="30" y2="16" stroke="currentColor" stroke-width="1.5"/></svg>',
        // Flask
        '<svg viewBox="0 0 40 40"><path d="M16 8v12L8 30a2 2 0 001.7 3h18.6A2 2 0 0030 30L22 20V8" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><line x1="14" y1="8" x2="26" y2="8" stroke="currentColor" stroke-width="2"/><circle cx="14" cy="27" r="1.5" fill="currentColor"/><circle cx="22" cy="24" r="1" fill="currentColor"/></svg>',
        // Calculator
        '<svg viewBox="0 0 40 40"><rect x="8" y="5" width="24" height="30" rx="3" fill="none" stroke="currentColor" stroke-width="2"/><rect x="12" y="9" width="16" height="7" rx="1" fill="none" stroke="currentColor" stroke-width="1.5"/><circle cx="14" cy="22" r="1.5" fill="currentColor"/><circle cx="20" cy="22" r="1.5" fill="currentColor"/><circle cx="26" cy="22" r="1.5" fill="currentColor"/><circle cx="14" cy="28" r="1.5" fill="currentColor"/><circle cx="20" cy="28" r="1.5" fill="currentColor"/><circle cx="26" cy="28" r="1.5" fill="currentColor"/></svg>',
        // Globe
        '<svg viewBox="0 0 40 40"><circle cx="20" cy="20" r="14" fill="none" stroke="currentColor" stroke-width="2"/><ellipse cx="20" cy="20" rx="7" ry="14" fill="none" stroke="currentColor" stroke-width="1.5"/><line x1="6" y1="20" x2="34" y2="20" stroke="currentColor" stroke-width="1.5"/><line x1="8" y1="13" x2="32" y2="13" stroke="currentColor" stroke-width="1"/><line x1="8" y1="27" x2="32" y2="27" stroke="currentColor" stroke-width="1"/></svg>',
        // Trophy
        '<svg viewBox="0 0 40 40"><path d="M14 6h12v12a6 6 0 01-12 0V6z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M14 10H8a4 4 0 004 4" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M26 10h6a4 4 0 01-4 4" fill="none" stroke="currentColor" stroke-width="1.5"/><line x1="20" y1="24" x2="20" y2="30" stroke="currentColor" stroke-width="2"/><line x1="14" y1="30" x2="26" y2="30" stroke="currentColor" stroke-width="2"/></svg>',
        // Atom
        '<svg viewBox="0 0 40 40"><circle cx="20" cy="20" r="3" fill="currentColor"/><ellipse cx="20" cy="20" rx="14" ry="6" fill="none" stroke="currentColor" stroke-width="1.5"/><ellipse cx="20" cy="20" rx="14" ry="6" fill="none" stroke="currentColor" stroke-width="1.5" transform="rotate(60 20 20)"/><ellipse cx="20" cy="20" rx="14" ry="6" fill="none" stroke="currentColor" stroke-width="1.5" transform="rotate(120 20 20)"/></svg>',
        // Bus
        '<svg viewBox="0 0 40 40"><rect x="5" y="10" width="30" height="20" rx="3" fill="none" stroke="currentColor" stroke-width="2"/><line x1="5" y1="18" x2="35" y2="18" stroke="currentColor" stroke-width="1.5"/><line x1="20" y1="10" x2="20" y2="30" stroke="currentColor" stroke-width="1"/><circle cx="12" cy="33" r="3" fill="none" stroke="currentColor" stroke-width="1.5"/><circle cx="28" cy="33" r="3" fill="none" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="21" width="6" height="5" rx="1" fill="none" stroke="currentColor" stroke-width="1"/><rect x="25" y="21" width="6" height="5" rx="1" fill="none" stroke="currentColor" stroke-width="1"/></svg>',
        // Music note
        '<svg viewBox="0 0 40 40"><path d="M18 28V12l14-4v16" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="14" cy="28" r="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="28" cy="24" r="4" fill="none" stroke="currentColor" stroke-width="2"/></svg>',
        // Star
        '<svg viewBox="0 0 40 40"><polygon points="20,5 24,15 35,15 26,22 29,33 20,26 11,33 14,22 5,15 16,15" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
        // Compass
        '<svg viewBox="0 0 40 40"><circle cx="20" cy="20" r="14" fill="none" stroke="currentColor" stroke-width="2"/><polygon points="20,10 23,20 20,22 17,20" fill="currentColor" opacity=".5"/><polygon points="20,30 17,20 20,18 23,20" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>'
    ];
    var cols = ['#1e40af', '#f5a623', '#1e40af', '#f97316', '#1e40af', '#f5a623'];
    var wrap = document.getElementById('floats');
    var positions = [
        { l: '3%', t: '8%' }, { l: '88%', t: '5%' }, { l: '6%', t: '55%' }, { l: '92%', t: '50%' },
        { l: '15%', t: '85%' }, { l: '80%', t: '80%' }, { l: '45%', t: '4%' }, { l: '50%', t: '90%' },
        { l: '30%', t: '15%' }, { l: '70%', t: '20%' }, { l: '25%', t: '70%' }, { l: '75%', t: '65%' }
    ];
    icons.forEach(function (svg, i) {
        var pos = positions[i % positions.length];
        var col = cols[i % cols.length];
        var sz = 52 + Math.random() * 36;
        var dur = 9 + Math.random() * 9;
        var del = Math.random() * 7;
        var el = document.createElement('div');
        el.className = 'fi';
        el.style.cssText = 'left:' + pos.l + ';top:' + pos.t + ';width:' + sz + 'px;height:' + sz + 'px;color:' + col + ';animation-duration:' + dur + 's;animation-delay:' + del + 's;';
        el.innerHTML = svg;
        wrap.appendChild(el);
    });
})();

/* ── STATE ── */
var curTab = 'otp', otpSent = false, tmrInt = null, tmrSec = 30, capCode = '';
var pwStep = 1;

/* init */
genCap(false);
swTab('otp');

/* ── TAB SWITCH ── */
function swTab(t) {
    curTab = t;
    document.getElementById('tabBar').dataset.t = t;
    document.getElementById('t1').classList.toggle('on', t === 'pw');
    document.getElementById('t2').classList.toggle('on', t === 'otp');
    document.getElementById('pwPanel').classList.toggle('on', t === 'pw');
    document.getElementById('otpPanel').classList.toggle('on', t === 'otp');
}

/* ══════════════════════
    PASSWORD FLOW
══════════════════════ */
function onEmailType() {
    var v = document.getElementById('pwEmail').value;
    var icn = document.getElementById('emailIcn').querySelector('i');
    var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim());
    document.getElementById('pwEmail').classList.toggle('valid', valid && v !== '');
    document.getElementById('pwEmail').classList.toggle('invalid', !valid && v !== '');
    if (valid) { icn.className = 'fas fa-check-circle'; document.getElementById('emailIcn').style.color = 'var(--green)'; }
    else { icn.className = 'fas fa-envelope'; document.getElementById('emailIcn').style.color = ''; }
    document.getElementById('emailEt').classList.remove('on');
}

function stepContinue() {
    var email = document.getElementById('pwEmail').value.trim();
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById('pwEmail').classList.add('invalid');
        document.getElementById('emailEt').classList.add('on');
        return;
    }
    var btn = document.getElementById('contBtn');
    btn.classList.add('ld'); btn.disabled = true;
    setTimeout(function () {
        btn.classList.remove('ld'); btn.disabled = false;
        btn.style.display = 'none';
        document.getElementById('pwS2').classList.add('show');
        pwStep = 2;
        setPwStep(2);
        setTimeout(function () { document.getElementById('pwIn').focus(); }, 400);
        notify('Email Verified', 'Please enter your password to continue', 'success');
    }, 1000);
}

function stepBack() {
    document.getElementById('pwS2').classList.remove('show');
    document.getElementById('contBtn').style.display = 'flex';
    pwStep = 1; setPwStep(1);
    document.getElementById('pwIn').value = '';
    document.getElementById('capIn').value = '';
    document.getElementById('pwIn').classList.remove('valid', 'invalid');
    document.getElementById('capIn').classList.remove('valid', 'invalid');
    genCap(false);
    setTimeout(function () { document.getElementById('pwEmail').focus(); }, 300);
}

function setPwStep(s) {
    var dots = ['pd1', 'pd2', 'pd3'], lbls = ['pl1', 'pl2', 'pl3'], lines = ['pline1', 'pline2'];
    dots.forEach(function (id, i) {
        var d = document.getElementById(id), l = document.getElementById(lbls[i]);
        d.classList.remove('act', 'dn'); l.classList.remove('act', 'dn');
        if (i + 1 < s) { d.classList.add('dn'); d.innerHTML = '<i class="fas fa-check" style="font-size:.65rem"></i>'; l.classList.add('dn'); }
        else if (i + 1 === s) { d.classList.add('act'); d.textContent = i + 1; l.classList.add('act'); }
        else { d.textContent = i + 1; }
    });
    lines.forEach(function (id, i) {
        document.getElementById(id).classList.toggle('dn', i + 1 < s);
    });
}

function onPwType() {
    var v = document.getElementById('pwIn').value;
    if (v.length >= 6) { document.getElementById('pwEt').classList.remove('on'); }
    if (v.length >= 6) { setPwStep(3); }
}

/* CAPTCHA */
function genCap(notify_user) {
    var chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    capCode = '';
    for (var i = 0; i < 6; i++)capCode += chars[Math.floor(Math.random() * chars.length)];
    document.getElementById('capCode').textContent = capCode;
    document.getElementById('capIn').value = '';
    document.getElementById('capIn').classList.remove('valid', 'invalid');
    document.getElementById('capEt').classList.remove('on');
    if (notify_user) notify('Captcha Refreshed', 'Please re-enter the new code', 'info');
    var ic = document.getElementById('capRefreshIc');
    ic.style.transition = 'transform .4s'; ic.style.transform = 'rotate(360deg)';
    setTimeout(function () { ic.style.transition = ''; ic.style.transform = ''; }, 450);
}

function onCapType() {
    var v = document.getElementById('capIn');
    v.value = v.value.toUpperCase();
    if (v.value === capCode) { v.classList.add('valid'); v.classList.remove('invalid'); document.getElementById('capEt').classList.remove('on'); }
    else if (v.value.length === 6) { v.classList.add('invalid'); v.classList.remove('valid'); document.getElementById('capEt').classList.add('on'); }
    else { v.classList.remove('valid', 'invalid'); document.getElementById('capEt').classList.remove('on'); }
}

function handleSignIn() {
    var email = document.getElementById('pwEmail').value.trim();
    var pw = document.getElementById('pwIn').value;
    var cap = document.getElementById('capIn').value;
    var ok = true;
    if (pw.length < 6) { document.getElementById('pwEt').classList.add('on'); ok = false; }
    if (cap !== capCode) { document.getElementById('capEt').classList.add('on'); document.getElementById('capIn').classList.add('invalid'); ok = false; }
    if (!ok) { notify('Validation Error', 'Please fix the errors and try again', 'error'); return; }
    var btn = document.getElementById('signInBtn');
    btn.classList.add('ld'); btn.disabled = true;
    setTimeout(function () {
        btn.classList.remove('ld'); btn.disabled = false;
        document.getElementById('pwPanel').submit();
    }, 400);
}

function togEye() {
    var i = document.getElementById('pwIn'), ic = document.getElementById('eyeIc');
    i.type = i.type === 'password' ? 'text' : 'password';
    ic.className = i.type === 'password' ? 'fas fa-eye' : 'fas fa-eye-slash';
}

/* ══════════════════════
    OTP FLOW
══════════════════════ */
function onMobType() {
    var v = document.getElementById('mobIn').value;
    var valid = v.length === 10;
    document.getElementById('getOtpBtn').disabled = !valid;
    document.getElementById('otpContBtn').disabled = !valid;
    document.getElementById('mobEt').classList.remove('on');
}

function otpContinue() {
    var mob = document.getElementById('mobIn').value;
    if (mob.length !== 10) {
        document.getElementById('mobEt').classList.add('on');
        return;
    }
    var cBtn = document.getElementById('otpContBtn');
    cBtn.classList.add('ld');
    cBtn.disabled = true;
    doSendOTP();
}

function doSendOTP() {
    var mob = document.getElementById('mobIn').value;
    if (mob.length !== 10) { document.getElementById('mobEt').classList.add('on'); return; }
    var btn = document.getElementById('getOtpBtn');
    btn.disabled = true; document.getElementById('getOtpLbl').textContent = 'Sending…';
    var cBtn = document.getElementById('otpContBtn'); cBtn.classList.add('ld'); cBtn.disabled = true;

    fetch('/send-otp', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ phone: mob })
    })
    .then(function (response) {
        return response.json().then(function (data) {
            if (!response.ok) {
                throw new Error(data.message || 'Failed to send OTP');
            }
            return data;
        });
    })
    .then(function (data) {
        document.getElementById('getOtpLbl').textContent = 'Resend';
        btn.disabled = false;
        otpSent = true;
        document.getElementById('sentTo').textContent = '+91 ' + mob.replace(/(\d{5})(\d{5})/, '$1 $2');
        document.getElementById('otpStep').classList.add('show');
        document.getElementById('otpContBtn').style.display = 'none';
        document.getElementById('mobIn').readOnly = true;
        document.getElementById('otpPhone').value = mob;
        setOtpStep(2);
        startTmr();
        setTimeout(function () { document.getElementById('o1').focus(); }, 120);
        cBtn.classList.remove('ld');
        notify('OTP Sent', '6-digit OTP sent to your mobile number', 'success');
    })
    .catch(function (error) {
        var mob = document.getElementById('mobIn').value;
        btn.disabled = mob.length !== 10;
        document.getElementById('getOtpLbl').textContent = 'Get OTP';
        cBtn.classList.remove('ld');
        cBtn.disabled = mob.length !== 10;
        notify('OTP Error', error.message || 'Unable to send OTP', 'error');
    });
}

function setOtpStep(s) {
    var dots = ['od1', 'od2', 'od3'], lbls = ['ol1', 'ol2', 'ol3'], lines = ['oline1', 'oline2'];
    dots.forEach(function (id, i) {
        var d = document.getElementById(id), l = document.getElementById(lbls[i]);
        d.classList.remove('act', 'dn'); l.classList.remove('act', 'dn');
        if (i + 1 < s) { d.classList.add('dn'); d.innerHTML = '<i class="fas fa-check" style="font-size:.65rem"></i>'; l.classList.add('dn'); }
        else if (i + 1 === s) { d.classList.add('act'); d.textContent = i + 1; l.classList.add('act'); }
        else { d.textContent = i + 1; }
    });
    lines.forEach(function (id, i) { document.getElementById(id).classList.toggle('dn', i + 1 < s); });
}

/* OTP boxes */
function oi(el, i) {
    el.value = el.value.replace(/\D/g, '');
    if (el.value) { el.classList.add('ok'); if (i < 6) document.getElementById('o' + (i + 1)).focus(); }
    else el.classList.remove('ok');
    var all = [1, 2, 3, 4, 5, 6].every(function (n) { return document.getElementById('o' + n).value !== ''; });
    document.getElementById('otpVerifyBtn').disabled = !all;
}
function ok(e, i) { if (e.key === 'Backspace' && !document.getElementById('o' + i).value && i > 1) document.getElementById('o' + (i - 1)).focus(); }

function handleOTPVerify() {
    var code = [1, 2, 3, 4, 5, 6].map(function (i) { return document.getElementById('o' + i).value; }).join('');
    if (code.length !== 6) {
        document.getElementById('otpEt').classList.add('on');
        notify('OTP Required', 'Please enter the full 6-digit OTP', 'error');
        return;
    }
    document.getElementById('otpHidden').value = code;
    document.getElementById('otpPhone').value = document.getElementById('mobIn').value;

    var btn = document.getElementById('otpVerifyBtn');
    btn.classList.add('ld'); btn.disabled = true;
    setTimeout(function () {
        document.getElementById('otpVerifyForm').submit();
    }, 300);
}

function chgNum() {
    clearInterval(tmrInt);
    document.getElementById('mobIn').readOnly = false;
    document.getElementById('otpStep').classList.remove('show');
    document.getElementById('otpContBtn').style.display = 'flex';
    document.getElementById('otpContBtn').classList.remove('ld');
    document.getElementById('otpContBtn').disabled = document.getElementById('mobIn').value.length !== 10;
    document.getElementById('getOtpBtn').disabled = document.getElementById('mobIn').value.length !== 10;
    setOtpStep(1); otpSent = false;
    for (var i = 1; i <= 6; i++) { var b = document.getElementById('o' + i); b.value = ''; b.classList.remove('ok', 'er'); }
    document.getElementById('otpVerifyBtn').disabled = true;
    document.getElementById('otpEt').classList.remove('on');
    document.getElementById('getOtpLbl').textContent = 'Get OTP';
}

/* timer */
function startTmr() {
    tmrSec = 30; var rb = document.getElementById('rsndBtn'); rb.classList.remove('rdy');
    updTmr(); clearInterval(tmrInt);
    tmrInt = setInterval(function () {
        tmrSec--; updTmr();
        if (tmrSec <= 0) { clearInterval(tmrInt); document.getElementById('timerEl').textContent = ''; rb.classList.add('rdy'); }
    }, 1000);
}
function updTmr() { document.getElementById('timerEl').innerHTML = 'Resend in <strong>0:' + String(tmrSec).padStart(2, '0') + '</strong>'; }
function doResend() {
    if (!document.getElementById('rsndBtn').classList.contains('rdy')) return;
    for (var i = 1; i <= 6; i++) { var b = document.getElementById('o' + i); b.value = ''; b.classList.remove('ok', 'er'); }
    document.getElementById('otpVerifyBtn').disabled = true;
    document.getElementById('otpEt').classList.remove('on');
    startTmr(); document.getElementById('o1').focus();
    notify('OTP Resent', 'New OTP sent to your mobile number', 'info');
}

/* ══════════════════════
    SUCCESS
══════════════════════ */
function showSuccess(identifier) {
    document.getElementById('uEmail').textContent = identifier;
    document.getElementById('mainForm').style.display = 'none';
    document.getElementById('cardFoot').style.display = 'none';
    document.getElementById('sucScreen').classList.add('on');
    var c = 5; document.getElementById('cdwn').textContent = c;
    var t = setInterval(function () { c--; document.getElementById('cdwn').textContent = c; if (c <= 0) { clearInterval(t); goDash(); } }, 1000);
    notify('Login Successful', 'Redirecting to dashboard...', 'success');
}
function goDash() { alert('🎉 Opening Vidyasetu Dashboard!\n(In production, this navigates to the admin panel)'); }

/* ══════════════════════
    NOTIFICATIONS
══════════════════════ */
var nTimer = null;
function notify(title, msg, type) {
    clearTimeout(nTimer);
    var icons = {
        success: '<i class="fas fa-check-circle" style="color:var(--green);font-size:1.2rem;margin-top:2px;"></i>',
        error: '<i class="fas fa-exclamation-circle" style="color:var(--red);font-size:1.2rem;margin-top:2px;"></i>',
        info: '<i class="fas fa-info-circle" style="color:var(--blue);font-size:1.2rem;margin-top:2px;"></i>'
    };
    var borders = { success: 'var(--green)', error: 'var(--red)', info: 'var(--blue)' };
    var el = document.getElementById('notif');
    el.style.borderLeftColor = borders[type] || borders.info;
    document.getElementById('nIcon').innerHTML = icons[type] || icons.info;
    document.getElementById('nTitle').textContent = title;
    document.getElementById('nMsg').textContent = msg;
    el.classList.add('on');
    nTimer = setTimeout(function () { el.classList.remove('on'); }, 4000);
}

/* enter key helpers */
document.getElementById('pwEmail').addEventListener('keypress', function (e) { if (e.key === 'Enter') { e.preventDefault(); document.getElementById('contBtn').click(); } });
document.getElementById('mobIn').addEventListener('keypress', function (e) { if (e.key === 'Enter') { e.preventDefault(); document.getElementById('otpContBtn').click(); } });