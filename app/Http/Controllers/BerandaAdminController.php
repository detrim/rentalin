<?php

namespace App\Http\Controllers;

use App\Models\Ui;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


use Illuminate\Support\Collection;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class BerandaAdminController extends Controller
{
    public function index()
    {
        $date_pertahun = date('Y');
        $date_perbulan = date('m');


        $penyewaperbulan =  DB::table('rentmobils')->select('role_id')->whereMonth('created_at', $date_perbulan)->get();
        $penyewapertahun =  DB::table('rentmobils')->select('role_id')->whereYear('created_at', $date_pertahun)->get();

        $pendapatanpertahun = DB::table('rentmobils')->select('rentmobils.total_dp')->whereYear('created_at', $date_pertahun)->get();
        $pendapatanperbulan = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', $date_perbulan)->get();
        // $pendapatanpertahun = DB::table('rentmobils')->select('rentmobils.total_dp')->sum('rentmobils.total_dp');

        // dd($pendapatanperbulan);
        $data = Ui::all();
        view()->share('data', $data);
        // $pdf= PDF::loadview('main');
        // $pdf= PDF::loadview('beranda');
        // dd($data);
        return view('beranda', compact('pendapatanpertahun', 'pendapatanperbulan', 'penyewaperbulan', 'penyewapertahun'));
        // Return load
    }
}