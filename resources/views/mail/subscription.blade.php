<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>idk</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet"> 
    <style>
           
        
        .header{
            background :#34495e;
            width: 100%;
            padding: 20px;
            color: #fff;
            text-align: center;
            font-family:'cairo',sans-serif;
        }
        
        .content{
            font-family:'cairo',sans-serif;
            max-width: 550px;
            margin: auto;
            padding: 10px 0;
            text-align: center;
        }
        
        .content img{
            width: 100%;
            height: auto;
            text-align: center;
        }
        
        .content p{
            font-size: 20px;
            text-align: center;
            direction : rtl;
        }
        
        .read-more-btn{
            padding: 10px 40px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background: #0984e3;
            margin: 20px;
            display: block;
            text-decoration: none;
        }
        
        .footer{
            background :#34495e;
            text-align: center;
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
        <a href="http://www.google.com" class="read-more-btn">تابع القراءة</a>
    </div>
    <div class="footer">
        <h3>website logo/name</h3>
    </div>
</body>
</html>