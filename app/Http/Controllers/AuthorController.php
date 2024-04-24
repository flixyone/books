<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Author\AuthorRequest;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::get();
        return response()->json(['authors' => $authors], 200);
    }

    public function create()
    {
        //
    }

    public function store(AuthorRequest $request)
    {
        $author = new Author($request->all());
        $author->save();
        return response()->json(['status' => 'Author Created', 'author' => $author], 201);
    }

    public function show(Request $request, Author $author)
    {
        return response()->json(['Author' => $author], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->all());
        return response()->json([], 204);
    }

    public function destroy(Request $request, Author $author)
    {
        $author->delete();
        return response()->json([], 204);
    }
}
