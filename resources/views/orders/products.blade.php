@extends('../layouts.layout')
@section('conteudo')

<section class="ftco-section cadastro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Cadastro Pedido para ({{ $order->user->name ?? '' }})</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" class="needs-validation addProduct" action="{{ route('order.addProduct') }}">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <input type="hidden" name="product_id" id="idProduct" value="">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inlineFormInputGroup">Código Produto</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-cube" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" name="ProductID" id="ProductID" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inlineFormInputGroup">Nome</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-cube" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" name="name" id="nameProduct" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inlineFormInputGroup">Valor Unitário</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-cube" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" name="price" id="priceProduct" placeholder="" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inlineFormInputGroup">Quantidade</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-cube" aria-hidden="true"></i></div>
                                </div>
                                <input type="numer" class="form-control" name="quantity" id="quantity" required>
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <button class="adicionar-produto" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Adicionar</button>
                        </div>

                    </div>
                </form>
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
                            <th>Quantidade</th>
                            <th>Valor Unitátio</th>
                            <th>Valor Total</th>
                            <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($order->items as $item)
                        <tr class="alert" role="alert">
                          <td>{{ $item->product_id }}</td>
                          <td>{{ $item->product->name ?? '' }}</td>
                          <td>{{ $item->quantity }}</td>
                          <td class="status">{{ $item->price }}</td>
                          <td class="status"><span class="active">R$ {{ Helper::converte_valor_real($item->price*$item->quantity) }}</span></td>
                          <td class="actions">
                            <a href="#" class="removeProductOrder" data-order="{{ $item->order_id }}" data-product="{{ $item->product_id }}" data-token="{{ csrf_token() }}"><button type="button" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></button></a>
                        </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h3 class="heading-section">Total do Pedido</h3>
                <button type="button" class="btn btn-info total-pedido">R$ {{ Helper::converte_valor_real(Helper::totalPrice($order->id)) }}</button></a>
            </div>
        </div>

    </div>
</section>

@endsection				
					