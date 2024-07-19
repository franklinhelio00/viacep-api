<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CepController;

Log::info('O arquivo routes/web.php foi carregado.');

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API de Consulta de CEP",
 *     description="Documentação da API para consulta de múltiplos CEPs usando a API ViaCEP",
 *     @OA\Contact(
 *         email="seu-email@exemplo.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

Route::get('/search/local/{ceps}', [CepController::class, 'search']);

Route::get('api/documentation', function () {
    return view('swagger.index');
});
