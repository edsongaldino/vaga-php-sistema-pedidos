<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Lista de Produtos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="{{ asset('/vendor/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
	</head>
	<body>


        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('products') }}"><i class="fa fa-home" aria-hidden="true"></i> Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Pedidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
            </li>
        </ul>