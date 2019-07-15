<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Pengelolaan LAB RISET">
    <meta name="keywords" content="Peminjaman Seketika, Peminjaman Terjadwal, Monitoring">
    <meta name="author" content="SEPTIONO">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <title>Pengelolaan LAB RISET</title>

    <link href="{{url('assets/css/metro.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/metro-icons.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/docs.css')}}" rel="stylesheet">

    <script src="{{url('assets/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{url('assets/js/metro.js')}}"></script>

    <style type="text/css">
    body {
        font-family: "Verdana";
    }
    /* Sticky footer styles
    -------------------------------------------------- */

    html,
    body {
      height: 100%;
      /* The html and body elements cannot have any padding or margin. */
    }

    /* Wrapper for page content to push down footer */
    #wrap {
      min-height: 100%;
      height: auto;
      /* Negative indent footer by its height */
      margin: 0 auto -60px;
      /* Pad bottom by footer height */
      padding: 60px 0 60px;
    }

    /* Set the fixed height of the footer here */
    #footer {
      height: 60px;
      background-color: #f5f5f5;
    }

    .login-form {
        width: 400px;
        height: 350px;
        top: 50%;
        left: 50%;
        margin-left: -200px;
        background-color: #ffffff;
        -webkit-transform: scale(.8);
        transform: scale(.8);
    }   
    </style>

</head>
<body>
    <header class="app-bar fixed-top" data-role="appbar">
    <div class="container">
        <a href="" class="app-bar-element branding">Pengelolaan LAB RISET</a>
        <ul class="app-bar-menu place-right" data-flexdirection="reverse">
            <li>
                <a href="#" class="dropdown-toggle">Admin</a>
                <ul class="d-menu place-right" data-role="dropdown" data-no-close="true">
                    <li><a href="user/change-password">Ubah Password</a></li>
                    <li class="divider"></li>
                    <li><a href="sign/out">Sign Out</a></li>
                </ul>
            </li>
        </ul>

        <span class="app-bar-pull"></span>
    </div>
    </header>

    <div id="wrap">
    <div class="container page-content">
        <h1>
        <a href="{{ route('dashboard') }}" class="nav-button transform"><span></span></a>
        Jadwal
        <span class="place-right">
            <a href="{{ route('tambahjadwal') }}" class="button">Tambah Jadwal</a>
        </span>
        </h1>

        <table class="table striped hovered border bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Waktu</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; ?>
                @foreach ($jadwals as $jadwal) 
                <tr>
                    <?php $no++; ?>
                    <td>{{ $no }}</td>
                    <td>{{ $jadwal->waktu }}</td>
                    <td>
                        <div class="inline-block">
                            <button class="button mini-button dropdown-toggle">Aksi</button>
                            <ul class="split-content d-menu" data-role="dropdown">
                                <li><a href="{{ $jadwal->id }}"><span class="mif-pencil"></span> Edit</a></li>
                                <li><a href="jadwal/{{ $jadwal->id }}/delete"><span class="mif-cross"></span> Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <footer id="footer" style="background-color: #EFEAE3">
        <div class="align-center padding20 text-large">
            Copyright 2019
        </div>
    </div>
    </footer>

</body>
</html>