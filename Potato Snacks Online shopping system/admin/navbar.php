<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php?page=home"><?php echo $_SESSION['setting_name']; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item nav-home" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=home">
            <i class="fa-fw fa fa-dashboard" aria-hidden="true"></i>
            <span class="nav-link-text">ระบบจัดการ</span>
          </a>
        </li>
        <li class="nav-item nav-allusers" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=allusers">
            <i class="fa-fw fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">ผู้ใช้งาน</span>
          </a>
        </li>
        <li class="nav-item nav-orders" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=orders">
            <i class="fa-fw fa fa-list" aria-hidden="true"></i>
            <span class="nav-link-text">คำสั่งซื้อ</span>
          </a>
        </li>
        <li class="nav-item nav-menu" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=menu">
            <i class="fa-fw fa fa-cutlery" aria-hidden="true"></i>
            <span class="nav-link-text">เมนูอาหาร</span>
          </a>
        </li>
        <li class="nav-item nav-categories" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=categories">
            <i class="fa-fw fa fa-cubes" aria-hidden="true"></i>
            <span class="nav-link-text">หมวดหมู่อาหาร</span>
          </a>
        </li>
        <?php if($_SESSION['login_type'] == 1): ?>
          
        <li class="nav-item nav-opening-time" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=opening-time">
            <i class="fa-fw fa fa-clock-o" aria-hidden="true"></i>
            <span class="nav-link-text">เวลาเปิดทำการ</span>
          </a>
        </li>
        
        <li class="nav-item nav-offers-notification" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=offers-notification">
            <i class="fa-fw fa fa-gift" aria-hidden="true"></i>
            <span class="nav-link-text">การแจ้งเตือนโปรโมชัน</span>
          </a>
        </li>
        <li class="nav-item nav-users" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=users">
            <i class="fa-fw fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">ผู้ดูแลระบบ</span>
          </a>
        </li>
        <li class="nav-item nav-site_settings" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
          <a class="nav-link" href="index.php?page=site_settings">
            <i class="fa-fw fa fa-cogs" aria-hidden="true"></i>
            <span class="nav-link-text">ตั้งค่า</span>
          </a>
        </li>
        <?php endif; ?>
        <!-- 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion" aria-expanded="false">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents" style="">
            <li>
              <a href="navbar.html">Navbar</a>
            </li>
            <li>
              <a href="cards.html">Cards</a>
            </li>
          </ul>
        </li>-->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa-fw fa fa-angle-left" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
         <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>  -->
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa-fw fa fa-sign-out" aria-hidden="true"></i>ออกจากระบบ</a>
        </li>
      </ul>
    </div>
  </nav>