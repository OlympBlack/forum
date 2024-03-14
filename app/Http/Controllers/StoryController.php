<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoryModel;

class StoryController extends Controller
{
    public function index()
    {
        $storys = StoryModel::with('user')->get();
        return view('/story', ['storys' => $storys]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'titre'=>'required|string|max:100',
            'image'=>'required|image|max:4096',
        ]);
        
        $imagePath = $request->file('image')->store('public/images');

        $story = new StoryModel;
        $story->titre = $request->titre;
        $story->image = $imagePath;
        $story->user_id = auth()->id();

        $story->save();
        return redirect('/story')->with('message', 'Votre story a été bien ajouté');
        
    }

   
}
