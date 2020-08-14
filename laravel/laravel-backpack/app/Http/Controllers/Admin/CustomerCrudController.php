<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Tag;
/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Customer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer');
        CRUD::setEntityNameStrings('customer', 'customers');
        // CRUD::addButtonFromView('line', 'send-email', 'send-email', 'beginning');
        // $this->crud->addButtonFromView('line', 'moderate', 'moderate', 'beginning');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(
            [   // Text
                'name'  => 'name',
                'label' => "Name",
                'type'  => 'text',

                // optional
                //'prefix'     => '',
                //'suffix'     => '',
                //'default'    => 'some value', // default value
                //'hint'       => 'Some hint text', // helpful text, show up after input
                //'attributes' => [
                //'placeholder' => 'Some text when empty',
                //'class' => 'form-control some-class'
                //], // extra HTML attributes and values your input might need
                //'wrapper'   => [
                //'class' => 'form-group col-md-12'
                //], // extra HTML attributes for the field wrapper - mostly for resizing fields 
                //'readonly'  => 'readonly',
            ],
        ); // fields
        CRUD::addColumn(
            [   // Text
                'name'  => 'phone',
                'label' => "Phone",
                'type'  => 'text',

                // optional
                //'prefix'     => '',
                //'suffix'     => '',
                //'default'    => 'some value', // default value
                //'hint'       => 'Some hint text', // helpful text, show up after input
                //'attributes' => [
                //'placeholder' => 'Some text when empty',
                //'class' => 'form-control some-class'
                //], // extra HTML attributes and values your input might need
                //'wrapper'   => [
                //'class' => 'form-group col-md-12'
                //], // extra HTML attributes for the field wrapper - mostly for resizing fields 
                //'readonly'  => 'readonly',
            ],
        );
        CRUD::addColumn(
            [   // Text
                'name'  => 'email',
                'label' => "Email",
                'type'  => 'text',

                // optional
                //'prefix'     => '',
                //'suffix'     => '',
                //'default'    => 'some value', // default value
                //'hint'       => 'Some hint text', // helpful text, show up after input
                //'attributes' => [
                //'placeholder' => 'Some text when empty',
                //'class' => 'form-control some-class'
                //], // extra HTML attributes and values your input might need
                //'wrapper'   => [
                //'class' => 'form-group col-md-12'
                //], // extra HTML attributes for the field wrapper - mostly for resizing fields 
                //'readonly'  => 'readonly',
            ],
        );
        CRUD::addColumn(
            [
                // 1-n relationship
                'label'     => 'Tag', // Table column heading
                'type'      => 'select',
                'name'      => 'tag_id', // the column that contains the ID of that connected entity;
                'entity'    => 'tag', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Tag", // foreign key model
            ],
        );
        // simple filter
        $this->crud->addFilter([
        'type'  => 'text',
        'name'  => 'name',
        'label' => 'Name'
        ], 
        false, 
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'name', 'LIKE', "%$value%");
        });

        // simple filter
        $this->crud->addFilter([
        'type'  => 'text',
        'name'  => 'phone',
        'label' => 'Phone'
        ], 
        false, 
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'phone', 'LIKE', "%$value%");
        });

        // simple filter
        $this->crud->addFilter([
        'type'  => 'text',
        'name'  => 'email',
        'label' => 'Email'
        ], 
        false, 
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'email', 'LIKE', "%$value%");
        });

        // select2 filter
        $this->crud->addFilter([
            'name'  => 'tag_id',
            'type'  => 'select2',
            'label' => 'Tag'
            ], function () {
            return Tag::all()->keyBy('id')->pluck('name', 'id')->toArray();
            }, function ($value) { // if the filter is active
                $this->crud->addClause('where', 'tag_id', $value);
        });
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        // CRUD::setValidation(CustomerRequest::class);

        CRUD::addField(
            [   // Text
                'name'  => 'name',
                'label' => "Name",
                'type'  => 'text',

                // optional
                //'prefix'     => '',
                //'suffix'     => '',
                //'default'    => 'some value', // default value
                //'hint'       => 'Some hint text', // helpful text, show up after input
                //'attributes' => [
                //'placeholder' => 'Some text when empty',
                //'class' => 'form-control some-class'
                //], // extra HTML attributes and values your input might need
                //'wrapper'   => [
                //'class' => 'form-group col-md-12'
                //], // extra HTML attributes for the field wrapper - mostly for resizing fields 
                //'readonly'  => 'readonly',
            ],
        ); // fields
        CRUD::addField(
            [   // Text
                'name'  => 'phone',
                'label' => "Phone",
                'type'  => 'text',

                // optional
                //'prefix'     => '',
                //'suffix'     => '',
                //'default'    => 'some value', // default value
                //'hint'       => 'Some hint text', // helpful text, show up after input
                //'attributes' => [
                //'placeholder' => 'Some text when empty',
                //'class' => 'form-control some-class'
                //], // extra HTML attributes and values your input might need
                //'wrapper'   => [
                //'class' => 'form-group col-md-12'
                //], // extra HTML attributes for the field wrapper - mostly for resizing fields 
                //'readonly'  => 'readonly',
            ],
        );
        CRUD::addField(
            [   // Text
                'name'  => 'email',
                'label' => "Email",
                'type'  => 'text',

                // optional
                //'prefix'     => '',
                //'suffix'     => '',
                //'default'    => 'some value', // default value
                //'hint'       => 'Some hint text', // helpful text, show up after input
                //'attributes' => [
                //'placeholder' => 'Some text when empty',
                //'class' => 'form-control some-class'
                //], // extra HTML attributes and values your input might need
                //'wrapper'   => [
                //'class' => 'form-group col-md-12'
                //], // extra HTML attributes for the field wrapper - mostly for resizing fields 
                //'readonly'  => 'readonly',
            ],
        );
        CRUD::addField(
            [  // Select
                'label'     => "Tag",
                'type'      => 'select2',
                'name'      => 'tag_id', // the db column for the foreign key
                'entity'    => 'tag', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user

                // optional
                'options'   => (function ($query) {
                        return $query->orderBy('name', 'ASC')->get();
                    }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ],
        );

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
