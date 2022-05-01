<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css?v=1" />
</head>
<body>
    <header>
        <div class="container">
            <a href="">Online Space</a>
        </div>
    </header>
<section class="container">
    <section class="colun2 mt-10">
        <div class="quadroLogo">
            <div class="quadroObjetos">
                <div class="text">Online Space</div>          
                <p><span>Connects</span> to your friends and family using scraps and instant messages</p>
                <p><span>See more</span> new people through friends of your friends and communities</p>
                <p><span>Share</span> your videos, photos and passions in one place</p>
            </div>
        </div>
    </section>
    <section class="colun">
        <div class="quadro mt-10">
            <form method="POST" action="<?=$base;?>/login">
                <p>Access the <b>espaço.online</b> with your account</p>
                <?php if(!empty($flash)): ?>
                    <span><?php echo $flash; ?></span>
                <?php endif; ?>
                <input placeholder="Your e-mail" class="input" type="email" name="email" autofocus />
                <input placeholder="Your password" class="input" type="password" name="password" />
                <input class="btn-eo" type="submit" value="Access the system" />
            </form>
        </div>

        <div class="quadro p-15 mt-10">
            <div class="painel">
                <p>Not a member yet?</p>
                <a href="<?=$base;?>/cadastro"><b>LOG IN NOW</b></a>
            </div>
        </div>

    </section>
</section>
        <footer class="mt-10">
        <div class="tabsContainer">
            <div class="containerURL">
                <a href="https://espaco.online" class="logo-footer">Online Space</a>
                <a href="https://espaco.online/about">About</a>
                <a href="https://espaco.online/news">News</a>
                <a href="https://espaco.online/privacy">Privacy</a>
                <a href="https://espaco.online/terms">Terms of use</a>
                <a href="https://espaco.online/contact">Contact</a>
            </div></div>
        </footer>
</body>
</html>