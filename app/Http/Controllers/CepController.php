<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    /**
     * @OA\Get(
     *     path="/search/local/{ceps}",
     *     summary="Consulta múltiplos CEPs",
     *     @OA\Parameter(
     *         name="ceps",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         ),
     *         description="Lista de CEPs separados por vírgula"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Retorna os dados dos CEPs",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="cep", type="string"),
     *                 @OA\Property(property="label", type="string"),
     *                 @OA\Property(property="logradouro", type="string"),
     *                 @OA\Property(property="complemento", type="string"),
     *                 @OA\Property(property="bairro", type="string"),
     *                 @OA\Property(property="localidade", type="string"),
     *                 @OA\Property(property="uf", type="string"),
     *                 @OA\Property(property="ibge", type="string"),
     *                 @OA\Property(property="gia", type="string"),
     *                 @OA\Property(property="ddd", type="string"),
     *                 @OA\Property(property="siafi", type="string")
     *             )
     *         )
     *     )
     * )
     */
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
