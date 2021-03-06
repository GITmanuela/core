<?php

namespace LaravelEnso\Core\App\Http\Controllers\Administration\User;

use Illuminate\Routing\Controller;
use LaravelEnso\Core\App\Forms\Builders\UserForm;
use LaravelEnso\Core\App\Models\User;

class Edit extends Controller
{
    public function __invoke(User $user, UserForm $form)
    {
        return ['form' => $form->edit($user)];
    }
}
