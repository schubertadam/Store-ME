<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticate\StorePasswordResetRequest;
use App\Http\Requests\Authenticate\UpdatePasswordResetRequest;
use App\Services\PasswordResetService\PasswordResetServiceInterface;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PasswordResetController extends Controller
{
    public function __construct(
        private PasswordResetServiceInterface $service
    )
    {
    }

    public function index(): View
    {
        return view('authenticate.password_reset.index');
    }

    public function store(StorePasswordResetRequest $request): View
    {
        if ($this->service->sendPasswordResetEmail($request->validated())) {
            return view('authenticate.password_reset.store_success');
        }

        toastr()->error('Something is wrong. Please contact the site administrator');
        return view('authenticate.password_reset.index');
    }

    public function show(string $token): View
    {
        return view('authenticate.password_reset.show', compact('token'));
    }

    public function update(UpdatePasswordResetRequest $request, string $token)
    {
        $data = array_merge($request->validated(), ['token' => $token]);

        if ($this->service->resetPassword($data)) {
            toastr()->success('Password successfully updated');
            return redirect()->route('login.index');
        }

        toastr()->error('Your password cannot be updated!');
        return back();
    }
}
