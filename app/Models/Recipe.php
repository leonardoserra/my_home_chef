<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_path',
        'duration',
        'recipe_points',
        'user_id',
    ];
    
    public function ingredients():HasMany{
       return $this->hasMany(Ingredient::class);
    }

    public function steps():HasMany{
        return $this->hasMany(Steps::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }


}
