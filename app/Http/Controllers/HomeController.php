<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {      
        return view('home', );
    }

    public function accountData($month, $year, $company)
    {
        $sales_api = Http::withToken('UaHxtws9LHZ47QG21lBXjQgka3Fe93H5xV1Y6HBQDN4=')->get('http://192.168.11.240/refreshable/public/api/arTrn_bevi/'.$year.'/'.$month.'/'.$month);

        $sales_bevi_collect = collect($sales_api->json());

        $companies = explode(',', $company);


        $account = $sales_bevi_collect
            ->whereIn('Company', $companies)
            ->groupBy('ShortName')
            ->map(fn($items) => $items->sum('Actual Amount'))
            ->sortDesc()->take(12);

        $total = number_format($account->sum(), 2, '.', ',');

        return response()->json([
            'labels' => $account->keys(),
            'values' => $account->values(),
            'total'  => $total, 
        ]);
    }

    public function brandData($month, $year, $account)
    {
        $sales_api = Http::withToken('UaHxtws9LHZ47QG21lBXjQgka3Fe93H5xV1Y6HBQDN4=')->get('http://192.168.11.240/refreshable/public/api/arTrn_bevi/'.$year.'/'.$month.'/'.$month);

        $sales_bevi_collect = collect($sales_api->json());

        $brand = $sales_bevi_collect
            ->where('ShortName', $account)
            ->groupBy('Brand')
            ->map(fn($items) => $items->sum('Actual Amount'))
            ->sortDesc()->take(7);

        $total = number_format($brand->sum(), 2, '.', ',');

        return response()->json([
            'labels' => $brand->keys(),
            'values' => $brand->values(),
            'total'  => $total, 
        ]);
    }

    public function fetchData()
    {
        $short = function($num) {
            if ($num >= 1_000_000_000) return round($num / 1_000_000_000, 1) . 'B';
            if ($num >= 1_000_000) return round($num / 1_000_000, 1) . 'M';
            if ($num >= 1_000) return round($num / 1_000, 1) . 'K';
            return number_format($num);
        };

        $year = 2025;
        $month1 = 1;
        $month2 = (int) date('m');
        $months = [];
        $datetoday = date('d M, Y');

        for ($i = 1; $i <= 12; $i++) {
            $months[] = strtoupper(Carbon::create()->month($i)->format('M'));
        }

        $sales_api = Http::withToken('UaHxtws9LHZ47QG21lBXjQgka3Fe93H5xV1Y6HBQDN4=')->get('http://192.168.11.240/refreshable/public/api/arTrn_bevi/'.$year.'/'.$month1.'/'.$month2);

        $sales_bevi_collect = collect($sales_api->json());

        $beviTotal = $sales_bevi_collect
            ->where('Company', 'BEVI')
            ->sum('Actual Amount');

        $bevaTotal = $sales_bevi_collect
            ->where('Company', 'BEVA')
            ->sum('Actual Amount');
            
        $bigiTotal = $sales_bevi_collect
            ->where('Company', 'BIG I')
            ->sum('Actual Amount');

        $allTotal = $sales_bevi_collect
            ->sum('Actual Amount');

        $prevbeviTotal = $sales_bevi_collect
            ->where('Company', 'BEVI')
            ->sum('Previous Amount');

        $prevbevaTotal = $sales_bevi_collect
            ->where('Company', 'BEVA')
            ->sum('Previous Amount');
            
        $prevbigiTotal = $sales_bevi_collect
            ->where('Company', 'BIG I')
            ->sum('Previous Amount');

        $prevallTotal = $sales_bevi_collect
            ->sum('Previous Amount');

        $percent_bevi = $prevbeviTotal != 0 ? (($beviTotal - $prevbeviTotal) / $prevbeviTotal) * 100 : 0;
        $percent_beva = $prevbevaTotal != 0 ? (($bevaTotal - $prevbevaTotal) / $prevbevaTotal) * 100 : 0;
        $percent_bigi = $prevbigiTotal != 0 ? (($bigiTotal - $prevbigiTotal) / $prevbigiTotal) * 100 : 0;
        $percent_all = $prevallTotal != 0 ? (($allTotal - $prevallTotal) / $prevallTotal) * 100 : 0;


        $monthlyTotals = $sales_bevi_collect
            ->groupBy('TrnMonth')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortKeys();

        $companyTotals = $sales_bevi_collect
            ->groupBy('Company')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc();

        $prevmonthlyTotals = $sales_bevi_collect
            ->groupBy('TrnMonth')
            ->map(function ($items) {
                return $items->sum('Previous Amount');
            })->sortKeys();

        $beviAccountTotals = $sales_bevi_collect
            ->where('Company', 'BEVI')
            ->where('Actual Amount', '>', 0)
            ->groupBy('ShortName')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc();

        $bevaAccountTotals = $sales_bevi_collect
            ->where('Company', 'BEVA')
            ->where('Actual Amount', '>', 0)
            ->groupBy('ShortName')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc();

        $bigiAccountTotals = $sales_bevi_collect
            ->where('Company', 'BIG I')
            ->where('Actual Amount', '>', 0)
            ->groupBy('ShortName')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc();

        $beviLabels = $beviAccountTotals->keys();   
        $beviTotals = $beviAccountTotals->values();  

        $bevaLabels = $bevaAccountTotals->keys();   
        $bevaTotals = $bevaAccountTotals->values();  

        $bigiLabels = $bigiAccountTotals->keys();   
        $bigiTotals = $bigiAccountTotals->values();  

        $beviBrandTotals = $sales_bevi_collect
            ->where('Company', 'BEVI')
            ->groupBy('Brand')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc()->take(5);

        $bevaBrandTotals = $sales_bevi_collect
            ->where('Company', 'BEVA')
            ->groupBy('Brand')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc()->take(5);
            
        $bigiBrandTotals = $sales_bevi_collect
            ->where('Company', 'BIG I')
            ->groupBy('Brand')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc()->take(5);

        $allBrandTotals = $sales_bevi_collect
            ->groupBy('Brand')
            ->map(function ($items) {
                return [
                    'actual' => $items->sum('Actual Amount'),
                    'previous' => $items->sum('Previous Amount'),
                ];
            })
            ->sortByDesc('actual')
            ->take(5);

        $newBrands = ['KOJIESAN + BATH', 'KOJIESAN + BODY', 'DEFENSIL ANTIBACTERIAL'];
        $newBrandTotals = $sales_bevi_collect
            ->whereIn('Brand', $newBrands)
            ->groupBy('Brand')
            ->map(function ($items) {
                return [
                    'actual' => $items->sum('Actual Amount'),
                    'previous' => $items->sum('Previous Amount'),
                ];
            })
            ->sortDesc()->take(3);

        $philippines = $sales_bevi_collect
            ->where('Area Category', 'Local')
            ->groupBy('Area')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortDesc();

            // dd($monthlyTotals);

        $cavite = $philippines['CAVITE'];
        $qc = $philippines['QUEZON CITY'];
        $mn = $philippines['MANILA'];
        $pasig = $philippines['PASIG'];
        $pasay = $philippines['PASAY'];
        $paraq = $philippines['PARAÑAQUE'];
        $ceb = $philippines['CEBU'];
        $dvo = $philippines['DAVAO'];
        $cdo = $philippines['CAGAYAN DE ORO'];
        $pampanga = $philippines['PAMPANGA'];
        $zambg = $philippines['ZAMBOANGA'];
        $albay = $philippines['ALBAY'];
        $ilo = $philippines['ILOILO'];
        $pangas = $philippines['PANGASINAN'];
        $leyte = $philippines['LEYTE'];
        $tarlac = $philippines['TARLAC'];
        $bacld = $philippines['BACOLOD'];
        $lucn = $philippines['LUCENA CITY'];
        $camsur = $philippines['CAMARINES SUR'];
        $bohol = $philippines['BOHOL'];
        $ilonor = $philippines['ILOCOS NORTE'];
        $taguig = $philippines['TAGUIG'];
        $laguna = $philippines['LAGUNA'];
        $palawan = $philippines['PALAWAN'];
        $isabela = $philippines['ISABELA'];
        $batct = $philippines['BATANGAS CITY'];
        $mandaue = $philippines['MANDAUE'];
        $munlupa = $philippines['MUNTINLUPA'];
        $lasp = $philippines['LAS PINAS'];
        $makati = $philippines['MAKATI'];
        $sanj = $philippines['SAN JUAN'];
        $rizal = $philippines['RIZAL'];
        $bicol = $philippines['BICOL'];


        $bevimonthlyTotals = $sales_bevi_collect
            ->where('Company', 'BEVI')
            ->groupBy('TrnMonth')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortKeys();

        $bevamonthlyTotals = $sales_bevi_collect
            ->where('Company', 'BEVA')
            ->groupBy('TrnMonth')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortKeys();

        $bigimonthlyTotals = $sales_bevi_collect
            ->where('Company', 'BIG I')
            ->groupBy('TrnMonth')
            ->map(function ($items) {
                return $items->sum('Actual Amount');
            })->sortKeys();
       
        $dataPoints1 =  $prevmonthlyTotals->values()->toArray();
        $dataPoints2 =  $monthlyTotals->values()->toArray();
        $dataPoints3 =  $months;

        $beviMonthly = $bevimonthlyTotals->values()->toArray();
        $bevaMonthly = $bevamonthlyTotals->values()->toArray();
        $bigiMonthly = $bigimonthlyTotals->values()->toArray();

 
        $companyTotal = $companyTotals->values()->toArray();
        $companyName = $companyTotals->keys()->toArray();
  


        $beviMonth = implode(',', $beviMonthly);
        $bevaMonth = implode(',', $bevaMonthly);
        $bigiMonth = implode(',', $bigiMonthly);
        $allMonth = implode(',', $dataPoints2);

        return view('partials.data')->with([
            'dataPoints1' => $dataPoints1,
            'dataPoints2' => $dataPoints2,
            'dataPoints3' => $dataPoints3,
            'companyTotal' => $companyTotal,
            'companyName' => $companyName,
            'beviMonth' => $beviMonth,
            'bevaMonth' => $bevaMonth,
            'bigiMonth' => $bigiMonth,
            'allMonth' => $allMonth,
            'datetoday' => $datetoday,
            'beviAccountTotals' => $beviAccountTotals,
            'bevaAccountTotals' => $bevaAccountTotals,
            'bigiAccountTotals' => $bigiAccountTotals,
            'beviTotal' => $beviTotal,
            'bevaTotal' => $bevaTotal,
            'bigiTotal' => $bigiTotal,
            'allTotal' => $allTotal,
            'prevbeviTotal' => $prevbeviTotal,
            'prevbevaTotal' => $prevbevaTotal,
            'prevbigiTotal' => $prevbigiTotal,
            'prevallTotal' => $prevallTotal,
            'percent_bevi' => $percent_bevi,
            'percent_beva' => $percent_beva,
            'percent_bigi' => $percent_bigi,
            'percent_all' => $percent_all,
            'beviBrandTotals' => $beviBrandTotals,
            'bevaBrandTotals' => $bevaBrandTotals,
            'bigiBrandTotals' => $bigiBrandTotals,
            'allBrandTotals' => $allBrandTotals,
            'newBrandTotals' => $newBrandTotals,
            'beviLabels' => $beviLabels,
            'beviTotals' => $beviTotals,
            'bevaLabels' => $bevaLabels,
            'bevaTotals' => $bevaTotals,
            'bigiLabels' => $bigiLabels,
            'bigiTotals' => $bigiTotals,
            'short' => $short,
            'philippines' => $philippines,
            'cavite' => $cavite,
            'qc' => $qc,
            'mn' => $mn,
            'pasig' => $pasig,
            'pasay' => $pasay,
            'paraq' => $paraq,
            'ceb' => $ceb,
            'dvo' => $dvo,
            'cdo' => $cdo,
            'pampanga' => $pampanga,
            'zambg' => $zambg,
            'albay' => $albay,
            'ilo' => $ilo,
            'pangas' => $pangas,
            'leyte' => $leyte,
            'tarlac' => $tarlac,
            'bacld' => $bacld,
            'lucn' => $lucn,
            'camsur' => $camsur,
            'bohol' => $bohol,
            'ilonor' => $ilonor,
            'taguig' => $taguig,
            'laguna' => $laguna,
            'palawan' => $palawan,
            'isabela' => $isabela,
            'batct' => $batct,
            'mandaue' => $mandaue,
            'munlupa' => $munlupa,
            'lasp' => $lasp,
            'makati' => $makati,
            'sanj' => $sanj,
            'rizal' => $rizal,
            'bicol' => $bicol,

        ]);
    }
    
}
 