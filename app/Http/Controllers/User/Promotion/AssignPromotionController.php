<?php

namespace App\Http\Controllers\User\Promotion;

use App\Contracts\Repositories\PromotionRepositoryContract;
use App\Exceptions\User\PromotionNotSuitableForAssignmentException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Promotion\AssignPromotionRequest;
use App\Http\Resources\User\Promotion\AssignPromotionResource;
use App\Services\User\Promotion\PromotionService;
use JetBrains\PhpStorm\NoReturn;

class AssignPromotionController extends Controller
{
    private PromotionRepositoryContract $promotionRepository;

    public function __construct(PromotionRepositoryContract $promotionRepository)
    {
        $this->promotionRepository = $promotionRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param AssignPromotionRequest $request
     * @return AssignPromotionResource
     * @throws PromotionNotSuitableForAssignmentException
     */
    public function __invoke(AssignPromotionRequest $request): AssignPromotionResource
    {
        return PromotionService::assignPromotionToUser(
            user: $request->user(),
            promotion: $this->promotionRepository->findByCodeForAssignment($request->get('code'))
        )
            ? new AssignPromotionResource([])
            : throw new PromotionNotSuitableForAssignmentException('this code is not suitable for assignment');
    }
}
