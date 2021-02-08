@extends('layouts.app')

@section('content')
  <div class="p-user-show">

    <div class="c-user-profile">
      <div class="profile">

          <div class="profile-image">

            <img src={{ $user->logo_url }} alt="">

          </div>

          <div class="profile-user-settings">

            <h1 class="profile-user-name">{{ $user->name }}</h1>

            <button class="m-btn" btn-type="follow">Follow</button>

            <button aria-label="profile settings" class="btn profile-settings-btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fas fa-cog"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

          </div>

          <div class="profile-stats">

            <ul>
              <li><span class="profile-stat-count">{{ count($user->posts)}}</span> posts</li>
              <li><span class="profile-stat-count">188</span> followers</li>
              <li><span class="profile-stat-count">206</span> following</li>
            </ul>

          </div>

          <div class="profile-bio">

            <p><span class="profile-real-name">Jane Doe</span> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>

          </div>

      </div>
    </div>
    <!-- End of profile section -->

    <div class="c-post-gallery">
      <div class="gallery">
        @foreach ($user->posts as $post)


          <div class="gallery-item" tabindex="0">

            <img src={{ $post->img_url }} class="gallery-image" alt="">

            <div class="gallery-item-info">

              <ul>
                <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 56</li>
                <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>
              </ul>

            </div>

          </div>

        @endforeach
      </div>
    </div>
      <!-- End of gallery -->
  </div>
@endsection
