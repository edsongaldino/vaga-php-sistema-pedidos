@extends('../layouts.layout')
@section('conteudo')

<section class="ftco-section cadastro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Cadastro Pedido</h2>
            </div>
        </div>
        
        <form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="{{ route('orders.update') }}">
            @csrf
            @include('orders.form')
            <input type="hidden" name="id" id="id" value="{{ $product->id }}">
            <button class="salvar-pedido" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Gravar Pedido</button>
          </form>

    </div>
</section>

@endsection				
					