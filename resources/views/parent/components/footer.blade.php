<!-- Parent Footer -->
<footer class="bg-white border-top">
    <div class="container-fluid px-3 py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <div class="small text-muted">
                © {{ date('Y') }} VidyaSetu Parent Portal. All rights reserved.
            </div>

            <div class="small text-muted d-flex flex-wrap align-items-center gap-2">
                <span>Need Help?</span>
                <a href="{{ route('parent.support') }}" class="text-primary text-decoration-none">Contact Support</a>
                <span>•</span>
                <a href="{{ route('parent.faq') }}" class="text-primary text-decoration-none">FAQ</a>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="#" class="text-secondary"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-secondary"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-secondary"><i class="fab fa-whatsapp fa-lg"></i></a>
            </div>
        </div>
    </div>
</footer>
