<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'step_number',
        'description',
        'recipe_id',
        'action_type_id',
    ];

    public function recipe():BelongsTo{
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    public function actionType():HasOne{
        return $this->hasOne(ActionType::class, 'action_type_id');
    }
}
