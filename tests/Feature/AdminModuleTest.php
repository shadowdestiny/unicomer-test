<?php

namespace Tests\Feature;

use DB;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class AdminModuleTest extends TestCase
{

    use DatabaseTransactions;

    
    public function test_admin_can_view_auth_form_login()
    {
        $response = $this->get( route('dashboard.login') );

        $response->assertStatus(200);
    }
    
    public function test_admin_can_view_dashboard_welcome()
    {
        $auth = factory(Admin::class)->make();

        $response = $this->actingAs($auth)
            ->withSession([])
            ->get( route('dashboard.admin.welcome') );

        $response->assertStatus(200);
    }


    public function test_admin_can_view_listing_of_customers()
    {
        $auth = factory(Admin::class)->make();

    	$customers = factory(Customer::class, 10)->create();

    	$response = $this->actingAs($auth)
    		->withSession([])
    		->get( route('dashboard.admin.customers') );

        $response->assertStatus(200);

        foreach ($customers as $customer) {
            $response->assertSee($customer->name);
        }
    }

    public function test_admin_can_view_message_when_listing_of_customers_empty()
    {

        DB::table('customers')->truncate();

        $auth = factory(Admin::class)->make();

        $response = $this->actingAs($auth)
            ->withSession([])
            ->get( route('dashboard.admin.customers') );

        $response->assertSee("There are no registered customers!");
       
    }

    public function test_admin_can_view_search_for_customers()
    {

        //
        
    }

    public function test_admin_can_view_imports_customers()
    {

        $auth = factory(Admin::class)->make();

        $response = $this->actingAs($auth)
            ->withSession([])
            ->get( route('dashboard.admin.customer.imports') );

        $response->assertStatus(200);
       
    }

    public function test_admin_can_import_customers_from_file_csv()
    {

        $auth = factory(Admin::class)->make();

        $response = $this->actingAs($auth)
            ->withSession([])
            ->get( route('dashboard.admin.imports') );

        $response->assertStatus(200);
       
    }

    /*

    public function test_admin_can_view_form_of_create_user()
    {
    	$this->assertTrue(true);
    }

    public function test_admin_can_create_user()
    {
        $this->assertTrue(true);
    }

    public function test_admin_can_show_user()
    {
        $this->assertTrue(true);
    }

    public function test_admin_can_view_form_of_edit_user()
    {
    	$this->assertTrue(true);
    }

    public function test_admin_can_edit_user()
    {
        $this->assertTrue(true);
    }

    public function test_admin_can_deleted_user()
    {
        $this->assertTrue(true);
    }

    */

    // test_admin_can_view_listing_of_users
    // test_admin_can_create_user
    // test_admin_can_show_user
    // test_admin_can_edit_user
    // test_admin_can_deleted_user

    // test_admin_can_view_listing_of_bars
    // test_admin_can_create_bars
    // test_admin_can_show_bars
    // test_admin_can_edit_bars
    // test_admin_can_deleted_bars

    // test_admin_can_view_listing_of_employees
    // test_admin_can_create_employe
    // test_admin_can_show_employe
    // test_admin_can_edit_employe
    // test_admin_can_deleted_employe

    // test_admin_can_view_listing_of_events
    // test_admin_can_create_event
    // test_admin_can_show_event
    // test_admin_can_edit_event
    // test_admin_can_deleted_event

    // test_admin_can_view_listing_of_products
    // test_admin_can_create_product
    // test_admin_can_show_product
    // test_admin_can_edit_product
    // test_admin_can_deleted_product

}
