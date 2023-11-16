<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'difficulty_id',
        'meal_type_id',
        'cuisine_id',
    ];
    
    //relations
    public function ingredients():HasMany{
       return $this->hasMany(Ingredient::class);
    }

    public function steps():HasMany{
        return $this->hasMany(Steps::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }

    public function difficulty():HasOne{
        return $this->hasOne(Difficulty::class,'difficulty_id');
    }

    public function mealType():HasOne{
        return $this->hasOne(MealType::class, 'meal_type_id');
    }

    public function cuisine():HasOne{
        return $this->hasOne(Cuisine::class, 'cuisine_id');
    }

    public function usersLovingIt():BelongsToMany{
        return $this->belongsToMany(User::class,'user_favourite_recipe','user_id', 'favourite_recipe_id');
    }

}
