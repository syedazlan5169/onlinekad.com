<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;

class GuestbookController extends Controller
{
    public function showWishes()
    {
        $wishes = Guestbook::where('kad_id', 1)->paginate(10);

        return $wishes;
    }
}
