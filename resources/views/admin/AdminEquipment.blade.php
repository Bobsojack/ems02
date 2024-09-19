@extends('layouts.Adminapp')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/AdminEquipment.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="container" id='qrCodeContainer' >
        <h2 style="text-align: left">Equipment List</h2>

        <div class="mb-3">
            <div class="d-grid">
                <div class="search-container">
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
                    <input type="text" id="searchInput" placeholder="ค้นหา...">
                    <a href="{{ route('add.view') }}"><button class="btn btn-primary">Add</button></a>
                    <a href="javascript:void(0);" class="click">
                        <button>Choose File</button></a>
                    <a href="{{ route('upload.index') }}"><button class="btn btn-primary">Import</button></a>
                    <a href="{{ route('export.equipment') }}"><button class="btn btn-success">Export</button></a>
                    {{-- <button class="btn btn-danger" onclick="deleteSelected()">Delete Selected</button> --}}
                </div>
            </div>
        </div>

        <table id="equipmentTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Group of Equipment</th>
                    <th>Serial No</th>
                    <th>Name Equipment</th>
                    <th>Cost(Baht)</th>
                    <th>Location</th>
                    <th>Starting Date</th>
                    <th>Status</th>
                    <th>Company</th>
                    <th>Actions</th>
                    <th>Actions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipments as $equipment)
                    <tr>
                        <td><input type="checkbox" class="select-checkbox" value="{{ $equipment->equipment_id }}"></td>
                        <td>{{ $equipment->GroupofEquipment }}</td>
                        <td>{{ $equipment->SerialNo }}</td>
                        <td>{{ $equipment->NameEquipment }}</td>
                        <td>{{ $equipment->cost }}</td>
                        <td>{{ $equipment->location }}</td>
                        <td>{{ $equipment->StartingDate }}</td>
                        <td>{{ $equipment->Status }}</td>
                        <td>{{ $equipment->Company }}</td>
                        <td>
                            <div>
                                <button class="edit-button" onclick="editEquipment({{ $equipment->equipment_id }})">Edit</button>
                            </div>
                        </td>
                        <td><button class="delete-button" onclick="deleteEquipment({{ $equipment->equipment_id }})">Delete</button>
                        </td>
                        <td>
                            <div id='qrCodeContainer'>
                                <button class="btn btn-info" onclick="generateQRCode({{ $equipment->equipment_id }})">Generate QR
                                    Code</button>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pupup_box">
        <form id="fileForm" action="{{ route('equipment.import') }}" method="POST" enctype="multipart/form-data"
            style="display:none;">
            @csrf
            <input type="file" name="file" id="fileInput" required>
            <button type="submit">Import</button>
        </form>
    </div>
    <script>
        var searchColumn = 0;

        function setSearchColumn(column, categoryName) {
            searchColumn = column;
            document.getElementById('searchInput').placeholder = "ค้นหา " + categoryName + "...";
            document.getElementById('categoryButton').textContent = categoryName;
        }

        $(document).ready(function() {
            var table = $('#equipmentTable').DataTable({
                "pageLength": 5,
                "lengthChange": false,
                "dom": '<"top">rt<"bottom"ip><"clear">',
            });

            $('#searchInput').on('keyup', function() {
                table.columns(searchColumn).search(this.value).draw();
            });

            $('#selectAll').on('click', function() {
                var isChecked = $(this).prop('checked');
                $('.select-checkbox').prop('checked', isChecked);
            });

            window.searchTable = function() {
                table.columns(searchColumn).search($('#searchInput').val()).draw();
            }
        });

        function deleteSelected() {
            var selectedIds = [];
            $('.select-checkbox:checked').each(function() {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length > 0) {
                if (confirm('Are you sure you want to delete the selected equipment?')) {
                    $.ajax({
                        url: '/equipment/delete-multiple',
                        type: 'POST',
                        data: {
                            ids: selectedIds,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert(response.success); // แจ้งผลสำเร็จ
                            location.reload(); // รีโหลดหน้าหลังลบสำเร็จ
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            alert('An error occurred while deleting the items.');
                        }
                    });
                }
            } else {
                alert('Please select at least one item to delete.');
            }
        }

        function deleteEquipment(id) {
            if (confirm('Are you sure you want to delete this equipment?')) {
                $.ajax({
                    url: '/equipment/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }

        function editEquipment(id) {
            window.location.href = '/equipment/' + id + '/edit';
        }

        function generateQRCode(id) {
            $.ajax({
                url: 'admin/AdminEquipment/' + id + '/qr-code',
                type: 'GET',
                success: function(response) {
                    if (response.qr_code) {
                        // แสดง QR Code ใน div ที่กำหนด
                        $('#qrCodeContainer').html(response.qr_code);
                    } else {
                        alert('QR code could not be generated.');
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('An error occurred while generating the QR code.');
                }
            });
        }
    </script>

    <script>
        document.querySelector('.click').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            if (this.files.length > 0) {
                document.getElementById('fileForm').submit();
            }
        });
    </script>
@endsection
