<div class="container">
	
				<div class="screen">
		<div class="screen__content">


			<div style="margin-top:5px; margin-left:215px;">
				<img src="../assets/images/UI_logo.png" class="img img-responsive img-circle center-block" height="70" width="70"/>
			</div>		

					<!--<div class="logo-caption">
                        <span class="tweak">S</span>ingle <span class="tweak">S</span>ign <span class="tweak">O</span>n</small>
                    </div>-->
				<div style="margin-left:18px; margin-top:-25px;">
					<h3 class="tittlex" style="color:#777">Aplikasi Pengaduan</h3>
					<h3 class="logo-captionx" style="color:#777">Kerusakan Fasilitas</h3>
					<h3 class="logo-captionx" style="color:#777"></h3>

                    <hr style="width:212px;">
					<b><div style="font-family: 'Poiret One', cursive; color:#777; font-size:15px;">Operasi Pemeliharaan Fasilitas</div></b>
					<br><br>
				</div>	

					<h3 class="logo-caption" style="margin-left:54px">
                        <span class="tweak">S</span>ingle <span class="tweak">S</span>ign <span class="tweak">O</span>n <br><small>Universitas Indonesia</small>
                    </h3>
			<form class="login" action="autentikasi/koneksi" method="POST">
										
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="username" class="login__input" placeholder="User name">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="login__input" placeholder="Password">
				</div>
				<button class="button login__submit">
					<span class="button__text">Sign In</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
					<img src="../assets/images/UI_logo.png" class="img img-responsive img-circle center-block" height="70" width="70"/>
					<div class="social-login__iconx" style="font-family: 'Poiret One', cursive; text-shadow: 0px 0px 1px #7875B5;">
					<font style="color:yellow;font-family: 'Poiret One', cursive; font-size:15px">Fakultas Ilmu Sosial dan Ilmu Politik<br>
					Universitas Indonesia</font><br><br>
										
</div>
				<div class="social-iconsx">

				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
@import url('https://fonts.googleapis.com/css?family=Nunito');
@import url('https://fonts.googleapis.com/css?family=Poiret+One');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

body {
	background: linear-gradient(90deg, #DCDCDC, #DCDCDC);		
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen {		
	background: linear-gradient(90deg, yellowx, orangex);		
	position: relative;	
	height: 600px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #FF9A14;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, yellow, orange);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 420px;
	width: 220px;
	background: #555;
	top: 420px;
	right: 70px;	
	border-radius: 60px;
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 10px; /*padding-top: 156px;*/
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 220px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
	transform: scale(1.5);	
}

.logo-caption {
  font-family: 'Poiret One', cursive;
  color: #888;
  /*text-align: center;
  margin-bottom: 0px;
  margin-left:135px*/
}
.tweak {
  color: #ff5252;
  
}
small{
	font-family: 'Poiret One', cursive;
}
.tittle{
  font-family: 'Poiret One', cursive;
  text-align: center;  
  color: #444;
}
hr{
  color: #ff5252;
}
</style>