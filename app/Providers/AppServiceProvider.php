<?php

namespace App\Providers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\BladeDirectives\CanRoleDirective;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('hasRole', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})): ?>";
        });

        Blade::directive('endHasRole', function () {
            return '<?php endif; ?>';
        });
        //SOLO LETRAS Y ESPACIOS
        Validator::extend('letters_spaces', function ($attribute, $value) {
            return preg_match('/^[\pL\s]+$/u', $value);
        });
        //SOLO NUMEROS Y GUIONES
        Validator::extend('numbers_with_dash', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9\-]+$/', $value);
        });
        //SOLO NUMEROS
        Validator::extend('only_numbers', function ($attribute, $value) {
            return preg_match('/^[0-9]+$/', $value);
        });
        //SOLO NUMEROS, GUIONES Y LETRAS
        Validator::extend('numbers_dash_letters', function ($attribute, $value) {
            return preg_match('/^[0-9A-Za-z\-]+$/', $value);
        });
        //SOLO CERO Y UNO
        Validator::extend('only_zero_one', function ($attribute, $value) {
            return in_array($value, ['0', '1']);
        });
        // SOLO LETRAS, GUIONES, ESPACIOS, PUNTO Y PARÉNTESIS.
        Validator::extend('letters_dash_spaces_dot', function ($attribute, $value) {
            return preg_match('/^[\pL0-9\s.\-()]+$/u', $value);
        });

    }
}
