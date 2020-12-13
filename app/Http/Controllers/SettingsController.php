<?php


namespace App\Http\Controllers;


use App\Models\Option;
use App\Models\User;
use App\Validators\LoginValidator;
use App\Validators\UpdateSettingsValidator;
use Framework\Auth\Auth;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsController
{

    public function edit() {
        $title = 'Definições';

        return view('settings.edit', compact('title'));
    }

    public function update(Request $request) {
        $data = UpdateSettingsValidator::handle($request);

        foreach($data as $key=>$value) {
            $option = Option::find($key, 'name')[0];
            $option->update(['value' => $value]);
        }

        $file = $request->files->get('websiteLogo');

        if($file) {
            $option = Option::find('websiteLogo', 'name')[0];
            $option->uploadFile($file);
        }

        return redirect(router()->url('settings.edit'), ['status' => 'Definições atualizadas']);
    }

}