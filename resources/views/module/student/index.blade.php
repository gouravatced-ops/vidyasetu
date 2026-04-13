<div class="panel">
    <!-- toolbar -->
    <div class="tbl-toolbar">
        <div style="font-family:'Sora',sans-serif;font-size:.95rem;font-weight:700;color:var(--navy);flex:1;">
            All Students
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Home</a>
                <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                <span>All Students</span>
            </div>
        </div>
        <div class="tbl-search">
            <i class="fas fa-hashtag"></i>
            <input type="text" placeholder="# Roll Type Here..." id="rollSearch" oninput="filterTable()">
        </div>
        <div class="tbl-search">
            <i class="fas fa-layer-group"></i>
            <input type="text" placeholder="Type Section..." id="sectionSearch" oninput="filterTable()">
        </div>
        <button class="btn-search" onclick="showToast('Searching...','Filtering student records','info')">
            <i class="fas fa-search" style="margin-right:5px;"></i>SEARCH
        </button>
        @if(auth()->user()->hasAnyRole(['admin','school_admin','super_admin','teacher']))
        <button class="btn-add" onclick="showToast('Add Student','Opening admission form','success')">
            <i class="fas fa-plus"></i> Add Student
        </button>
        @endif
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
                    <th class="chk"><input type="checkbox" id="checkAll" onchange="toggleAll(this)"></th>
                    <th>Roll <button class="sort-btn" onclick="sortTable(1)"><i class="fas fa-sort"></i></button></th>
                    <th>Photo</th>
                    <th>Name <button class="sort-btn" onclick="sortTable(3)"><i class="fas fa-sort"></i></button></th>
                    <th>Gender</th>
                    <th>Parents Name</th>
                    <th>Class <button class="sort-btn" onclick="sortTable(6)"><i class="fas fa-sort"></i></button></th>
                    <th>Section</th>
                    <th>Address</th>
                    <th>Date of Birth <button class="sort-btn"><i class="fas fa-sort"></i></button></th>
                    <th>Mobile No</th>
                    <th>E-mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="studentTbody"></tbody>
        </table>
    </div>

    <!-- pagination -->
    <div id="tblPagination" style="display:none; justify-content:space-between;align-items:center;padding:12px 18px;border-top:1px solid var(--border);flex-wrap:wrap;gap:10px;">
        <span style="font-size:.8rem;color:var(--muted);">Showing <strong>1-17</strong> of <strong>50,000</strong> students</span>
        <div style="display:flex;gap:4px;">
            <button class="btn-search" style="padding:5px 10px;"><i class="fas fa-angle-left"></i></button>
            <button class="btn-search">1</button>
            <button class="btn-search" style="background:var(--yellow);color:var(--navy);">2</button>
            <button class="btn-search">3</button>
            <button class="btn-search" style="padding:5px 10px;"><i class="fas fa-angle-right"></i></button>
        </div>
    </div>
</div>