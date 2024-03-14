<?php

namespace App\Http\Controllers;
use App\Models\Publication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicationController extends Controller
{

    public function index() // affichage des publications sur la page de publication
    {
        $publications = Publication::with('user')->orderby('created_at', 'desc')->paginate(3);
        return view('publication', ['publications' => $publications]);
    }

    public function store(Request $request) // ajout des details de la publication dans la bd
    {
        $request->validate([
            'titre'=>'required|max:20',
            'description'=>'required|max:255',
        ]);

        $publication = new Publication;
        $publication->titre = $request->titre;
        $publication->description = $request->description;
        $publication->user_id = auth()->id();
        $publication->save();
        return redirect('/publication')->with('message', 'votre publication a été bien importé');

    }

    public function destroy($id) // supprimer une publication avec vérification si c'est bien le propriétaire qui effectue l'action
    {
        $publication = Publication::find($id);
        if($publication->user_id !== Auth::id())
        {
            return redirect('/publication')->with('error', 'Attention !  Vous n\'êtes pas l\'auteur de la publication');
        }else
        {
            $publication->delete();
            return redirect('/publication')->with('message', 'Votre publication a été bien supprimé');
        }
    }

    public function edit($id)
    {
        $publication = Publication::find($id);
        return view('/update_pub', compact('publication'));
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $searchResults = Publication::where('titre','like', "%$search%")->get();
        
        if ($searchResults->isEmpty())
        {
            return redirect('/publication')->with('error', 'Aucune publication ne correspond à votre recherche');
        }
        return view('search', compact('searchResults'));    
    }

}
