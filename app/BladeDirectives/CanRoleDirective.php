<?php

namespace App\BladeDirectives;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Directive;
class CanRoleDirective
{
    public function __invoke($role)
    {
        return "<?php if (auth()->check() && auth()->user()->hasRole({$role})): ?>";
    }
}
