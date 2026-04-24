<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">

        {{-- <h2 class="mt-2 text-center">TopFlooring Ltd.</h2> --}}
        <a href="{{ route('admin.dashboard') }}" class="logo logo-normal">
            <img src="{{ asset('assets/img/logo.png') }}" alt="TopFlooring">

        </a>
        <a href="{{ route('admin.dashboard') }}" class="logo-small">
            <img src="{{ asset('assets/img/logo.png') }}" alt="TopFlooring">
        </a>
        <a href="{{ route('admin.dashboard') }}" class="dark-logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="TopFlooring">
        </a>
    </div>
    <!-- /Logo -->
    <div class="modern-profile p-3 pb-0">
        <div class="text-center rounded bg-light p-3 mb-4 user-profile">
            <div class="avatar avatar-lg online mb-3">
                <img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="Img"
                    class="img-fluid rounded-circle">
            </div>
            <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
            <p class="fs-10">System Admin</p>
        </div>
        <div class="sidebar-nav mb-3">
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="chat.html">Chats</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="email.html">Inbox</a></li>
            </ul>
        </div>
    </div>
    <div class="sidebar-header p-3 pb-0 pt-2">
        <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
            <div class="avatar avatar-md onlin">
                <img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="Img"
                    class="img-fluid rounded-circle">
            </div>
            <div class="text-start sidebar-profile-info ms-2">
                <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                <p class="fs-10">System Admin</p>
            </div>
        </div>
        <div class="input-group input-group-flat d-inline-flex mb-4">
            <span class="input-icon-addon">
                <i class="ti ti-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Search in HRMS">
            <span class="input-group-text">
                <kbd>CTRL + / </kbd>
            </span>
        </div>
        <div class="d-flex align-items-center justify-content-between menu-item mb-3">
            <div class="me-3">
                <a href="calendar.html" class="btn btn-menubar">
                    <i class="ti ti-layout-grid-remove"></i>
                </a>
            </div>
            <div class="me-3">
                <a href="chat.html" class="btn btn-menubar position-relative">
                    <i class="ti ti-brand-hipchat"></i>
                    <span
                        class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
                </a>
            </div>
            <div class="me-3 notification-item">
                <a href="activity.html" class="btn btn-menubar position-relative me-1">
                    <i class="ti ti-bell"></i>
                    <span class="notification-status-dot"></span>
                </a>
            </div>
            <div class="me-0">
                <a href="email.html" class="btn btn-menubar">
                    <i class="ti ti-message"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>MAIN MENU</span></li>
                <li>
                    <ul>

                        <li class="submenu">
                            <a href="#" class="active subdrop">
                                <i class="ti ti-user-star"></i><span>Admin</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>

                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('admin.sliders') }}">Sliders</a></li>
                                <li><a href="{{ route('admin.cat') }}">Categories</a></li>
                                <li><a href="{{ route('admin.product') }}">Fleets</a></li>
                                <li><a href="{{ route('admin.customers') }}">Customers</a></li>
                                <li><a href="{{ route('admin.blogs') }}">Blogs</a></li>
                                <li><a href="{{ route('admin.contact') }}">Contact Enquiry</a></li>
                                <li><a href="{{ route('admin.video') }}">Manage Videos</a></li>
                                <li><a href="{{ route('admin.cms') }}">Manage CMS</a></li>

                            </ul>
                        </li>
                        
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
