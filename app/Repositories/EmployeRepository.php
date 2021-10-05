<?php

namespace App\Repositories;

use App\Models\Employe;

class EmployeRepository
{
    public function store($data){
        return Employe::create($data);
    }

    public function list(){
        return Employe::paginate(2);
    }

    public function destroy($id){
        $item = Employe::findOrFail($id);
        $item->delete();

        return $item;
    }

    public function edit($id){
        $item = Employe::findOrFail($id)->first();
        return $item;
    }
}

