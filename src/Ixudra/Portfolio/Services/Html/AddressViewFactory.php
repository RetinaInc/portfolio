<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Models\Address;

class AddressViewFactory extends BaseViewFactory {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'city_id'           => ''
            );
        }

        return $this->prepareFilter( 'portfolio::addresses.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\AddressInputHelper')->getDefaultInput();
        }

        return $this->prepareForm( 'portfolio::addresses.create', $input );
    }

    public function show(Address $address)
    {
        $this->addParameter('address', $address);

        return $this->makeView( 'portfolio::addresses.show' );
    }

    public function edit(Address $address, $input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\AddressInputHelper')->getInputForModel( $address );
        }

        $this->addParameter('address', $address);

        return $this->prepareForm( 'portfolio::addresses.edit', $input );
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\AddressInputHelper')->getInputForSearch( $input );
        $addresses = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository')->search( $searchInput, 25 );

        $cities = App::make('\Ixudra\Portfolio\Services\Form\AddressFormHelper')->getCitiesAsSelectList( true );

        $this->addParameter('addresses', $addresses);
        $this->addParameter('cities', $cities);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $input)
    {
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

}
