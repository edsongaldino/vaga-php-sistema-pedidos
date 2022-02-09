<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Edson Galdino">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Login Page - Sistema Pedidos (VAGA PHP)">
	<title>Login Page - Sistema Pedidos (VAGA PHP)</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Registro de Usuário</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="{{ route('salvar-usuario') }}">
                                @csrf
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Nome completo</label>
									<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
									<div class="invalid-feedback">
										O Nome é obrigatório	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" value="" required>
									<div class="invalid-feedback">
										Este e-mail não é válido
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Senha</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	A senha é obrigatória
							    	</div>
								</div>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
										Cadastrar	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Já possui uma conta? <a href="{{ route('login') }}" class="text-dark">Login</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; {{ date('Y') }} - Edson Galdino
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="/assets/js/login.js"></script>
	@include('sweetalert::alert')

</body>
</html>