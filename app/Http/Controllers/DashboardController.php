<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        
        // define users arra with two users name and email each
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'age' => 23
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@gmail.com',
                'age' => 43
            ],
        ];
        
        // $idea = new Idea([
        //     'content' => 'This is supposed to be first'
        // ]);
        // $idea->save();

        // dump(Idea::all());

        $ideas = Idea::orderBy('created_at', 'DESC');

        // logic to handle search
        if(request()->has('search')){
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        return view(
            'welcome',
            [
                'ideas' => $ideas->paginate(5)
                // 'ideas' => Idea::orderBy('created_at', 'DESC')->get()
            ]
        );
    }

}


// in the arary key and keyValue its accesses as users in the view