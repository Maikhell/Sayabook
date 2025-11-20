<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Services\BookDataService; // Import the service
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View as ViewContract;

class ProfileController extends Controller
{
    // Inject the service into the controller properties for reuse
    protected $bookService;

    public function __construct(BookDataService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Retrieves essential user data for the header or returns a redirect.
     * This method now delegates to the Service class.
     * @return User|RedirectResponse
     */
    private function getUserHeaderData(): User|RedirectResponse
    {
        return $this->bookService->getAuthUserHeaderData();
    }

    /**
     * Shows the 'mybooks' view with user header data.
     * @return ViewContract|RedirectResponse
     */
    public function showMyBooksHeader(): ViewContract|RedirectResponse
    {
        $userHeaderData = $this->getUserHeaderData();
        if ($userHeaderData instanceof RedirectResponse) {
            return $userHeaderData;
        }
        /** @var User $user */
        $user = $userHeaderData;

        $publicBooks = $user->books()
            ->where('book_privacy', 'public')
            ->get();
        return view('mybooks', compact('userHeaderData', 'publicBooks','user'));
    }
    public function showAccountDetails(){
        $user = auth()->user();
        $userHeaderData = $this->getUserHeaderData();
        if($userHeaderData instanceof RedirectResponse){
            return $userHeaderData;
        }
        /** @var User $user */

        $user = $userHeaderData;

        return view('editaccount', compact('userHeaderData','user'));
    }
}