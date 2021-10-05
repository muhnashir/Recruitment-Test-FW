<?php

namespace App\Repositories;

use App\Models\Companies;

class CompaniesRepository
{
    public function store($data){
        return Companies::create($data);
    }

    public function list(){
        return Companies::paginate(2);
    }

    public function listAll(){
        return Companies::all();
    }

    public function destroy($id){
        $item = Companies::findOrFail($id);
        $item->delete();

        return $item;
    }

    public function edit($id){
        $item = Companies::where('id',$id)->first();
        return $item;
    }

    public function update($data, $id){
        $companies = Companies::find($id);
        $companies->update($data);
        return true;
    }

    public function listCompanies(){
        $companies = Companies::paginate(5);
        return $companies;
    }
}

