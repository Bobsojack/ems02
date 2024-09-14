<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow and Return Equipment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 45%;
            padding: 20px;
            box-sizing: border-box;
        }

        .card-header {
            background-color: #2b91d9;
            border-radius: 8px 8px 0 0;
            padding: 10px;
            text-align: center;
            color: white;
            font-size: 1.2em;
            font-weight: bold;
        }

        .card img {
            width: 100%;
            border-radius: 8px;
        }

        .card-content {
            text-align: center;
            margin-top: 20px;
        }

        .card-content h3 {
            color: #5c2d91;
        }

        .card-content p {
            color: #555;
        }

        .card-content button {
            background-color: #5c2d91;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .card-content button:hover {
            background-color: #703eb3;
        }
        /* Background overlay */
        .modal-backdrop.show {
            opacity: 0.8;
        }

        /* Modal Header */
        .modal-header {
            background-color: #007bff;
            color: white;
            border-bottom: none;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        /* Modal Title */
        .modal-title {
            font-weight: bold;
            font-size: 1.5rem;
        }

        /* Close button */
        .modal-header .btn-close {
            background-color: white;
            opacity: 0.6;
        }

        .modal-header .btn-close:hover {
            opacity: 1;
        }

        /* Modal Body */
        .modal-body {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Form Labels */
        .form-label {
            font-weight: bold;
            color: #333;
        }

        /* Form Selects */
        .form-select {
            border-radius: 4px;
            border: 1px solid #ced4da;
            box-shadow: none;
            transition: border-color 0.2s;
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Submit Button */
        .modal-content .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 4px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .modal-content .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Borrow Equipment Card -->
        <div class="card">
            <div class="card-header">
                Borrow Equipment
            </div>
            <img>
            <div class="card-content">
                <img src="{{ asset('img/Emss.jpg') }}" alt="">
                <h3>การยืม อุปกรณ์</h3>
                <p>การยืมอุปกรณ์ ทำยืมแล้วต้องคืนตามระยะเวลาที่กำหนดและเมื่อยืมแล้วต้องรออนุมัติจากผู้ดูแลระบบก่อน</p>
                <div class="mb-3">
                    <div class="d-grid">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#borrowModal">Button</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap Modal -->
        <div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="borrowModalLabel">Borrow Equipment Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="mb-3">
                                <label for="groupOfEquipment" class="form-label">Group of Equipment</label>
                                <select class="form-select" id="groupOfEquipment">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="serialNo" class="form-label">Serial No</label>
                                <select class="form-select" id="serialNo">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nameEquipment" class="form-label">Name of Equipment</label>
                                <select class="form-select" id="nameEquipment">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <select class="form-select" id="location">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="startingDate" class="form-label">Starting Date</label>
                                <select class="form-select" id="startingDate">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="company" class="form-label">Company</label>
                                <select class="form-select" id="company">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Return Equipment Card -->
        <div class="card">
            <div class="card-header">
                Return Equipment
            </div>
            <img>
            <div class="card-content">
                <img src="{{ asset('img/icon.jpg') }}" alt="">
                <h3>การคืน อุปกรณ์</h3>
                <p>การคืนอุปกรณ์ ต้องทำการแจ้งเข้าระบบและรออนุมัติยังจากผู้ดูแลระบบ</p>
                <button ><a href="dashboard"></a>BUTTON</button>
            </div>
        </div>
    </div>

</body>

</html>
