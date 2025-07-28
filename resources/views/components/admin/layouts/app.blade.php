<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{url('/')}}" data-framework="laravel">
  <head>
    @include('partials.head')
  </head>

  <body>

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Layout Content -->
        <x-admin.layouts.menu.vertical :title="$title ?? null"></x-admin.layouts.menu.vertical>
        <!--/ Layout Content -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <x-admin.layouts.navbar.default :title="$title ?? null"></x-admin.layouts.navbar.default>
          <!--/ Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              {{ $slot }}
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <x-admin.layouts.footer.default :title="$title ?? null"></x-admin.layouts.footer.default>
            <!--/ Footer -->
            <div class="content-backdrop fade"></div>
            <!-- / Content wrapper -->
          </div>
        </div>
        <!-- / Layout page -->
      </div>
    </div>

    <!-- Include Scripts -->
    @include('partials.scripts')
    <!-- / Include Scripts -->
  </body>
</html>
