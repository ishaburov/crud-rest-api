<?php


namespace Shaburov\Crud\Traits;


trait CrudValidatorTrait
{
    //$this->validateIndex = Request::class;

    protected ?string $validateList = null;
    protected ?string $validateIndex = null;
    protected ?string $validateRestore = null;
    protected ?string $validateStore = null;
    protected ?string $validateUpdate = null;
    protected ?string $validateDestroy = null;
    protected ?string $validateShow = null;

    abstract public function setValidations(): void;

}
