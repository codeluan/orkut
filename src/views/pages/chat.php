<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Elastic Sidebar Navigation</title>
<link rel="stylesheet" href="https://use.fontawesome.com/9ebbc34f01.css">

<style>

@keyframes sidebarLeftOpen{
0% {-webkit-transform: translate(-100%, 0);
  transform: translate(-100%, 0);}
100% {-webkit-transform: translate(0, 0);
  transform: translate(0, 0);}
}

@keyframes sidebarLeftClose{
0% {-webkit-transform: translate(100%, 0);
  transform: translate(100%, 0);}
100% {-webkit-transform: translate(0, 0);
  transform: translate(0, 0);}
}

body {
	background-color:#fafafa;
	font-family: 'Open Sans', 'Segoe UI', Tahoma, Arial, sans-serif;
	margin: 0;
  padding: 0;
  max-width: 1024px;
  margin: auto;
}

.head {
  display: flex;
	width: 100%;
	height: 40px;
  background-color: #f5f7fb;
  box-shadow: 0px 1px 4px #00000057;

}
.footer {
  display: flex;
	width: 100%;
	height: 40px;
  background-color: #f5f7fb;
  box-shadow: 0px 1px 4px #00000057;

}

.headMenu{
  width: 100%;
  border-top-right-radius: 50%;
border-bottom-right-radius: 50%;
}

#btnLeft {
  border: 0;
  color: #4e4e4e;
  background-color: #f5f7fb;
  padding: 10px 20px;
  text-transform: uppercase;
  cursor: pointer;
  outline: none;
}

#btnRight {
  border: 0;
  color: #4e4e4e;
  background-color: #f5f7fb;
  padding: 10px 20px;
  text-transform: uppercase;
  cursor: pointer;
  outline: none;
}

.fa {font-size: 20px;}
.ajustador {
    display: flex;
}

.colunaLeft{
    display: block;
    animation-name:sidebarLeftOpen;
    animation-duration:1s;
    width: 274px;
    height: calc(100vh - 100px);
    position: relative;
    float: left;
    background-color: #f5f7fb;
    border: thin solid #bed6e0;
    margin: 5px;
    overflow-y: scroll;
    scrollbar-width: none;
  }
  .colunaLeft::-webkit-scrollbar { 
    display: none;
}

.colunaRight{
    display: block;
    float: left;
    flex-direction: column;
    width: 100%;
    height: calc(100vh - 100px);
    position: relative;
    transition: all 0.25s;
    border: thin solid #bed6e0;
    margin: 5px;
    }

.colunaRightTop{
    display: block;
    float: right;
    width: 100%;
    height: 72px;
    position: relative;
    transition: all 0.25s;
    background-color: #80d8ff;
    box-shadow: 0px 1px 4px #00000057;
    margin-bottom: 10px;
  }

  .colunaRightLeft{
    display: block;
    float: left;
    width: calc(100% - 180px);
    position: relative;
    transition: all 0.25s;
    height: calc(100% - 210px);
    margin: 0 10px;
  }

  .colunaRightLeftTop{
    display: block;
    float: left;
    width: 100%;
    position: relative;
    transition: all 0.25s;
    background-color: #f5f7fb;
    height: 100%;
    border: 1px solid #bed6e0;
    margin-bottom: 10px;
    overflow-y: scroll;
  }

  .colunaRightLeftButtom{
    display: block;
    float: left;
    width: 100%;
    position: relative;
    transition: all 0.25s;
    background-color: #f5f7fb;
    height: 80px;
    border: 1px solid #bed6e0;
  }

  .colunaRightLeftButtomTop{
    display: block;
    padding: 2px;
    height: 28px;
    border-bottom: 1px solid #bed6e0;
    
  }

  .arrowdown {
    height: 5px;
    margin-left: 4px;
}.smallarrowbtn {
    display: flex;
    flex-direction: row;
    overflow: hidden;
    align-items: center;
}

  .colunaRightLeftButtomTopButton {
    height: 24px;
    width: 30px;
    padding: 0 4px;
    float: left;
    border: 2px solid transparent;
    background-color: transparent;
  }
