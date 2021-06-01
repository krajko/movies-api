<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MoviesController extends Controller
{
    public function index(Request $request) {
        $query = "%".$request->input('title')."%";
        $offset = $request->input('skip');
        $limit = $request->input('take');

        if ($query) {
            return Movie::search($query)->skip($offset)->take($limit);
        }

        return Movie::all()->skip($offset)->take($limit);
    }

    public function show($id) {
        return Movie::findOrFail($id);
    }

    public function store(CreateMovieRequest $request) {
        return Movie::create($request->validated());
    }

    public function update(UpdateMovieRequest $request, $id) {
        $movie = Movie::findOrFail($id);
        $movie->update($request->validated());

        return $movie;
    }

    public function delete($id) {
        return Movie::destroy($id);
    }
}
