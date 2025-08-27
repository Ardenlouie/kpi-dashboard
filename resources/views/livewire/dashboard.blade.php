<div>
    <div class="card-header">
        <div class="row ">
            <h2 class="text-bold">SELECT:</h2>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="form-group">
                        <select name="" class="form-control form-control-md text-uppercase" wire:model.lazy="year">
                                <option value="0">Year</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="form-group">
                        <select id="months1" class="form-control form-control-md text-uppercase" wire:model.lazy="months1" 
                        {{ empty($year) ? 'disabled' : '' }}
                         >
                            <option value="0">From</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">Novemeber</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="form-group">
                        <select id="months" class="form-control form-control-md text-uppercase" 
                            wire:model.lazy="months" 
                            {{ empty($year) ? 'disabled' : '' }}
                        >
                            <option value="0">To</option>
                            @foreach ([
                                1 => 'January', 2 => 'February', 3 => 'March',
                                4 => 'April', 5 => 'May', 6 => 'June',
                                7 => 'July', 8 => 'August', 9 => 'September',
                                10 => 'October', 11 => 'November', 12 => 'December'
                            ] as $num => $name)
                                <option value="{{ $num }}" 
                                    {{ $num < $months1 ? 'disabled' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-12" wire:loading><i class="spinner-border"></i></div>

            </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card bg-gradient">
                <div class="card-body">
                    
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Business</th>
                                    <th>MTD Act Potential</th>
                                    <th>Outlook</th>
                                    <th>To Go</th>
                                    <th>Budget</th>
                                    <th>Previous Year</th>
                                    <th>Est Month Perf</th>
                                    <th>Est Month Growth</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <b>BEVI:</b><br> 
                                        NKAG<br> 
                                        In-house<br> 
                                        <b>Total BEVI</b><br> 


                                    </td>
                                    @if(!empty($total_bevi))
                                    <td>
                                        <br> 
                                        {{number_format($nkag_bevi, 2, '.', ',')}}<br>
                                        {{number_format($inhouse_bevi, 2, '.', ',')}}<br>
                                        <b>{{number_format($total_bevi, 2, '.', ',')}}</b><br>

                                    </td>
                                    <td>
                                        <br> 
                                        -<br> 
                                        -<br> 
                                        -<br>  
                                    </td>
                                    <td>
                                        <br> 
                                        -<br> 
                                        -<br> 
                                        -<br>  
                                    </td>
                                    <td>
                                        <br> 
                                        {{number_format($nka_total_budget, 2, '.', ',')}}<br>    
                                        0.00<br>    
                                        <b>{{number_format($nka_total_budget, 2, '.', ',')}}</b><br>   
                                    </td>
                                    <td>
                                        <br> 
                                        {{number_format($nkag_bevi_py, 2, '.', ',')}}<br>    
                                        {{number_format($inhouse_bevi_py, 2, '.', ',')}}<br>    
                                        <b>{{number_format($total_bevi_py, 2, '.', ',')}}</b><br>    
                                    </td>
                                    <td>
                                        <br> 
                                        <b>
                                            @if($emp_nkag >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emp_nkag, 1)}} %
                                            </medium>
                                            @elseif($emp_nkag < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emp_nkag, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                        0.00
                                        </b><br> 
                                        <b>
                                            @if($emp_nkag >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emp_nkag, 1)}} %
                                            </medium>
                                            @elseif($emp_nkag < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emp_nkag, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br>   
                                    </td>
                                    <td>
                                        <br> 
                                        <b>
                                            @if($emg_nkag_bevi >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_nkag_bevi, 1)}} %
                                            </medium>
                                            @elseif($emg_nkag_bevi < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_nkag_bevi, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                            @if($emg_inhouse_bevi >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_inhouse_bevi, 1)}} %
                                            </medium>
                                            @elseif($emg_inhouse_bevi < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_inhouse_bevi, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                            @if($emg_bevi >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_bevi, 1)}} %
                                            </medium>
                                            @elseif($emg_bevi < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_bevi, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br>   
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>
                                        <b>BEVA:</b><br> 
                                        RDG<br> 
                                        In-house Tradeworld<br> 
                                        In-house Other<br> 
                                        <b>Total BEVA</b><br> 
                                    </td>
                                    @if(!empty($total_bevi))
                                    <td>
                                        <br>
                                        {{number_format($rdg_beva, 2, '.', ',')}}<br>    
                                        {{number_format($tradeworld, 2, '.', ',')}}<br>    
                                        {{number_format($inhouse_beva, 2, '.', ',')}}<br>    
                                        <b>{{number_format($total_beva, 2, '.', ',')}}</b><br>    

                                    </td>
                                    <td>
                                        <br>
                                        -<br>
                                        -<br>
                                        -<br>
                                        -<br>
                                    </td>
                                    <td>
                                        <br>
                                        -<br>
                                        -<br>
                                        -<br>
                                        -<br>
                                    </td>
                                    <td>
                                        <br>
                                        {{number_format($rdg_total_budget, 2, '.', ',')}}<br>    
                                        0.00<br>    
                                        0.00<br>    
                                        <b>{{number_format($rdg_total_budget, 2, '.', ',')}}</b><br>  
                                    </td>
                                    <td>
                                        <br>
                                        {{number_format($rdg_beva_py, 2, '.', ',')}}<br>    
                                        {{number_format($tradeworld_py, 2, '.', ',')}}<br>    
                                        {{number_format($inhouse_beva_py, 2, '.', ',')}}<br>    
                                        <b>{{number_format($total_beva_py, 2, '.', ',')}}</b><br>    

                                    </td>
                                <td>
                                        <br>
                                        <b>
                                            @if($emp_rdg >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emp_rdg, 1)}} %
                                            </medium>
                                            @elseif($emp_rdg < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emp_rdg, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                            0.00
                                        </b><br> 
                                        <b>
                                            0.00
                                        </b><br> 
                                        <b>
                                            @if($emp_rdg >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emp_rdg, 1)}} %
                                            </medium>
                                            @elseif($emp_rdg < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emp_rdg, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                    </td>
                                    <td>
                                        <br>
                                        <b>
                                            @if($emg_rdg_beva >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_rdg_beva, 1)}} %
                                            </medium>
                                            @elseif($emg_rdg_beva < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_rdg_beva, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                            @if($emg_tradeworld >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_tradeworld, 1)}} %
                                            </medium>
                                            @elseif($emg_tradeworld < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_tradeworld, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                            @if($emg_inhouse_beva >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_inhouse_beva, 1)}} %
                                            </medium>
                                            @elseif($emg_inhouse_beva < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_inhouse_beva, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                            @if($emg_beva >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_beva, 1)}} %
                                            </medium>
                                            @elseif($emg_beva < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_beva, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>
                                        <b>BIG I:</b><br> 
                                        Export<br> 
                                        Ecomm<br> 
                                        <b>Total BIG I</b><br> 
                                    
                                    </td>
                                    @if(!empty($total_bevi))

                                    <td>
                                        <br>
                                        {{number_format($export, 2, '.', ',')}}<br>    
                                        {{number_format($ecomm, 2, '.', ',')}}<br>    
                                        <b>{{number_format($total_bigi, 2, '.', ',')}}</b><br>    
                                    </td>
                                    <td>
                                        <br>
                                        -<br>
                                        -<br>
                                        -<br>
                                    </td>
                                    <td>
                                        <br>
                                        -<br>
                                        -<br>
                                        -<br>
                                    </td>
                                    <td>
                                        <br>
                                        -<br>
                                        -<br>
                                        -<br>
                                    </td>
                                    <td>
                                        <br>
                                        {{number_format($export_py, 2, '.', ',')}}<br>    
                                        {{number_format($ecomm_py, 2, '.', ',')}}<br>    
                                        <b>{{number_format($total_bigi_py, 2, '.', ',')}}</b><br>    
                                    </td>
                                    <td>
                                        <br>
                                        -<br>
                                        -<br>
                                        -<br>
                                    </td>
                                    <td>
                                        <br>
                                        <b>
                                            @if($emg_export >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_export, 1)}} %
                                            </medium>
                                            @elseif($emg_export < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_export, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                            @if($emg_ecomm >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_ecomm, 1)}} %
                                            </medium>
                                            @elseif($emg_ecomm < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_ecomm, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>
                                            @if($emg_bigi >= 0)
                                            <medium class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($emg_bigi, 1)}} %
                                            </medium>
                                            @elseif($emg_bigi < 0)
                                            <medium class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                {{number_format($emg_bigi, 1)}} %
                                            </medium> 
                                            @else
                                            @endif
                                        </b><br> 
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Brands Sales</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($beviBrandTotals as $brand => $total)
                            <tr>
                                <td>{{ $brand }}</td>
                                <td>{{ number_format($total, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        
    </div>


</div>

