<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | 500 Error</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

        <style>
            .content-wrapper{

                margin: 0px;
                width: 100%;

            }
        </style>
    </head>
    <body class="hold-transition skin-blue ">
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    500 Error Page
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">500 error</li>
                </ol>
            </section>
            <section class="content">

                <div class="error-page">
                    <h2 class="headline text-red">500</h2>

                    <div class="error-content">
                        <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

                        <p>
                            We will work on fixing that right away.
                            Meanwhile, you may <a href="{{URL::route('/')}}">return to dashboard</a> or try using the search form.
                        </p>

                        <form class="search-form">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.input-group -->
                        </form>
                    </div>
                </div>
                <!-- /.error-page -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.3
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>


        <script src="/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/plugins/fastclick/fastclick.js"></script>
        <script src="/dist/js/app.min.js"></script>
        <script src="/dist/js/demo.js"></script>
    </body>
</html>
