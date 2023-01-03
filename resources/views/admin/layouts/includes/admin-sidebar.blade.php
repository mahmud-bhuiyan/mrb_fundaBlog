<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active':'' }}" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/add') || Request::is('admin/category/edit/*') ? 'collapse active':'collapsed' }}" style="cursor: pointer;" data-bs-toggle="collapse"
                    data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/category') || Request::is('admin/category/add') || Request::is('admin/category/edit/*') ? 'show':'' }}" id="collapseCategory" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/edit/*') ? 'active':'' }}" href="{{ route('admin.category') }}">All Category</a>
                        <a class="nav-link {{ Request::is('admin/category/add') ? 'active':'' }}" href="{{ url('admin/category/add') }}">Add Category</a>
                    </nav>
                </div>

                <a class="nav-link {{ Request::is('admin/post') || Request::is('admin/post/add') || Request::is('admin/post/edit/*') ? 'collapse active':'collapsed' }}" style="cursor: pointer;"  data-bs-toggle="collapse" data-bs-target="#collapsePost"
                    aria-expanded="false" aria-controls="collapsePost">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/post') || Request::is('admin/post/add') || Request::is('admin/post/edit/*') ? 'show':'' }}" id="collapsePost" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link {{ Request::is('admin/post') || Request::is('admin/post/edit/*') ? 'active':'' }}" href="{{ url('admin/post') }}">All Post</a>
                        <a class="nav-link {{ Request::is('admin/post/add') ? 'active':'' }}" href="{{ url('admin/post/add') }}">Add Post</a>
                    </nav>
                </div>

                <a class="nav-link {{ Request::is('admin/user') ? 'active':'' }}" href="{{ url('admin/user') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    User
                </a>

                <a class="nav-link {{ Request::is('admin/user') ? 'active':'' }}" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
