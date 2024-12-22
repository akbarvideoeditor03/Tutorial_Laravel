<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['nilai'] = \App\Models\Nilai::orderBy('id', 'asc')->get();
        return view('/nilai/nilai', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['nilai'] = new \App\Models\Nilai();
        $data['route'] = 'datanilai.store';
        $data['method'] = 'post';
        $data['title_form'] = 'Formulir Input Nilai';
        $data['submit_button'] = 'Simpan';
        return view('nilai/form_nilai', $data);
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nilai_uts' => 'required',
            'nilai_uas' => 'required',
        ]);

        $inputNilai = new \App\Models\Nilai();
        $inputNilai->nama = $request->nama;
        $inputNilai->nilai_uts = $request->nilai_uts;
        $inputNilai->nilai_uas = $request->nilai_uas;
        $inputNilai->save();
        return redirect('/datanilai');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['nilai'] = \App\Models\Nilai::findOrFail($id);
        $data['route'] = ['datanilai.update', $id];
        $data['method'] = 'put';
        $data['title_form'] = 'Formulir Edit Nilai';
        $data['submit_button'] = 'Perbarui';
        return view('nilai/form_nilai', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nilai_uts' => 'required',
            'nilai_uas' => 'required',
        ]);

        $editNilai = \App\Models\Nilai::findOrFail($id);
        $editNilai->update($validatedData);
        return redirect('/datanilai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = \App\Models\Nilai::where('id', $id)->firstOrFail();
        $deleteData->delete();
        return redirect('/datanilai');
    }
}
