<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="px-1 mb-2" style="background-color:rgba(0, 104, 55);">
    <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
      <span>
        <img alt="AJK Charity Commission" src="{{ url('Images/logo-charity.png') }}" width="100%" />
      </span>
    </a>
  </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-home-smile"></i>
          <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
          {{-- <span class="badge rounded-pill bg-danger ms-auto">5</span> --}}
        </a>
      </li>
     
    
      <!-- Pages -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div class="text-truncate" data-i18n="Account Settings">Demography</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="pages-account-settings-account.html" class="menu-link">
              <div class="text-truncate" data-i18n="Account">Provinces</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pages-account-settings-notifications.html" class="menu-link">
              <div class="text-truncate" data-i18n="Notifications">Districts</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pages-account-settings-connections.html" class="menu-link">
              <div class="text-truncate" data-i18n="Connections">Tehsils</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
          <div class="text-truncate" data-i18n="Authentications">Users</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.users') }}" class="menu-link" target="_blank">
              <div class="text-truncate" data-i18n="Basic">GetUsers</div>
            </a>
          </li>
        </ul>
      </li>
     
     
      <!-- User interface -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-box"></i>
          <div class="text-truncate" data-i18n="User interface">Types</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.types') }}" class="menu-link">
              <div class="text-truncate" data-i18n="Accordion">DropDown Group</div>
            </a>
            <a href="{{ route('admin.items') }}" class="menu-link">
              <div class="text-truncate" data-i18n="Accordion">DropDown Item</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>