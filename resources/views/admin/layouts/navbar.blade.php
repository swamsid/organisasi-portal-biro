<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="ti ti-menu-2 ti-sm"></i>
    </a>
</div>


<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Notification -->
        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                data-bs-auto-close="outside" aria-expanded="false">
                <i class="ti ti-bell ti-md"></i>
                {{-- <span class="badge bg-danger rounded-pill badge-notifications">5</span> --}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
                <li class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                        <h5 class="text-body mb-0 me-auto">Notification</h5>
                        <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                class="ti ti-mail-opened fs-4"></i></a>
                    </div>
                </li>
                <li class="dropdown-notifications-list scrollable-container">
                    <ul class="list-group list-group-flush">
                    </ul>
                </li>
                <li class="dropdown-menu-footer border-top">
                    <a href="javascript:void(0);"
                        class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                        View all notifications
                    </a>
                </li>
            </ul>
        </li>
        <!--/ Notification -->

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ asset('backend') }}/img/avatars/1.png" alt class="h-auto rounded-circle">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('backend') }}/img/avatars/1.png" alt
                                        class="h-auto rounded-circle">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-medium d-block">{{ Auth::user()->name }}</span>
                                <small class="text-muted">{{ Auth::user()->getRoleNames()[0] }}</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    @if ($data == 'pekppp')
                        <a class="dropdown-item" href="{{ route('pekppp.setting.profile') }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">Profile saya</span>
                        </a>
                    @elseif ($data == 'kova')
                        <a class="dropdown-item" href="{{ route('rumah-inovasi.setting.profile') }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">Profile saya</span>
                        </a>
                    @else
                        <a class="dropdown-item" href="{{ route('portal.setting.profile') }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">Profile saya</span>
                        </a>
                    @endif
                </li>
                <li>
                    @if ($data == 'pekppp')
                        <a class="dropdown-item" href="{{ asset('assets/panduan_pekppp.pdf') }}">
                            <i class="fa-solid fa-info me-2 ms-2 ti-sm"></i>
                            <span class="align-middle">Panduan PEKPPP</span>
                        </a>
                    @else
                        <a class="dropdown-item" href="{{ asset('assets/panduan_portal.pdf') }}">
                            <i class="fa-solid fa-info me-2 ms-2 ti-sm"></i>
                            <span class="align-middle">Panduan PORTAL</span>
                        </a>
                    @endif
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <form action="{{ route('portal.logout') }}" method="post">
                        @csrf
                        <a class="dropdown-item" href="javascript:;" onclick="parentNode.submit();">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </form>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>