.colunaRightRight{display: block;
    float: right;
    width: 140px;
    position: relative;
    transition: all 0.25s;
    height: calc(100% - 92px);
    animation-name:sidebarLeftClose;
    animation-duration:1s;
  }


.avatar {
    margin: 9px;
    height: 96px;
    border-radius: 2px;
}

.frame {
    position: absolute;
    top: 0;
    left: 0;
}

#bottomavatar {
    position: absolute;
    bottom: 0;
}













.msg {
    width: 100%;
    height: auto;
    display: block;
    overflow: hidden;
}
.bubble {
    float: left;
    max-width: 75%;
    width: auto;
    height: auto;
    display: block;
    background: #ffffff;
    border-radius: 5px;
    position: relative;
    margin: 10px 0 3px 25px;
    box-shadow: 0px 2px 1px rgba(0, 0, 0, 0.2);
}
.txt {
    padding: 8px 0 8px 0;
    width: 100%;
}
.name_user {
    font-weight: 600;
    font-size: 14px;
    display: inline-table;
    padding: 0 10px;
    margin: 0 0 4px 0;
    color: #3498db;
}
.timestamp {
    font-size: 11px;
    margin: auto;
    padding: 0 15px 0 0;
    display: table;
    float: right;
    position: relative;
    text-transform: uppercase;
    color: #999;
    line-height: 18px;
}
.messagechat {
    font-size: 14px;
    font-weight: 500;
    padding: 0 15px 0 15px;
    margin: auto;
    color: #2b2b2b;
    width: 100%;
    display: table;
    table-layout: fixed;
    word-wrap: break-word;
}
.bubble-arrow {
    position: absolute;
    float: left;
    left: -11px;
    top: 0px;
}
.bubble-arrow:after {
    content: "";
    position: absolute;
    border-top: 15px solid #ffffff;
    border-left: 15px solid transparent;
    border-radius: 4px 0 0 0px;
    width: 0;
    height: 0;
}
.altfollow {
    margin: 2px 25px 3px 0px;
    background: #99dfff;
    float: right;
}
.bubble-right {
    position: absolute;
    float: left;
    right: 3px;
    top: 0px;
}.bubble-right:after {
    content: "";
    position: absolute;
    border-top: 15px solid #99dfff;
    border-right: 15px solid #ffffff00;
    width: 0;
    height: 0;
}








.friend-drawer {
    padding: 10px 15px;
    display: flex;
    vertical-align: baseline;
    background: #fff;
    transition: .3s ease;
}
.profile-image {
    width: 50px;
    height: 50px;
    border-radius: 40px;
}
img {
    vertical-align: middle;
    border-style: none;
}
.friend-drawer .text {
    margin-left: 12px;
    width: 70%;
}
.friend-drawer .text h6 {
    margin-top: 6px;
    margin-bottom: 0;
}
.friend-drawer .text p {
    margin: 0;
}
.text-muted {
    color: #6c757d!important;
}
.friend-drawer .time {
    color: grey;
}
.text-muted {
    color: #6c757d!important;
}



@media (max-width: 500px) {

  .colunaLeft{
    display: none;
  }

  .colunaRightRight{
    display: none;
  }

  #mySidenav3{width: calc(100% - 20px);}

}




