<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'companies_id'
    ];

    public function companies(){
        return $this->belongsTo(Companies::class,'companies_id','id');
    }
}
