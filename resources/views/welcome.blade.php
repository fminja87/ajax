<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:300,400,500,600,700,800' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = 'js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>



    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.min.css') }}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl-carousel/owl.carousel.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo1.min.css') }}">
    <title>Hello, world!</title>
</head>
<body>

<div style="padding: 30px;"></div>

<div class="container-fluid">
   <marquee><h1 align="center">AJAX-CRUD OPERATION WITH LARAVEL 8</h1></marquee>

    <div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span>All Teachers</span>
                </div>
                <div class="card-body">

                    <table class="table table-responsive table-small table-dark table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Institute</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <span id="addHeader">Add New Teacher</span>
                    <span id="updateHeader">Update Teacher</span>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control form-data" name="name" id="name" placeholder="Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control form-data" name="title" id="title" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Institute</label>
                            <input type="text" class="form-control form-data" name="institute" id="institute" placeholder="Institute">
                        </div>
                        <button type="submit" class="btn btn-primary" id="addButton" onclick="addData()">Add</button>
                        <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/parallax/parallax.min.js') }}"></script>
<script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/elevatezoom/jquery.elevatezoom.min.js') }}"></script>
<script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.min.js') }}"></script>
<script>
        $('#addHeader').show();
        $('#updateHeader').hide();
        $('#addButton').show();
        $('#updateButton').hide();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function allData(){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "teacher/all",
                success:function (response) {
                    var data = ""
                    $.each(response,function (key, value) {
                        data = data + "<tr>"
                        data = data + "<td>"+value.id+"</td>"
                        data = data + "<td>"+value.name+"</td>"
                        data = data + "<td>"+value.title+"</td>"
                        data = data + "<td>"+value.institute+"</td>"
                        data = data + "<td>"
                        data = data + "<button type='button' class='btn btn-sm btn-success'>Edit</button>"
                        data = data + "<button type='button' class='btn btn-sm btn-danger'>Delete</button>"
                        data = data + "</td>"
                        data = data + "</tr>"
                    })
                    $('tbody').html(data);
                }
            })
        }
        allData();

        function clearData(){
            $('#name').val('');
            $('#title').val('');
            $('#institute').val('');
        }

        function addData(){
           var name =  $('#name').val();
           var title =  $('#title').val();
           var institute =  $('#institute').val();

            $.ajax({
                type: "POST",
                dataType: "json",
                data: {name:name, title:title, institute:institute},
                url: "/teacher/store/",
                success: function (data) {
                    allData();
                    clearData();
                    console.log(data.message);
                }
            })
        }
</script>
</body>
</html>
