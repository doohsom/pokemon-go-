<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{

    public function login(){
        $url = config('pokemon.local.API_URL').'/auth/login';
        $response = Http::post($url, [
            'email' => config('pokemon.local.POKEMON_EMAIL'),
            'password' => config('pokemon.local.POKEMON_PASSWORD')
        ]);
        $data = json_decode($response->body());
        if($data->status === 'success'){
            Cache::put('access_token', $data->data, $seconds = 3600);
        }

        return $data;
    }

    public function index(Request $request)
    {
        $login = $this->login();
        if($login->status === 'success'){
            $page = ($request->page) ?? 1;
            //$token = Cache::get('access_token')
            if(!empty($request->searchTerm)){
                $url = config('pokemon.local.API_URL').'/pokemons/search';
                $response = Http::withToken($login->data)
                    ->get($url, [
                    'search' => $request->searchTerm,
                    'page' => $page
                ]);
            }else{
                $url = config('pokemon.local.API_URL').'/pokemons';
                $response = Http::withToken($login->data)
                    ->get($url, [
                    'page' => $page
                ]);
            }
            $data = json_decode($response->body());
            $resp = $data->data->data;
            $pagination = $data->data->pagination;
        }else{
            $resp = '';
            $pagination = '';
        }

        return view('welcome', [
            'status' => $login->status,
            'responses' => $resp,
            'pagination' => $pagination
        ]);
    }

    public function read($id)
    {
        $login = $this->login();
        if($login->status === 'success'){
            $url = config('pokemon.local.API_URL').'/pokemon/'.$id;
            $response = Http::withToken($login->data)->get($url);
            $data = json_decode($response->body());
            $resp = $data->data;
        }else{
            $resp = '';
        }
        return view('read', [
            'status' => $login->status,
            'response' => $resp
        ]);
    }



}
