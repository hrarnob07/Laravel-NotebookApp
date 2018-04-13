   <?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notebook;
class NotebooksController extends Controller
{
    
    public function index()
    {
       //
       // $notebooks= Notebook::all();
        $user=Auth::user();
        $notebooks=$user->notebooks;
         return view('notebooks.index',compact('notebooks'));
       // return $data;

    }

    
    public function create()
    {
        return view('notebooks.create');
    }

   
    public function store(Request $request)
    {
           $data= $request->all();
       //  Notebook::create($data);
           $user=Auth::user();
           
           $user->notebooks()->create($data);
        return redirect('/notebooks');
    }

    public function show($id)
    {
        $notebook=Notebook::findOrFail($id);
        $notes=$notebook->notes;
        return view ('notes.index',compact('notes','notebook'));
    }

  
    public function edit($id)
    {
          $user=Auth::user();
          $notebook=$user->notebooks()->find('$id');
        //$notebook =Notebook::where('id',$id)->first();
       // return $notebook;
        return view ('notebooks.edit',compact('notebook'));
    }

   
    public function update(Request $request, $id)
    {
    // $notebook =Notebook::where('id',$id)->first();
       $user=Auth::user();
       $notebook=$user->notebooks()->find('$id');

       $notebook->update($request->all());
       return redirect('/notebooks');
    }

 
    public function destroy($id)
    {
         $user=Auth::user();
          $notebook=$user->notebooks()->find('$id');
      //  $notebook =Notebook::where('id',$id)->first();
        $notebook->delete();
        return redirect('/notebooks');
    }
}
