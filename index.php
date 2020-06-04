<?php
    require ('steamauth/steamauth.php');  

?>
		<?php
if(!isset($_SESSION['steamid'])) {
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<meta charset='UTF-8'>";
    echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
    echo "<title>BETA Platform</title>";
    echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Varela+Round&display=swap' rel='stylesheet'>";
    echo "<style>
            *{
              padding: 0px;
              margin: 0px;
            }
            body{
              background-color: #16202d;
            }
            .test{
              position: relative;
              width: 100%;
              height: 64px;
              background-color: #131c27;
            }
            .signin_button{
              width: 200px;
              position: relative;
              top: 10px;
            }
            .button {
              background-color: #00b516;
              border: none;
              color: white;
              padding: 10px 25px;
              border-radius: 10px;
              text-align: center;
              text-decoration: none;
              outline:none;
              font-size: 12px;
              transition-duration: 0.4s;
              cursor: pointer;
              box-shadow: 0px 4px #009913;
            }
            .button:hover {
              background-color: #009913;
              color: white;
              border: none;
            }
            .textinside{
              position: relative;
              left: 8px;
              top: 5px;
              float: right;
            }
            .pacman{
              width: 100%;
              height: 35px;
              background-color: #171a21;
            }
            .tservice a{
              height: 15px;
               font-size: 14px;
               display: inline-block;
               transition-duration: 0.7s;
               width: 130px;
               left: 105px;
               position: relative;
               top: -9px;
               text-align: center;
               font-family: helvetica;
               color: #a3a3a3;
               text-decoration: none;
             }
             .tservice a:hover{
              color: white;
             }
             .reedemcode a{
              height: 15px;
              font-size: 14px;
              display: inline-block;
              transition-duration: 0.7s;
              width: 100px;
              left: 10px;
              position: relative;
              top: 10px;
              text-align: center;
              font-family: helvetica;
              color: #0ee07b;
              text-decoration: none;
            }
            .reedemcode a:hover{
              color: #00c265;
            }
            .betaplatform{
              position: fixed;
              color: white;
              top: 58px;
              left: 20px;
              width: 150px;
              font-family: helvetica;
            }
            .textinside{
              font-family: 'Varela Round', sans-serif;
            }
            .chatokno{
              position: fixed;
              left: 1200px;
              bottom: 150px;
              z-index: -1;
            }
            .skrij{
              position: relative;
              width: 382px;
              height: 41.5px;
              color: white;
              border-radius: 10px;
              background-color: #16202d;
              top: 578px;
              left: 1509px;
            }

            .skrijnot{
              position: relative;
              text-align: center;
              top: 10px;
            }

            @media only screen and (min-width: 100px){
            .signin_button{
              left: 50%;
              transform: translate(-50%);
            }

            @media only screen and (min-width: 768px){
              .signin_button{
                left: 85%;
              }
              @media only screen and (min-width: 1150px){
                .signin_button{
                  left: 90%;
                }

                @media only screen and (min-width: 1500px){
                  .signin_button{
                    left: 93%;
                  }
          </style>";
    echo "<div class='pacman'><div class='reedemcode'><a href='#'><strong>Redeem Code</strong></a></div><div class='tservice'><a href='#'><strong>Terms of Service</strong></a></div></div>";
    echo "<div class='test'><div class='signin_button'><a href='?login'><button class='button'><i class='fa fa-steam' style='font-size:20px'></i> <div class='textinside'><strong>SIGN IN WITH STEAM</strong></div></button></a></div></div>";
    echo "</body>";
    echo "</html>";
	}  else {
    include ('steamauth/userInfo.php');
	?>	
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <title>BETA</title>
    <style>
      *{
        padding: 0px;
        margin: 0px;
        }
      body{
        background-color: #16202d;
      }
      .tes{
        width: 100%;
        height: 64px;
        background-color: #131c27;
        }
      .ime{
        position: relative;
        font-family: helvetica;
        color: white;
        top: -36px;
        text-align: right;
        white-space: nowrap; 
        width: 170px; 
        overflow: hidden;
        text-overflow: ellipsis; 
        right: 183px;
        font-family: 'Varela Round', sans-serif;
      }
      .sredina{
        position: relative;
        top: 10px;
        left: 75%;
        width: 64px;
      }
      .sredina img{
        border-radius: 50%;
        width: 45px;
        height: 45px;
      }
      .logout_button{
        position: relative;
        top: -55px;
        background-color: transparent;
        border: none;
        width: 20px;
        left: 56px;
     }
     .fas fa-sign-out-alt{
       color: red;
       background-color: transparent;
       border: none;
       outline: none;
       font-family: helvetica;
       cursor: pointer;
     }
     .logout{
       background-color: transparent;
       color: #a3a3a3;
       border: none;
       outline: none;
       cursor: pointer;
       width: 0px;
     }
     .logout:hover{
       color: white;
       transition-duration: 0.7s;
     }
     .smalltest{
       height: 50px;
       width: 120px;
       opacity: 0%;
       z-index: 1;
       position:relative;
       top: -89px;
       right: 100%;
       background-color: red;
     }
     .betaplatform{
       position: fixed;
       color: white;
       top: 58px;
       left: 20px;
       width: 150px;
       font-family: helvetica;
     }
     .reedemcode a{
       height: 15px;
       font-size: 14px;
       display: inline-block;
       transition-duration: 0.7s;
       width: 100px;
       left: 10px;
       position: relative;
       top: 10px;
       text-align: center;
       font-family: helvetica;
       color: #e3a600;
       text-decoration: none;
     }
     .reedemcode a:hover{
       color: #ffba00;
     }
     .pacman{
       width: 100%;
       height: 35px;
       background-color: #171a21;
     }
     .tservice a{
      height: 15px;
       font-size: 14px;
       display: inline-block;
       transition-duration: 0.7s;
       width: 130px;
       left: 105px;
       position: relative;
       top: -9px;
       text-align: center;
       font-family: helvetica;
       color: #a3a3a3;
       text-decoration: none;
     }
     .tservice a:hover{
      color: white;
     }
     .signin_button{
              width: 200px;
              position: relative;
            }
     .join {
              background-color: #e74c3c;
              border: none;
              color: white;
              padding: 12px 45px;
              border-radius: 10px;
              text-align: center;
              text-decoration: none;
              outline:none;
              font-size: 12px;
              transition-duration: 0.4s;
              cursor: pointer;
              box-shadow: 0px 4px #b03427;
            }
            .join:hover {
              background-color: #b03427;
              color: white;
              border: none;
            }
            .watch {
              background-color: #26364a;
              border: none;
              color: white;
              padding: 12px 37px;
              border-radius: 10px;
              text-align: center;
              text-decoration: none;
              outline:none;
              font-size: 12px;
              transition-duration: 0.4s;
              cursor: pointer;
              box-shadow: 0px 4px #1b2838;
            }
            .watch:hover {
              background-color: #1b2838;
              color: white;
              border: none;
            }
            .textinside{
              font-size: 12px;
              font-family: 'Varela Round', sans-serif;
            }

            .chatokno{
              position: fixed;
              left: 1200px;
              bottom: 150px;
              z-index: -1;
            }
    </style>
  </head>
  <div class="pacman"><div class="reedemcode"><a href="#"><strong>Redeem Code</strong></a></div><div class="tservice"><a href="#"><strong>Terms of Service</strong></a></div></div>
  <div class='tes'><div class="sredina"><img src='<?=$steamprofile['avatarmedium']?>'></a><div class="ime"><?=$steamprofile['personaname']?></div><div class="logout_button"><?php logoutbutton(); ?></div><div class="smalltest"></div></div>
</body>
  </html>
		<?php
		}    
		?>