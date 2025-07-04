<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;
use App\Models\Kad;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class GuestbookController extends Controller
{
    use WithPagination;

    public function create()
    {
        $kad = Kad::findOrFail(request('kad_id'));
        Guestbook::create([
            'kad_id' => request('kad_id'),
            'author' => request('author'),
            'wish' => request('wish'), 
        ]);

        return redirect()->back()->with([
            'success' => 'Wish posted successfully',
            'message_detail' => 'Anyone with a link can now view your wish.'
        ]);
        
    }

    public function destroy($id)
    {
        $wish = Guestbook::findOrFail($id);
        $wish->delete();

        Log::info('User deleted a wish for Kad ' . $wish->kad->slug);

        return back()->with('success', 'Wish deleted successfully');
    }
}
