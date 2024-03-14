<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth()->id())->get();
        return view('discusion', compact('users'));
    }

    /*public function ecrire()
    {
        return view('ecrire');
    }

    public function create($recipientId)
    {
        $recipient = User::findOrFail($recipientId);
        return view('/ecrire', compact('recipient'));
    }*/

    public function store(Request $request, $recipient_id)
    {
        $request->validate([
            'contenu'=>'required|max:255'
        ]);

        $contenu = new Message;
        $contenu->contenu = $request->contenu;
        $contenu->sender_id = Auth()->id();
        $contenu->recipient_id = $recipient_id;
        $contenu->save();

        return redirect()->route('message.show', $recipient_id)->with('message', 'Message bien envoyé');
    }

    public function show($recipient_id)
    {
        $messages = Message::where('sender_id', auth()->id())->where('recipient_id', $recipient_id)
                    ->orwhere('sender_id', $recipient_id)->where('recipient_id', auth()->id())
                    ->orderBy('created_at', 'asc')->get();
        /*if ($messages->isEmpty())
        {
            return redirect()->route('message.show', $recipient_id)->with('error', 'Vous n\'avez pas encore eu de conversation');
        }*/
        return view('message', compact('messages', 'recipient_id'));
    }
}
