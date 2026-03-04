<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{

     public function index()
    {
        $tasks = DB::table('tasks')->orderBy('id', 'desc')->paginate(3);
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:50|unique:tasks,title',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'title.required' => 'Title lagbe',
            'title.string'   => 'Valid title dite hobe'
        ]);

        $filePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'img' . time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('newFolder', $fileName, 'public');
        }

        DB::table('tasks')->insert([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $filePath,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect()->route('tasks.index')
                        ->with('success', 'Task created successfully');
    }

    public function update(Request $request, $id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();

        if (!$task) {
            return redirect()->route('tasks.index')
                            ->with('error', 'Task not found');
        }

        $imagePath = $task->image;
        if ($request->hasFile('image')) {
            if ($task->image && Storage::disk('public')->exists($task->image)) {
                Storage::disk('public')->delete($task->image);
            }
            $imagePath = $request->file('image')->store('tasks', 'public');
        }

        DB::table('tasks')->where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
            'updated_at'  => now(),
        ]);

        return redirect()->route('tasks.index')
                        ->with('success', 'Task updated successfully');
    }


   public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        return view('tasks.edit', compact('task'));
    }


    public function destroy($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();

        if ($task->image && Storage::disk('public')->exists($task->image)) {
            Storage::disk('public')->delete($task->image);
        }

        DB::table('tasks')->where('id', $id)->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully');
    }

}
