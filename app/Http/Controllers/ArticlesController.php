<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    protected $articles;

    public function __construct()
    {
        $articlesFile = json_decode(file_get_contents(resource_path('data/articles.json')));
        $this->articles = $articlesFile->articles;
    }

    public function index()
    {
        return view('articles.index')->with('articles', $this->articles);
    }

    public function show($id)
    {
        abort_if( $id < 1 || $id > count($this->articles), 404);

        $article = $this->articles[$id - 1];
        return view('articles.show')->with('article', $article);
    }

    public function paginate($direction = 'right', $id)
    {
        //  On vérifie que l'identifiant renseigné est supérieur à 1 et inférieur au total du nombre d'article
        if( $id > 1 && $id < count($this->articles) ) {
            if( $direction === 'right' ) {
                //  Direction vers la droite, on incrémente l'id
                return redirect()->route('articles.show', $id + 1);
            }

            //  Direction vers la gauche, on décrémente
            return redirect()->route('articles.show', $id - 1);
        }

        //  Dans le cas contraire on redirige sur l'accueil des articles
        return redirect()->route('articles.index');
    }
}
