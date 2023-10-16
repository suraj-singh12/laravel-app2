<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class FormMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Form::macro('customDateInput', function ($name, $value = null, $attributes = []) {
            $defaultAttributes = [
                'class' => 'custom-date-input',
            ];
            $attributes = array_merge($defaultAttributes, $attributes);
            return $this->input('date', $name, $value, $attributes);
        });
    }
}
