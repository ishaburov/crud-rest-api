<?php


namespace CrudRestApi\Traits;


trait CrudValidatorTrait
{
    protected ?string $validateList = null;
    protected ?string $validateIndex = null;
    protected ?string $validateRestore = null;
    protected ?string $validateStore = null;
    protected ?string $validateUpdate = null;
    protected ?string $validateDestroy = null;
    protected ?string $validateShow = null;

    abstract public function setValidations(): void;

}
