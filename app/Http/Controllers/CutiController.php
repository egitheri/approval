<?php

namespace App\Http\Controllers;

use \Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\CutiRequest;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataCuti = Cuti::all();
        $user = Auth()->user();
        return view('cuti.index', [
            'data' => $dataCuti,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth()->user();
        return view('cuti.create', [
            'user' => $user->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CutiRequest $request)
    {
        $data = $request->validated();

        $cuti = new Cuti($data);
        $cuti->save();

        return redirect('cuti')->with('success', 'Data berhasil di simpan');
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
        try {
            $cuti = Cuti::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Data tidak ditemukan');
        }

        return view('cuti.edit', compact('cuti'));
    }

    public function detail(string $id)
    {
        try {
            $cuti = Cuti::findOrFail($id);
            $sdate = Carbon::parse($cuti->sdate);
            $edate = Carbon::parse($cuti->edate);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Data tidak ditemukan');
        }

        return view('cuti.detail', compact('cuti', 'sdate', 'edate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
    }

    public function approve(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);

        if (!$cuti) {
            abort(404, 'Data tidak ditemukan');
        }

        $user = Auth()->user();


        $cuti->approve_name = $user->name;
        $cuti->approve_date = date('Y-m-d');
        $cuti->status = $request->status;

        $cuti->save();

        return redirect('cuti')->with('success', 'Data berhasil di approve');
    }
}
