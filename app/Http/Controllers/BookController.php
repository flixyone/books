<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookRequest;


class BookController extends Controller
{

    public function index(Request $request)
    {
        $book = Book::get();
		return response()->json(['books' => $book], 200);
    }


    public function create()
    {
        //
    }


    public function store(BookRequest $request)
    {
        $book = new Book($request->all());
		$book->save();
		return response()->json(['status' => 'Book Created', 'book' => $book], 201);
    }


    public function show(Request $request, Book $book)
    {
        return response()->json(['Book' => $book], 200);
    }


    public function edit($id)
    {
        //
    }


    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->all());
		return response()->json([], 204);
    }


    public function destroy(Request $request, Book $book)
    {
		$book->delete();
		return response()->json([], 204);
    }
}

