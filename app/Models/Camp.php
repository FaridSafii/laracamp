<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Checkout;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Camp extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','price'];

    public function getIsRegisteredAttribute()
    {
        if (!Auth::check()) {
            return false;
        }
        return Checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
    }

    public function CampBenefit(): HasMany
    {
        return $this->hasMany(CampBenefit::class);
    }
}
