<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductItem extends Component
{
    private $row =null;
    /**
     * Create a new component instance.
     */
    public function __construct($rowproduct)
    {
        $this->row = $rowproduct;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $product = $this->row;
        return view('components.product-item',compact('product'));
    }
}
