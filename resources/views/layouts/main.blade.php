<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <title>.:Admin Barang - @yield('title'):.</title>
</head>
<body>
    <div class="container-fluid">
        <!---------Header--------->
        <div class="row">
            <div class="col-md-12 bg-primary py-2">
                <div class="dropdown float-right">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-badge-fill"></i> 
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"><i class="bi bi-person"></i> {{ Auth::user()->name ?? "" }}</a>
                        <a class="dropdown-item" href="/user"><i class="bi bi-person-gear"></i>Change Password</a>
                        <a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!---------Body--------->
        <div class="row vh-100">
            <!---------Menu-------->
            <div class="col-md-2">
                <div class="row mt-4">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link {{ ($key == "Home") ? "active":"" }}" id="v-pills-home-tab" href="/" >Home</a> 
                            <a class="nav-link {{ ($key == "Barang") ? "active":"" }}" id="v-pills-profile-tab" href="/barang">Barang</a> 
                            <a class="nav-link {{ ($key == "Messages") ? "active":"" }}" id="v-pills-messages-tab" href="/">Messages</a>
                            <a class="nav-link {{ ($key == "Settings") ? "active":"" }}" id="v-pills-settings-tab" href="/">Settings</a>
                        </div>
                    </div>
                </div>
            </div>

            <!---------Artikel-------->
            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-header"></div>
                    <div class="card-body">
                        @yield('artikel')
                    </div>
                </div>
            </div>
        </div>

        <!----FOOTER---->
        <footer class="footer bg-primary text-center text-white py-3">
            <div class="container">
                <span> @ Template by Putri </span>
            </div>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>