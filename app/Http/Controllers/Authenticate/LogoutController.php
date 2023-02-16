<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticate\LogoutRequest;
use App\Services\AuthService\AuthServiceInterface;

class LogoutController extends Controller
{
    public function __construct(
        private AuthServiceInterface $service
    )
    {
    }

    public function __invoke(LogoutRequest $request)
    {
        if ($this->service->logout()) {
            toastr()->success('Logout successful');
            return redirect()->route('login.index');
        }

        toastr()->error('Error during logout');
        return back();
    }
}
