<?php


namespace CrudRestApi\Traits;


use CrudRestApi\CrudValidator;
use Illuminate\Http\Request;

trait CrudDestroyTrait
{
    public function destroy(Request $request, $id): array
    {
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_DELETE);
        $this->setQuery();

        $model = $this->getModel()
            ->find($id);

        $this->deleting($model);

        $deleted = $model
            ->delete();

        $this->deleted($model);

        return $this->getJson([
            'is_deleted' => $deleted,
            'id' => $model->id,
        ]);
    }

    public function deleting($model): void
    {
    }

    public function deleted($model): void
    {
    }
}
