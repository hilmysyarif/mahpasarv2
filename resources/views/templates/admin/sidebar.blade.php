  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="{{ route('admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">SALES</li>      
        <li class="">
          <a href="{{ route('admin.order.index') }}">
            <i class="fa fa-shopping-cart"></i>
            <span>Sales Order</span>            
          </a>         
        </li>
        <li class="header">MASTER DATA</li>      
        <li class="">
          <a href="{{ route('admin.categories.index') }}">
            <i class="fa fa-tags"></i>
            <span>Categories</span>
          </a>
        </li>  

        <li class="">
          <a href="{{ route('admin.product.index') }}">
            <i class="fa fa-gg-circle"></i>
            <span>Products</span>
          </a>
        </li>    

        <li class="">
          <a href="{{ route('admin.vouchers.index') }}">
            <i class="fa fa-gg-circle"></i>
            <span>Upgrade Voucher</span>
          </a>
        </li>    

        <li class="header">SYSTEM CONFIGURATON</li> 
        <li class="">
          <a href="{{ route('admin.order_status.index') }}">
            <i class="fa fa-list-alt"></i>
            <span>Order Status</span>      
          </a>
        </li>       
        <li class="">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>System</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><i class="fa fa-circle-o"></i> Users</a></li>
          </ul>
        </li>      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
