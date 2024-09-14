<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    body {
        font-family: "Pridi";
        font-weight: 200;
        font-style: normal;
    }

    .topic {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        /* Ensure spacing below */
    }

    .topic img {
        margin-right: 10px;
        margin-top: 20px;
    }

    .container {
        margin-left: 140px;
    }

    .search-container {
        position: relative;
        margin-left: 160px;
    }


    .search-container input {
        padding-left: 30px;
    }

    .search-container .bi {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 15px;
        color: #6c757d;
    }

    .colum {
        background-color: rgb(199, 241, 241);
        margin-top: 10px;
        text-align: center;
    }

    #equipmentTable {
        width: 80%;
        margin-top: 20px;
        margin-left: 130px;
    }

    #equipmentTable th {
        padding: 10px;
        text-align: center;
    }

    #equipmentTable th:nth-child(1) {
        width: 20%;
    }

    #equipmentTable th:nth-child(2) {
        width: 15%;
    }

    h5 {
        margin-top: 30px;
        text-align: left;
    }

    #searchInput {
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .cart-button {
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .cart-button button {
        display: flex;
        align-items: center;
        padding: 5px 10px;
        font-size: 16px;
    }

    .cart-button i {
        font-size: 10px;
        margin-right: 5px;
    }

    .btn-custom {
        background-color: #007bff;
        color: white;
    }

    .btn-custom-selected {
        background-color: red;
        color: white;

    }

    .pagination-controls {
        text-align: right;
        margin-right: 200px;
    }

    .pagination-controls button {
        padding: 10px 13px;
        font-size: 14px;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        /* จัดตำแหน่งปุ่มไปทางขวา */
        padding: 10px;
        border-top: 1px solid #f9f9f9;
        background-color: #f9f9f9;
        width: 100%;
        /* ให้ขอบของ modal footer ครอบคลุมทั้งหมด */
    }

    .modal-footer .btn {
        min-width: 100px;
        /* กำหนดขนาดขั้นต่ำของปุ่ม */
        padding: 10px;
    }
</style>

<body>

    <div class="container">
        <div class="topic">
            <img src="{{ asset('img/product.png') }}" alt="" style="width: 50px; height: 50px;">
            <h5>หน้าสำหรับยืมครุภัณฑ์</h5>
            <div class="cart-button">
                <button class="btn btn-primary" data-toggle="modal" data-target="#cartModal">
                    <i class="bi bi-cart"></i> รายการ (<span id="itemCount">0</span>)
                </button>
            </div>
        </div>
    </div>
    <div class="search-container">
        <i class="bi bi-search"></i>
        <input type="text" id="searchInput" placeholder="ค้นหา...">
        <div class="btn-group">
            <button type="button" id="categoryButton" class="btn btn-primary dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                เลือกหมวดหมู่
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="setSearchColumn(1, 'Group of Equipment')">Group
                    of Equipment</a>
                <a class="dropdown-item" href="#" onclick="setSearchColumn(2, 'Serial No')">Serial No</a>
                <a class="dropdown-item" href="#" onclick="setSearchColumn(3, 'Name Equipment')">Name
                    Equipment</a>
                <a class="dropdown-item" href="#"
                    onclick="setSearchColumn(4, 'Cost(Baht)')">Cost(Baht)</a>
                <a class="dropdown-item" href="#" onclick="setSearchColumn(5, 'Location')">Location</a>
                <a class="dropdown-item" href="#" onclick="setSearchColumn(6, 'Starting Date')">Starting
                    Date</a>
                <a class="dropdown-item" href="#" onclick="setSearchColumn(7, 'Status')">Status</a>
                <a class="dropdown-item" href="#" onclick="setSearchColumn(8, 'Company')">Company</a>
            </div>
        </div>
    </div>
    </div>

    <table id="equipmentTable" class="table table-striped table-bordered">
        <thead class="colum">
            <tr>
                <th>ประเภท</th>
                <th>หมายเลขซีเรียล</th>
                <th>ชื่อครุภัณฑ์</th>
                <th>ราคา (บาท)</th>
                <th>สถานที่</th>
                <th>วันนำเข้า</th>
                <th>สถานะ</th>
                <th>บริษัท</th>
                <th>ยืม</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipments as $equipment)
            <tr>
                <td>{{ $equipment->GroupofEquipment }}</td>
                <td>{{ $equipment->SerialNo }}</td>
                <td>{{ $equipment->NameEquipment }}</td>
                <td>{{ $equipment->cost }}</td>
                <td>{{ $equipment->location }}</td>
                <td>{{ $equipment->StartingDate }}</td>
                <td>{{ $equipment->Status }}</td>
                <td>{{ $equipment->Company }}</td>
                <td>
                    <button id="selectButton{{ $equipment->SerialNo }}" onclick="toggleSelection('{{ $equipment->SerialNo }}', '{{ $equipment->NameEquipment }}', '{{ $equipment->cost }}', '{{ $equipment->location }}', '{{ $equipment->Status }}')" class="btn btn-custom">เลือก</button>
                </td>

                @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="cartModalLabel">
                        <img src="{{ asset('img/check.png') }}" alt="" style="width: 30px; height: 30px; "> รายการอุปกรณ์ที่เลือก
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Table for selected items -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>หมายเลขซีเรียล</th>
                                <th>ชื่อครุภัณฑ์</th>
                                <th>ราคา (บาท)</th>
                                <th>สถานที่</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            var rowsPerPage = 4; // จำนวนแถวต่อหน้า
                            var currentPage = 1; // หน้าปัจจุบัน
                            var rows = $('#equipmentTable tbody tr'); // แถวทั้งหมดในตาราง
                            var totalRows = rows.length; // จำนวนแถวทั้งหมด
                            var totalPages = Math.ceil(totalRows / rowsPerPage); // จำนวนหน้าทั้งหมด

                            // ฟังก์ชันสำหรับแสดงแถวตามหน้าที่เลือก
                            function displayRows() {
                                // ซ่อนแถวทั้งหมดก่อน
                                rows.hide();

                                // คำนวณแถวที่จะถูกแสดงในแต่ละหน้า
                                var start = (currentPage - 1) * rowsPerPage;
                                var end = start + rowsPerPage;

                                // แสดงเฉพาะแถวในหน้าที่เลือก
                                rows.slice(start, end).show();

                                // ปิดการใช้งานปุ่มถ้าอยู่ที่หน้าแรกหรือหน้าสุดท้าย
                                $('#prevPage').prop('disabled', currentPage === 1);
                                $('#nextPage').prop('disabled', currentPage === totalPages);
                            }

                            // เมื่อคลิกปุ่ม "Next"
                            $('#nextPage').click(function() {
                                if (currentPage < totalPages) {
                                    currentPage++;
                                    displayRows();
                                }
                            });

                            // เมื่อคลิกปุ่ม "Previous"
                            $('#prevPage').click(function() {
                                if (currentPage > 1) {
                                    currentPage--;
                                    displayRows();
                                }
                            });

                            // เริ่มต้นแสดงแถวแรก
                            displayRows();
                        });
                    </script>

                    <div class="row mb-3 text-center">
                        <!-- กำหนดวันยืม อยู่ฝั่งซ้าย -->
                        <div class="col-md-6 text-left">
                            <label class="form-label">
                                <img src="{{asset('img/date.png')}}" alt="" style="width: 30px; height:30px "> กำหนดวันที่เริ่มยืม
                            </label>
                            <input type="date" id="startDate" class="form-control" style="width: 200px; display: inline-block;">
                        </div>

                        <!-- กำหนดวันคืน อยู่ฝั่งขวา -->
                        <div class="col-md-6 text-right">
                            <label class="form-label">
                                <img src="{{asset('img/date.png')}}" alt="" style="width: 30px; height:30px "> กำหนดวันที่คืน
                            </label>
                            <input type="date" id="endDate" class="form-control" style="width: 200px; display: inline-block;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิกรายการ</button>
                        <button type="button" class="btn btn-primary" onclick="confirmSelection()">ยืนยันรายการ</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.querySelector('.btn-primary').addEventListener('click', function() {
                var startDate = document.getElementById('startDate').value;
                var endDate = document.getElementById('endDate').value;

                if (!startDate || !endDate || selectedEquipment.length === 0) {
                    alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                    return;
                }
            });

            function confirmSelection() {
    // ตรวจสอบตัวแปร selectedEquipment ว่ามีรายการอุปกรณ์ถูกเลือกหรือไม่
    console.log("รายการที่ถูกเลือก:", selectedEquipment);

    if (selectedEquipment.length === 0) {
        alert('กรุณาเลือกครุภัณฑ์อย่างน้อยหนึ่งรายการ');
        return;
    }
    let startDate = document.getElementById('startDate').value;
    let endDate = document.getElementById('endDate').value;
    console.log('startDate',startDate);
    console.log('endDate',endDate);

    selectedEquipment.forEach(s=>{
        s.start_date = startDate;
        s.end_date = endDate;
    });


    // แปลงข้อมูล selectedEquipment เป็น JSON เพื่อส่งไปยัง backend
    var jsonData = JSON.stringify(selectedEquipment);
    
    console.log("ข้อมูล JSON ที่จะส่ง:", jsonData); // ตรวจสอบข้อมูลที่จะส่ง

    // ตัวอย่างการส่งข้อมูลไปยัง backend (เช่น ใช้ AJAX)
    fetch('/confirm-borrow', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: jsonData
    })
    .then(response => {
        // ตรวจสอบ status code ของ response
        console.log("Status Code:", response.status);

        // แปลง response เป็น JSON
        return response.json();
    })
    .then(data => {
        // ตรวจสอบข้อมูลที่ backend ตอบกลับมา
        console.log("Response from backend:", data);

        if (data.success) {
            alert('ยืนยันการยืมสำเร็จ!');
            // ล้างข้อมูลที่เลือกทั้งหมด
            selectedEquipment = [];
            updateCartModal();
            updateItemCount();
        } else {
            alert('เกิดข้อผิดพลาดในการยืนยัน: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Fetch Error:', error); // ตรวจสอบข้อผิดพลาดของ fetch
        alert('เกิดข้อผิดพลาดขณะส่งข้อมูล');
    });
}

            document.getElementById('endDate').addEventListener('change', function() {
                var startDate = document.getElementById('startDate').value;
                var endDate = this.value;

                if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
                    alert('วันที่คืนต้องไม่เร็วกว่าวันที่เริ่มยืม');
                    this.value = ''; // ล้างค่า endDate ถ้าผิดเงื่อนไข
                }
            });

            function setSearchColumn(column, categoryName) {
                searchColumn = column;
                document.getElementById('searchInput').placeholder = "ค้นหา " + categoryName + "...";
                document.getElementById('categoryButton').textContent = categoryName;
            }

            function selectDays(button, days) {
                // Get all buttons
                const buttons = document.querySelectorAll('.btn-group .btn');

                // If the clicked button is already selected, deselect it
                if (button.classList.contains('btn-primary')) {
                    button.classList.remove('btn-primary');
                    button.classList.add('btn-outline-primary');
                    console.log("Deselected days:", days);
                } else {
                    // Deselect all buttons
                    buttons.forEach(btn => btn.classList.remove('btn-primary'));
                    buttons.forEach(btn => btn.classList.add('btn-outline-primary'));

                    // Select the clicked button
                    button.classList.remove('btn-outline-primary');
                    button.classList.add('btn-primary');
                    console.log("Selected days:", days);
                }
            }
        </script>

    </div>
    </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // อาร์เรย์สำหรับเก็บข้อมูลอุปกรณ์ที่ถูกเลือก
        var selectedEquipment = [];

        function toggleSelection(serialNo, name, cost, location, status) {
            // ตรวจสอบว่ามีอุปกรณ์นี้อยู่ในรายการแล้วหรือไม่
            var equipmentIndex = selectedEquipment.findIndex(function(equipment) {
                return equipment.serialNo === serialNo;
            });

            var button = document.getElementById('selectButton' + serialNo);

            if (equipmentIndex === -1) {
                // ถ้าอุปกรณ์ยังไม่ถูกเลือก เพิ่มไปยังอาร์เรย์
                selectedEquipment.push({
                    serialNo: serialNo,
                    name: name,
                    cost: cost,
                    location: location,
                    status: status
                });

                // เปลี่ยนสีของปุ่มเพื่อแสดงว่าถูกเลือกแล้ว
                button.classList.remove('btn-custom');
                button.classList.add('btn-custom-selected');
                button.innerText = 'เลือก';
            } else {
                // ถ้าอุปกรณ์ถูกเลือกแล้ว ลบออกจากอาร์เรย์
                selectedEquipment.splice(equipmentIndex, 1);

                // เปลี่ยนสีของปุ่มกลับไปเป็นสีเดิม
                button.classList.remove('btn-custom-selected');
                button.classList.add('btn-custom');
                button.innerText = 'เลือก';
            }

            // อัปเดตตารางในโมดอลด้วยอุปกรณ์ที่ถูกเลือก
            updateCartModal();

            // อัปเดตจำนวนรายการที่ถูกเลือก
            updateItemCount();
        }

        function updateCartModal() {
            var tableBody = document.querySelector('#cartModal tbody');
            tableBody.innerHTML = ''; // ล้างข้อมูลแถวที่มีอยู่

            selectedEquipment.forEach(function(equipment) {
                var row = document.createElement('tr');

                row.innerHTML = `
                <td>${equipment.serialNo}</td>
                <td>${equipment.name}</td>
                <td>${equipment.cost}</td>
                <td>${equipment.location}</td>
                <td>${equipment.status}</td>
            `;

                tableBody.appendChild(row);
            });
        }

        function updateItemCount() {
            // อัปเดตจำนวนอุปกรณ์ที่เลือกไว้
            var itemCount = document.getElementById('itemCount');
            itemCount.innerText = selectedEquipment.length;
        }

        //ส่วนของปุ่มค้นหา
        // ฟังก์ชันสำหรับกรองข้อมูลในตาราง
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var searchText = this.value.toLowerCase();
            var tableRows = document.querySelectorAll('#equipmentTable tbody tr');

            tableRows.forEach(function(row) {
                var rowData = row.innerText.toLowerCase();
                if (rowData.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    <!-- ปุ่มสำหรับเลื่อนหน้า -->
    <div class="pagination-controls">
        <button id="prevPage" class="btn btn-secondary mr-2">ย้อนกลับ</button>
        <button id="nextPage" class="btn btn-primary">ต่อไป</button>
    </div>

</body>

</body>

</html>