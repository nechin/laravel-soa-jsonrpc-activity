<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Http\Requests\ActivityRequest;
use App\Repositories\ActivityRepository;
use Illuminate\Pagination\Paginator;
use Sajya\Server\Procedure;

class ActivityProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'activity';

    private ActivityRepository $repository;

    /**
     * @param  ActivityRepository  $activityRepository
     */
    public function __construct(ActivityRepository $activityRepository)
    {
        $this->repository = $activityRepository;
    }

    /**
     * Show activity
     *
     * @param ActivityRequest $request
     *
     * @return Paginator|null
     */
    public function show(ActivityRequest $request): ?Paginator
    {
        $validated = $request->validated();
        return $this->repository->getActivities($validated['landing_id']);
    }

    /**
     * Store activity
     *
     * @param ActivityRequest $request
     *
     * @return bool
     */
    public function store(ActivityRequest $request): bool
    {
        $attributes = $request->safe()->only(['landing_id', 'url', 'visit_date']);
        return $this->repository->storeActivity($attributes);
    }
}
