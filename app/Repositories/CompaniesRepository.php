<?php

namespace App\Repositories;

use App\Models\Companies;

class CompaniesRepository
{
    public function store($data){
        return Companies::create($data);
    }

    public function list(){
        return Companies::paginate(6);
    }

    public function destroy($id){
        $item = Companies::findOrFail($id);
        $item->delete();

        return $item;
    }
}

