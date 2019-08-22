<!DOCTYPE html>
  <html lang="en">
    <head>
  @include('admin.partials._head')

    </head>

    <body id="page-top">
      
     @if (Auth::check())
     <div id="wrapper">
     @include('admin.partials._sidebar')

     <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
      @include('admin.partials._nav')

      <div class="container-fluid">
   @include('admin.partials._messages')


   @yield('content')
   </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
   @include('admin.partials._footer')

   <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>
  </div> <!-- end of .container -->

      @include('admin.partials._javascript')

      @yield('scripts')


      @else

<a href="{{ route('login') }}" class="btn btn-dafault">Login</a>

@endif
    </body>
  </html>
