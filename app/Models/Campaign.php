<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }

    public function documents(){

    }


}
