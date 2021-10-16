<?php

namespace App\Rules;

use App\Http\Controllers\DiaristaController;
use App\Services\ViaCep;
use Illuminate\Contracts\Validation\Rule;

class ValidaCep implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public ViaCep $viaCep;

    public function __construct(ViaCep $viaCep)
    {
        $this->viaCep = $viaCep;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cep = str_replace('-', '', $value);
        return (bool) $this->viaCep->buscar($cep);
    }

    /**
     * Get Cep inválido!
     *
     * @return string
     */
    public function message()
    {
        return 'Cep inválido!';
    }
}
