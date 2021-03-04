<?php

namespace App\Http\Controllers;


use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->redirectToRoute('home', null, 301);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create',[
            'tags' => Tag::all()
        ]);
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
            'title' => 'required|max:50',
            'content' => 'required',
            'tag_id' => 'required|numeric'
        ]);

        $noteCreated = Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'tag_id' => $request->tag_id,
            'user_id' => Auth::user()->id
        ]);

        if($noteCreated){
            return view('notes.show', [
                'note' => $noteCreated
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        if($this->authorizeToModified($note)){
            return view('notes.show',[
                'note' => $note
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        if($this->authorizeToModified($note)){
            return view('notes.edit',[
                'note' => $note,
                'tags' => Tag::all()
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'tag_id' => 'required|numeric'
        ]);

        $note->title = $request->title;
        $note->content = $request->content;
        $note->tag_id = $request->tag_id;
        $note->save();
        return redirect()->route('notes.show', $note);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        if ($this->authorizeToModified($note)) {
            if($note->delete()){
                return route('home');
            }
        }
        return url()->current();
    }

    public function authorizeToModified($note): bool
    {
        return Auth::user()->belongToMe($note);
    }
}
