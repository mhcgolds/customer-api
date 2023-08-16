<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected Model $model;

    public function list(array $where = []): array
    {
        $query = $this->model->query();

        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }

        return $query->get()->toArray();
    }

    public function store(array $data): int
    {
        $this->model->fill($data);
        
        if ($this->model->save()) {
            return $this->model->id;
        }

        return 0;
    }

    public function show(int $id): ?array
    {
        $entry = $this->model->find($id);

        if (isset($entry)) {
            return $entry->toArray();
        }

        return null;
    }

    public function update(int $id, array $data): bool
    {
        $entry = $this->model->find($id);

        if (isset($entry)) {
            $entry->fill($data);
            return $entry->save();
        }

        return false;
    }

    public function destroy(int $id): ?bool
    {
        $entry = $this->model->find($id);

        if (isset($entry)) {
            return $entry->delete();
        }

        return false;
    }
}