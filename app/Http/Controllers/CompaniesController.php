<?php

namespace App\Http\Controllers;

use Exception;
use PDF;
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
        $repository = new \App\Repositories\CompaniesRepository();
        $result = $repository->list();
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
            $repository = new \App\Repositories\CompaniesRepository();
            $data['logoPath'] = $request->logoPath->store(
                'app/company','public'
            );
            $result = $repository->store($data);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repository = new \App\Repositories\CompaniesRepository();
        $result = $repository->edit($id);
        
        return view('pages.companies.edit', compact("result"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesRequest $request, $id)
    {
        $data = $request->validated();
        $service = new \App\Services\CompaniesService();
        $result = $service->update($data, $request, $id);
        return back()->with('alert-success', "data berhasil di ubah");
    }


    public function downloadPdf()
    {
        $repository = new \App\Repositories\CompaniesRepository();
        $collection = $repository->listAll();
    
        $pdf = PDF::loadview('pages.companies.download-pdf', compact('collection'))->setPaper('a4','landscape')->setWarnings(false);
        
        return $pdf->download('companies.pdf');
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
