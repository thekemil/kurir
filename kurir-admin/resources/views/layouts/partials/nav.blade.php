<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
        <a class="navbar-brand" href="/">Admin <small>Kurir Apps</small></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ (Request::is('admin/dashboard') ? 'active' : '') }}">
                   <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-book"></i>Dashboard</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="{{ (Request::is('admin/branch') ? 'active' : '') }}">
                   <a href="{!! route('admin.branch') !!}"><i class="fa fa-book"></i>Data Cabang</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="{{ (Request::is('admin/users') ? 'active' : '') }}">
                   <a href="{!! route('admin.user') !!}"><i class="fa fa-book"></i>Data Pengguna</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="{{ (Request::is('admin/document') ? 'active' : '') }}">
                   <a href="{!! route('admin.document') !!}"><i class="fa fa-book"></i>Data Dokumen</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! URL::to('/auth/logout') !!}" class="fa fa-book">Keluar</a></li>
                    </ul>
                </li>
            </ul>
            <p class="navbar-text navbar-right"></p>
        </div>
    </div>
</nav>
