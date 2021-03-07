<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show(User $user){

        return view('perfiles.show', compact('user'));
    }

    public function edit(User $user){

        $this->authorize('edit', $user);

        return view('perfiles.edit', compact('user'));

    }


    public function update(Request $request, User $user){

        $messages = [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'Máximo 255 caracteres',
            'email.required' => 'El email es obligatorio',
            'email.max' => 'Máximo 255 caracteres',
            'password.required' => 'La contraseña es obligatoria',
            'name.min' => 'Mínimo 8 caracteres',

        ];

        $attributes = request()->validate([
            'name' => 'required|string|max:255|alpha_dash',
            'email' => 'required|string|email|max:255',
            'avatar' => 'file',
            'password' => 'required|string|min:8|max:255|confirmed',

        ], $messages);

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('public/avatars');


            //Creo el nombre
            $nameImage=time()."_".$request->file('avatar')->getClientOriginalName();
            //Asigno el nombre de la foto a la entidad
            $attributes['avatar'] = $nameImage;

            //Guardo la nueva info de la entidad
            $user->update($attributes);


            //guardo la imagen en la ruta especificada, con el nombre especificado
            $request->file('avatar')->storeAs('public/avatars', $nameImage);

        }
        $attributes['password'] = bcrypt($attributes['password']);

        $user->update($attributes);


        return redirect( $user->path());
    }

    public function destroy(User $user){

        $user->delete();

        return redirect()->route('admin');

    }
}