h1{text-align: center;}
input{
  background-image: url(https://img.icons8.com/pastel-glyph/2x/search.png);
  background-position: 10px 10px;
  background-repeat: no-repeat;
  background-size: 20px 20px;
  width: 100%; 
  font-size: 17px; 
  padding: 12px 20px 12px 40px;
  margin-bottom: 4px; 
  border: none;
  border-radius: 2px;
  box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
}
input:focus{outline: none;}
input:hover, input:focus{
  box-shadow: 0 3px 8px 0 rgba(0,0,0, 0.2), 0 0 0 1px rgba(0,0,0, 0.08);
}
ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
#sU li{box-shadow: 0px 1px 4px #00000057;
    }







    .user-info {
    display: flex;
    height: 80px;
    width: 100%;
    box-sizing: border-box;
    padding: 8px 14px;
    background: rgb(0,116,162);
background: linear-gradient(145deg, rgba(0,116,162,1) 22%, rgba(83,167,201,1) 54%, rgba(84,173,209,1) 61%, rgba(84,172,207,1) 67%, rgba(83,167,201,1) 85%);
}#avatar {
  height: 50px;
  width: 48px;
  border-radius: 2px;
  margin-top: 4px;
}
#frame {
    height: 62px;
    width: auto;
    position: absolute;
    left: 9px;
}
.profile {
    margin: auto;
    margin-left: 14px;
    margin-top: 3px;
    height: 100%;
}#user {
    padding: 0;
    height: fit-content;
    display: flex;
    text-align: start;
    align-items: center;
}#user > h3 {
    font-size: 10pt;
    font-weight: 600;
    color: white;
    margin: 0;
}.arrowcontacts {
    margin-left: 8px;
    fill: #B9DDE7 !important;
}.arrowdown {
    height: 5px;
    margin-left: 4px;
}#message {
    padding: 0;
    margin: 0;
    height: fit-content;
    display: flex;
    text-align: start;
    align-items: center;
    color: #B9DDE7;
    padding-top: 2px;
    padding-bottom: 3px;
    font-size: 8pt;
}.arrowcontacts {
    margin-left: 8px;
    fill: #B9DDE7 !important;
}.arrowdown {
    height: 5px;
    margin-left: 4px;
}
.aerobutton {
    background-color: transparent;
    border: 2px solid transparent;
}






form {padding: 10px;}
textarea{
  width: 100%;
  margin: 0;
  padding: 0;
  border: none;
  background-color: #f5f7fb;
  height: 70px;
}
#sendbutton{float: right;
    top: 83px;
    position: absolute;
    right: 0px;
    background-color: #f5f7fb;
    color: black;
    border: 1px solid #bed6e0;
    padding: 5px 15px;
    }

@keyframes fade{
  from{ opacity:0;}
  to{opacity:1;}
}
@keyframes flyin{
    from{ transform:translateY(400px); opacity:0;}
    to{ transform:translateY(0px); opacity:1;}
}

</style>


</head>

<body>
<div class="head">
<button onclick="toggleRightMenu()" id="btnLeft"><i class="fa fa-arrow-right"></i></button>
  <div class="headMenu">
    <button onclick="toggleRightMenu()" id="btnLeft"><i class="fa fa-user-o"></i></button>
    <button onclick="toggleRightMenu()" id="btnLeft"><i class="fa fa-heart-o"></i></button>
    <button onclick="toggleRightMenu()" id="btnLeft"><i class="fa fa-group"></i></button>
  </div>
<button onclick="toggleRightMenu2()" id="btnRight"><i class="fa fa-arrow-left"></i></button>
</div>

<div class="ajustador">
  <div id="mySidenav" class="colunaLeft">


   
    <div class="user-info">
      <img id="avatar" src="https://espaco.online/media/avatars/3d3147bfa0d0b9aa83a6823de5aa39c4.jpg" alt="Profile Picture">
      <img id="frame" src="https://raw.githubusercontent.com/AndroidWG/WLMOnline/master/assets/background/frame_48.png">
      <div class="profile">
          <div class="aerobutton" id="user">
              <h3>Luan Fernando</h3>
          </div>
          <button class="aerobutton" id="message">
              <p style="margin: 0;">stayin alive</p>
              <img class="arrowdown arrowcontacts" src="https://raw.githubusercontent.com/AndroidWG/WLMOnline/master/assets/general/small_arrow.svg">
          </button>
      </div>
  </div>

      <input type="search" id="iS" onkeyup="fS()" placeholder="Procurar nomes...">
      
      <ul id="sU">
      
      

    <?php foreach($membros['amigos'] as $membroItem): ?>
        <li>
            <div class="friend-drawer friend-drawer--onhover">
            <img class="profile-image" src="<?=$base;?>/media/avatars/<?=$membroItem->avatar;?>" alt="">
            <div class="text">
            <h6><a href="<?=$base;?>/chat/uid=<?=$membroItem->id;?>"><?=$membroItem->name;?></a></h6>
            <p class="text-muted"><?=$membroItem->frase;?></p>
            </div>
            <span class="time text-muted small"><?=$membroItem->id;?>:<?=$membroItem->id;?></span>
            </div>
        </li>
    <?php endforeach; ?>

  </ul>
      


  </div>

  <div class="colunaRight">

    <div class="colunaRightTop">
    </div>

  
      <div id="mySidenav3" class="colunaRightLeft">

        <div class="colunaRightLeftTop">







          <div class="chattext" id="parentDiv" style="
          height: 100px;
      ">
                            


                            
                            <?php foreach($recados['post'] as $feedItem): ?>
                            <div class="msg">
                                <div class="bubble <?php if ($feedItem->id_user === $loggedUser->id): ?>altfollow<?php endif; ?>">
                                    <div class="txt">
                                    <span class="name_user"><span><?=$feedItem->user->name;?> </span></span>
                                    <span class="timestamp"><?=date('d/m/Y H:i', strtotime($feedItem->created_at)-10800);?></span>
                                    <p class="messagechat"><?=$feedItem->body;?></p>
                                    </div>
                                    <div class="<?php if ($user->id === $feedItem->id_user): ?>bubble-arrow<?php endif; ?> <?php if ($feedItem->id_para === $user->id): ?>bubble-right<?php endif; ?>"></div>
                                </div>
                            </div> 
						<?php endforeach; ?>








