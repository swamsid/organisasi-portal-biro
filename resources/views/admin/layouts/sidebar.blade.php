<div class="app-brand demo ">
    <a href="{{ route('portal.dashboard') }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold">Portal Jatim</span>
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

    <!-- Layouts -->

    @hasanyrole('superadmin')
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Menu">Menu</div>
            </a>

            <ul class="menu-sub">
                @role('superadmin')
                    <li class="menu-item">
                        <a href="{{ route('menu.menu.index') }}" class="menu-link">
                            <div data-i18n="Menu">Menu</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('menu.sub-menu.index') }}" class="menu-link">
                            <div data-i18n="Sub Menu">Sub Menu</div>
                        </a>
                    </li>
                @endrole
            </ul>
        </li>
    @endhasanyrole

    @hasanyrole('admin|superadmin|opd')
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Master">Master</div>
            </a>

            <ul class="menu-sub">
                @role('superadmin')
                    <li class="menu-item">
                        <a href="{{ route('portal.master.kabkot.index') }}" class="menu-link">
                            <div data-i18n="Kabkot">Kabkot</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('portal.master.user.index') }}" class="menu-link">
                            <div data-i18n="User">User</div>
                        </a>
                    </li>
                @else
                    <li class="menu-item">
                        <a href="{{ route('portal.master.user.index') }}" class="menu-link">
                            <div data-i18n="User">User</div>
                        </a>
                    </li>
                @endrole
            </ul>
        </li>
    @endhasanyrole

    <!-- Academy menu start -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-book'></i>
            <div data-i18n="Layanan">Layanan</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('portal.pembuatan.layanans.create') }}" class="menu-link">
                    <div data-i18n="Buat Layanan">Buat Layanan</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('portal.pembuatan.layanans.index') }}" class="menu-link">
                    <div data-i18n="List Layanan">List Layanan</div>
                </a>
            </li>
            @hasanyrole('admin|superadmin|opd')
                <li class="menu-item">
                    <a href="{{ route('portal.verifikasi.layanan.index') }}" class="menu-link">
                        <div data-i18n="Verifikasi Layanan">Verifikasi Layanan</div>
                    </a>
                </li>
            @endhasanyrole
        </ul>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-files'></i>
            <div data-i18n="Berita">Berita</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('portal.pembuatan.beritas.create') }}" class="menu-link">
                    <div data-i18n="Buat Berita">Buat Berita</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('portal.pembuatan.beritas.index') }}" class="menu-link">
                    <div data-i18n="List Berita">List Berita</div>
                </a>
            </li>
            @hasanyrole('admin|superadmin|opd')
                <li class="menu-item">
                    <a href="{{ route('portal.verifikasi.berita.index') }}" class="menu-link">
                        <div data-i18n="Verifikasi Berita">Verifikasi Berita</div>
                    </a>
                </li>
            @endhasanyrole
        </ul>
    </li>
    <li class="menu-item">
        <a href="{{ route('portal.pembuatan.media-informasis.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Media Informasi">Media Informasi</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route('portal.pembuatan.contents.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Content">Content</div>
        </a>
    </li>
    <!-- Academy menu end -->

</ul>
