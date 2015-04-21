<?php namespace Ixudra\Portfolio\Http\Requests\Address;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class UpdateAddressFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Services\Validation\AddressValidationHelper')
            ->getFormValidationRules( 'update' );
    }

}
