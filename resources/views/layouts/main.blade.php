<!DOCTYPE html>
<html>
    <head>
        <title>3-dars</title>
        <style>
            .menu li{
                display: inline-block;
            }
            .menu li a{
                background-color: blue;
                border: 1px solid blue;
                padding: 5px 15px;
                color: white;
            }
            .menu li a:hover{
                background-color: white;
                border: 1px solid blue;
                color: blue;
            }
            section{
                color: blue;
            }
            footer{
                color: green;
            }
            header h1{
                color: gray;
            }
        </style>
    </head>

    <body>
        
    @include('blocks.header')


       @yield('content')


    @include('blocks.footer')
       
    </body>
</html>