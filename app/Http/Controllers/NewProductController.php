<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class NewProductController extends Controller
{
    public function index()
    {
        return view('newproducts.index')->with([
    
        ]);
    }

    public function dailyData($month, $year)
    {

        $sales_api_bevi = Http::withToken('UaHxtws9LHZ47QG21lBXjQgka3Fe93H5xV1Y6HBQDN4=')
            ->get('http://192.168.11.240/refreshable/public/api/arTrn_beva');

            
        $sales_bevi_collect = collect($sales_api_bevi->json());

        $daily = $sales_bevi_collect
            ->where('TrnYear', $year)
            ->where('TrnMonth', $month)
            ->where('Status', 'Invoiced')
            ->groupBy('TrnDay')
            ->map(fn($items) => $items->sum('Amount'))
            ->sortKeys();

        $total = number_format($daily->sum(), 2, '.', ',');

        return response()->json([
            'labels' => $daily->keys(),
            'values' => $daily->values(),
            'total'  => $total, 
        ]);
    }


    public function fetchData()
    {
        $months = [];
        $currentYear = Carbon::now()->year; 

        for ($i = 1; $i <= 12; $i++) {
            $months[] = strtoupper(Carbon::create()->month($i)->format('M'));
        }

        $sales_api_bevi = Http::withToken('UaHxtws9LHZ47QG21lBXjQgka3Fe93H5xV1Y6HBQDN4=')
            ->get('http://192.168.11.240/refreshable/public/api/arTrn_beva');

            
        $sales_bevi_collect = collect($sales_api_bevi->json());

        $invoicedTotal = $sales_bevi_collect
            ->where('Status', 'Invoiced')
            ->sum('Amount');

        $pendingTotal = $sales_bevi_collect
            ->where('Status', 'Pending')
            ->sum('Amount');


        $backlogTotal = $sales_bevi_collect
            ->where('Status', 'Backlog')
            ->sum('Amount');


        $monthOrder = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $monthlyTotals = $sales_bevi_collect
            ->where('TrnYear', 2025)
            ->where('Status', 'Invoiced')
            ->groupBy('TrnMonth')
            ->map(function ($items) {
                return $items->sum('Amount');
            });

        $dailyData = $sales_bevi_collect
            ->where('TrnYear', 2025)
            ->where('Status', 'Invoiced')
            ->groupBy('TrnMonth', 'TrnDay')
            ->map(function ($days) {
                return [
                    'labels' => $days->pluck('TrnDay'),
                    'data' => $days->pluck('Amount')
                ];
            });

        $allMonths = collect($monthOrder)->mapWithKeys(function ($month) {
            return [$month => 0];
        });

        $monthlyTotals = $allMonths->merge($monthlyTotals)
            ->sortBy(function ($value, $month) use ($monthOrder) {
                return array_search($month, $monthOrder);
            });


        $prevmonthlyTotals = $sales_bevi_collect
            ->where('TrnYear', 2024)
            ->where('Status', 'Invoiced')
            ->groupBy('TrnMonth')
            ->map(function ($items) {
                return $items->sum('Amount');
            });

        $prevmonthlyTotals = $allMonths->merge($prevmonthlyTotals)
            ->sortBy(function ($value, $month) use ($monthOrder) {
                return array_search($month, $monthOrder);
            });

        $beviAccountTotals = $sales_bevi_collect
            ->where('Company', 'BEVI')
            ->where('Status', 'Invoiced')
            ->groupBy('ShortName')
            ->map(function ($items) {
                return [
                    'current'  => $items->where('TrnYear', 2025)->sum('Amount'),
                    'previous' => $items->where('TrnYear', 2024)->sum('Amount'),
                ];
            })
            ->sortByDesc(fn($totals) => $totals['current']); 

        $bevaAccountTotals = $sales_bevi_collect
            ->where('Company', 'BEVA')
            ->where('Status', 'Invoiced')
            ->groupBy('ShortName')
            ->map(function ($items) {
                return [
                    'current'  => $items->where('TrnYear', 2025)->sum('Amount'),
                    'previous' => $items->where('TrnYear', 2024)->sum('Amount'),
                ];
            })
            ->sortByDesc(fn($totals) => $totals['current']); 

        $skuTotals = $sales_bevi_collect
            ->where('Status', 'Invoiced')
            ->groupBy('StockCode')
            ->map(function ($items) {
                return [
                    'current'  => $items->where('TrnYear', 2025)->sum('Amount'),
                    'previous' => $items->where('TrnYear', 2024)->sum('Amount'),
                ];
            })
            ->sortByDesc(fn($totals) => $totals['current'])->take(10); 

        $beviTotal = $sales_bevi_collect
            ->where('Status', 'Invoiced')
            ->where('Company', 'BEVI')
            ->sum('Amount');

        $bevaTotal = $sales_bevi_collect
            ->where('Status', 'Invoiced')
            ->where('Company', 'BEVA')
            ->sum('Amount');

        $totalAll = $sales_bevi_collect
            ->where('Status', 'Invoiced')
            ->sum('Amount');

        $short = function($num) {
            if ($num >= 1_000_000) return round($num / 1_000_000, 1) . 'M';
            if ($num >= 1_000) return round($num / 1_000, 1) . 'K';
            return number_format($num);
        };

        $brandQty = $sales_bevi_collect
            ->where('Status', 'Invoiced')
            ->groupBy('Brand')
            ->map(function ($items) {
                return [
                    'current'  => $items->where('TrnYear', 2025)->sum('Qty'),
                    'previous' => $items->where('TrnYear', 2024)->sum('Qty'),
                    'total' => $items->sum('Qty'),
                ];
            })
            ->sortByDesc(fn($totals) => $totals['total']); 

        $bevilabels = $beviAccountTotals->keys();
        $bevidatas = $beviAccountTotals->pluck('current');
        $prevbevidatas = $beviAccountTotals->pluck('previous');

        $bevalabels = $bevaAccountTotals->keys();
        $bevadatas = $bevaAccountTotals->pluck('current');
        $prevbevadatas = $bevaAccountTotals->pluck('previous');

        $skulabels = $skuTotals->keys();
        $skudatas = $skuTotals->pluck('current');
        $prevskudatas = $skuTotals->pluck('previous');

        $dataPoints1 =  $prevmonthlyTotals->values()->toArray();
        $dataPoints2 =  $monthlyTotals->values()->toArray();
        $dataPoints3 =  $monthlyTotals->keys()->toArray();

        $brandlabels = $brandQty->keys();
        $branddatas = $brandQty->pluck('total');


        return view('partials.newproduct')->with([
            'bevalabels' => $bevalabels,
            'bevadatas' => $bevadatas,
            'prevbevadatas' => $prevbevadatas,
            'bevilabels' => $bevilabels,
            'bevidatas' => $bevidatas,
            'prevbevidatas' => $prevbevidatas,
            'currentYear' => $currentYear,
            'dataPoints3' => $dataPoints3,
            'dataPoints1' => $dataPoints1,
            'dataPoints2' => $dataPoints2,
            'beviTotal' => $beviTotal,
            'bevaTotal' => $bevaTotal,
            'totalAll' => $totalAll,
            'dailyData' => $dailyData,
            'skulabels' => $skulabels,
            'skudatas' => $skudatas,
            'prevskudatas' => $prevskudatas,
            'invoicedTotal' => $invoicedTotal,
            'pendingTotal' => $pendingTotal,
            'backlogTotal' => $backlogTotal,
            'short' => $short,
            'brandlabels' => $brandlabels,
            'branddatas' => $branddatas,
        ]);

    }
}
