<?php

namespace App\Observers;

use App\Models\Wallet;
use Illuminate\Support\Str;

class WalletObserver
{
    /**
     * Handle the Wallet "creating" event.
     *
     * @param Wallet $wallet
     * @return void
     */
    public function creating(Wallet $wallet)
    {
        $wallet->token = Str::random(Wallet::TOKEN_LENGTH);
    }
}
