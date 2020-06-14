<?php


namespace Shaburov\Crud\Traits;


use Illuminate\Http\Request;

trait CrudRestoreTrait
{
    public function restore(Request $request, $id)
    {
        if ($request->get('deleted_at') !== 0) {
            return $this->getJson([]);
        }
        $this->state = $this->model
            ->where('id', $id)
            ->onlyTrashed();

        $this->beforeRestore();
        $restored = $this->state
            ->restore();
        $this->afterRestore();

        return $this->getJson(['restored' => $restored]);
    }

    public function beforeRestore()
    {
    }

    public function afterRestore()
    {
    }

}
