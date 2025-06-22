<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $accounts = $user->accounts()->get();
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'balance' => ['required', 'numeric'],
            'icon' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'size:7'], // hex color
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->accounts()->create($request->all());

        return redirect()->route('accounts.index')
            ->with('success', 'Akun berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return redirect()->route('accounts.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403);
        }
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'size:7'],
        ]);

        $account->update($request->only(['name', 'icon', 'color']));

        return redirect()->route('accounts.index')
            ->with('success', 'Akun berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403);
        }

        $account->delete();

        return redirect()->route('accounts.index')
            ->with('success', 'Akun berhasil dihapus.');
    }
}
