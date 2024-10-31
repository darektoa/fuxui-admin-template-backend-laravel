<?php

namespace App\Http\Controllers\Api\V1\Log;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Log\ActivityResource;
use App\Models\Log\ActivityLog;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            $logs = ActivityLog::with([
                    'accessToken',
                    'client',
                    'user',
                ])
                ->except([
                    'headers',
                    'parameters',
                ])
                ->when((bool) $startDate, fn($query) => (
                    $query->whereDate('created_at', '>=', $startDate)
                ))
                ->when((bool) $endDate, fn($query) => (
                    $query->whereDate('created_at', '<=', $endDate)
                ))
                ->get();

            return ResponseHelper::make(
                ActivityResource::collection($logs)
            );
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
