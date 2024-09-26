<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;
use Livewire\Component;
use Livewire\WithPagination;

class GuestbookController extends Controller
{
    use WithPagination;

    public function create()
    {
        Guestbook::create([
            'kad_id' => request('kad_id'),
            'author' => request('author'),
            'wish' => request('wish') 
        ]);

        return redirect('/n002')->with('success', 'Wish post successfully');
    }
}
