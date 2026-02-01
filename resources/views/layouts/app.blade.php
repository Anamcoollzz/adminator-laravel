<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title>
    @yield('title', 'Adminator Dashboard')
  </title>
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
  @stack('css')
  <style>
    #loader {
      transition: all 0.3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000;
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden;
    }



    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
      animation: sk-scaleout 1.0s infinite ease-in-out;
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1.0);
        opacity: 0;
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0);
      }

      100% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
        opacity: 0;
      }
    }
  </style>
  <script defer="defer" src="{{ asset('/') }}runtime.js"></script>
  <script defer="defer" src="{{ asset('/') }}vendor-fullcalendar.js"></script>
  <script defer="defer" src="{{ asset('/') }}vendor-chartjs.js"></script>
  <script defer="defer" src="{{ asset('/') }}vendors.js"></script>
  <script defer="defer" src="{{ asset('/') }}main.js"></script>
</head>

<body class="app">

  <div id="loader">
    <div class="spinner"></div>
  </div>

  <script>
    window.addEventListener('load', function load() {
      const loader = document.getElementById('loader');
      setTimeout(function() {
        loader.classList.add('fadeOut');
      }, 300);
    });
  </script>



  <div>
    @include('includes.sidebar')

    <!-- #Main ============================ -->
    <div class="page-container">
      @include('includes.topbar')

      <!-- ### $App Screen Content ### -->
      @yield('content')

      @include('includes.footer')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      @if (session('success'))
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: "{{ session('success') }}",
          timer: 3000,
          showConfirmButton: false
        });
      @endif

      @if (session('error'))
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: "{{ session('error') }}",
        });
      @endif
    });
  </script>
  @stack('scripts')
</body>

</html>
