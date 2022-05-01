<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <title>ESPAÇO ONLINE</title>
            <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
            <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css?v=16"/>
            <link rel="icon" href="<?=$base;?>/assets/images/favicon.ico">
                <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102555801-1"></script>
                <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-102555801-1');
                </script>
    </head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?=$base;?>/">EO</a>
            </div> 
            <div class="head-side">	
                <div class="head-side-left">
                    <ul class="nav navbar-nav">
                        <li><a href="<?=$base;?>/home">Home</a></li>
                        <li><a href="<?=$base;?>/perfil/uid=<?=$loggedUser->id;?>">Profile</a></li>
                        <li><a href="<?=$base;?>/recados/uid=<?=$loggedUser->id;?>">Scraps</a></li>
                        <li><a href="<?=$base;?>/seguindo/uid=<?=$loggedUser->id;?>">Friends</a></li>
                        <li><a href="<?=$base;?>/comunidades">Communities</a></li>
                    </ul>
                </div>
                                            
                <div class="head-side-right">
                    <a href="<?=$base;?>/perfil/uid=<?=$loggedUser->id;?>" class="user-area">
                        <div class="user-area-text"><?=$loggedUser->name;?></div>
                        <div class="user-area-icon"><img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" /></div>
                    </a>
                    <a href="<?=$base;?>/sair" class="user-logout">
                        <img src="<?=$base;?>/assets/images/power_white.png" />
                    </a>
                        <div class="search-area">
                            <form method="GET" action="<?=$base;?>/search-u">
                                <input class="form-control" type="search" placeholder="Space Research" name="s" />
                            </form>
                        </div>
                </div>
                                            
            </div>
        </div>
    </header>
<div class="container">
<div class="ajustador">