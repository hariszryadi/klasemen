<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klub;
use App\Models\Klasemen;

class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klub = Klub::latest()->get();
        return view('pertandingan.index', compact('klub'));
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
        $this->validate($request, [
            'klub_1'    => "required|array|min:1",
            'klub_1.*'  => "required|string|distinct|min:1",
            'klub_2'    => "required|array|min:1",
            'klub_2.*'  => "required|string|distinct|min:1",
            'score_1'    => "required|array|min:1",
            'score_1.*'  => "required|string|distinct|min:1",
            'score_2'    => "required|array|min:1",
            'score_2.*'  => "required|string|distinct|min:1",
        ]);

        foreach ($request->klub_1 as $key => $item) {
            $klasemen = Klasemen::where('klub_id', $item)->first();
            if (!$klasemen) {
                // Tim belum memiliki catatan klasemen, buat catatan baru
                $klasemen = new Klasemen();
                $klasemen->klub_id = $item;
            }
            $klasemen->bermain += 1;
            $klasemen->gol_masuk += $request->score_1[$key];
            $klasemen->gol_kebobolan += $request->score_2[$key];
            if ($request->score_1[$key] > $request->score_2[$key]) {
                $klasemen->menang += 1;
                $klasemen->poin += 3;
            } elseif ($request->score_1[$key] == $request->score_2[$key]) {
                $klasemen->seri += 1;
                $klasemen->poin += 1;
            } else {
                $klasemen->kalah += 1;
            }
            $klasemen->save();

            $klasemen = Klasemen::where('klub_id', $request->klub_2[$key])->first();
            if (!$klasemen) {
                // Tim belum memiliki catatan klasemen, buat catatan baru
                $klasemen = new Klasemen();
                $klasemen->klub_id = $request->klub_2[$key];
            }
            $klasemen->bermain += 1;
            $klasemen->gol_masuk += $request->score_2[$key];
            $klasemen->gol_kebobolan += $request->score_1[$key];
            if ($request->score_2[$key] > $request->score_1[$key]) {
                $klasemen->menang += 1;
                $klasemen->poin += 3;
            } elseif ($request->score_2[$key] == $request->score_1[$key]) {
                $klasemen->seri += 1;
                $klasemen->poin += 1;
            } else {
                $klasemen->kalah += 1;
            }
            $klasemen->save();
        }
        return redirect()->back()->with('success', 'Data pertandingan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
