<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;
use Illuminate\Support\Facades\Http;


class Bevi extends Component
{
    public $activeTab = '1';
    public $search, $device_id, $item_per_page, $status, $company_id, $bevi_customer;
    public $page_selected;
    public $brand_name;
    
    public function changePage($page_selected) {
        $this->page_selected = $page_selected;
    }

    public function changeTab($tab)
    {
        $this->reset('bevi_customer');
        $this->activeTab = $tab;
        $sales_api_bevi = Http::withoutVerifying()->get('http://192.168.11.240/refreshable/public/api/arTrn_all/2025');
  
        $sales_bevi = collect($sales_api_bevi->json());

        $productClass = Brand::where('id', $tab)->select('class', 'brand_name')->get();
        
        foreach($productClass as $productClasses){
            $this->bevi_customer = $sales_bevi->where('ProductClass', $productClasses->class)->groupBy('ShortName')->map(function ($items) {
            return $items->sum('NetSalesValue');});
            
            $this->brand_name = $productClasses->brand_name;
        }






        // foreach($productClass as $productClasses){
        //     $sales_bevi_customer = $sales_bevi->where('ProductClass', $productClasses->class);

        //     foreach($sales_bevi_customer as $sale_bevi){
        //         $this->landmark += $sale_bevi['NetSalesValue'];
        //     }
        // }

        


    }
    public function mount() {
        $this->item_per_page = '5';
    }


    public function render()
    {
        
        $brands = Brand::all();



        
        // if($this->item_per_page == 'all') {
        //     $bevi_customer = $bevi_customer->get();
        // } else {
        //     $bevi_customer = $bevi_customer->paginate($this->item_per_page, ['*'], 'bevi_customer-page')
        //     ->onEachSide(1);
        // }

        return view('livewire.bevi')->with([
            'brands' => $brands,
         
        ]);
    }
}
