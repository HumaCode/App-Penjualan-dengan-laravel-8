<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ $title }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="{{ $icon }}"></i>
                        <p class="hidden-lg hidden-md">{{ $title }}</p>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Selamat datang {{ auth()->user()->nama }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"> Profil Saya</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf

                                <div class="btn-group btn-group-justified" role="group">
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-default " style="border: 0px;">Logout</button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
                
                
                <li class="separator hidden-lg"></li>
            </ul>
        </div>
    </div>
</nav>