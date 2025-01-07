<?php

namespace App\Http\Controllers\Api\V1\Log;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Log\ActivityResource;
use App\Models\Log\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public $pageName = "Log Activity";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $page = $request->page ?? 1;
            $perPage = $request->perPage ?? 10;
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            $search = $request->search;
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
                ->when((bool) $search, fn($query) => (
                    $query->where('url', 'LIKE', "%$search%")
                        ->orWhere('name', 'LIKE', "%$search%")
                        ->orWhereRelation('user', 'email', 'LIKE', "%$search%")
                        ->orWhereRelation('user', 'username', 'LIKE', "%$search%")
                        ->orWhereRelation('user', 'firstname', 'LIKE', "%$search%")
                        ->orWhereRelation('user', 'lastname', 'LIKE', "%$search%")
                ))
                ->where('user_id', Auth::id())
                ->latest()
                ->paginate(
                    page: $page,
                    perPage: $perPage
                );

            return ResponseHelper::paginate(
                ActivityResource::collection($logs)
            );
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
