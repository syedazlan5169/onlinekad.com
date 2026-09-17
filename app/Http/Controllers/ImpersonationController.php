<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ImpersonationController extends Controller
{
    public function start(Request $request, $id)
    {
        // Block chaining: an already-impersonated session can't start another impersonation
        if ($request->session()->has('impersonator_id')) {
            return back()->withErrors('You are already impersonating a user.');
        }

        $target = User::findOrFail($id);

        if ($target->is_admin) {
            return back()->withErrors('Cannot impersonate another admin.');
        }

        $adminId = Auth::id();

        $request->session()->put('impersonator_id', $adminId);
        Auth::loginUsingId($target->id);

        Log::info("Admin {$adminId} started impersonating user {$target->id}");

        return redirect('/senarai-kad')->with('success', "Now viewing as {$target->name}");
    }

    public function stop(Request $request)
    {
        $adminId = $request->session()->get('impersonator_id');

        abort_unless($adminId, 403);

        $impersonatedId = Auth::id();

        $request->session()->forget('impersonator_id');
        Auth::loginUsingId($adminId);

        Log::info("Admin {$adminId} stopped impersonating user {$impersonatedId}");

        return redirect('/admin')->with('success', 'Returned to admin account');
    }
}
