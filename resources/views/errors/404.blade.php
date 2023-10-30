<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404</title>

    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            margin-top: 200px;
        }

        h1 {
            font-size: 100px;
            color: #333;
        }

        p {
            font-size: 24px;
            color: #777;
            margin-bottom: 30px;
        }

        a {
            font-size: 18px;
            color: #fff;
            background-color: #3498db;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background-color: #267dbf;
        }
    </style>
</head>



<body>

    <div class="container">
        <h1>Error 404 | <br>
            Page Not Found</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <a href="{{ route('root') }}">Back</a>
    </div>

</body>

</html>
