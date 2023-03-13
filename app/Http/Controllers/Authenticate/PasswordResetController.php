<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticate\StorePasswordResetRequest;
use App\Http\Requests\Authenticate\UpdatePasswordResetRequest;
use App\Jobs\SendEmailJob;
use App\Mail\PasswordResetMail;
use App\Services\PasswordService\PasswordServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;

class PasswordResetController extends Controller
{
    public function __construct(
        private PasswordServiceInterface $service
    )
    {
    }

    public function index(): View
    {
        return view('authenticate.password_reset.index');
    }

    public function store(StorePasswordResetRequest $request): View
    {
        try {
            $this->service->createToken($request->validated());

            return view('authenticate.password_reset.store_success');
        } catch (QueryException $e) {
            toastr()->error('Something is wrong. Please contact the site administrator');
            return view('authenticate.password_reset.index');
        }
    }

    public function show(string $token): View
    {
        return view('authenticate.password_reset.show', compact('token'));
    }

    public function update(UpdatePasswordResetRequest $request, string $token)
    {
        if ($this->service->setPassword($request->validated())) {
            toastr()->success('Password successfully updated');
            return redirect()->route('login.index');
        }

        toastr()->error('Your password cannot be updated!');
        return back();
    }
}
