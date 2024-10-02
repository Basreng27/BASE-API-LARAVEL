<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ConsumeAPIController extends Controller
{
    public function index()
    {
        $token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0NGQzZGZhNzk5Y2YwODJhZjE5NjE2ZjZjYTZkMGY0MiIsIm5iZiI6MTcyMzQzMzY3Mi4wNjU2OTgsInN1YiI6IjY0YzQ2ZmQwY2FkYjZiMDE0NDBjZWY3NSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.sdwM-qsYVQO6Kk-kvZ9gQHaDVt2siHFuae0AbqwXtFg';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://api.themoviedb.org/3/movie/changes?page=1');

        // Mengambil data dari respons
        $data = $response->json();

        if ($response->successful()) {
            // Jika respons berhasil
            return $data;
        } elseif ($response->failed()) {
            // Jika terjadi kesalahan
            return response()->json(['error' => 'Failed to fetch data'], 500);
        }
    }
}
