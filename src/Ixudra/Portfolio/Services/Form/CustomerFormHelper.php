<?php namespace Ixudra\Portfolio\Services\Form;


use App;

use Ixudra\Core\Services\Form\BaseFormHelper;

class CustomerFormHelper extends BaseFormHelper {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
    }


    public function getUsedAsSelectList($includeNull = false)
    {
        $models = $this->repository->used();

        return $this->convertToSelectList($includeNull, $models);
    }

    protected function convertToSelectList($includeNull, $models)
    {
        $results = array();
        if( $includeNull ) {
            $results[ 0 ] = '';
        }

        foreach( $models as $model ) {
            $results[ $model->id ] = $model->object->present()->fullName;
        }

        return $results;
    }

    protected function convertToAutoComplete($models)
    {
        $results = array();
        foreach( $models as $model ) {
            $results[] = array(
                'data'          => $model->id,
                'value'         => $model->object->present()->fullName
            );
        }

        return $results;
    }

    public function getWithProjectOptionsAsSelectList($includeNull = false)
    {
        return $this->getBooleanSelectList( $includeNull );
    }

}
