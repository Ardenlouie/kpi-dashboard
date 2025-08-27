<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bevi extends Model
{
    protected $connection = 'sqlsrv2';
    protected $table = 'vKPIDashboard';

    use HasFactory;


    public static function callspKPIDashboard_V2($param1, $param2, $param3)
    {
        return DB::connection('sqlsrv2')->select('EXEC spKPIDashboard_V2 ?, ?, ?', [
            $param1,
            $param2,
            $param3,
        ]);
    }
}
