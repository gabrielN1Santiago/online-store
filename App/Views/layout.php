<?php

	session_start();

?>

<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta charset="utf-8" />
		<title>Online Store</title>

        <script src="<?php echo BASE_URL?>/js/jquery-3.7.1.min.js"></script>
		<script src="<?php echo BASE_URL?>/js/popper.min.js"></script>
		<script src="<?php echo BASE_URL?>/js/bundle.js"></script>

		<script>
			$(document).ready(() => {
				console.log(typeof jQuery);
			})
		</script>

		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>/css/bootstrap.css">

		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>/css/style.css">

	</head>

	<body class="d-flex flex-column min-vh-100">

		<header class="mb-5">

			<nav class="navbar navbar-expand-lg my-navbar">

				<div class="container-fluid">
					<a class="navbar-brand" href="<?php echo BASE_URL?>">
						<svg  width="40" height="40" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-watch" viewBox="0 0 16 16">
							<path d="M8.5 5a.5.5 0 0 0-1 0v2.5H6a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5z"/>
							<path d="M5.667 16C4.747 16 4 15.254 4 14.333v-1.86A6 6 0 0 1 2 8c0-1.777.772-3.374 2-4.472V1.667C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v1.86a6 6 0 0 1 1.918 3.48.502.502 0 0 1 .582.493v1a.5.5 0 0 1-.582.493A6 6 0 0 1 12 12.473v1.86c0 .92-.746 1.667-1.667 1.667zM13 8A5 5 0 1 0 3 8a5 5 0 0 0 10 0"/>
						</svg>
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">

						<ul class="navbar-nav me-auto mb-2 mb-lg-0">

							<li class="nav-item">
								<a class="nav-link <?php echo $this->view->route == '/' ? "active" : '';?>" aria-current="page" href="<?php echo BASE_URL;?>">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php echo $this->view->route == '/products' ? "active" : '';?>" href="<?php echo BASE_URL;?>/products">Produtos</a>
							</li>
							<?php if(!isset($_SESSION['id'])):?>
								<li class="nav-item">
									<a class="nav-link <?php echo $this->view->route == '/admin' ? "active" : '';?>" href="<?php echo BASE_URL;?>/admin">Login</a>
								</li>
							<?php else:?>
								<li class="nav-item">
									<a class="nav-link <?php echo $this->view->route == '/adminPage' ? "active" : '';?>" href="<?php echo BASE_URL;?>/adminPage">Página do Admin</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo BASE_URL;?>/logout">Sair</a>
								</li>
							<?php endif;?>

						</ul>

					</div>

				</div>

			</nav>

		</header>

		<div class="container flex-grow-1">

			<?= $this->content() ?>

		</div>

		<footer class="py-3 mt-5">

			<p>

				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
					<path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
				</svg> +00 (00) 0000-0000<br> <br>
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
					<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
				</svg> youremail@example.com.br<br><br>
				<a href="https://www.facebook.com/yourfacebooklink/?locale=pt_BR">
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
						<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
					</svg>
				</a>
				/<a href="https://www.instagram.com/yourinstagramlink/">
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
						<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.232-.047c-.78-.036-1.204-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.599-.919c-.11-.282-.24-.705-.275-1.485-.039-.843-.047-1.096-.047-3.232s.008-2.389.047-3.232c.035-.78.166-1.203.275-1.485a2.5 2.5 0 0 1 .599-.92c.28-.28.546-.453.92-.598.281-.109.705-.24 1.485-.275.843-.039 1.096-.047 3.232-.047zM8 3.478c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5 4.5-2.02 4.5-4.5-2.02-4.5-4.5-4.5zm0 7.39c-1.622 0-2.91-1.31-2.91-2.91s1.31-2.91 2.91-2.91c1.621 0 2.91 1.31 2.91 2.91s-1.29 2.91-2.91 2.91zm3.35-6.774c-.457 0-.828-.371-.828-.828 0-.457.371-.828.828-.828.457 0 .828.371.828.828 0 .457-.371.828-.828.828z"/>
					</svg>
				</a>

			</p>

		</footer>

	</body>

</html>