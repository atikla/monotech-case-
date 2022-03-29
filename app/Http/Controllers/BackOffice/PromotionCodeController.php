<?php

namespace App\Http\Controllers\BackOffice;

use App\Contracts\Repositories\PromotionRepositoryContract;
use App\Exceptions\Common\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackOffice\Promotion\StoreRequest;
use App\Http\Resources\BackOffice\Resources\PromotionResource;
use App\Support\Resources\ResourceSupport;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class PromotionCodeController extends Controller
{
    /**
     * @var PromotionRepositoryContract
     */
    private PromotionRepositoryContract $promotionRepository;

    public function __construct(PromotionRepositoryContract $promotionRepository)
    {
        $this->promotionRepository = $promotionRepository;
    }

    /**
     * Display a listing of the promotion Resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return PromotionResource::collection($this->promotionRepository->all())
            ->additional(ResourceSupport::baseResource());
    }

    /**
     * Display the specified promotion resource.
     *
     * @param int $id
     * @return PromotionResource
     * @throws NotFoundException
     */
    public function show(int $id): PromotionResource
    {
        $promotion = $this->promotionRepository->find($id);

        return !empty($promotion)
            ? new PromotionResource($promotion)
            : throw new NotFoundException(Response::$statusTexts[Response::HTTP_NOT_FOUND]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return PromotionResource
     */
    public function store(StoreRequest $request): PromotionResource
    {
        return new PromotionResource($this->promotionRepository->create($request->validated()));
    }
}
