<?php

namespace App\Services;
class CompaniesService
{
    public function update($data,$request, $id){
        
         $uRep = new \App\Repositories\CompaniesRepository();
        if($request->hasFile('logoPath')){
            $data['logoPath'] = $request->logoPath->store(
                'app/company','public'
            );
            $uRep->update([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'logoPath'    => $data['logoPath'],
                'urlWebsite'    => $data['urlWebsite'],
            ],$id);
        }
        else{
            $uRep->update([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'urlWebsite'    => $data['urlWebsite']
            ],$id);
        }
    }
}

?>