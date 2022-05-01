    </div>
</div> 
    <section class="container">
        <footer>

        <div class="tabsContainer">
            <div class="container">
                <a href="<?=$base;?>" class="logo-footer">Espaço Online</a>
                <a href="<?=$base;?>/about">About</a>
                <a href="<?=$base;?>/news">News</a>
                <a href="<?=$base;?>/privacy">Privacy</a>
                <a href="<?=$base;?>/terms">Terms of use</a>
                <a href="<?=$base;?>/contact">Contact</a>
            </div></div>
        </footer>
    </section>
    <div class="modal">
        <div class="modal-inner">
            <a rel="modal:close">&times;</a>
            <div class="modal-content"></div>
        </div>
    </div>
	<script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>
            <script>
                function toggleRightMenu() {
                    MenuStatus = document.getElementById('mySidenav').style.display;
                    if ( MenuStatus == 'block' ) {
                    document.getElementById("mySidenav").style.display="none";
                    } else {
                    document.getElementById("mySidenav").style.display="block";
                    document.getElementById("mySidenav2").style.display="none";
                    }
                    if ( MenuStatus == 'none' ) {document.getElementById("mySidenav").style.display="block";}
                }

                function toggleRightMenu2() {

                    var windowWidth = window.innerWidth;
                    var screenWidth = screen.width;

                    MenuStatus = document.getElementById('mySidenav2').style.display;
                    if ( MenuStatus == 'block' ) {
                    document.getElementById("mySidenav2").style.display="none";
                    } else {
                    document.getElementById("mySidenav2").style.display="block";
                        if (windowWidth <= "500"){
                    document.getElementById("mySidenav").style.display="none";
                        }
                    }
                    if ( MenuStatus == 'none' ) {document.getElementById("mySidenav2").style.display="block";}
                }

            </script>
	</body>
</html>