<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $blogs = DB::table('blogs')
        ->join('users', 'users.id', '=', 'blogs.u_id')
        ->join('categories', 'categories.id', '=', 'blogs.cat_id')
        ->select('blogs.*', 'users.name', 'categories.title as cat')
        ->paginate(3);
        return view('home', compact('blogs'));
        
    }
    public function show()
    {
        return view('profile');
    }
    public function update(Request $request, User $crud)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users',
            'picture' => 'required | file'
        ]);
        $crud->update($request->all());

        return redirect()->route('crud.index')
            ->with('success', 'Student is updated successfully');
    }
}
