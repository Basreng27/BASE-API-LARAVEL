<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comics;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    public function index()
    {
        // return Comics::get();

        $comics = Comics::select('name', 'description', 'genre_id')
            ->with('genre:id,name')
            ->get();

        return response()->json($comics);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:comics'],
            'description' => ['required'],
            'genre_id' => ['required', 'exists:genres,id']
        ]);

        return Comics::create($data);
    }

    public function update(Request $request, $id)
    {
        $comic = Comics::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'unique:comics,name,' . $comic->id],
            'description' => ['required'],
            'genre_id' => ['required', 'exists:genres,id']
        ]);

        $comic->update($data);

        return $comic;
        // return response()->json([
        //     'message' => 'Comic updated successfully',
        //     'comic' => $comic
        // ]);
    }

    public function delete($id)
    {
        $comic = Comics::findOrFail($id);

        $comic->delete();

        return $comic;
    }
}
