<?php

namespace App\Http\Controllers\Api\V1\Setting;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the authed profile resource.
     */
    public function show(Request $request)
    {
        try {
            $setting = Setting::first();

            return ResponseHelper::make([
                'appName'   => $setting->appName,
                'logoUri'   => StorageHelper::url($setting->logoUri),
            ]);
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $setting = Setting::first();
            $logo    = $request->file('logo');

            if(! $setting)
                throw new ResponseException('Setting not found', 404);

            $data = collect([
                'appName'   => $request->appName,
            ]);

            if($logo && $logo->isReadable()) {
                $logoURI = StorageHelper::putPublic('settings/logos', $logo);
                $data->put('logoUri', $logoURI);
            }

            $setting->update($data->toArray());

            return ResponseHelper::make($setting);
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
