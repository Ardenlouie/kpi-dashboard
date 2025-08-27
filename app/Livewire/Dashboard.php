<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Budget;

class Dashboard extends Component
{
    public $year=0, $months=0, $months1=0, $total=0, $total_beva=0, $total_bevi=0, $total_bigi=0, $total_bevi_py=0, 
    $total_beva_py=0, $total_bigi_py=0, $emg_bevi=0, $emg_beva=0, $emg_bigi=0, $nkag_bevi=0, $inhouse_bevi=0, $rdg_beva=0, $tradeworld=0,
    $inhouse_beva=0, $ptuiccp=0, $ecomm=0, $export=0, $nkag_bevi_py=0, $inhouse_bevi_py=0, $rdg_beva_py=0, $tradeworld_py=0,
    $inhouse_beva_py=0, $ptuiccp_py=0, $ecomm_py=0, $export_py=0, $emg_nkag_bevi=0, $emg_inhouse_bevi=0, $emg_rdg_beva=0, $emg_tradeworld=0,
    $emg_inhouse_beva=0, $emg_ptuiccp=0, $emg_ecomm=0, $emg_export=0, $nka_total_budget=0, $rdg_total_budget=0, $emp_nkag=0, $emp_rdg=0, $beviBrandTotals=[];

    public function updatedYear($year)
    {
        $this->year = $year;

        if(!empty($this->months)){
            $this->updatedMonths($this->months);
        }
    }


