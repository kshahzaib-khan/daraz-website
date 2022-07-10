 <!-- Sidebar -->

 <div class="sidebar-fixed position-fixed ">



<div class="list-group list-group-flush mt-3">
    
<a href='https://demotestingwebsite.com/Daraz-Website/public/'><h6 class="mb-5"> Daraz</h6></a>

  <a href="{{url('dashboard')}}" class="list-group-item  waves-effect {{ (request()->is('dashboard*')) ? 'active' : '' }}">
    <i class="fa fa-pie-chart mr-3"></i>Dashboard
  </a>
  <a href="#" class="list-group-item list-group-item-action waves-effect ">
    <i class="fa fa-user mr-3"></i>Profile</a>
  <a href="{{url('register-user')}}" class="list-group-item list-group-item-action waves-effect {{ (request()->is('register-user*')) ? 'active' : '' }}">
    <i class="fa fa-users mr-3"></i>Register User</a>

    <div class="dropdown mr-5 ">
        <li class=" nav-link bg-white border-light waves-effect  dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user mr-3"></i>Collection</a>
        </li>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{url('group')}}">Group</a>
          <a class="dropdown-item" href="{{url('category')}}">Categroy</a>
          <a class="dropdown-item" href="{{url('sub-category')}}" >Sub-Categry</a>
          <a class="dropdown-item" href="{{url('product')}}" >Products(Items)</a>

        </div>


      </div>
      <a href="{{url('orders')}}" class="list-group-item list-group-item-action waves-effect {{ (request()->is('order*')) ? 'active' : '' }}">
        <i class="fa fa-first-order mr-3"></i>Order</a>

        <a href="{{url('admin-coupon-view')}}" class="list-group-item list-group-item-action waves-effect {{ (request()->is('admin-coupon-view*')) ? 'active' : ''}}">
            <i class="fa fa-first-order mr-3"></i>Coupon Code</a>

            <a href="{{url('home-slider')}}" class="list-group-item list-group-item-action waves-effect {{ (request()->is('home-slider*')) ? 'active' : ''}}">
                <i class="fa fa-first-order mr-3"></i>Slider</a>
</div>
</div>
<!-- Sidebar -->
