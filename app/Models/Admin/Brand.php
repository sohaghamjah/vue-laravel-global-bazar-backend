<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    public function scopeStatus($query, $status)
    {
        $query->where('status', $status);
    }


    public function products()
    {
        return $this->hasMany(Product::class)->where('status', 1);
    }
}
