<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function search($ceps)
    {
        $cepsArray = explode(',', $ceps);
        $results = [];

        foreach ($cepsArray as $cep) {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/"); // Ignore essa linha para desativar temporariamente a verificação do certificado SSL e ative a linha abaixo para conseguir testar em ambiente local
        // $response = Http::withOptions(['verify' => false])->get("https://viacep.com.br/ws/{$cep}/json/");
           if ($response->successful()) {
           $data = $response->json();
           $results[] = [
            'CEP' => str_replace('-', '', $data['cep']),
            'Rótulo' => "{$data['logradouro']}, {$data['localidade']}",
            'Logradouro' => $data['logradouro'],
            'Complemento' => $data['complemento'],
            'Bairro' => $data['bairro'],
            'Cidade' => $data['localidade'],
            'Estado' => $data['uf'],
            'DDD' => $data['ddd'],
            'IBGE' => $data['ibge'],
            'Gia' => $data['gia'],
            'Siafi' => $data['siafi'],
           ];
           }
        }
        return response()->json($results);
    }
}
