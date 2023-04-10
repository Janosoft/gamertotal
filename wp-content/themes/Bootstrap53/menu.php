<!-- menu -->
<header class="sticky-top">
    <div class="container d-none d-md-block" style="background: #fff;">
        <div class="row align-items-center">
            <div class="col-3">

            </div>
            <div class="col">
                <a href="http://localhost/gamertotal/" target="_self">
                    <img loading="eager" class="img-fluid" style="display:block; margin:auto; margin-bottom: 3px;" id="logo" src="http://localhost/gamertotal/wp-content/themes/Bootstrap53/images/logo.jpg" alt="Logo">
                </a>
            </div>
            <div class="col-3 text-end fecha">

            </div>
        </div>

        <nav class="navbar navbar-expand-lg bg-dark d-none d-md-block" style="padding: 0; background-color:#99183D !important;">
            <div class="container p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 raleway700" style="font-size: 15px;">
                        <li class="nav-item" style="background-color: #99183D; color:#fff; padding-left: 4px; padding-right: 5px;"><a class="nav-link" style="font-size: 16px;" href="/?s" target="_blank" rel="nofollow" alt="Buscar"><i class="fa-solid fa-magnifying-glass" style="color: #fff;" aria-hidden="true"></i></a></li>
                        <li class="nav-item"><a class="nav-link" style="color: #fff;" href="https://www.gamertotal.com.ar/category/analisis/">Análisis</a></li>
                        <li class="nav-item"><a class="nav-link" style="color: #fff;" href="https://www.gamertotal.com.ar/category/tecnologia/">Tecnología</a></li>                        
                        <li class="nav-item"><a class="nav-link" style="color: #fff;" href="https://www.gamertotal.com.ar/category/trucos/">Trucos</a></li>
                    </ul>

                    <ul class="navbar-nav ml-auto" style="padding-right: 5px; color: #fff;">
                        <li>
                            <?php
                            date_default_timezone_set('America/Argentina/Buenos_Aires');
                            setlocale(LC_TIME, 'es_ES.UTF-8', 'esp');
                            if (!empty($captura_dia)) print strftime('%e de ', strtotime($captura_mes . '/' . $captura_dia . '/' . $captura_anio)) . ucfirst(strftime("%h", strtotime($captura_mes . '/' . $captura_dia . '/' . $captura_anio))) . strftime(' de %Y', strtotime($captura_mes . '/' . $captura_dia . '/' . $captura_anio));
                            else print strftime('%e de ') . ucfirst(strftime("%h")) . strftime(' de %Y');                            
                            ?>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>