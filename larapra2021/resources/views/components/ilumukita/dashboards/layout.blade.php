<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title>
      {{ config('app.name') }} - {{ $title }}
   </title>
   <!-- my-dashboard -->
   <link href="{{ asset('vendor/ilumukita/my-dashboard/css/dashboard.css') }}" rel="stylesheet">
   <!-- fontawesome -->
   <script src="{{ asset('vendor/ilumukita/fontawesome-free/js/all.min.js') }}" defer></script>
   <link href="{{ asset('vendor/ilumukita/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
   <!-- icon flag -->
   <link href="{{ asset('vendor/ilumukita/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
</head>

<body>
   <!-- begin:navbar -->
   <x-ilumukita.dashboards.navbar>
   </x-ilumukita.dashboards.navbar>
   <!-- end:navbar -->
   <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
         <x-ilumukita.dashboards.sidebar>
         </x-ilumukita.dashboards.sidebar>
      </div>
      <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid">
               <h2 class="mt-2">
                  <!-- title -->
                  {{ $title }}
               </h2>     
               {{ $breadcrumbs }}

               {{ $slot }}
            </div>
         </main>
         <x-ilumukita.dashboards.footer>
         </x-ilumukita.dashboards.footer>
      </div>
   </div>
   <!-- scripts -->
   <!-- jquery -->
   <script src="{{ asset('vendor/ilumukita/jquery/jquery-3.6.0.min.js')}}" defer></script>
   <!-- bootstrap bundle -->
   <script src="{{ asset('vendor/ilumukita/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
   <!-- my-dashboard -->
   <script src="{{ asset('vendor/ilumukita/my-dashboard/js/dashboard.js') }}" defer></script>
</body>

</html>