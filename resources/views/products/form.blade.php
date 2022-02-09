<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-cube" aria-hidden="true"></i></div>
            </div>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Produto" value="{{ $product->name ?? '' }}">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="inlineFormInputGroup">Estoque</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i></div>
            </div>
            <input type="number" class="form-control" name="stock" id="stock" placeholder="" value="{{ $product->stock ?? '' }}">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="inlineFormInputGroup">Valor</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text">R$</div>
            </div>
            <input type="text" class="form-control moeda" name="price" id="price" placeholder="" value="{{ Helper::converte_valor_real($product->price ?? '') }}">
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inlineFormInputGroup">Descrição</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
            </div>
            <input type="text" class="form-control" name="description" id="description" placeholder="" value="{{ $product->description ?? '' }}">
        </div>
    </div>
</div>