<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Sponsor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'industry', 'website', 'logo_path'];

    protected $dates = ['deleted_at'];

    /**
     * Get the teams associated with the sponsor.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class)
                    ->withPivot('contract_start', 'contract_end', 'amount')
                    ->withTimestamps();
    }

    /**
     * Get active sponsorships.
     */
    public function activeTeams()
    {
        return $this->teams()
                    ->wherePivot('contract_end', '>', Carbon::now());
    }

    /**
     * Scope a query to only include sponsors of a specific industry.
     */
    public function scopeIndustry($query, $industry)
    {
        return $query->where('industry', $industry);
    }

    /**
     * Get the total sponsorship amount.
     */
    public function getTotalSponsorshipAmount()
    {
        return $this->teams()->sum('amount');
    }

    /**
     * Check if the sponsor has any active contracts.
     */
    public function hasActiveContracts()
    {
        return $this->teams()
                    ->wherePivot('contract_end', '>', Carbon::now())
                    ->exists();
    }

    /**
     * Get the logo URL.
     */
   
}