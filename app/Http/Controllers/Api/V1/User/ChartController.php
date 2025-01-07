<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public $pageName = "User Chart";

    public function index(Request $request)
    {
        $startDate = $request->startDate ?? now()->firstOfYear();
        $endDate = $request->endDate ?? now();
        $users = User::monthlyChartByCreatedAt($startDate, $endDate);

        return ResponseHelper::make(
            $users
        );
    }
}
