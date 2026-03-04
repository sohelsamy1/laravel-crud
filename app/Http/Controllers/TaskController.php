<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = DB::table('tasks')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
    $fileParth = null;

    if ($request->hasFile('image')) {

        $file = $request->file('image');
        $fileName = 'img' . time() . '_' . $file->getClientOriginalName();
        $fileParth = $file->storeAs('newFolder', $fileName, 'public');
    }

    DB::table('tasks')->insert([
        'title'       => $request->title,
        'description' => $request->description,
        'image'       => $fileParth,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    return redirect()->route('tasks.index')
                     ->with('success', 'Task created successfully');
    }


    public function edit()
    {
        return view('tasks.edit');
    }

}
