<?php


namespace Shaburov\Crud\Traits;


use Shaburov\Crud\CrudValidator;
use Illuminate\Http\Request;

trait CrudStoreTrait
{
  
    public function store(Request $request): array
    {
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_STORE);
        $this->setState();

        if (method_exists($this, 'saving')) {
            $this->saving();
        }

        $this->creating();
    
        $this->state = $this->state
            ->create($this->getData());

        if (method_exists($this, 'saved')) {
            $this->saved();
        }

        $this->created();

        return $this->getJson($this->state);
    }

    public function creating(): void
    {
    }

    public function created(): void
    {
    }

}
