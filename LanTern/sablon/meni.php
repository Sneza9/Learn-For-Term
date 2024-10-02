<header class="site-header site-header__header-one ">
	<nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
		<div class="container clearfix">
			<div class="logo-box clearfix">
				<a class="navbar-brand" href="index.php">
					<img src="assets/images/logo-dark.png" class="main-logo" width="128" alt="Awesome Image" />
				</a>
				<button class="menu-toggler" data-target=".main-navigation">
					<span class="kipso-icon-menu"></span>
				</button>
			</div>

			<?php 
				if(isset($_SESSION['idUloga']) && $_SESSION['idUloga']=="1")  	
				{
			?>

			<div class="main-navigation">
				<ul class=" navigation-box">
					<li>
						<a href="index.php">Početna</a>
					</li>

					<li>
						<a href="oglasi.php">Oglasi</a>
					</li>

					<li>
						<a href="omiljeni-oglasi.php">Omiljeni oglasi</a>
					</li>

					<li>
						<a href="">Moj profil</a>
						<ul class="sub-menu">
							<li><a href="izmeni-profil.php">Izmeni profil</a></li>
							<li><a href="moji-oglasi.php">Moji oglasi</a></li>
							<li><a href="dodaj-oglas.php">Dodaj oglas</a></li>
						</ul> 
					</li>

					<li>
						<a href="admin.php">Admin</a>
					</li>

					<li>
						<a href="funkcije/logout.php">Odjavite se</a>
					</li>
				</ul>
			</div> 
			
			<?php
				}
			?>
			
			<?php 
				if(isset($_SESSION['idUloga']) && $_SESSION['idUloga']=="2")  	
				{
			?>

			<div class="main-navigation">
				<ul class=" navigation-box">
					<li>
						<a href="index.php">Početna</a>
					</li>

					<li>
						<a href="oglasi.php">Oglasi</a>
					   
					</li>

					<li>
						<a href="omiljeni-oglasi.php">Omiljeni oglasi</a>
					</li>

					<li>
						<a href="">Moj profil</a>
					   	<ul class="sub-menu">
							<li><a href="izmeni-profil.php">Izmeni profil</a></li>
							<li><a href="moji-oglasi.php">Moji oglasi</a></li>
							<li><a href="dodaj-oglas.php">Dodaj oglas</a></li>
						</ul> 
					</li>

					<li>
						<a href="funkcije/logout.php">Odjavite se</a>
					</li>

					<li>
						<a href="kontakt.php">Kontakt</a>
					</li>
				</ul>
			</div> 
			
			<?php
				}
			?>
			
			<?php 
				if(!isset($_SESSION['idUloga']))  	
				{
			?>

			<div class="main-navigation">
				<ul class=" navigation-box">
					<li>
						<a href="index.php">Početna</a>
					</li>

					<li>
						<a href="oglasi.php">Oglasi</a>
					</li>

					<li>
						<a href="logovanje.php">Prijavljivanje</a>
					</li>

					<li>
						<a href="registracija.php">Registracija</a>
					</li>
					
					<li>
						<a href="kontakt.php">Kontakt</a>
					</li>
				</ul>
			</div> 
			
			<?php
				}
			?>
			
		</div>
	</nav>
	<div class="site-header__decor">
		<div class="site-header__decor-row">
			<div class="site-header__decor-single">
				<div class="site-header__decor-inner-1"></div> 
			</div> 
			<div class="site-header__decor-single">
				<div class="site-header__decor-inner-2"></div> 
			</div> 
			<div class="site-header__decor-single">
				<div class="site-header__decor-inner-3"></div> 
			</div> 
		</div>
	</div>
</header>