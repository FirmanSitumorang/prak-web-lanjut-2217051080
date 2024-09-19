<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>{
        font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            border-radius: 50%;
            margin: 0 auto;
        }
        .info {
            margin-top: 20px;
        }
        .info div {
            background-color: #e0e0e0;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            width: 200px; /* Set fixed width */
            margin: 5px auto; /* Center the div */
        }
    </style>
</head>
<body> 
</head>
<body>

    <div class="container">
        <div class="profile-pic"></div>
        <div class="info">
            <div>{{$nama}}</div>
            <div>{{$kelas}}</div>
            <div>{{$npm}}</div>
        </div>
    </div>

</body>
</html>