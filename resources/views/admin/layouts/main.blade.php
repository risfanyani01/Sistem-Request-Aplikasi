<!DOCTYPE html>
<html lang="en">
  @include('admin.partials.header')
  <body>

     @include('admin.partials.navbar')

      <div class="container-fluid page-body-wrapper">
       @include('admin.partials.sidebar')
      
       @yield('content')
      
    @include('admin.partials.scripts')
  </body>
</html>