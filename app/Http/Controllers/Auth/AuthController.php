<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $loginCredentials = $request->safe()->only(['email', 'password']);
        if (auth()->attempt($loginCredentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->back()->with(['alert-message' => 'Email or password incorrect', 'alert-type' => 'error']);
        }
    }

    public function logout(Request $request)
    {
        if (auth()->check()) {
            auth()->logout();
            $request->session()->invalidate();
            session()->flash('success', 'Logout successfully');
            return redirect()->route('login');
        }
    }

    public function home()
    {
        $products = Product::count();
        $categories = Category::count();

        return view('home', compact('products', 'categories'));
    }
}
