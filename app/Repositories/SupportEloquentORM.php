<?php

namespace App\Repositories;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Models\Support;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\SupportRepositoryInterface;
use Faker\Core\Uuid;
use Illuminate\Support\Facades\Gate;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{

    public function __construct(
        protected Support $model
    )
    {}

    public function paginate(int $page= 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result =  $this->model->where(function($query) use ($filter) {
            if ($filter) {
                $query->where('subject', $filter);
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
        
        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        
        return $this->model->with('user')->where(function($query) use ($filter) {
            if ($filter) {
                $query->where('subject', $filter);
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })->get()->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $support = $this->model->with('user')->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();

    }

    public function delete(string $id): void
    {
        $support = $this->model->findOrFail($id);

        if (Gate::denies('owner', $support->user->id)) {
            abort(403, 'Not Authorized');
        }

        $support->delete();
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create(
            (array) $dto
        );

        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        if(!$support = $this->model->find($dto->id)){
            return null;
        }

        if (Gate::denies('owner', $support->user->id)) {
            abort(403, 'Not Authorized');
        }

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }

}