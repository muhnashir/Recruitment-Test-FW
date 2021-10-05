<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeRequest;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repository = new \App\Repositories\EmployeRepository();
        $result = $repository->list();
        return view('pages.employe.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repository = new \App\Repositories\CompaniesRepository();
        $result = $repository->listCompanies();
        return view('pages.employe.create', compact('result'));
    }

    public function getCompanies(Request $request){   
        if ($request->ajax())
        {
            $breeds = Companies::where('name', 'LIKE',  '%' . Input::get("term"). '%')->orderBy('name')->take(25)->get(['id',DB::raw('name as text')]);

            return response()->json($breeds);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $request)
    {      
        $data = $request->validated();

        try{
            $repository = new \App\Repositories\EmployeRepository();
            $result = $repository->store($data);
            return redirect('/employe')->with('alert-success','Data Berhasil ditambah');
        }catch(Exception $e){
            return redirect('/employe')->with('alert-failed','Data gagal di tambahkan');
        }
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
        $repository = new \App\Repositories\EmployeRepository();
        $result = $repository->edit($id);

        $repo = new \App\Repositories\CompaniesRepository();
        $companies = $repo->listCompanies();
        return view('pages.employe.edit', compact("result","companies"));
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
        try{
            $repository = new \App\Repositories\EmployeRepository();
            $result = $repository->destroy($id);
            return redirect('/employe')->with('alert-success','Data Berhasil dihapus');
        }catch(Exception $e){
            return redirect('/employe')->with('alert-failed','Data gagal dihapus');
        }
    }
}
