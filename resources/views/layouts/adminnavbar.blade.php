 <!-- Navbar -->
 <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

      

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">

            <li class="nav-item">

                <div class="dropdown mr-5">
                    <button type="button" class=" nav-link border  rounded bg-white border-light waves-effect  dropdown-toggle" data-toggle="dropdown">
                     {{Auth::user()->name. ''. Auth::user()->lname}}
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">My Profile</a>
                      <a class="dropdown-item" href="#">Other Option</a>

                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                   </a>

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                   </form>
                    </div>
                  </div>

            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->
