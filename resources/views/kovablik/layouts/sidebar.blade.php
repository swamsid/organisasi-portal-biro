<div class="app-brand demo ">
    <a href="{{ route('rumah-inovasi.dashboard.kova') }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold">Rumah Invonasi</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>



<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            {{-- <div class="badge bg-primary rounded-pill ms-auto">5</div> --}}
        </a>
    </li>

    @role('superadmin')
        <!-- Academy menu start -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-book'></i>
                <div data-i18n="Master">Master</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('rumah-inovasi.master.aspek.index') }}" class="menu-link">
                        <div data-i18n="Aspek">Aspek</div>
                    </a>
                </li>
            </ul>
        </li>
    @endrole
</ul>
