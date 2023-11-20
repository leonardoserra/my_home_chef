<?php

namespace App\Http\Controllers;

use App\Models\ActionType;
use App\Models\Recipe;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():Response
    {   
        //get the last recipe created
        $user_id = Auth::user()->id;
        $createdRecipe = Recipe::where('user_id',$user_id)->orderBy('id', 'desc')->first();
        $steps = Step::where('recipe_id', $createdRecipe->id)->get();
      
        $actionTypes = ActionType::all();
        return Inertia::render('Step/Create',[
            'recipe'=> $createdRecipe,
            'steps'=> $steps,
            'actionTypes' => $actionTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'step_number' => 'required|integer|numeric',
            'description' => 'required|max:800|string',
            'action_type_id' => 'nullable|integer|numeric',
            'recipe_id'=> 'required|integer|numeric',
        ]);
        
        Step::create($validated);
        return to_route('step.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Step $step)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Step $step)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Step $step)
    {
        //
    }
}
