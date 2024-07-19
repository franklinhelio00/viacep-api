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
            // $response = Http::get("https://viacep.com.br/ws/{$cep}/json/"); // Ignore essa linha para desativar temporariamente a verificação do certificado SSL e ative a linha abaixo para conseguir testar em ambiente local
            $response = Http::withOptions(['verify' => false])->get("https://viacep.com.br/ws/{$cep}/json/");
            if ($response->successful()) {
                $data = $response->json();
                $results[] = [
                    'cep' => str_replace('-', '', $data['cep']),
                    'label' => "{$data['logradouro']}, {$data['localidade']}",
                    'logradouro' => $data['logradouro'],
                    'complemento' => $data['complemento'],
                    'bairro' => $data['bairro'],
                    'localidade' => $data['localidade'],
                    'uf' => $data['uf'],
                    'ibge' => $data['ibge'],
                    'gia' => $data['gia'] ?? '',
                    'ddd' => $data['ddd'],
                    'siafi' => $data['siafi'],
                ];
            }
        }

        return response()->json($results);
    }
}
