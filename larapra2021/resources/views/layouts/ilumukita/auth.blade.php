<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title>{{ config('app.name', 'Laravel') }}</title>
   
   <link href="{{ asset('vendor/ilumukita/my-auth/css/auth.css') }}" rel="stylesheet">
</head>

<body class="bg-primary">
   <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
         <main>
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-5">
                     <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                           <h3 class="text-center font-weight-light my-4">
                              @yield('title')
                           </h3>
                        </div>
                        <div class="card-body">
                           @yield('content')
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>
      </div>
      <div id="layoutAuthentication_footer">
         @include('layouts.ilumukita._auth.footer')
      </div>
   </div>
   <script src="{{ asset('vendor/ilumukita/jquery/jquery-3.6.0.min.js')}}" defer></script>
   <script src="{{ asset('vendor/ilumukita/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
   <script src="{{ asset('vendor/ilumukita/my-auth/js/auth.js')}}" defer></script>
</body>

</html>
