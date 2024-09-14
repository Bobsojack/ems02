<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/home.js') }}"></script> --}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    {{-- bootstrap-5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <script src="{{ mix('js/home.js') }}"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js">
    </script>


</head>
<style>
    body {
        padding: 0;
        margin: 0;

        display: grid;
    }

    .header {
        position: fixed;
        /* border: 2px rgb(15, 14, 14) solid; */
        transition: margin-left 0.5s;
        /* border-bottom: 1px rgb(15, 15, 15) solid; */
        background-color: rgb(83, 82, 82);
        display: flex;
        top: 0;
        /* ติดด้านบนของหน้าจอ */
        left: 0;
        /* ติดด้านซ้ายของหน้าจอ */
        width: 100%;
        /* ให้ header กว้างเต็มหน้าจอ */
        z-index: 1000
    }

    .togglebtn {
        font-size: 15px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
    }

    .togglebtn:hover {
        background-color: #444;
    }

    .main-sidebar {
        /* border: 2px rgb(252, 255, 253) solid; */
        width: 0;
        transition: width 0.5s;
        overflow: hidden;
        /* ซ่อนเนื้อหาที่เกินจากขอบของ sidebar */
        position: fixed;
        /* ทำให้ sidebar ติดขอบซ้าย */
        height: 100%;
        /* ให้สูงเต็มความสูงของหน้าจอ */
        background-color: #343a40;
        /* สีพื้นหลังของ sidebar */
        z-index: 1000;
        /* ทำให้ sidebar อยู่เหนือเนื้อหาอื่น */


    }

    .brand {

        width: 240px;
        height: 59px;
        color: #5cffb3;
        font-size: 20000px
    }


    #main {
        transition: margin-left 0.5s;
        padding: 16px;
        /* border: 1px red solid; */
    }

    .main-container {
        background-color: #ffffff;
        width: auto;
        /* ลดขนาดของ main-container ให้พอดีกับความกว้างของหน้าจอ */
        height: 930px;
        /* เปลี่ยนเป็น px หรือ % ตามความเหมาะสม */

        padding: 20px;
        transition: margin-left 0.5s;
        /* เพิ่มการเคลื่อนไหวเมื่อขยับ */
    }

    /* เมื่อ sidebar เปิด */
    .main-sidebar.open {
        width: 250px;
    }

    .main-container.expanded {
        margin-left: 250px;
    }

    #logout {
        color: #faf1f1
    }

    .user-panel {


        margin-bottom: 20px;
        border: #000000 1px solid;
        margin: 5px;
        background: linear-gradient(45deg, #204dc9, #76f1dd);
        color: #fff;
        height: 80px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        /* แนวตั้งกลาง */
        justify-content: center;

        padding: 10px;
        /* เพิ่ม padding เพื่อลดการล้นของเนื้อหาภายใน */
        box-sizing: border-box;
        /* ใช้ box-sizing เพื่อนับ padding เข้าในขนาด */
        overflow: hidden;
        /* ซ่อนเนื้อหาที่ล้นออกมา */
    }

    .item {

        display: flex;
        height: 65px;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        /* ทำให้ .item กว้างเต็มที่แต่ไม่เกินขอบของ .user-panel */
        max-width: 100%;
        /* จำกัดความกว้างไม่ให้เกินขอบ */
        padding: 0 10px;
        /* เพิ่ม padding ให้ภายใน .item */
        box-sizing: border-box;
        /* ใช้ box-sizing เพื่อนับ padding เข้าในขนาด */
    }

    .user-item {}

    #edit {

        display: flex;
        align-items: center;
        /* แนวตั้งกลาง */
        justify-content: center;
        /* แนวนอนกลาง */
        height: auto;
        width: auto;


    }

    #edit:hover {
        background: none;


    }

    .image-circle {
        width: 60px;
        height: 60px;
        object-fit: cover;

        border-radius: 50%;

    }

    #name {
        color: #0f0f0f;
        text-decoration: none;
        text-align: center;




    }

    .nav-link {
        color: #faf1f1
    }

    .fa {
        color: #111;

    }
</style>

<body>

    <div class="header">
        <div id="main">
            <button id="toggleButton" class="togglebtn" onclick="toggleNav()">&#9776;</button>
        </div>

        <div id="main">
            <a href="\admin\dashboard">
                <i class="fa fa-home fa-2x" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="brand">
            <P style="font-size: 35px;margin-left:10px;">EMS</P>

        </div>
        <!-- Sidebar ->
        <div class="sidebar">
            <!-Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="item">
                <div class="user-item">
                    <img src="{{ route('profile.image') }}" class="image-circle">


                </div>
                <div class="user-item">
                    <a id="name" class="nav-item dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if (Auth::check() && optional (auth::user())->name)
                        {{auth::user()->name}}
                            
                        @endif
                    </a>
                    
                </div>
                <div class="user-item">
                    <a id="edit"class="dropdown-item" href="{{ route('edit.Profile') }}"><i 
                            class="fa-solid fa-gear" aria-hidden="true"></i></a>
                </div>
            </div>


        </div>


        <div class="nav-item">
            <a class=" nav-link"href="{{ route('imems.view') }}">Add master</a>
        </div>

        <div class="nav-item">
            <a class=" nav-link"href="{{ route('upload.index') }}">import equipment</a>
        </div>



        <div class="nav-item" >
                        
                        <a  class="nav-link " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                        


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </ul>
            </nav>
        </div>
        
    </aside>


    <div class="main-container">
        @yield('content')
    </div>
<script>
    function toggleNav() {
        var sidebar = document.querySelector(".main-sidebar");
        var mainContent = document.querySelector(".main-container");
        var header = document.querySelector(".header"); // ใช้ main-container แทน #main

        if (sidebar.style.width === "250px") {
            sidebar.style.width = "0";
            mainContent.style.marginLeft = "0";
            header.style.marginLeft = "0";

        } else {
            sidebar.style.width = "250px";
            mainContent.style.marginLeft = "250px";
            header.style.marginLeft = "250px";
        }
        // Toggle the classes for open sidebar and expanded content
        sidebar.classList.toggle("open");
        mainContent.classList.toggle("expanded");
    }
</script>

</body>
