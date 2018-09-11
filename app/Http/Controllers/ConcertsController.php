<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Http\Request;

class ConcertsController extends Controller
{
    public function show($id)
    {
//        $concert = Concert::whereNotNull('published_at')->findOrFail($id);
        $concert = Concert::find($id);
        return view('concerts.show', ['concert' => $concert]);
    }
}
