<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\CompaniesRequest;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new \App\Repositories\CompaniesRepository();
        $result = $service->list();
        return view('pages.companies.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request)
    {
        $data = $request->validated();

        try{
            $service = new \App\Repositories\CompaniesRepository();
            $data['logoPath'] = $request->logoPath->store(
                'app/company','public'
            );
            $result = $service->store($data);
            return redirect('/companies')->with('alert-success','Data Berhasil ditambah');
        }catch(Exception $e){
            return redirect('/companies')->with('alert-failed','Data gagal di tambahkan');
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
        try{
            $service = new \App\Repositories\CompaniesRepository();
            $result = $service->destroy($id);
            return redirect('/companies')->with('alert-success','Data Berhasil dihapus');
        }catch(Exception $e){
            return redirect('/companies')->with('alert-failed','Data gagal dihapus');
        }
    }
}
