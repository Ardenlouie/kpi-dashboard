<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class NewProduct extends Component
{
    public $year=0, $months=0, $day=0, $labels=[], $data=[];

    public function mount()
    {
        
    }

    public function updatedYear($year){
        
        

    }


    public function render()
    {
        
        return view('livewire.new-product')->with([
         

        ]);
    }
}
