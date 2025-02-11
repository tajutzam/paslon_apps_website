<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignDocument extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
