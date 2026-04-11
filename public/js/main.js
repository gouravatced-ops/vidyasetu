function toggleMenu() {
    document.getElementById('mobileMenu').classList.toggle('open');
}
function switchTab(id, el) {
    document.querySelectorAll('.mod-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.mod-panel').forEach(p => p.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('tab-' + id).classList.add('active');
}
function submitDemo(btn) {
    btn.innerHTML = '<i class="fas fa-check"></i> Demo Scheduled! We\'ll contact you soon.';
    btn.style.background = '#22c55e';
    btn.disabled = true;
}
// scroll animation
const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('animate'); } });
}, { threshold: 0.1 });
document.querySelectorAll('.feat-card,.testi-card,.price-card,.stat-item').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(24px)';
    el.style.transition = 'opacity .5s ease, transform .5s ease';
    observer.observe(el);
});
const obsCallback = (entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.opacity = '1';
            e.target.style.transform = 'translateY(0)';
        }
    });
};
const obs2 = new IntersectionObserver(obsCallback, { threshold: 0.1 });
document.querySelectorAll('.feat-card,.testi-card,.price-card,.stat-item').forEach(el => obs2.observe(el));