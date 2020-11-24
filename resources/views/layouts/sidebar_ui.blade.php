<div class="col-2 px-1 bg-secondary border mt-5 bg-white" id="sticky-sidebar">
        <div class="card-header bg-white">
          <h4>{{ Auth::user()->name }}</h4>
        </div>
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion ml-3">
            
            @if(Request::is('profile')) 
            <li class="nav-item active mb-2">
            <a class="nav-link" href="{{ url('/profile') }}" style="display: inline-block;">
              <i class="fa fa-user-circle-o"> </i>
              <span>Akun</span></a>
            </li>
            @else
            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ url('/profile') }}" style="display: inline-block;">
              <i class="fa fa-user-circle-o"> </i>
              <span>Akun</span></a>
            </li>
            @endif

            @if(Request::is('order'))
            <li class="nav-item active mb-2">
            <a class="nav-link" href="{{ url('/order') }}" style="display: inline-block;">
              <i class="fa fa-ticket"></i>
              <span>My Order</span></a>
            </li>
            @else
            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ url('/order') }}" style="display: inline-block;">
              <i class="fa fa-ticket"></i>
              <span>My Order</span></a>
            </li>
            @endif

            <li class="nav-item mb-2">
            <a class="nav-link" href="" style="display: inline-block;">
              <i class="fa fa-cog"></i>
              <span>Pengaturan</span></a>
            </li>

            <li class="nav-item mb-2">
            <a class="nav-link" href="" style="display: inline-block;">
              <i class="fa fa-commenting"></i>
              <span>Inbox</span></a>
            </li>

            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" style="display: inline-block;">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
              <i class="fa fa-sign-out"></i>
              <span>Keluar</span></a>
            </li>

          </ul>
</div>