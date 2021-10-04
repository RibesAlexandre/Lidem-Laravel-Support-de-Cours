<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }

    public function show($id)
    {
        return view('articles.show')->with('id', $id);
    }
}
