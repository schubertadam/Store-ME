<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticate\LoginRequest;
use App\Services\AuthService\AuthServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        private AuthServiceInterface $service
    )
    {
    }

    public function index(): View
    {
        return view('authenticate.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $data = array_merge($request->validated(), ['ip' => $request->ip(), 'remember' => !is_null($request->input('remember'))]);
            $this->service->login($data);

            return redirect()->intended(route('dashboard'));
        } catch (ValidationException $e) {

            return back()->withException($e);
        }
    }
}
