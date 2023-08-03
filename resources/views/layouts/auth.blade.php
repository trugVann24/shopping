<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> V-Store </title>

        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
                        
    </head>
    <body>
        <section class="container-login forms">
            
            @yield('content')
            <!-- Signup Form -->

           
        </section>

        <!-- JavaScript -->
        <script src="{{asset('assets/js/auth.js')}}"></script>
        @include('sweetalert::alert')
    </body>
</html>