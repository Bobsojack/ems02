<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment List</title>
    <link rel="stylesheet" href="{{ asset('css/AdminEquipment.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <div class="container">
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
                   
                </div>
            </div>
        </div>

        <table id="equipmentTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Group of Equipment</th>
                    <th>Serial No</th>
                    <th>Name Equipment</th>
                    <th>Cost(Baht)</th>
                    <th>Location</th>
                    <th>Starting Date</th>
                    <th>Status</th>
                    <th>Company</th>
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
</body>

</html>
