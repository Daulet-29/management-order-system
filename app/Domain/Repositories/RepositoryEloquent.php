<?php

namespace App\Domain\Repositories;

trait RepositoryEloquent
{
    public function firstById($id)
    {
        return $this->model::find($id);
    }

    public function get()
    {
        return $this->model::get();
    }


    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($id, $data)
    {
        $model = $this->model::where('id', $id)->update($data);
        return $this->model::query()->find($id);
    }

    public function destroy($id)
    {
        return $this->model::query()->where('id', $id)->delete();
    }
}
