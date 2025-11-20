<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

/**
 * Service class to handle shared data retrieval and authentication checks.
 */
class BookDataService
{
    /**
     * Retrieves essential authenticated user data (id, username, image) 
     * or returns a RedirectResponse if the user is not authenticated.
     *
     * @return User|\Illuminate\Http\RedirectResponse
     */
    public function getAuthUserHeaderData(): User|RedirectResponse
    {
        // 1. Check if the user is authenticated first
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Retrieve only the necessary header columns
        $userHeaderData = User::where('id', Auth::id())
            ->select('id', 'username', 'image', 'email' ,'password')
            ->first();

        // 3. Fallback check
        if (!$userHeaderData) {
            return redirect()->route('login');
        }

        return $userHeaderData;
    }

    /**
     * Retrieves supplementary header data (e.g., counts, totals).
     * This is separate to keep the user object retrieval clean.
     *
     * @return array
     */
    public function getSupplementaryHeaderData(): array
    {
        // Example: logic for other header info can go here.
        // Since your original code was simple, we'll keep this as a placeholder.
        return [
            'book_count' => Auth::user()->books()->count(),
        ];
    }
};