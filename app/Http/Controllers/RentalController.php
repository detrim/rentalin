<?php

namespace App\Http\Controllers;

use App\Models\Rental as rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mobil.main', [
            'renmobil' => Rental::orderBY('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mobil = Rental::count();
        // dd($mobil);
        if ($mobil == 0) {
            $nourut = 101;
            $kode = 'MOB' . $nourut;
        // dd($faktur);
        } else {
            $tarik = Rental::all()->last();
            $nourut = (int)substr($tarik->kode, -3)+1;
            $kode = 'MOB' . $nourut;
            // dd($faktur);
        }


        return view('mobil.create', compact('mobil', 'kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama_mobil' => 'required',
            'warna' => 'required',
            'nopol' => 'required',
            'harga_sewa' => 'required',
            'status' => 'required',
            'photos' => 'required',
            ]);


        if ($request->file('photos')) {
            $validatedData['photos'] = $request->file('photos')->store('photos');
        }
        Rental::create($validatedData);
        return redirect('/ren-mobil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental, $kode, $id)
    {
        $mobil = Rental::find($id);

        return view('mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental, $kode, $id)
    {
        $mobil = Rental::find($id);

        return view('mobil.edit', compact('mobil'));
    }
    public function editphotos(Request $request, $kode, $id)
    {
        $validatedData = $request->validate([
            'photos' => 'required',
            ]);
        if ($request->file('photos')) {
            if ($request->oldPhotos) {
                Storage::delete($request->oldPhotos);
            }
            $validatedData['Photos'] = $request->file('photos')->store('photos');
        }
        Rental::where('id', $id)->update($validatedData);

        return redirect('ren-mobil/' . $kode . '/edit');
    }
    public function editmobil(Request $request, $kode, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama_mobil' => 'required',
            'warna' => 'required',
            'nopol' => 'required',
            'harga_sewa' => 'required',
            'status' => 'required',
            ]);

        Rental::where('id', $id)->update($validatedData);

        return redirect('ren-mobil/' . $kode . $id . '/detail');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        //
    }
}