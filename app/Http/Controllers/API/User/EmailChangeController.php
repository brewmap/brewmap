<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\User;

use Brewmap\Exceptions\User\NewEmailChangingException;
use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\User\UpdateEmailRequest;
use Brewmap\Services\UpdateEmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmailChangeController extends Controller
{
    public function change(UpdateEmailRequest $request, UpdateEmailService $service): JsonResponse
    {
        $service->sendNotifyForNewEmail($request->email, $request->user()->id);

        return new JsonResponse([
            "message" => __("profile.notification_new_email"),
        ]);
    }

    /**
     * @throws NewEmailChangingException
     */
    public function verify(Request $request, string $user_id, string $email, UpdateEmailService $service): JsonResponse
    {
        $service->updateEmail($user_id, $email);

        return new JsonResponse([
            "message" => __("profile.email_updated"),
        ]);
    }
}
