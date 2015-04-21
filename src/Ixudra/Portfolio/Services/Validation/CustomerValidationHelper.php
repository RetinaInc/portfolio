<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;

use App;

class CustomerValidationHelper extends BaseValidationHelper {

    protected $customerType;


    public function __construct($customerType = 'company')
    {
        $this->customerType = $customerType;
    }


    public function getFilterValidationRules()
    {
        return array(
            'query'             => '',
            'withProject'       => 'boolean'
        );
    }

    public function getFormValidationRules($formName)
    {
        return $this->getCustomerTypeValidationHelper()->getFormValidationRules( $formName );
    }

    protected function getCustomerTypeValidationHelper()
    {
        $validationHelper = '\Ixudra\Portfolio\Services\Validation\CompanyValidationHelper';
        if( $this->customerType == 'person' ) {
            $validationHelper = '\Ixudra\Portfolio\Services\Validation\PersonValidationHelper';
        }

        return App::make( $validationHelper );
    }

}