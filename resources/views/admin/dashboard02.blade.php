@extends('layouts.Adminapp')

@section('content')
    <style>
        .row {
            /* background-color: black; */

            margin-top: 70px;
            height: 20%;
            justify-content: center;
            /* จัดตำแหน่งตรงกลางในแนวนอน */
            align-items: center;
            /* border: 1px red solid; */
        }

        .small-box {
            border: 1px solid rgba(0, 0, 0, 0.1);
            /* เพิ่มเส้นขอบเบา ๆ */
            border-radius: 10px;
            width: 240px;
            height: 140px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
            justify-content: center;
            /* จัดตำแหน่งตรงกลางในแนวนอน */
            align-items: center;
            /* จัดตำแหน่งตรงกลางในแนวตั้ง */
            /* กำหนดความสูงของ container */
            position: relative;
            overflow: hidden;
        }

        .small-box .inner {
            padding: 10px;
            /* เพิ่ม padding ภายใน */
        }

        .small-box .icon {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 40px;
            /* ขนาดของไอคอน */
            color: #fff;
            /* สีของไอคอน */
        }

        p {
            font-size: 28px;
            /* border: 1px red solid; */
        }

        .icon {
            height: 5px;
            width: 50px;
            /* border: 1px red solid; */
            /* margin-right: -20px; */
        }

        .small-box-footer {
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            display: block;
            text-align: right;
            padding: 10px;
            background: rgba(0, 0, 0, 0.1);
            /* เพิ่มพื้นหลังบางส่วน */
            color: #fff;
            /* สีของข้อความ */
            text-decoration: none;
            /* ลบขีดเส้นใต้ */


        }
        .small-box-footer:hover{
            color:black;
        }

        .col-lg-3 {
            justify-content: center;
            /* จัดตำแหน่งตรงกลางในแนวนอน */
            align-items: center;
            /* border: 1px red solid; */
            display: flex;
            width: 23%;
            /* border: 1px red solid; */


        }

        #box1 {
            background: linear-gradient(45deg, #5e9e0b, #dafc1e);
            color: #fff;
            /* ปรับสีข้อความให้เห็นชัดขึ้นบนพื้นหลังที่มีการไล่สี */
        }

        #box2 {
            background: linear-gradient(45deg, #26067e, #cf69e9);
            color: #fff;
            /* ปรับสีข้อความให้เห็นชัดขึ้นบนพื้นหลังที่มีการไล่สี */
        }

        #box3 {
            background: linear-gradient(45deg, #fa0800, #dfb707);
            color: #fff;
            /* ปรับสีข้อความให้เห็นชัดขึ้นบนพื้นหลังที่มีการไล่สี */
        }

        #box4 {
            background: linear-gradient(45deg, #d8b800, #e3f540);
            color: #fff;
            /* ปรับสีข้อความให้เห็นชัดขึ้นบนพื้นหลังที่มีการไล่สี */
        }
    </style>


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div id='box1'class="small-box ">
                <div class="inner">
                    {{-- <h3>
                        @if (Auth::check() && optional(auth::equipment())->equipment_id)
                            {{ auth::equipment()->equipment_id }}
                        @else
                        pana
                        @endif
                        
                    </h3> --}}


                    <p>จำนวนครุภัณฑ์</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="/equipment" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div id='box2'class="small-box ">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>ยืมคืนครุภัณฑ์</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div id='box3'class="small-box ">
                <div class="inner">
                    <h3>44</h3>

                    <p>ชำรุจ/เสียหาย</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div id='box4'class="small-box ">
                <div class="inner">
                    <h3>65</h3>

                    <p>Member</p>
                </div>
                <div class="icon">
                    
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
