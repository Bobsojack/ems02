<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Userdashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <div class="effect1">
            <a href="{{route('showUser')}}">
                <div class="Bluebox">
                    <img src="img/checklist.png" alt="" class="icon" >
                    <span class="text">รายการทั้งหมด</span>
                    {{-- <h1> {{ Auth::users()->name }}</h1> --}}
                </div>
            </a>
        </div>
        <div class="effect2">
            <a href="{{route('users.Userborrow')}}">
                <div class="Yellowbox" >
                    <img src="img/Product.png" alt="" class="icon" style="margin-left: 40px;"> 
                    <span style="margin-left: 40px;">จัดยืมรายการ</span>
                </div>
            </a>
        </div>
        
        <div class="effect3">
            <a href="page3.html">
                <div class="Greenbox">
                    <img src="img/Return.png" alt="" class="icon" style="margin-left: 40px;"> 
                    <span style="margin-left: 40px;">จัดคืนรายการ</span>
                </div>
            </a>
        </div>
        
        <div class="effect5">
            <a href="page3.html">
                <div class="greybox">
                    <img src="img/Return.png" alt="" class="icon" style="margin-left: 40px;"> 
                    <span style="margin-left: 40px;">จัดคืนรายการ</span>
                </div>
            </a>
        </div>
        
        <div class="effect4">
            <a href="{{route('showname')}}">
                <div class="redbox">
                    <img src="img/Damaged.png" alt="" class="icon" style="margin-left: 40px;">
                    <span style="margin-left: 40px;">แจ้งซ่อม</span>
                </div>
            </a>
        </div>
        
    </div>
</body>

</html>