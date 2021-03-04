<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{URL::to('/')}}/home" class="nav-link">Home</a>
    </li>
     <li class="nav-item d-none d-sm-inline-block">
      <!-- <a href="{{URL::to('/')}}/home" class="nav-link">Change Password</a> -->
      <a href="" class="nav-link">Change Password</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block" >
      <a href="" class="nav-link">Logout</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <router-link to="/demo" class="nav-link">Student Details</router-link>
    </li>
  </ul>
</nav>