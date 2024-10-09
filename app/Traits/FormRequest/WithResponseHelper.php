<?php

namespace App\Traits\FormRequest;

use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;

trait WithResponseHelper {
    /**
     * Set response format when errors
     *
     * @return null|Illuminate\Http\JsonResponse
     */
    protected function errorResponse(): ?JsonResponse
    {
        return ResponseHelper::error(
            $this->validator->errors(),
            $this->errorMessage(),
            $this->statusCode(),
        );
    }
}
