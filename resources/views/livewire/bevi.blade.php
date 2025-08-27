<div>
    <div class="d-flex justify-content-start">
        <ul class="nav">
            @foreach($brands as $brand)
                <li class="nav-item">
                    <p class="btn text-bold text-uppercase nav-link {{ $activeTab === "{$brand->id}" ? 'text-success active' : 'text-purple' }}"
                    wire:click="changeTab('{{ $brand->id }}')">
                    {{ $brand->brand_name }}
                    </p>
                </li>
            @endforeach
           
           
        </ul>
    </div>

    <div class="card shadow">
            <div class="card-body">
                <!-- Loading Indicator -->
                
                <div class="row mb-2">
                    <!-- <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">Search</h6>
                            <input type="text" placeholder="Search" class="form-control form-control-md" wire:model.live ="search">
                        </div>
                    </div> -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group ">
                            <h3 >Brand: <b>{{$brand_name}}</b></h3>
                            <!-- <input type="text" placeholder="Search" class="form-control form-control-md" wire:model.live ="search"> -->
                        </div>
                    </div>
                   
                
<!--         
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">Items Per Page</h6>
                            <select class="form-control form-control-md" wire:model.lazy="item_per_page">
                                <option value="all">All</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="col-lg-2 col-md-6 col-sm-12" wire:loading><i class="spinner-border"></i></div>

                </div>
                    @if(!empty($bevi_customer))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>CUSTOMER NAME</th>
                            <th>TOTAL SALES</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bevi_customer as $shortname => $total)

                            <tr>
                            <td>{{$shortname}}</td>
                            <td>{{number_format($total, 2, '.', ',')}}</td>
                            </tr>
                        @endforeach
                            
                        </tbody>

                    </table>
                    @endif 
                @if($item_per_page != 'all')
                <div class="row">
                    <div class="col-12">
       
                    </div>
                </div>
                @endif
            </div>
        </div>
</div>
