<!-- menu_celular -->
<nav class="navbar navbar-expand-lg p-0 d-sm-block d-md-none">
    <div class="container-fluid p-2" style="background: #fff;">
        <div class="row mx-auto">
            <div class="col">
                <div class="dropdown">
                    <a href="http://localhost/gamertotal/" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-fluid" style="display:block; margin:auto; height: 60px; max-width: 193px;" loading="eager" src="http://localhost/gamertotal/wp-content/themes/Bootstrap53/images/logo.jpg" alt="Logo">
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li class="nav-item"><a class="nav-link" style="color: #fff;" href="https://www.gamertotal.com.ar/category/analisis/">Análisis</a></li>
                        <li class="nav-item"><a class="nav-link" style="color: #fff;" href="https://www.gamertotal.com.ar/category/tecnologia/">Tecnología</a></li>
                        <li class="nav-item"><a class="nav-link" style="color: #fff;" href="https://www.gamertotal.com.ar/category/trucos/">Trucos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid d-sm-block d-md-none" style="background: #fff;">
    <div class="row align-items-center">
        <div class="col text-center" style="font-size: 11px;">
            Cuyo - Argentina
            <?php
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            setlocale(LC_TIME, 'es_ES.UTF-8', 'esp');
            print strftime('%e de ') . ucfirst(strftime("%h")) . strftime(' de %Y');
            ?>
        </div>
    </div>
</div>

<div class="container" style="background: #fff;">
    <div id="progress2">
        <div class="progress2-container">
            <div class="progress2-bar" id="myBar" style="width: 0%;"></div>
        </div>
    </div>
</div>

</header>