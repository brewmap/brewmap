<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\User;

use Brewmap\Eloquent\User;
use Brewmap\Exceptions\User\NewEmailChangingException;
use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\User\UpdateEmailRequest;
use Brewmap\Services\User\UpdateEmailService;
use Illuminate\Http\JsonResponse;

class EmailChangeController extends Controller
{
    public function change(UpdateEmailRequest $request, UpdateEmailService $service): JsonResponse
    {
        $service->notifyAboutNewEmail($request->user(), $request->get("email"));

        return new JsonResponse([
            "message" => __("profile.notification_new_email"),
        ]);
    }

    /**
     * @throws NewEmailChangingException
     */
    public function verify(User $user, string $email, UpdateEmailService $service): JsonResponse
    {
        $service->updateEmail($user, $email);

        return new JsonResponse([
            "message" => __("profile.email_updated"),
        ]);
    }
}
