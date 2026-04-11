<aside id="parentSidebar" class="sidebar bg-white border-r border-gray-200 shadow-sm p-4">
    <div class="mb-6">
        <div class="text-xl font-semibold">Vidyasetu Parent</div>
        <div class="text-sm text-gray-500">Family portal</div>
    </div>
    <nav class="nav flex-column gap-1">
        <a href="{{ route('parent.dashboard') }}" class="d-block px-3 py-2 rounded {{ request()->routeIs('parent.dashboard') ? 'bg-primary text-white' : 'text-dark' }}">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>
        <a href="{{ route('parent.children.index') }}" class="d-block px-3 py-2 rounded {{ request()->routeIs('parent.children.*') ? 'bg-primary text-white' : 'text-dark' }}">
            <i class="fas fa-child me-2"></i> Children
        </a>
        <a href="{{ route('parent.grades.index') }}" class="d-block px-3 py-2 rounded {{ request()->routeIs('parent.grades.*') ? 'bg-primary text-white' : 'text-dark' }}">
            <i class="fas fa-chart-line me-2"></i> Grades
        </a>
        <a href="{{ route('parent.attendance.index') }}" class="d-block px-3 py-2 rounded {{ request()->routeIs('parent.attendance.*') ? 'bg-primary text-white' : 'text-dark' }}">
            <i class="fas fa-calendar-check me-2"></i> Attendance
        </a>
        <a href="{{ route('parent.settings.index') }}" class="d-block px-3 py-2 rounded {{ request()->routeIs('parent.settings.*') ? 'bg-primary text-white' : 'text-dark' }}">
            <i class="fas fa-cog me-2"></i> Settings
        </a>
    </nav>
</aside>
