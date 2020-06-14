<?php


namespace Shaburov\Crud\Traits;


use Shaburov\Crud\CrudValidator;
use Illuminate\Http\Request;

trait CrudShowTrait
{
    public function show(Request $request, $id)
    {
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_INDEX);
        $this->setState();
        
        $this->beforeShow();
        
        $this->state = $this->state->find($id);
        
        if (!$this->state) {
            return $this->getJson([]);
        }
        
        $this->afterShow();
        
        return $this->getJson($this->state);
    }
    
    public function beforeShow()
    {
    }
    
    public function afterShow()
    {
    }
}
