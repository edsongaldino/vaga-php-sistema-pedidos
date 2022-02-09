@extends('../layouts.layout')
@section('conteudo')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Listagem de Produtos</h2>
                <a href="{{ route('products.create') }}"><button type="button" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Produto</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl">
                      <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Nome do Produto</th>
                            <th>Estoque</th>
                            <th>Valor</th>
                            <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($products as $product)
                        <tr class="alert" role="alert">
                          <td>{{ $product->id }}</td>
                          <td>{{ $product->name }}</td>
                          <td class="status">{{ $product->stock }}</td>
                          <td class="status"><span class="active">R$ {{ Helper::converte_valor_real($product->price) }}</span></td>
                          <td class="actions">
                            <a href="{{ url('product/'.$product->id.'/edit') }}"><button type="button" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a>
                            <a href="#" class="removeProduct" data-id="{{ $product->id }}" data-token="{{ csrf_token() }}"><button type="button" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></button></a>
                        </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection				
					