<?php


namespace Shaburov\Crud\Traits;


use Shaburov\Crud\CrudValidator;
use Illuminate\Http\Request;

trait CrudUpdateTrait
{

    public function update(Request $request, $id): array
    {
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_UPDATE);
        $this->setState();

        $this->state = $this->state
            ->find($id);

        if (method_exists($this, 'saving')) {
            $this->saving();
        }

        $this->updating();

        $updated = $this->state
            ->update($this->getData());

        if (method_exists($this, 'saved')) {
            $this->saved();
        }

        $this->updated();

        return $this->getJson(['updated' => $updated]);
    }

    public function updating(): void
    {
    }

    public function updated(): void
    {
    }

}
