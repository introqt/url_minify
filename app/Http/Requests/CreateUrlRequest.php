<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateUrlRequest
 *
 * @package App\Http\Requests
 */
class CreateUrlRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'original_url' => 'required|string|url',
            'expires_at' => 'nullable'
        ];
    }
}
