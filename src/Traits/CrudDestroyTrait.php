<?php


namespace Shaburov\Crud\Traits;


use Shaburov\Crud\CrudValidator;
use Illuminate\Http\Request;

trait CrudDestroyTrait
{
    public function destroy(Request $request, $id): array
    {
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_DELETE);
        $this->setState();

        $this->state = $this->state
            ->find($id);

        $this->deleting();

        $deleted = $this->state
            ->delete();

        $this->deleted();

        return $this->getJson(['deleted' => $deleted]);
    }

    public function deleting(): void
    {
    }

    public function deleted(): void
    {
    }
}
