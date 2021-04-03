@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">


                <h2 class="text-center">المنتجات</h2>
                <div class="card-body">
                    @livewire('products.table')
                </div>

            </div>
        </div>
@endsection
