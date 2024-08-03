<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store() {

        // validation with not empty not less than 5 not more than 200
        $validated = request()->validate([
            'content' => 'required|min:5|max:200'
        ]);

        // use create to do it on one line
        // Idea::create([
        //     'content' => request()->get('idea')
        // ]);

        $validated['user_id'] = auth()->user()->id;

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea has been created');
    }

    // public function destroy ($id) {

    //     // find the first idea where id is $id using where
        
    //     // $idea = Idea::where('id', $id)->first();
    //     $idea = Idea::where('id', $id)->firstOrFail();
        
    //     // First or Fail is used when you want to find a record by its id
    //     // and if it does not exist, it will throw a 404 error

    //     $idea->delete();

    //     return redirect()->route('dashboard')->with('success', 'Idea deleted created');

    // }

    public function destroy (Idea $idea) {

        // check if idea belongs to the user if
        if ($idea->user_id !== auth()->user()->id) {
            abort(403);
        }

        // shorter way of deleting it
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }

    public function show (Idea $idea) {
        
        // dd($idea->comments);

        return view('idea', [
            'idea' => $idea
        ]);
        // or write using compact() method
        // return view('idea', compact('idea'));
    }

    public function edit (Idea $idea) {

        if($idea->user_id !== auth()->user()->id) {
            abort(403);
        }

        $editing = true;
        return view('idea', compact('idea', 'editing'));
    }

    public function update (Idea $idea) {

        if($idea->user_id !== auth()->user()->id) {
            abort(403);
        }
        
        $validated = request()->validate([
            'content' => 'required|min:5|max:200'
        ]);

        // $idea->update(['content' => request()->get('content')]);
        // $idea->content = request()->get('content', '');
        // $idea->save();
        $idea->update($validated);

        return redirect()->route('ideas.show', $idea)->with('success', 'Idea updated Successfully');
    }

}
