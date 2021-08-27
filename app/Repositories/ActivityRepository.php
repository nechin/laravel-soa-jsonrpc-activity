<?php

namespace App\Repositories;

use App\Models\Activity;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ActivityRepository
{
    private Activity $model;

    /**
     * @param  Activity  $activity
     */
    public function __construct(Activity $activity)
    {
        $this->model = $activity;
    }

    /**
     * @param  array  $attributes
     * @return bool
     */
    public function storeActivity(array $attributes): bool
    {
        try {
            $this->model->create($attributes);
            return true;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }

    /**
     * @param  $landingId
     * @return Paginator|null
     */
    public function getActivities($landingId): ?Paginator
    {
        try {
            return $this->model
                ->select(DB::raw("url, count(*) as visits, max(visit_date) as last_visit"))
                ->where('landing_id', $landingId)
                ->groupBy('url')
                ->simplePaginate(2);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return null;
        }
    }
}
