<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
       <!-- show app name -->
       {{ config('app.name') }}
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
       <i class="fas fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="language" href="#" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
             
             {{ app()->getLocale() }}
             <i class="flag-icon flag-icon-{{ app()->getLocale() }}"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="language">
             <a class="dropdown-item" href={{ route('ilumukita.localization.switch', ['language' => 'us']) }}>
               {{ __("localization.us") }}
            </a>
             <a class="dropdown-item" href={{ route('ilumukita.localization.switch', ['language' => 'jp']) }}>
               {{ __("localization.jp") }}
            </a>
          </div>
       </li>
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-user fa-fw"></i>
             <!-- show username -->
             {{ Auth::user()->ilumukita_user->name}}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
             <a class="dropdown-item" href="#">Profile</a>
             <div class="dropdown-divider"></div>
            
            {{-- Logout --}}
            <a class="dropdown-item" href={{ route('ilumukita.logout') }}
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                  Logout
            </a>
            <form id="logout-form" action="{{ route('ilumukita.logout') }}" method="POST" style="display: none;">
               @csrf
            </form>
          </div>
       </li>
    </ul>
 </nav>
 