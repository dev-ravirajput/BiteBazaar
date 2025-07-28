<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{url('/')}}" data-framework="laravel">
  <head>
    @include('partials.head')
  </head>

  <body>

    <x-admin.layouts.auth.split>
      {{ $slot }}
    </x-admin.layouts.auth.split>

    <!-- Include Scripts -->
    @include('partials.scripts')
    <!-- / Include Scripts -->
  </body>
</html>
