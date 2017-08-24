<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Міша Левицький</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/style.css" rel="stylesheet">
    </head><!--/head-->

    <body>
            <header id="navigat" class=" navbar cbp-af-header">
                <div class=" navbar-inverse container-fluid nav_bar  ">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-bar-scrit">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand logo" href="/"><img src="/template/images/logo.png" alt="logo"> </a>
                    </div>
                    <div class="collapse navbar-collapse " id="nav-bar-scrit">

                        <nav class="navbar menu-style" role= "navigation">
                            <ul id="menu" class="nav navbar-nav navbar-right">
                                <li><a href="/"><i class="fa fa-lock"></i> Головна</a></li>
                                <?php if (!User::checkLogged()): ?>
                                    <li><a href="/user/login/"><i class="fa fa-lock"></i> Вхід</a></li>
                                    <li><a href="/user/registration/"><i class="fa fa-lock"></i> Реєстрація</a></li>
                                <?php else: ?>
                                    <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Вихід</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>