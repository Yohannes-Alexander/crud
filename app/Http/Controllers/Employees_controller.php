<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Employees_controller extends Controller
{
    public function index(){
        $employee = Employees::all();
        return view('crud.employee.index',compact(['employee']));
    }

    public function create()
    {
        //
        return view('crud.employee.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'ID' => 'required',
            'FirstName' => 'required',
            'LastName' => 'required',
            'HireDate'=> 'required',
            'Salary'=> 'required',
        ]);
        Employees::create($request->all());

        return redirect()->route('employee.index')->with('succes','Data Berhasil di Input');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */

    public function edit(Employees $employee)
    {
        return view('crud.employee.edit', compact('employee'));
    }

    public function update(Request $request, Employees $employee)
    {
        $request->validate([
            'ID' => 'required',
            'FirstName' => 'required',
            'LastName' => 'required',
            'HireDate'=> 'required',
            'Salary'=> 'required',
        ]);

        DB::table('employee')->where('ID', '=', $employee->ID)->update([
			'ID' => $request->ID,
			'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
			'HireDate' => $request->HireDate,
            'Salary' => $request->Salary,
		]);

        // $annual->update($request->all());
        

        return redirect()->route('employee.index')->with('succes','Data Berhasil di Update');
    }

    public function destroy(Employees $employee)
    {
        DB::table('employee')->where('ID', '=', $employee->ID)->delete();

        return redirect()->route('employee.index')->with('alert','Data Berhasil di Hapus');
    }
}
