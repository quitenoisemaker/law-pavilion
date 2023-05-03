<?php

namespace App\Service\Client;


class ClientDetailService
{

    /**
     * Store the image in the public disk storage
     *
     * @param  \Illuminate\Http\Request $request->profile_image
     * @return $imagePath
     */
    public function storeClientProfileImage($request)
    {
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('clientImage', 'public');
            return  $imagePath;
        }
    }
}
