<?php

namespace App\Http\Controllers\Api\V1\Data;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Menu\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public $pageName = "Menu Data";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $menus = Menu::get();

            return ResponseHelper::make($menus);
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
