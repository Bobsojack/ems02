<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS</title>
    <link rel="icon" href="img/Product.png">
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Home.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="Navbar" href="">
            <a href="{{ route('users/Home') }}">
            <h4>Equipment Management System</h4>
            </a>
        <div class="menu">
            <div class="effect1">
                <a href="#" onclick="loadPage('{{route('showUser')}}')">รายการทั้งหมด</a>
            </div>

            <div class="effect2">
                <a href="#" onclick="loadPage('users/Userborrow')">จัดยืมรายการ</a>
            </div>

            <div class="effect3">
                <a href="#" onclick="loadPage('return.html')">จัดคืนรายการ</a>
            </div>

            <div class="effect4">
                <a href="#" onclick="loadPage('repair.html')">แจ้งซ่อม</a>
            </div>
        </div>
        <div class="user">
            <i class="bi bi-person-circle icon" id="user-icon"></i>
            <div class="dropdown-menu" id="dropdown-menu">
                <a href="#" class="dropdown-item">Profile</a>
                <div class="nav-item logout">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="iframe-container" href='users.Userdashboard'>
        <iframe id="content-iframe" src="/userdashboard"></iframe>
    </div>

    <script>
        document.getElementById('user-icon').addEventListener('click', function(e) {
            e.stopPropagation();
            var dropdownMenu = document.getElementById('dropdown-menu');
            dropdownMenu.classList.toggle('show');
        });

        window.addEventListener('click', function(e) {
            var dropdownMenu = document.getElementById('dropdown-menu');
            if (!dropdownMenu.contains(e.target) && !document.getElementById('user-icon').contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });

        function loadPage(page) {
            document.getElementById('content-iframe').src = page;
        }
    </script>
</body>

</html>
