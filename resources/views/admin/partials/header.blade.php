<div class="header">
    <div class="main-header">

        <div class="header-left">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Suave Executive Travel">
            </a>
            {{-- <a href="{{ route('admin.dashboard') }}" class="dark-logo">
                <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Suave Executive Travel">
            </a> --}}
        </div>

        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
            <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>

        <div class="header-user">
            <div class="nav user-menu nav-list">

                <div class="me-auto d-flex align-items-center" id="header-search">
                    <a id="toggle_btn" href="javascript:void(0);" class="btn btn-menubar me-1">
                        <i class="ti ti-arrow-bar-to-left"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-1">
                        <a href="#" class="btn btn-menubar btnFullscreen">
                            <i class="ti ti-maximize"></i>
                        </a>
                    </div>
                    <div class="dropdown profile-dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <span class="avatar avatar-sm online">
                                <img src="{{ asset('assets/img/profiles/avatar-12.jpg') }}" alt="Img"
                                    class="img-fluid rounded-circle">
                            </span>
                        </a>
                        <div class="dropdown-menu shadow-none">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg me-2 avatar-rounded">
                                            <img src="{{ asset('assets/img/profiles/avatar-12.jpg') }}" alt="img">
                                        </span>
                                        <div>
                                            <h5 class="mb-0">{{ $user->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <form method="POST" action="{{ route('logout.user') }}">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item d-inline-flex align-items-center p-0 py-2">
                                            <i class="ti ti-login me-2"></i> Logout
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-end">
                <form method="POST" action="{{ route('logout.user') }}">
                    @csrf
                    <button type="submit" class="dropdown-item logout-btn d-inline-flex align-items-center p-0 py-2">
                        <i class="ti ti-login me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
        <!-- /Mobile Menu -->

    </div>

</div>
