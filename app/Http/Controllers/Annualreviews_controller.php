<?php

namespace App\Http\Controllers;

use App\Models\Annualreviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Annualreviews_controller extends Controller
{
    public function index(){
        $annual = Annualreviews::all();
        return view('crud.index',compact(['annual']));
    }

    public function create()
    {
        //
        return view('crud.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'ID' => 'required',
            'EmpID' => 'required',
            'ReviewDate' => 'required',
        ]);
        Annualreviews::create($request->all());

        return redirect()->route('annual.index')->with('succes','Data Berhasil di Input');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */

    public function edit(Annualreviews $annual)
    {
        return view('crud.edit', compact('annual'));
    }

    public function update(Request $request, Annualreviews $annual)
    {
        $request->validate([
            'ID' => 'required',
            'EmpID' => 'required',
            'ReviewDate' => 'required',
        ]);

        DB::table('annualreviews')->where('ID', '=', $annual->ID)->update([
			'ID' => $request->ID,
			'EmpID' => $request->EmpID,
			'ReviewDate' => $request->ReviewDate
		]);

        // $annual->update($request->all());
        

        return redirect()->route('annual.index')->with('succes','Data Berhasil di Update');
    }

    public function destroy(Annualreviews $annual)
    {

        // $annual->first()->delete();
        // dd($annual);
        // Annualreviews::destroy($annual->ID);
        DB::table('annualreviews')->where('ID', '=', $annual->ID)->delete();

        return redirect()->route('annual.index')->with('alert','Data Berhasil di Hapus');
    }
}
