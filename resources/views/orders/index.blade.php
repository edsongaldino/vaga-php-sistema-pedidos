@extends('../layouts.layout')
@section('conteudo')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Listagem de Pedidos</h2>
                <a href="{{ route('orders.create') }}"><button type="button" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Pedido</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl">
                      <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Data</th>
                            <th>Usuário</th>
                            <th>Total</th>
                            <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($orders as $order)
                        <tr class="alert" role="alert">
                          <td>{{ $order->id }}</td>
                          <td>{{ Helper::datetime_br($order->created_at) }}</td>
                          <td>{{ $order->user->name }}</td>
                          <td class="status"><span class="active">R$ {{ Helper::converte_valor_real(Helper::totalPrice($order->id)) }}</span></td>
                          <td class="actions">
                            <a href="{{ url('order/'.$order->id.'/edit') }}"><button type="button" class="btn btn-info" title="Visualizar Itens do Pedido"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            <a href="#" class="removeOrder" data-id="{{ $order->id }}" data-token="{{ csrf_token() }}"><button type="button" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></button></a>
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
					