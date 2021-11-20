<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Library Management System</title>
        <!-- MDB icon -->
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="/mdb/css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="/mdb/css/mdb.min.css">
        <!-- Datatables -->
        <link rel="stylesheet" href="/mdb/css/addons/datatables2.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="/mdb/css/style.css">
        <!-- toastr styles (optional) -->
        <link rel="stylesheet" href="/mdb/css/addons/toastr.css">
        <!-- jQuery -->
        <script type="text/javascript" src="/mdb/js/jquery.min.js"></script>
        <!-- toastr -->
        <script type="text/javascript" src="/mdb/js/addons/toastr.js"></script>

    </head>

    <body>
        <!-- Start your project here-->
        @include('layouts.navbar')
        <div class="container">
            @yield('content')
        </div>
        @include('layouts.footer')
        <!-- End your project here-->

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="/mdb/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="/mdb/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="/mdb/js/mdb.min.js"></script>
        <!-- MDB datatable JavaScript -->
        <script type="text/javascript" src="/mdb/js/addons/datatables2.min.js"></script>
        <!-- Common utils JavaScript -->
        <script type="text/javascript" src="/js/common_utils.js"></script>

        {{--
    <!-- Your custom scripts (optional) -->
        <script type="text/javascript">
        var a = document.getElementById('disc-50');
        a.onclick = function() {
            Clipboard_CopyTo("T9TTVSQB");
            var div = document.getElementById('code-success');
            div.style.display = 'block';
            setTimeout(function() {
                document.getElementById('code-success').style.display = 'none';
            }, 900);
        };

        function Clipboard_CopyTo(value) {
            var tempInput = document.createElement("input");
            tempInput.value = value;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
        }
    </scrip            t> --}}
</body>

</html>