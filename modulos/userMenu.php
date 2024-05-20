<style>
  .logo {
    width: 1.5rem !important;
    height: 1.5rem !important;
  }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand w-100 px-4 mt-3">
    <span class="app-brand-logo me-3">
      <img class="logo" src="<?php echo media; ?>assets/img/logo1.png" alt="">
    </span>
    <h5 class="menu-text fw-bolder w-100 pt-3"><?php echo NOMBRE; ?></h5>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-item <?php echo ($page == "dashboard") ? "active" : "" ?>">
      <a href="<?php echo ($page == "dashboard") ? "javascript:void(0);" : "userHome" ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Information</span>
    </li>
    <li class="menu-item  <?php echo ($page == "employees") ? "active" : "" ?>">
      <a href="<?php echo ($page == "employees") ? "javascript:void(0);" : "userPersonal" ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-group"></i>
        <div data-i18n="Personal">Employees</div>
      </a>
    </li>
            
    <li class="menu-item <?php echo ($page == "attendances") ? "active" : "" ?>">
      <a href="<?php echo ($page == "attendances") ? "javascript:void(0);" : "userAsistencias" ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar"></i>
        <div data-i18n="Registros">Attendances</div>
      </a>
    </li>
    <?php include "./modulos/logout.php"; ?>
  </ul>  
</aside>