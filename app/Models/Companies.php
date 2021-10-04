<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'logoPath','urlWebsite'
    ];

    public function employe(){
        return $this->hasOne(Employe::class,'companies_id','id');
    }
}