</div>














        </div>

        <div class="colunaRightLeftButtom">

          <form method="POST" action="https://espaco.online/addchat/new">
            <textarea class="chattext" name="body" id="body" placeholder="Digite sua mensagem aqui..."></textarea>
            <button type="submit" id="sendbutton">Enviar</button>
            <input type="hidden" name="idpara" value="<?=$user->id;?>">
        </form>

          
        </div>

      </div>


      <div id="mySidenav2" class="colunaRightRight">
                <div id="topavatar">
                  <img class="avatar" src="<?=$base;?>/media/avatars/<?=$user->avatar;?>" alt="">
                  <img class="frame" src="https://raw.githubusercontent.com/AndroidWG/WLMOnline/master/assets/background/frame_96.png">
                  
              </div>



              <div id="bottomavatar">
                <img class="avatar" src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" alt="">
                <img class="frame" src="https://raw.githubusercontent.com/AndroidWG/WLMOnline/master/assets/background/frame_96.png">
                
            </div>

      </div>
  

  </div>

</div>

<div class="footer">
  <button onclick="toggleRightMenu()" id="btnLeft"><i class="fa fa-home"></i></button>
    <div class="headMenu">
      
      <button onclick="toggleRightMenu()" id="btnLeft"><i class="fa fa-photo"></i></button>
    </div>
  <button onclick="toggleRightMenu()" id="btnLeft"><i class="fa fa-search"></i></button>
  <button onclick="toggleRightMenu2()" id="btnRight"><i class="fa fa-gears"></i></button>
  </div>


<script>
  function toggleRightMenu() {
      MenuStatus = document.getElementById('mySidenav').style.display;
      if ( MenuStatus == 'block' ) {
      document.getElementById("mySidenav").style.display="none";
      } else {
      document.getElementById("mySidenav").style.display="block";
      }
      if ( MenuStatus == 'none' ) {document.getElementById("mySidenav").style.display="block";}
  }

  function toggleRightMenu2() {

      var windowWidth = window.innerWidth;
      var screenWidth = screen.width;

      MenuStatus = document.getElementById('mySidenav2').style.display;
      if ( MenuStatus == 'block' ) {
        document.getElementById("mySidenav3").style.width="calc(100% - 20px)";
      document.getElementById("mySidenav2").style.display="none";
      
      } else {
        
      document.getElementById("mySidenav3").style.width="calc(100% - 180px)";
      document.getElementById("mySidenav2").style.display="block";
      }
      if ( MenuStatus == 'none' ) {document.getElementById("mySidenav2").style.display="block";
      document.getElementById("mySidenav3").style.width="calc(100% - 180px)";}
  }



  function fS() {
    var input, filter, ul, li, a, i;
    input = document.getElementById('iS');
    filter = input.value.toUpperCase();
    ul = document.getElementById("sU");
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
            
        }
    }
}






