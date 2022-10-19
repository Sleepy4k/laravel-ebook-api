<?php

namespace App\Repositories\Models;

use Carbon\Carbon;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\AuthorInterface;

class AuthorRepository extends EloquentRepository implements AuthorInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param Model $model
     */
    public function __construct(Author $model)
    {
        $this->model = $model;
    }
    
    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        if (array_key_exists('tanggal_lahir', $payload)) {
            $payload['tanggal_lahir'] = Carbon::parse($payload['tanggal_lahir'])->format('Y-m-d');
        }

        $model = $this->model->create($payload);

        return $model->fresh();
    }
    
    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return Model
     */
    public function update(int $modelId, array $payload): bool
    {
        if (array_key_exists('tanggal_lahir', $payload)) {
            $payload['tanggal_lahir'] = Carbon::parse($payload['tanggal_lahir'])->format('Y-m-d');
        }
        
        $model = $this->findById($modelId);

        return $model->update($payload);
    }
}