    public function updatedMonths($months)
    {
        $this->reset('total_bevi', 'total_beva', 'total_bigi', 'total_bevi_py', 'total_beva_py', 'total_bigi_py', 'emg_bevi', 'emg_beva', 'emg_bigi', 'nkag_bevi',
     'inhouse_bevi', 'rdg_beva', 'tradeworld', 'inhouse_beva', 'ptuiccp', 'ecomm', 'export', 'nkag_bevi_py',
     'inhouse_bevi_py', 'rdg_beva_py', 'tradeworld_py', 'inhouse_beva_py', 'ptuiccp_py', 'ecomm_py', 'export_py');

        $prev_year = $this->year - 1;

        $sales_api_bevi = Http::withToken('UaHxtws9LHZ47QG21lBXjQgka3Fe93H5xV1Y6HBQDN4=')->get('http://192.168.11.240/refreshable/public/api/arTrn_bevi/'.$this->year.'/'.$this->months1.'/'.$this->months);
        $nka_budgets = Budget::where('business_name', 'NKA')->where('year', $this->year)->where('month', $this->months);
        $rdg_budgets = Budget::where('business_name', 'RDG')->where('year', $this->year)->where('month', $this->months);

        $sales_bevi_collect = collect($sales_api_bevi->json());

        $this->nka_total_budget = $nka_budgets->sum('amount');
        $this->rdg_total_budget = $rdg_budgets->sum('amount');

        $this->beviBrandTotals = $sales_bevi_collect
            ->groupBy('Brand')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc();


        $sales_bevi_collect = collect($sales_api_bevi->json());
        $sales_bevi_collect_py = collect($sales_api_bevi->json());


        $sales_bevi = $sales_bevi_collect->where('Company', 'BEVI');
        $sales_beva = $sales_bevi_collect->where('Company', 'BEVA');
        $sales_bigi = $sales_bevi_collect->where('Company', 'BIG I');

        $sales_bevi_py = $sales_bevi_collect_py->where('Company', 'BEVI');
        $sales_beva_py = $sales_bevi_collect_py->where('Company', 'BEVA');
        $sales_bigi_py = $sales_bevi_collect_py->where('Company', 'BIG I');

        // BEVI
        $sales_bevi_nkag = $sales_bevi->where('BusinessUnit', 'NKA');
        $sales_bevi_inhouse = $sales_bevi->where('BusinessUnit', 'IN-HOUSE');
        
        // BEVA
        $sales_beva_rdg = $sales_beva->where('BusinessUnit', 'RDG');
        $sales_beva_tradeworld = $sales_beva->where('BusinessUnit', 'IN-HOUSE')->where('ShortName', 'TRADEWORLD');
        $sales_beva_inhouse = $sales_beva->where('BusinessUnit', 'IN-HOUSE')->where('ShortName', '!=', 'TRADEWORLD');
        $sales_beva_ptuiccp = $sales_beva->where('ShortName', 'PT. UICCP');

        // BIG I
        $sales_bigi_ecomm = $sales_bigi->where('BusinessUnit', 'ECOM');
        $sales_bigi_export= $sales_bigi->where('BusinessUnit', 'EXPORT');

        // BEVI PY
        $sales_bevi_nkag_py = $sales_bevi_py->where('BusinessUnit', 'NKA');
        $sales_bevi_inhouse_py = $sales_bevi_py->where('BusinessUnit', 'IN-HOUSE');

        // BEVA PY
        $sales_beva_rdg_py = $sales_beva_py->where('BusinessUnit', 'RDG');
        $sales_beva_tradeworld_py = $sales_beva_py->where('BusinessUnit', 'IN-HOUSE')->where('ShortName', 'TRADEWORLD');
        $sales_beva_inhouse_py = $sales_beva_py->where('BusinessUnit', 'IN-HOUSE')->where('ShortName', '!=', 'TRADEWORLD');
        $sales_beva_ptuiccp_py = $sales_beva_py->where('ShortName', 'PT. UICCP');

        // BIG I PY
        $sales_bigi_ecomm_py = $sales_bigi_py->where('BusinessUnit', 'ECOM');
        $sales_bigi_export_py = $sales_bigi_py->where('BusinessUnit', 'EXPORT');


        foreach($sales_bevi as $sale_bevi){
            $this->total_bevi += $sale_bevi['Actual Amount'];
        }

        foreach($sales_bevi_nkag as $sale_bevi){
            $this->nkag_bevi += $sale_bevi['Actual Amount'];
        }

        foreach($sales_bevi_inhouse as $sale_bevi){
            $this->inhouse_bevi += $sale_bevi['Actual Amount'];
        }

        foreach($sales_beva as $sale_beva){
            $this->total_beva += $sale_beva['Actual Amount'];
        }

        foreach($sales_beva_rdg as $sale_beva){
            $this->rdg_beva += $sale_beva['Actual Amount'];
        }

        foreach($sales_beva_tradeworld as $sale_beva){
            $this->tradeworld += $sale_beva['Actual Amount'];
        }

        foreach($sales_beva_inhouse as $sale_beva){
            $this->inhouse_beva += $sale_beva['Actual Amount'];
        }

        foreach($sales_beva_ptuiccp as $sale_beva){
            $this->ptuiccp += $sale_beva['Actual Amount'];
        }

        foreach($sales_bigi as $sale_bigi){
            $this->total_bigi += $sale_bigi['Actual Amount'];
        }

        foreach($sales_bigi_ecomm as $sale_bigi){
            $this->ecomm += $sale_bigi['Actual Amount'];
        }

        foreach($sales_bigi_export as $sale_bigi){
            $this->export += $sale_bigi['Actual Amount'];
        }

        foreach($sales_bevi_py as $sale_bevi){
            $this->total_bevi_py += $sale_bevi['Previous Amount'];
        }

        foreach($sales_beva_py as $sale_beva){
            $this->total_beva_py += $sale_beva['Previous Amount'];
        }

        foreach($sales_bigi_py as $sale_bigi){
            $this->total_bigi_py += $sale_bigi['Previous Amount'];
        }

        foreach($sales_bevi_nkag_py as $sale_bevi){
            $this->nkag_bevi_py += $sale_bevi['Previous Amount'];
        }

        foreach($sales_bevi_inhouse_py as $sale_bevi){
            $this->inhouse_bevi_py += $sale_bevi['Previous Amount'];
        }

        foreach($sales_beva_rdg_py as $sale_beva){
            $this->rdg_beva_py += $sale_beva['Previous Amount'];
        }

        foreach($sales_beva_tradeworld_py as $sale_beva){
            $this->tradeworld_py += $sale_beva['Previous Amount'];
        }

        foreach($sales_beva_inhouse_py as $sale_beva){
            $this->inhouse_beva_py += $sale_beva['Previous Amount'];
        }

        foreach($sales_beva_ptuiccp_py as $sale_beva){
            $this->ptuiccp_py += $sale_beva['Previous Amount'];
        }

        foreach($sales_bigi_ecomm_py as $sale_bigi){
            $this->ecomm_py += $sale_bigi['Previous Amount'];
        }

        foreach($sales_bigi_export_py as $sale_bigi){
            $this->export_py += $sale_bigi['Previous Amount'];
        }

        if($this->total_bevi != 0){
            $this->emg_bevi = $this->total_bevi_py != 0 ? (($this->total_bevi - $this->total_bevi_py) / $this->total_bevi_py) * 100 : 0;
            $this->emg_beva = $this->total_beva_py != 0 ? (($this->total_beva - $this->total_beva_py) / $this->total_beva_py) * 100 : 0;
            $this->emg_bigi = $this->total_bigi_py != 0 ? (($this->total_bigi - $this->total_bigi_py) / $this->total_bigi_py) * 100 : 0;

            $this->emg_nkag_bevi = $this->nkag_bevi_py != 0 ? (($this->nkag_bevi - $this->nkag_bevi_py) / $this->nkag_bevi_py) * 100 : 0;
            $this->emg_inhouse_bevi = $this->inhouse_bevi_py != 0 ? (($this->inhouse_bevi - $this->inhouse_bevi_py) / $this->inhouse_bevi_py) * 100 : 0;

            $this->emg_rdg_beva = $this->rdg_beva_py != 0 ? (($this->rdg_beva - $this->rdg_beva_py) / $this->rdg_beva_py) * 100 : 0;
            $this->emg_tradeworld = $this->tradeworld_py != 0 ? (($this->tradeworld - $this->tradeworld_py) / $this->tradeworld_py) * 100 : 0;
            $this->emg_inhouse_beva = $this->inhouse_beva_py != 0 ? (($this->inhouse_beva - $this->inhouse_beva_py) / $this->inhouse_beva_py) * 100 : 0;
            $this->emg_ptuiccp =  $this->ptuiccp_py != 0 ? (($this->ptuiccp - $this->ptuiccp_py) / $this->ptuiccp_py) * 100 : 0;

            $this->emg_ecomm = $this->ecomm_py != 0 ? (($this->ecomm - $this->ecomm_py) / $this->ecomm_py) * 100 : 0;
            $this->emg_export = $this->export_py != 0 ? (($this->export - $this->export_py) / $this->export_py) * 100 : 0;

            $this->emp_nkag = $this->nka_total_budget != 0 ? (($this->nkag_bevi - $this->nka_total_budget) / $this->nka_total_budget) * 100 : 0;
            $this->emp_rdg = $this->rdg_total_budget != 0 ? (($this->rdg_beva - $this->rdg_total_budget) / $this->rdg_total_budget) * 100 : 0;

        }
        

    }
    public function render()
    {

        return view('livewire.dashboard')->with([
         
         
        ]);
    }
}