var emojis = JSON.parse('[{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":null,"width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/smirking-face_1f60f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/persevering-face_1f623.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/disappointed-but-relieved-face_1f625.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-open-mouth_1f62e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/hushed-face_1f62f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/sleepy-face_1f62a.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/tired-face_1f62b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/sleeping-face_1f634.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/relieved-face_1f60c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-stuck-out-tongue_1f61b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-stuck-out-tongue-and-winking-eye_1f61c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-stuck-out-tongue-and-tightly-closed-eyes_1f61d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/unamused-face_1f612.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-cold-sweat_1f613.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/pensive-face_1f614.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/confused-face_1f615.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/astonished-face_1f632.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/slightly-frowning-face_1f641.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/confounded-face_1f616.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/disappointed-face_1f61e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/worried-face_1f61f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-look-of-triumph_1f624.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/crying-face_1f622.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/loudly-crying-face_1f62d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/frowning-face-with-open-mouth_1f626.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/anguished-face_1f627.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/fearful-face_1f628.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/weary-face_1f629.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/grimacing-face_1f62c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-open-mouth-and-cold-sweat_1f630.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-screaming-in-fear_1f631.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/flushed-face_1f633.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/dizzy-face_1f635.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/pouting-face_1f621.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/angry-face_1f620.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-medical-mask_1f637.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/smiling-face-with-halo_1f607.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/smiling-face-with-horns_1f608.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/imp_1f47f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/japanese-ogre_1f479.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/japanese-goblin_1f47a.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/skull_1f480.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/ghost_1f47b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/extraterrestrial-alien_1f47d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/alien-monster_1f47e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/pile-of-poo_1f4a9.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/smiling-cat-face-with-open-mouth_1f63a.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/grinning-cat-face-with-smiling-eyes_1f638.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/cat-face-with-tears-of-joy_1f639.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/smiling-cat-face-with-heart-shaped-eyes_1f63b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/cat-face-with-wry-smile_1f63c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/kissing-cat-face-with-closed-eyes_1f63d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/weary-cat-face_1f640.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/crying-cat-face_1f63f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/pouting-cat-face_1f63e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/see-no-evil-monkey_1f648.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/hear-no-evil-monkey_1f649.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/speak-no-evil-monkey_1f64a.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/baby_1f476.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/boy_1f466.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/girl_1f467.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/man_1f468.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/woman_1f469.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/older-man_1f474.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/older-woman_1f475.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/police-officer_1f46e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/guardsman_1f482.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/construction-worker_1f477.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/princess_1f478.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/man-with-turban_1f473.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/man-with-gua-pi-mao_1f472.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/person-with-blond-hair_1f471.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/bride-with-veil_1f470.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/baby-angel_1f47c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/father-christmas_1f385.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/person-frowning_1f64d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/person-with-pouting-face_1f64e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-no-good-gesture_1f645.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-with-ok-gesture_1f646.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/information-desk-person_1f481.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/happy-person-raising-one-hand_1f64b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/person-bowing-deeply_1f647.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/face-massage_1f486.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/haircut_1f487.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/pedestrian_1f6b6.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/runner_1f3c3.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/dancer_1f483.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/woman-with-bunny-ears_1f46f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/bath_1f6c0.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/bust-in-silhouette_1f464.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/busts-in-silhouette_1f465.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/horse-racing_1f3c7.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/snowboarder_1f3c2.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/surfer_1f3c4.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/rowboat_1f6a3.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/swimmer_1f3ca.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/bicyclist_1f6b4.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/man-and-woman-holding-hands_1f46b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/two-men-holding-hands_1f46c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/two-women-holding-hands_1f46d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/kiss_1f48f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/couple-with-heart_1f491.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/family_1f46a.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/flexed-biceps_1f4aa.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/white-left-pointing-backhand-index_1f448.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/white-right-pointing-backhand-index_1f449.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/white-up-pointing-backhand-index_1f446.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/white-down-pointing-backhand-index_1f447.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/victory-hand_270c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/raised-hand_270b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/ok-hand-sign_1f44c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/thumbs-up-sign_1f44d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/thumbs-down-sign_1f44e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/fisted-hand-sign_1f44a.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/waving-hand-sign_1f44b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/clapping-hands-sign_1f44f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/open-hands-sign_1f450.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/person-raising-both-hands-in-celebration_1f64c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/person-with-folded-hands_1f64f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/nail-polish_1f485.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/ear_1f442.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/nose_1f443.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/footprints_1f463.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/eyes_1f440.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/eye_1f441.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/tongue_1f445.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/mouth_1f444.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/kiss-mark_1f48b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/heart-with-arrow_1f498.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/heavy-black-heart_2764.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/beating-heart_1f493.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/broken-heart_1f494.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/two-hearts_1f495.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/sparkling-heart_1f496.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/growing-heart_1f497.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/blue-heart_1f499.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/green-heart_1f49a.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/yellow-heart_1f49b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/purple-heart_1f49c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/heart-with-ribbon_1f49d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/revolving-hearts_1f49e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/heart-decoration_1f49f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/love-letter_1f48c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/sleeping-symbol_1f4a4.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/anger-symbol_1f4a2.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/bomb_1f4a3.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/collision-symbol_1f4a5.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/splashing-sweat-symbol_1f4a6.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/dash-symbol_1f4a8.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/dizzy-symbol_1f4ab.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/speech-balloon_1f4ac.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/thought-balloon_1f4ad.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/eyeglasses_1f453.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/necktie_1f454.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/t-shirt_1f455.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/jeans_1f456.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/dress_1f457.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/kimono_1f458.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/bikini_1f459.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/womans-clothes_1f45a.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/purse_1f45b.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/handbag_1f45c.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/pouch_1f45d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/school-satchel_1f392.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/mans-shoe_1f45e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/athletic-shoe_1f45f.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/high-heeled-shoe_1f460.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/womans-sandal_1f461.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/womans-boots_1f462.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/crown_1f451.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/womans-hat_1f452.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/top-hat_1f3a9.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/graduation-cap_1f393.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/lipstick_1f484.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/ring_1f48d.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/gem-stone_1f48e.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/monkey-face_1f435.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/monkey_1f412.png","width":"72","height":"72"},{"name":"https://emojipedia-us.s3.amazonaws.com/thumbs/72/mozilla/36/dog-face_1f436.png","width":"72","height":"72"}]');
// Not Made to be production level I made this quickly for testing a websocket server and added the emojies for fun!
// Selectors
var messages = document.querySelector('.messages')
var btn = document.querySelector('.btn')
var input = document.querySelector('.input input')
var emojiholder = document.querySelector('.emoji-holder')
var emojiwrapper = document.querySelector('.emoji-wrapper')
var emojibtn = document.querySelector('.emoji-btn')

