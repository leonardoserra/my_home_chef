<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Difficulty;
use App\Models\MealType;
use App\Models\Recipe;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():Response
    {
        $user_id = Auth::user()->id;
        $recipes = Recipe::where('user_id', $user_id)->get();
        
        return Inertia::render('Recipe/Index',[
            'recipes' => $recipes,
            // 'recipes' => Recipe::all(),
            'difficulties' => Difficulty::all(),
            'mealTypes' => MealType::all(),
            'cuisines' => Cuisine::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():Response
    {
        return Inertia::render('Recipe/Create',[
            'difficulties' => Difficulty::all(),
            'mealTypes' => MealType::all(),
            'cuisines' => Cuisine::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description'=> 'string|max:100|nullable',
            'image_path'=> 'string|max:255|nullable',
            'duration'=> 'required|integer|numeric' ,
            'difficulty_id'=> 'integer|numeric|nullable',
            'meal_type_id'=> 'integer|numeric|nullable',
            'cuisine_id'=> 'integer|numeric|nullable',
        ]);

        //create new recipe and save it to the db after validation
        $user_id = Auth::user()->id;
        $newRecipe = new Recipe();
        $newRecipe->name = $validated['name'];
        // $newRecipe->description = $validated['description'];
        if($validated['description'] == null){
            $newRecipe->description = " ";
        }else{
            $newRecipe->description = $validated['description'];
        }
        if($validated['image_path'] != null){
            $newRecipe->image_path = $validated['image_path'];
        }else{
            $newRecipe->image_path = "/img/default_recipe.png";
        }
        $newRecipe->duration = $validated['duration'];
        $newRecipe->difficulty_id = $validated['difficulty_id'];
        $newRecipe->meal_type_id = $validated['meal_type_id'];
        $newRecipe->cuisine_id = $validated['cuisine_id'];
        $newRecipe->user_id = $user_id;
        $newRecipe->save();

        
        return to_route('step.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_id = Auth::user()->id;
        $recipe = Recipe::where('user_id',$user_id)->where('id',$id)->with('steps')->first();
        return Inertia::render('Recipe/Show',[
            'recipe' => $recipe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
