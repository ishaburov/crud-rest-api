<?php


namespace CrudRestApi\Traits;


use Illuminate\Http\Request;

trait CrudRestoreTrait
{
    public function restore(Request $request, $id)
    {
        if ($request->get('deleted_at') !== 0) {
            return $this->getJson([]);
        }
        $this->query = $this->model
            ->where('id', $id)
            ->onlyTrashed();

        $this->beforeRestore();
        $restored = $this->query
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
