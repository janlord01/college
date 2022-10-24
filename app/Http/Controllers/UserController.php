<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller
{
    public function updateStatus($user_id, $status_code)
    {
        try {
            $user = User::whereId($user_id)->update(['status' => $status_code]);
            if ($user) {
                return redirect()->back()->with('status', 'Status Successfully Updated!');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
