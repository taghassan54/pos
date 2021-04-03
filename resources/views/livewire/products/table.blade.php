<div class="row">

    @foreach($products as $product)
        <div class="card col-3">

            <div class="card-body text-center">
                <h3>{{$product->name}}</h3>
                <button class="btn btn-success" wire:click="addItem('{{$product->id}}')"> اضف للسله </button>
            </div>
        </div>
    @endforeach

        {!! $items !!}
</div>
