<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\User;

use Brewmap\Eloquent\User;
use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\User\UpdateEmailRequest;
use Brewmap\Services\UpdateEmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmailChangeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    // public function __construct()
    // {
    //     // Only the authenticated user can change its email, but he should be able
    //     // to verify his email address using other device without having to be
    //     // authenticated. This happens a lot when they confirm by phone.
    //     $this->middleware('auth')->only('change');

    //     // A signed URL will prevent anyone except the User to change his email.
    //     $this->middleware('signed')->only('verify');
    // }

    /**
     * Changes the user Email Address for a new one
     *
     * @throws
     */
    public function change(UpdateEmailRequest $request, UpdateEmailService $service): JsonResponse
    {
        $service->sendNotifyForNewEmail($request->email);
        return response()->json([
            "message" => __("profile.notification_new_email"),
        ]);
    }

    /**
     * Verifies and completes the Email change
     *
     * @param UpdateEmailRequest $request
     */
    public function verify(Request $request, User $user, string $email, UpdateEmailService $service): JsonResponse
    {
        $service->updateEmail($user, $email);
        return response()->json([
            "message" => __("profile.email_updated"),
        ]);
    }
}
