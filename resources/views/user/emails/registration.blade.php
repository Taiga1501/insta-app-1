<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /*style the registration email with CSS*/
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 3rem;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #8ad7e3;
            padding: 20px;
            box-shadow: 0 0 10px rgba(57, 162, 208, 0.1);}
    </style>
</head>
<body>
    <p>Hi {{$name}} !</p>
    <p>Thank you for registering to Kredo Insta App.</p>
    <p>To begin, visit the website <a href="{{$app_url}}">here</a>.</p>
</body>
</html>