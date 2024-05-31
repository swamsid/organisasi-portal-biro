<div class="app-brand demo ">
    <a href="{{ route('pekppp.dashboard.pek') }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold">PEKPPP</span>
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
        <a href="{{ route('pekppp.dashboard.pek') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            {{-- <div class="badge bg-primary rounded-pill ms-auto">5</div> --}}
        </a>
    </li>

    @hasanyrole('superadmin')
    <!-- Academy menu start -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-book'></i>
            <div data-i18n="Master">Master</div>
        </a>
        <ul class="menu-sub">
            @role('superadmin')
            <li class="menu-item">
                <a href="{{ route('pekppp.master.periode.index') }}" class="menu-link">
                    <div data-i18n="Periode">Periode</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('pekppp.master.unit-lokus.index') }}" class="menu-link">
                    <div data-i18n="Unit Lokus">Unit Lokus</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('pekppp.master.verifikator.index') }}" class="menu-link">
                    <div data-i18n="Verifikator">Verifikator</div>
                </a>
            </li>
            @endrole
            {{-- <li class="menu-item">
                <a href="{{ route('pekppp.master.tanda-tangan.index') }}" class="menu-link">
                    <div data-i18n="Tanda Tangan">Tanda Tangan</div>
                </a>
            </li> --}}
        </ul>
    </li>
    @endhasanyrole
    @hasanyrole('superadmin|admin')
    <!-- Academy menu start -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-book'></i>
            <div data-i18n="Master Soal">Master Soal</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('pekppp.master.formf1.index') }}" class="menu-link">
                    <div data-i18n="FO1">FO1</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('pekppp.master.master-f02.index') }}" class="menu-link">
                    <div data-i18n="FO2">FO2</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('pekppp.master.master-f03.index') }}" class="menu-link">
                    <div data-i18n="FO3">FO3</div>
                </a>
            </li>
        </ul>
    </li>
    @endhasanyrole
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-book'></i>
            <div data-i18n="Penilaian">Penilaian</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('pekppp.penilaian.f01.index') }}" class="menu-link">
                    <div data-i18n="Pilih Unit">Pilih Unit</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('pekppp.penilaian.timeline') }}" class="menu-link">
                    <div data-i18n="Timeline">Timeline</div>
                </a>
            </li>
        </ul>
    </li>
</ul>