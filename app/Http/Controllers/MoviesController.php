<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class MoviesController extends Controller
{
    public function index() {
        return Movie::all();
    }

    public function show($id) {
        return Movie::find($id);
    }

    public function store(Request $request) {
        $movie = Movie::create($request->all());

        return $movie;
    }

    public function update(Request $request, $id) {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return $movie;
    }

    public function delete($id) {
        return Movie::destroy($id);
    }
}
