<?php

namespace App\Http\Livewire\Products;

use App\Repositories\ProductsRepository;
use Livewire\Component;

class Table extends Component
{
    public $items;

    public function mount()
    {
        $this->items = collect();
    }

    public function addItem($item)
    {

        $temp=["id"=>$item,"count"=>5];

        if (!$this->items->where('id',$temp['id'])->count()>0) {
            $this->items->push($temp);
        }else {
            $this->items->pop;
        }
    }

    public function render()
    {
        return view('livewire.products.table', ['products' => ProductsRepository::all()]);
    }
}
