<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NotesController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
         $this->validate($request, [
        'title' => 'required|max:255',
        'body' => 'required',
           ]);

         $inputdata =$request->all();
        Note::create($inputdata);
        return redirect()->route('notebooks.show',$request->notebook_id);
    }

    public function show($id)
    {
        $note=Note::find($id);
        return view('notes.show',compact('note'));
    }

    public function edit($id)
    {
        $note=Note::find($id);
        return view ('notes.edit',compact('note'));
    }

    public function update(Request $request, $id)
    {
        $data= $request->except(['_method','_token']);
        $note=Note::where('id',$id)->first();
        $note->update($data);
        return redirect()->route('notebooks.show',$note->notebook_id);
    }

    public function destroy($id)
    {
        Note::destroy($id);
        return back();
      

    }

    public function createNote($notebookId)
    {
     

        return view ('notes.create',compact('notebookId'));

    }
}