// Button/Enter Key
btn.addEventListener('click', sendMessage)
input.addEventListener('keyup', function(evt){ if(evt.keyCode == 13) sendMessage() })
emojibtn.addEventListener('click', function(e){
   e.stopPropagation()
   this.classList.toggle('open')
})
document.body.addEventListener('click', function(){
   emojibtn.classList.remove('open')
})

// Messenger Functions
function sendMessage(){
   var msg = input.value;
   input.value = ''
   writeLine(msg)
}
function addMessage(evt){
   console.log(evt);
   var msg = evt.data ? JSON.parse(evt.data) : evt;
   writeLine(`${msg.FROM}: ${msg.MESSAGE}`)
}
function writeLine(text){
   var message = document.createElement('div')
   message.classList.add('message')
   message.innerHTML= 'Test says: ' + text
   messages.appendChild(message)
   messages.scrollTop = messages.scrollHeight;
}

// Load the Emojies
for(var i = 0; i < emojis.length; i++){
   if(emojis[i].name == null) continue
   emojiwrapper.innerHTML += `
      <img class="emoji-img" src="${emojis[i].name}"/>
   `
}

// Emoji Events
var emojiElements = []
setTimeout(function(){
   emojiElements = document.querySelectorAll('.emoji-popup .emoji-img')
   for(var i = 0; i < emojiElements.length; i++){
      emojiElements[i].addEventListener('click', function(){
         input.value = `<img style="width:48px; height: 48px" src="${this.getAttribute('src')}"/>`
         sendMessage()
         emojibtn.classList.remove('open')
      })
   }
})

</script>



</body>
</html>
