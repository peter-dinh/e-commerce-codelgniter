<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/public/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Bảng quản trị</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i>
            <span>Quản lý bán hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Đơn hàng</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kho hàng</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Khuyến mãi</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tag"></i>
            <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo admin_url('product'); ?>"><i class="fa fa-circle-o"></i> Sản phẩm</a></li>
            <li><a href="<?php echo admin_url('catalog'); ?>"><i class="fa fa-circle-o"></i> Danh mục</a></li>
            <li><a href="<?php echo admin_url('brand'); ?>"><i class="fa fa-circle-o"></i> Thương hiệu</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>Nội dung website</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo admin_url('news'); ?>"><i class="fa fa-circle-o"></i> Bài viết</a></li>
            <li><a href="<?php echo admin_url('slide'); ?>"><i class="fa fa-circle-o"></i> Slider</a></li>
            <li><a href="<?php echo admin_url('comment'); ?>"><i class="fa fa-circle-o"></i> Phản hồi</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Upload</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Tài khoản</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo admin_url('admin'); ?>"><i class="fa fa-circle-o"></i> Ban quản trị</a></li>
            <li><a href="<?php echo admin_url('customer'); ?>"><i class="fa fa-circle-o"></i> Khách hàng</a></li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-cog"></i> <span>Cài đặt</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>