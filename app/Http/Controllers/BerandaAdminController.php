<?php

namespace App\Http\Controllers;

use App\Models\Ui;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;

class BerandaAdminController extends Controller
{
    public function index()
    {
        $date_pertahun = date('Y');
        $date_perbulan = date('m');


        $penyewaperbulan =  DB::table('rentmobils')->select('role_id')->whereMonth('created_at', $date_perbulan)->get();
        $penyewapertahun =  DB::table('rentmobils')->select('role_id')->whereYear('created_at', $date_pertahun)->get();

        $pendapatanpertahun = DB::table('rentmobils')->select('rentmobils.total_dp')->whereYear('created_at', $date_pertahun)->get();
        $pendapatanperbulan = DB::table('rentmobils')->select('rentmobils.total_dp')->whereMonth('created_at', $date_perbulan)->get();
        // $pendapatanpertahun = DB::table('rentmobils')->select('rentmobils.total_dp')->sum('rentmobils.total_dp');

        // dd($pendapatanpertahun);

        return view('beranda', compact('pendapatanpertahun', 'pendapatanperbulan', 'penyewaperbulan', 'penyewapertahun'));
    }
}