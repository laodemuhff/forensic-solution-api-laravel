<!DOCTYPE html>
  <html lang="en">
    <head>
  @include('partials._head')

    </head>

    <body>
      
      @include('partials._nav')
      <!-- default navbar -->

   @include('partials._messages')


   @yield('content')

   @include('partials._footer')


      @include('partials._javascript')

      @yield('scripts')

    </body>
  </html>
