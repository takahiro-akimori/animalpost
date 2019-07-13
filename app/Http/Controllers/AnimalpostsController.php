<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalpostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $animalposts = $user->animalposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'animalposts' => $animalposts,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->animalposts()->create([
            'content' => $request->content,
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        $animalpost = \App\Animalpost::find($id);

        if (\Auth::id() === $animalpost->user_id) {
            $animalpost->delete();
        }

        return back();
    }
}
