<?php

namespace App\Observers;

use App\Models\Transaction;
use App\Models\Account;

class TransactionObserver
{
    /**
     * Adjust account balance after a transaction is created.
     */
    public function created(Transaction $transaction): void
    {
        if ($account = $transaction->account) {
            $this->adjustBalance($account, $transaction->amount, $transaction->type);
        }
    }

    /**
     * Adjust balances after a transaction is updated.
     */
    public function updated(Transaction $transaction): void
    {
        // Revert the original amount from the original account
        $this->revertBalance(
            $transaction->getOriginal('account_id'),
            $transaction->getOriginal('amount'),
            $transaction->getOriginal('type')
        );

        // Apply the new amount to the new account
        if ($account = $transaction->account) {
            $this->adjustBalance($account, $transaction->amount, $transaction->type);
        }
    }

    /**
     * Adjust account balance after a transaction is deleted.
     */
    public function deleted(Transaction $transaction): void
    {
        // Revert the transaction's effect
        $this->revertBalance($transaction->account_id, $transaction->amount, $transaction->type);
    }

    /**
     * Applies a transaction's amount to an account's balance.
     */
    protected function adjustBalance(Account $account, float $amount, string $type): void
    {
        if ($type === 'income') {
            $account->balance += $amount;
        } else {
            $account->balance -= $amount;
        }
        $account->save();
    }

    /**
     * Reverts a transaction's effect on an account's balance.
     */
    protected function revertBalance(?int $accountId, float $amount, string $type): void
    {
        if (!$accountId) {
            return;
        }

        if ($account = Account::find($accountId)) {
            if ($type === 'income') {
                $account->balance -= $amount;
            } else {
                $account->balance += $amount;
            }
            $account->save();
        }
    }

    /**
     * Handle the Transaction "restored" event.
     */
    public function restored(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "force deleted" event.
     */
    public function forceDeleted(Transaction $transaction): void
    {
        //
    }
}
