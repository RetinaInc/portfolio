<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Models\Company;
use Ixudra\Portfolio\Models\Address;

class CompanyInputHelper extends BaseInputHelper {

    protected $addressInputHelper;


    public function __construct(AddressInputHelper $addressInputHelper)
    {
        $this->addressInputHelper = $addressInputHelper;
    }


    public function getDefaultInput()
    {
        return array_merge(
            Company::getDefaults(),
            Address::getDefaults()
        );
    }

    public function getInputForModel($model)
    {
        return array_merge(
            $model->attributesToArray(),
            $this->addressInputHelper->getInputForModel( $model->corporateAddress )
        );
    }

}