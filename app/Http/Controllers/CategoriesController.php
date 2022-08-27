<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:6'
        ]);


        $categroy = new Category();
        $categroy->name = $request->name;
        $categroy->image = Storage::putFile('public', $request->image);
        $categroy->save();
        // $data = [
        //     'name' => $request->name,
        // ];

        

        // Category::create($request->all());
        session()->flash('success', 'Data inserted  successful!');
        // return back();
        return redirect()->route('categories.create');
    }
}
