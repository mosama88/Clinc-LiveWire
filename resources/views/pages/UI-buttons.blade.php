@section('active-UI-buttons','active')

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Buttons</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboard')}}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard')}}/assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Bootstrap 4 RTL -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
        <!-- Custom style for RTL -->
        <link rel="stylesheet" href="{{asset('dashboard')}}/assets/dist/css/custom.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{asset('dashboard')}}/assets/index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('dashboard')}}/assets/dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('dashboard')}}/assets/dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('dashboard')}}/assets/dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('dashboard.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Buttons</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Buttons</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-edit"></i>
                                        Buttons
                                    </h3>
                                </div>
                                <div class="card-body pad table-responsive">
                                    <p>Various types of buttons. Using the base class <code>.btn</code></p>
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>Normal</th>
                                            <th>Large <code>.btn-lg</code></th>
                                            <th>Small <code>.btn-sm</code></th>
                                            <th>Extra Small <code>.btn-xs</code></th>
                                            <th>Flat <code>.btn-flat</code></th>
                                            <th>Disabled <code>.disabled</code></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-default">Default</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-default btn-lg">Default</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-default btn-sm">Default</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-default btn-xs">Default</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-default btn-flat">Default</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-default disabled">Default</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-primary">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-primary btn-lg">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-primary btn-sm">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-primary btn-xs">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-primary btn-flat">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-primary disabled">Primary</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-secondary">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-secondary btn-lg">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-secondary btn-sm">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-secondary btn-xs">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-secondary btn-flat">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-secondary disabled">Secondary</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-success">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-success btn-lg">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-success btn-sm">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-success btn-xs">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-success btn-flat">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-success disabled">Success</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-block btn-info">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-info btn-lg">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-info btn-sm">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-info btn-xs">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-info btn-flat">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-info disabled">Info</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-danger">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-danger btn-lg">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-danger btn-sm">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-danger btn-xs">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-danger btn-flat">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-danger disabled">Danger</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-warning">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-warning btn-lg">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-warning btn-sm">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-warning btn-xs">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-warning btn-flat">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-warning disabled">Warning</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- ./row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-edit"></i>
                                        Outline Buttons
                                    </h3>
                                </div>
                                <div class="card-body pad table-responsive">
                                    <p>Various types of buttons. Using the base class <code>.btn</code></p>
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>Normal</th>
                                            <th>Large <code>.btn-lg</code></th>
                                            <th>Small <code>.btn-sm</code></th>
                                            <th>Extra Small <code>.btn-xs</code></th>
                                            <th>Flat <code>.btn-flat</code></th>
                                            <th>Disabled <code>.disabled</code></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-primary">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-primary btn-lg">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-primary btn-sm">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-primary btn-xs">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-primary btn-flat">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-primary disabled">Primary</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-secondary">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-secondary btn-lg">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-secondary btn-sm">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-secondary btn-xs">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-secondary btn-flat">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-secondary disabled">Secondary</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-success">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-success btn-lg">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-success btn-sm">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-success btn-xs">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-success btn-flat">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-success disabled">Success</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-info">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-info btn-lg">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-info btn-sm">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-info btn-xs">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-info btn-flat">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-info disabled">Info</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-danger">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-danger btn-lg">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-danger btn-sm">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-danger btn-xs">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-danger btn-flat">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-danger disabled">Danger</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-warning">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-warning btn-lg">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-warning btn-sm">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-warning btn-xs">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-warning btn-flat">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-outline-warning disabled">Warning</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- ./row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-edit"></i>
                                        Gradient Buttons (bg-gradient-*)
                                    </h3>
                                </div>
                                <div class="card-body pad table-responsive">
                                    <p>Various types of buttons. Using the base class <code>.btn</code></p>
                                    <table class="table table-bordered text-center">
                                        <tr>
                                            <th>Normal</th>
                                            <th>Large <code>.btn-lg</code></th>
                                            <th>Small <code>.btn-sm</code></th>
                                            <th>Extra Small <code>.btn-xs</code></th>
                                            <th>Flat <code>.btn-flat</code></th>
                                            <th>Disabled <code>.disabled</code></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-primary">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-primary btn-lg">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-primary btn-sm">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-primary btn-xs">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-primary btn-flat">Primary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-primary disabled">Primary</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-secondary">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-secondary btn-lg">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-secondary btn-sm">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-secondary btn-xs">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-secondary btn-flat">Secondary</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-secondary disabled">Secondary</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-success">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-success btn-lg">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-success btn-sm">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-success btn-xs">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-success btn-flat">Success</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-success disabled">Success</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-info">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-info btn-lg">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-info btn-sm">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-info btn-xs">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-info btn-flat">Info</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-info disabled">Info</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-danger">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-danger btn-lg">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-danger btn-sm">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-danger btn-xs">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-danger btn-flat">Danger</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-danger disabled">Danger</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-warning">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-warning btn-lg">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-warning btn-sm">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-warning btn-xs">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-warning btn-flat">Warning</button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block bg-gradient-warning disabled">Warning</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- ./row -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Block buttons -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Block Buttons</h3>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-default btn-block">.btn-block</button>
                                    <button type="button" class="btn btn-default btn-block btn-flat">.btn-block
                                        .btn-flat</button>
                                    <button type="button" class="btn btn-default btn-block btn-sm">.btn-block
                                        .btn-sm</button>
                                </div>
                            </div>
                            <!-- /.card -->

                            <!-- Horizontal grouping -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Horizontal Button Group</h3>
                                </div>
                                <div class="card-body table-responsive pad">
                                    <p>
                                        Horizontal button groups are easy to create with bootstrap. Just add your
                                        buttons
                                        inside <code>&lt;div class="btn-group"&gt;&lt;/div&gt;</code>
                                    </p>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Button</th>
                                            <th>Icons</th>
                                            <th>Flat</th>
                                            <th>Dropdown</th>
                                        </tr>
                                        <!-- Default -->
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">Left</button>
                                                    <button type="button" class="btn btn-default">Middle</button>
                                                    <button type="button" class="btn btn-default">Right</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-default"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-default"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-default btn-flat"><i
                                                            class="fas fa-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-flat"><i
                                                            class="fas fa-align-right"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">1</button>
                                                    <button type="button" class="btn btn-default">2</button>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- ./default -->
                                        <!-- Info -->
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Left</button>
                                                    <button type="button" class="btn btn-info">Middle</button>
                                                    <button type="button" class="btn btn-info">Right</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-info"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-info"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-info btn-flat"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-info btn-flat"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">1</button>
                                                    <button type="button" class="btn btn-info">2</button>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- /. info -->
                                        <!-- /.danger -->
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger">Left</button>
                                                    <button type="button" class="btn btn-danger">Middle</button>
                                                    <button type="button" class="btn btn-danger">Right</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-danger btn-flat"><i
                                                            class="fas fa-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-flat"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger">1</button>
                                                    <button type="button" class="btn btn-danger">2</button>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- /.danger -->
                                        <!-- warning -->
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning">Left</button>
                                                    <button type="button" class="btn btn-warning">Middle</button>
                                                    <button type="button" class="btn btn-warning">Right</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-warning"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-warning"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-warning btn-flat"><i
                                                            class="fas fa-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-flat"><i
                                                            class="fas fa-align-right"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning">1</button>
                                                    <button type="button" class="btn btn-warning">2</button>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- /.warning -->
                                        <!-- success -->
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success">Left</button>
                                                    <button type="button" class="btn btn-success">Middle</button>
                                                    <button type="button" class="btn btn-success">Right</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-success btn-flat"><i
                                                            class="fas fa-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-success btn-flat"><i
                                                            class="fas fa-align-right"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success">1</button>
                                                    <button type="button" class="btn btn-success">2</button>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- /.success -->
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Appended Buttons</h3>
                                </div>
                                <div class="card-body">
                                    <strong>With dropdown</strong>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- /input-group -->
                                    <strong>Normal</strong>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-danger">Action</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- /input-group -->
                                    <strong>Flat</strong>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-0">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat">Go!</button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- split buttons box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Split buttons</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Split button -->
                                    <p>Normal split buttons:</p>

                                    <div class="margin">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Action</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Action</button>
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">Action</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success">Action</button>
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning">Action</button>
                                            <button type="button" class="btn btn-warning dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- flat split buttons -->
                                    <p>Flat split buttons:</p>

                                    <div class="margin">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-flat">Action</button>
                                            <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-flat">Action</button>
                                            <button type="button" class="btn btn-info btn-flat dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger btn-flat">Action</button>
                                            <button type="button" class="btn btn-danger btn-flat dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-flat">Action</button>
                                            <button type="button" class="btn btn-success btn-flat dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-flat">Action</button>
                                            <button type="button" class="btn btn-warning btn-flat dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- end split buttons box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <!-- Application buttons -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Application Buttons</h3>
                                </div>
                                <div class="card-body">
                                    <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a></code> tag to
                                        achieve the following:</p>
                                    <a class="btn btn-app">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-app">
                                        <i class="fas fa-play"></i> Play
                                    </a>
                                    <a class="btn btn-app">
                                        <i class="fas fa-pause"></i> Pause
                                    </a>
                                    <a class="btn btn-app">
                                        <i class="fas fa-save"></i> Save
                                    </a>
                                    <a class="btn btn-app">
                                        <span class="badge bg-warning">3</span>
                                        <i class="fas fa-bullhorn"></i> Notifications
                                    </a>
                                    <a class="btn btn-app">
                                        <span class="badge bg-success">300</span>
                                        <i class="fas fa-barcode"></i> Products
                                    </a>
                                    <a class="btn btn-app">
                                        <span class="badge bg-purple">891</span>
                                        <i class="fas fa-users"></i> Users
                                    </a>
                                    <a class="btn btn-app">
                                        <span class="badge bg-teal">67</span>
                                        <i class="fas fa-inbox"></i> Orders
                                    </a>
                                    <a class="btn btn-app">
                                        <span class="badge bg-info">12</span>
                                        <i class="fas fa-envelope"></i> Inbox
                                    </a>
                                    <a class="btn btn-app">
                                        <span class="badge bg-danger">531</span>
                                        <i class="fas fa-heart"></i> Likes
                                    </a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- Vertical grouping -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Vertical Button Group</h3>
                                </div>
                                <div class="card-body table-responsive pad">

                                    <p>
                                        Vertical button groups are easy to create with bootstrap. Just add your buttons
                                        inside <code>&lt;div class="btn-group-vertical"&gt;&lt;/div&gt;</code>
                                    </p>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Button</th>
                                            <th>Icons</th>
                                            <th>Flat</th>
                                            <th>Dropdown</th>
                                        </tr>
                                        <!-- Default -->
                                        <tr>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-default">Top</button>
                                                    <button type="button" class="btn btn-default">Middle</button>
                                                    <button type="button" class="btn btn-default">Bottom</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-default"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-default"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-default"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-default btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-default btn-flat"><i
                                                            class="fas fa-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-flat"><i
                                                            class="fas fa-align-right"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-default">1</button>
                                                    <button type="button" class="btn btn-default">2</button>

                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-default dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- ./default -->
                                        <!-- Info -->
                                        <tr>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-info">Top</button>
                                                    <button type="button" class="btn btn-info">Middle</button>
                                                    <button type="button" class="btn btn-info">Bottom</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-info"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-info"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-info"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-info btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-info btn-flat"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-info btn-flat"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-info">1</button>
                                                    <button type="button" class="btn btn-info">2</button>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- /. info -->
                                        <!-- /.danger -->
                                        <tr>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-danger">Top</button>
                                                    <button type="button" class="btn btn-danger">Middle</button>
                                                    <button type="button" class="btn btn-danger">Bottom</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-danger btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-danger btn-flat"><i
                                                            class="fas fa-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-flat"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-danger">1</button>
                                                    <button type="button" class="btn btn-danger">2</button>

                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-danger dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- /.danger -->
                                        <!-- warning -->
                                        <tr>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-warning">Top</button>
                                                    <button type="button" class="btn btn-warning">Middle</button>
                                                    <button type="button" class="btn btn-warning">Bottom</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-warning"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-warning"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-warning"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-warning btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-warning btn-flat"><i
                                                            class="fas fa-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-flat"><i
                                                            class="fas fa-align-right"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-warning">1</button>
                                                    <button type="button" class="btn btn-warning">2</button>

                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-warning dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- /.warning -->
                                        <!-- success -->
                                        <tr>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-success">Top</button>
                                                    <button type="button" class="btn btn-success">Middle</button>
                                                    <button type="button" class="btn btn-success">Bottom</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fas fa-align-center"></i></button>
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-success btn-flat"><i
                                                            class="fas fa-align-left"></i></button>
                                                    <button type="button" class="btn btn-success btn-flat"><i
                                                            class="fas fa-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-success btn-flat"><i
                                                            class="fas fa-align-right"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-success">1</button>
                                                    <button type="button" class="btn btn-success">2</button>

                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-success dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                            <li><a class="dropdown-item" href="#">Dropdown
                                                                    link</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- /.success -->
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /. row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.0-rc.1
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('dashboard')}}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('dashboard')}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dashboard')}}/assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dashboard')}}/assets/dist/js/demo.js"></script>
</body>

</html>
