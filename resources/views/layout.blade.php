<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>News</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            .wrapper{
                width: 900px;
                margin: 0 auto;
            }
            .img{
                width: 200px;
                margin-top: 30px;
            }
            .size{
                font-size: 18px;
            }
            ul>li>a,ul>li>span{
                display: block;
                padding: 10px 15px;
                background-color:bisque;
                margin-right: 5px;
                border-radius: 5px;
            }
            ul>li>span{
                background-color: aqua;
            }
        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>