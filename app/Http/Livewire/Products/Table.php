<?php

namespace App\Http\Livewire\Products;

use App\Models\Sales;
use App\Repositories\ProductsRepository;
use Livewire\Component;

class Table extends Component
{
    public $items;
    public $list;
    public $returns;
    public $total = 0;

    public function mount()
    {
        $this->items = collect();
        $this->list = collect();
        $this->returns = collect();
    }

    public function reset(...$properties)
    {
        $this->items = collect();
        $this->list = collect();
        $this->returns = collect();
    }

    public function addItem($item, $price)
    {
        $temp = $this->initItem($item, $price);
        $this->items->push($temp);
        $this->cartList();
    }

    public function cartList()
    {

        foreach ($this->items as $item) {
            if ($this->list->where('id', $item['id'])->count() == 0) {
                $item['count'] = $this->items->where('id', $item['id'])->count();
                $this->list->push($item);
            } else {
                $this->list = $this->list->map(function ($attr) use ($item) {
                    if ($attr['id'] == $item['id'])
                        $attr['count'] = $this->items->where('id', $item['id'])->count();
                    return $attr;
                });
            }
        }

    }

    public function save()
    {
        Sales::create([
            "user_id" => 1,
            "items" => json_encode($this->list),
            "returns" => json_encode($this->returns)
        ]);
        session()->flash('message', 'تم الحفظ بنجاح');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.products.table', ['products' => ProductsRepository::all(),'sales'=>Sales::all()]);
    }

    private function initItem($item, $price)
    {
        return ["id" => $item, 'price' => $price];
    }
}
