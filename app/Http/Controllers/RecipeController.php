<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Difficulty;
use App\Models\MealType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():Response
    {
        return Inertia::render('Recipes/Index',[
            'difficulties' => Difficulty::all(),
            'mealTypes' => MealType::all(),
            'cuisines' => Cuisine::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
