<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Managers\Users\UserManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    private UserManager $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {
            try {
                $this->userManager->create($request);

                return response()->json([
                    'message' => 'Hesabınız başarıyla oluşturuldu.'
                ], Response::HTTP_CREATED);
            } catch (\Exception $e) {
                Log::error($e->getMessage(), $e->getTrace());
                DB::rollBack();

                return response()->json([
                    'message' => 'Kullanıcı oluşturulamadı, lütfen daha sonra tekrar deneyin.'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        });
    }
}
