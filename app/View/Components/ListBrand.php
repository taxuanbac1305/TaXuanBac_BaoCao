<?php

namespace App\View\Components;

use App\Models\Brand;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListBrand extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $brands = Brand::where('status','1')->orderBy('id','desc')->get();
        return view('components.list-brand',compact('brands'));
    }
}
