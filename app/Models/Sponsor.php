<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'industry'];

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot('contract_start', 'contract_end')->withTimestamps();
    }
}