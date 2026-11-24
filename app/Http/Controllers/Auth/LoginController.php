<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class LoginController {
 public function create(): View {return view('auth.login');}
 public function store(Request $r): RedirectResponse {
  $credentials=$r->validate(['email'=>['required','email'],'password'=>['required','string']]);
  if(!Auth::attempt($credentials,$r->boolean('remember'))) return back()->withErrors(['email'=>'Email atau password tidak sesuai.'])->onlyInput('email');
  $r->session()->regenerate();return redirect()->intended(route('dashboard'));
 }
 public function destroy(Request $r): RedirectResponse {Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect()->route('login');}
}
