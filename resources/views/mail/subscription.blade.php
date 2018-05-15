<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>idk</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet"> 
    <style>
        body{
    text-align: center;
    font-family:'cairo',sans-serif;
        }


        .header{
            background :#34495e;
            width: 100%;
            padding: 20px;
            color: #fff;
        }

        .content{
            max-width: 550px;
            margin: auto;
            padding: 10px 0;
        }

        .content img{
            width: 100%;
            height: auto;
        }

        .content p{
            font-size: 20px;
        }

        .read-more-btn{
            padding: 10px 40px;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            background: #0984e3;
            margin: 20px;
            display: block;
            text-decoration: none;
        }

        .footer{
            background :#34495e;
            width: 100%;
            padding: 20px;
            color: #fff;
        }
    </style>   
</head>
<body>
    <div class="header">
        <h2>{{$article->heading}}</h2>
    </div>
    <div class="content">
        <img src="/storage/{{$article->image}}" alt="">
        <p>{!!$article->body!!}</p>
        <a href="" class="read-more-btn">تابع القراءة</a>
    </div>
    <div class="footer">
        <h3>website logo/name</h3>
    </div>
</body>
</html>