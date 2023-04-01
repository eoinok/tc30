<!DOCTYPE html>
    <head> 
        <meta charset="UTF-8"> 
        <title>Title TennisClub</title> 
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
        <script src="{{asset('js/app.js')}}"></script>
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
               
    </head> 
    <body > 
        <nav class="navbar navbar-default navbar-static-top"> 
            <ul class="nav navbar-nav"> 
                <li><a href="https://laravel.com/docs">Laravel Documentation</a></li> 
                <li><a href="https://laracasts.com/">Laravel Video Tutorials</a></li>
                <li><a href="https://laracasts.com/">Another Link</a></li>
                 <li><a href="https://laracasts.com/">Another Link</a></li>
                
            </ul> 
        </nav> 
        <div id="page-content-wrapper"> 
            <div class="container-fluid"> 
                <div class="row"> 
                    <div class="col-lg-2"></div> 
                    <div class="col-lg-8"> @yield('content') </div> 
                    <div class="col-lg-2"></div> 
                </div> 
            </div> 
         </div> 
    </body> 
</html>