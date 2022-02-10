@extends('../layouts.layout')
@section('conteudo')

<section class="ftco-section cadastro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Cadastro Pedido</h2>
            </div>
        </div>
        
        <form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="{{ route('orders.store') }}">
            @csrf
            @include('orders.form')
            <button class="salvar-pedido" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Iniciar Pedido</button>
        </form>

    </div>
</section>

@endsection				
					