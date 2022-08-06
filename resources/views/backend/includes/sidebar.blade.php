<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{ asset('images/sipp-logo.png') }}" height="40px" width="40px" alt="">
        </span>
        <span class="app-brand-text menu-text fw-bolder ms-2" style="font-size: 20px">Management</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="{{ url('/') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Vessel -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Vessel</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.vessel.create') }}" class="menu-link">
              <div data-i18n="Without menu">Add Vessel</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.vessel.index') }}" class="menu-link">
              <div data-i18n="Without navbar">Vessel list</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Crew -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Crew</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.crew.create') }}" class="menu-link">
              <div data-i18n="Without menu">Add Crew</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.crew.index') }}" class="menu-link">
              <div data-i18n="Without navbar">Crew list</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
              <div data-i18n="Without navbar">On board Crew</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
              <div data-i18n="Without navbar">On pool Signout Crew</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
              <div data-i18n="Without navbar">General Crew </div>
            </a>
          </li>
        </ul>
      </li>
      <!-- CV Pool -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">CV Pool</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.general-cv.index') }}" class="menu-link">
              <div data-i18n="Without menu">General Format</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Certificate  -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Certificate </div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="layouts-without-menu.html" class="menu-link">
              <div data-i18n="Without menu">General</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
              <div data-i18n="Without navbar">Professional</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
              <div data-i18n="Without navbar">Medical</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
              <div data-i18n="Without navbar">Expaired Certificate List</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- SMS Settings   -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">SMS Settings  </div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="layouts-without-menu.html" class="menu-link">
              <div data-i18n="Without menu">Send SMS</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
      </li> --}}


    </ul>
  </aside>
  <!-- / Menu -->
