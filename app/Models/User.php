<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'profile_picture_path',
        'visibility',
        'badge_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //relations

    public function badge():BelongsTo{
        return $this->belongsTo(Badge::class, 'badge_id');
    }
    
    public function recipes():HasMany{
        return $this->hasMany(Recipe::class);
    }

    public function recipesLoved():BelongsToMany{
        return $this->belongsToMany(Recipe::class,'user_favourite_recipe','favourite_recipe_id', 'user_id');
    } 

    //self-referencing relationship
    public function favouriteUsers():BelongsToMany{
        return $this->belongsToMany(User::class,'user_followed_user','user_id','followed_user');
    } 

}
