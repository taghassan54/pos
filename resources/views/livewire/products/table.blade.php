<div class="div">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-9">
            <div class="row">

                @foreach($products as $product)
                    <div class="card col-3">

                        <div class="card-body text-center">
                            <h3>{{$product->name}}</h3>
                            <h6>{{$product->price}} SAR</h6>
                            <button class="btn btn-success"
                                    wire:click="addItem('{{$product->id}}','{{$product->price}}')"> اضف
                                للسله
                            </button>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">

                    <ul>
                        <li> ID -- Count * Unit Price = Total</li>

                        @if($list)
                            @forelse($list as $item)
                                <li> {{$item['id']}} -- {{$item['count']}} * {{$item['price']}} SAR
                                    = {{ $item['count'] * $item['price']}} SAR
                                </li>
                            @empty
                            @endforelse
                        @endif
                    </ul>
                </div>
                <button class="btn btn-info col-12" wire:click="save">ارسال الطلب</button>
            </div>

        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-6">
            <h4>المبيعات</h4>
            <ul>
                @foreach($sales as $sale)
                    <li> رقم الطلب : {{$sale->id}}</li>
                    <h5>المنتجات</h5>
                    <ul>
                        @if(is_array(json_decode($sale->items,true)))
                            @foreach(json_decode($sale->items,true) as $item)
                                <li> رقم المنتج : {{$item['id']}}</li>
                                <ul>
                                    <li> الكميه : {{$item['count']}}</li>
                                    <li> السعر : {{$item['price']}}</li>
                                    <li> القيمه الكليه : {{$item['price'] * $item['count']}}</li>
                                    <li>
                                        <button class="btn btn-danger btn-sm">أضف لقائمه الارجاع</button>
                                    </li>
                                </ul>

                            @endforeach
                        @endif
                    </ul>
            </ul>
        </div>

        <div class="col-6">
            <ul>
                <h5>المرتجع</h5>
                <ul>
                    @if(is_array(json_decode($sale->returns,true)))
                        @foreach(json_decode($sale->returns,true) as $item)
                            <li> رقم المنتج : {{$item['id']}}</li>
                            <ul>
                                <li> الكميه : {{$item['count']}}</li>
                                <li> السعر : {{$item['price']}}</li>
                                <li> القيمه الكليه : {{$item['price'] * $item['count']}}</li>
                                <li>
                                    <button class="btn btn-danger btn-sm">أضف لقائمه الارجاع</button>
                                </li>
                            </ul>

                        @endforeach
                    @endif
                </ul>
                @endforeach
            </ul>
        </div>
    </div>


</div>
