<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use App\Models\Ui as ui;
use App\Models\Invoice;
use App\Models\Rekening;
use App\Models\Metodepayment;
use App\Models\Rental as rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ui.beranda');
    }
    public function uimobil()
    {
        return view('ui.mobil.main', [
            'renmobil' => Rental::orderBY('id', 'desc')->get(),
        ]);
    }
    public function next(request $request, $faktur, $id)
    {
        $rkk = Rekening::orderBY('id', 'desc')->get();
        $invoice = Invoice::count();
        if ($invoice == 0) {
            $nourut = 1001;
            $inv = 'INV' . $nourut;
        } else {
            $tarik = Invoice::all()->last();
            $nourut = (int)substr($tarik->invoice, -4)+1;
            $inv = 'INV' . $nourut;
        }
        // $fk = $faktur;
        $users = DB::table('rentmobils')->join('mobils', 'rentmobils.kode', '=', 'mobils.kode')->select('rentmobils.*', 'mobils.*')->where('rentmobils.id', $id)->get();
        // dd($id);
        // dd($users);
        // dd($rk);
        return view('ui.mobil.uinext', compact('inv', 'rkk'))->with('users', $users);
    }
    public function bukti(Ui $ui, $faktur, $id)
    {
        // $rkk = Rekening::orderBY('id', 'desc')->get();
        $users = DB::table('rentmobils')->join('mobils', 'rentmobils.kode', '=', 'mobils.kode')->join('invoices', 'rentmobils.faktur', '=', 'invoices.faktur')->join('rekenings', 'rentmobils.rk', '=', 'rekenings.rk')->select('rentmobils.*', 'mobils.*', 'invoices.*', 'rekenings.rk', 'rekenings.nama_rk', 'rekenings.icon')->where('rentmobils.id', $id)->get();
        $rek = DB::table('rentmobils')->join('rekenings', 'rentmobils.rk', '=', 'rekenings.rk')->select('rentmobils.rk', 'rekenings.*')->where('rentmobils.id', $id)->get();



        // return view('ui.mobil.uinextbukti', compact('rkk'))->with('users', $users);
        return view('ui.mobil.uinextbukti', compact('rek'))->with('users', $users);
    }
    public function bukti_print(Ui $ui, $faktur, $id)
    {
        // $rkk = Rekening::orderBY('id', 'desc')->get();
        $users = DB::table('rentmobils')->join('mobils', 'rentmobils.kode', '=', 'mobils.kode')->join('invoices', 'rentmobils.faktur', '=', 'invoices.faktur')->join('rekenings', 'rentmobils.rk', '=', 'rekenings.rk')->select('rentmobils.*', 'mobils.*', 'invoices.*', 'rekenings.rk', 'rekenings.nama_rk', 'rekenings.icon')->where('rentmobils.id', $id)->get();
        $rek = DB::table('rentmobils')->join('rekenings', 'rentmobils.rk', '=', 'rekenings.rk')->select('rentmobils.rk', 'rekenings.*')->where('rentmobils.id', $id)->get();


        // return view('ui.mobil.uinextbukti', compact('rkk'))->with('users', $users);
        return view('ui.mobil.print', compact('rek'))->with('users', $users);
    }
    public function uinext(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'ktp' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
            'tgl_sewa' => 'required',
            'tgl_kembali' => 'required',
            // 'hari' => 'required',
            'faktur' => 'required',
            ]);

        $faktur = $request->faktur;
        $d1 = $request->tgl_sewa;
        $d2 = $request->tgl_kembali;
        $dd = 1;
        $status = "Menunggu";

        $date1=date_create($d1);
        $date2=date_create($d2);
        $diff=date_diff($date1, $date2) ;

        $days = $diff->format("%a");
        $hari = $dd + $days;


        if ($request->file('ktp')) {
            $validatedData['ktp'] = $request->file('ktp')->store('photos');
        }
        DB::table('rentmobils')->insert([
            'hari' => $hari,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'ktp' => $validatedData['ktp'],
            'nik' =>$request->nik,
            'no_telp' => $request->no_telp,
            'tgl_sewa' => $request->tgl_sewa,
            'tgl_kembali' => $request->tgl_kembali,
            'faktur' => $request->faktur,
            'status' => $status,

        ]);
        // dd($d1, $validatedData);
        // Ui::create($validatedData, $hari);
        return redirect('nextmobil/'. $faktur.  '/faktur');
        // return view('ui.mobil.uinext');
    }
    public function cetak(Request $request, $faktur, $id)
    {
        $Data = $request->validate([
            'rk' => 'required',
            'faktur' => 'required',
            ]);
        Metodepayment::create($Data);

        $Datainv = $request->validate([
            'invoice' => 'required',
            'faktur' => 'required',
            ]);
        Invoice::create($Datainv);

        $kode = $request->kode;
        $Mobil = $request->validate([
            'status' => 'required',
            ]);
        Rental::where('kode', $kode)->update($Mobil);

        $status = "Dipesan";
        DB::table('rentmobils')->where('id', $id)
        ->update([
            'status' => $status,
        ]);

        $validatedData = $request->validate([
            'total_dp' => 'required',
            'total_pembayaran' => 'required',
            'bukti' => 'required',
            'rk' => 'required',
            'tgl_dp' => 'required',
            'role_id' => 'required',

            ]);
        if ($request->file('bukti')) {
            $validatedData['bukti'] = $request->file('bukti')->store('photos');
        }
        // dd($validatedData, $id);
        Ui::where('id', $id)->update($validatedData);

        // $Data = $request->validate([
        //     'rk' => 'required',
        //     'faktur' => 'required',
        //     ]);
        // Metodepayment::create($Data);

        // $Datainv = $request->validate([
        //     'invoice' => 'required',
        //     'faktur' => 'required',
        //     ]);
        // Invoice::create($Datainv);

        // dd($d1, $validatedData);
        // Ui::create($validatedData, $hari);
        return redirect('nextbuktimob/'. $faktur . $id.  '/bukti');
        // return view('ui.mobil.uinext');
    }
    public function cetakdua(Request $request, $faktur, $id)
    {
        $Data = $request->validate([
            'rk' => 'required',
            'faktur' => 'required',
            ]);
        Metodepayment::create($Data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ui  $ui
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $kode, $id)
    {
        // $validatedData = $request->validate([
        //     'view' => 'required',
        //     ]);

        // Rental::where('id', $id)->update($validatedData);

        $mobil = Rental::find($id);
        $uimobil = Ui::count();
        // dd($uimobil);
        if ($uimobil == 0) {
            $nourut = 101;
            $faktur = 'FK' . $nourut;
        // dd($faktur);
        } else {
            $tarik = Ui::all()->last();
            $nourut = (int)substr($tarik->faktur, -3)+1;
            $faktur = 'FK' . $nourut;
            // dd($faktur);
        }

        return view('ui.mobil.show', compact('mobil', 'uimobil', 'faktur'));

        // return view('ui-mobil/' . $kode . '/detail');
    }
    // public function show2(Request $request, $kode, $id)
    // {
    //     // $validatedData = $request->validate([
    //     //     'view' => 'required',
    //     //     ]);

    //     // Rental::where('id', $id)->update($validatedData);

    //     $mobil = Rental::find($id);
    //     $uimobil = Ui::find($id);
    //     if ($uimobil == 0) {
    //         $nourut = 101;
    //         $faktur = 'FK' . $nourut;
    //     // dd($faktur);
    //     } else {
    //         $tarik = Ui::all()->last();
    //         $nourut = (int)substr($tarik->no_faktur, -3)+1;
    //         $faktur = 'FK' . $nourut;
    //         // dd($faktur);
    //     }

    //     return view('ui.mobil.show', compact('mobil', 'uimobil', 'faktur'));

    //     // return view('ui-mobil/' . $kode . '/detail');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ui  $ui
     * @return \Illuminate\Http\Response
     */
    public function edit(Ui $ui)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ui  $ui
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ui $ui)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ui  $ui
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ui $ui)
    {
        //
    }
}
