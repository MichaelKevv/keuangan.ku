<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Account;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $now = Carbon::now();
        $startOfMonth = $now->startOfMonth()->copy();
        $endOfMonth = $now->endOfMonth()->copy();

        // Account Balances
        $accounts = $user->accounts()->get();
        $totalBalance = $accounts->sum('balance');

        // Monthly Stats
        $monthlyIncome = Transaction::where('user_id', $user->id)
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $monthlyExpense = Transaction::where('user_id', $user->id)
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $monthlyBalance = $monthlyIncome - $monthlyExpense;

        // Expense by Category
        $expenseCategories = Category::where('type', 'expense')->get();
        $expenseByCategory = [];
        $totalExpense = 0;

        foreach ($expenseCategories as $category) {
            $expense = Transaction::where('user_id', $user->id)
                ->where('category_id', $category->id)
                ->where('type', 'expense')
                ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
                ->sum('amount');

            if ($expense > 0) {
                $expenseByCategory[] = [
                    'name' => $category->name,
                    'amount' => $expense,
                    'color' => $category->color,
                    'icon' => $category->icon,
                ];
                $totalExpense += $expense;
            }
        }

        // Calculate percentages
        if ($totalExpense > 0) {
            foreach ($expenseByCategory as &$category) {
                $category['percentage'] = round(($category['amount'] / $totalExpense) * 100);
            }
        }

        // Recent Transactions
        $recentTransactions = Transaction::where('user_id', $user->id)
            ->with('category', 'account')
            ->orderBy('transaction_date', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'accounts',
            'totalBalance',
            'monthlyIncome',
            'monthlyExpense',
            'monthlyBalance',
            'expenseByCategory',
            'recentTransactions'
        ));
    }
}
