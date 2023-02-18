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
        // dd($date_perbulan);

        $januari = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "01")->get();
        $februari = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "02")->get();
        $maret = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "03")->get();
        $april = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "04")->get();
        $mei = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "05")->get();
        $juni = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "06")->get();
        $juli = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "07")->get();
        $agustus = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "08")->get();
        $september = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "09")->get();
        $oktober = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "10")->get();
        $november = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "11")->get();
        $desember = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', "12")->get();


        $penyewaperbulan =  DB::table('rentmobils')->select('role_id')->whereMonth('created_at', $date_perbulan)->get();
        $penyewapertahun =  DB::table('rentmobils')->select('role_id')->whereYear('created_at', $date_pertahun)->get();

        $pendapatanpertahun = DB::table('rentmobils')->select('rentmobils.total_dp')->whereYear('created_at', $date_pertahun)->get();
        $pendapatanperbulan = DB::table('rentmobils')->select('rentmobils.*')->whereMonth('created_at', $date_perbulan)->get();
        // $pendapatanpertahun = DB::table('rentmobils')->select('rentmobils.total_dp')->sum('rentmobils.total_dp');

        // dd($pendapatanperbulan);
        $data = Ui::all();
        view()->share('data', $data);

        $pdf= PDF::loadview('main');
        // dd($data);
        // return view('main', compact('januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'desember'));
        return view('beranda', compact('pendapatanpertahun', 'pendapatanperbulan', 'penyewaperbulan', 'penyewapertahun'));
        // Return load
    }
}