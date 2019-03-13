<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Credit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{

    use Notifiable, SoftDeletes;

    protected $table = "customers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acct_num',
        'name',
        'last_name', 
        'email', 
        'password',
        'state',
        'home_address',       
        'home_phone',          
        'cell_phone',
        'ref_1_name',         
        'ref_1_phone',           
        'ref_2_name',         
        'ref_2_phone',
        'ref_3_name',           
        'ref_3_phone',            
        'antiquity',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function removeNonExistent($reader)
    {
        $customers = Customer::all();

        foreach($customers as $customerRecord){

            $customerExists = false;

            foreach ($reader as $data) {

                if ($customerRecord->acct_num == $this->dataExists('ACCT_NUM',$data)){

                    $customerExists = true;

                    break;
                }
            }

            if (!$customerExists){

                $customer = Customer::where('acct_num','=',$customerRecord->acct_num);

                $customer->delete();
            }
        }
    }

    public function dataExists($key,$data)
    {
        return ( array_key_exists($key,$data) ) ? $data[$key] : null;
    }

    public function importData($data)
    {
        if( !$this->dataExists('ACCT_NUM', $data) ){
            return false;
        }

        $customer = Customer::where('acct_num','=',$data['ACCT_NUM'])->withTrashed()->first();
        
        if(!$customer){

            $customer = Customer::create([
                'acct_num'     => $this->dataExists('ACCT_NUM',      $data),
                'name'         => $this->dataExists('NAME',          $data),
                'last_name'    => $this->dataExists('LAST_NAME',     $data),
                'email'        => null,
                'password'     => 'Unicomer2018',
                'state'        => $this->dataExists('STATE',         $data),
                'home_address' => $this->dataExists('HOME_ADDRESS',  $data),
                'home_phone'   => $this->dataExists('HOME_PHONE',    $data),
                'cell_phone'   => $this->dataExists('CELL_PHONE',    $data),
                'ref_1_name'   => $this->dataExists('REF_1_NAME',    $data),
                'ref_1_phone'  => $this->dataExists('REF_1_PHONE',   $data),
                'ref_2_name'   => $this->dataExists('REF_2_NAME',    $data),
                'ref_2_phone'  => $this->dataExists('REF_2_PHONE',   $data),
                'ref_3_name'   => $this->dataExists('REF_3_NAME',    $data),
                'ref_3_phone'  => $this->dataExists('REF_3_PHONE',   $data),
                'antiquity'    => $this->dataExists('ANTIGUEDAD',    $data),
            ]);

        } else {
            $customer->name             = $this->dataExists('NAME',                 $data);
            $customer->last_name        = $this->dataExists('LAST_NAME',            $data);
            $customer->state            = $this->dataExists('STATE',                $data);
            $customer->home_address     = $this->dataExists('HOME_ADDRESS',         $data);
            $customer->home_phone       = $this->dataExists('CELL_PHONE',           $data);
            $customer->cell_phone       = $this->dataExists('REF_1_NAME',           $data);
            $customer->ref_1_name       = $this->dataExists('REF_1_PHONE',          $data);
            $customer->ref_1_phone      = $this->dataExists('REF_2_NAME',           $data);
            $customer->ref_2_name       = $this->dataExists('REF_2_PHONE',          $data);
            $customer->ref_2_phone      = $this->dataExists('REF_2_PHONE',          $data);
            $customer->ref_3_name       = $this->dataExists('REF_3_NAME',           $data);
            $customer->ref_3_phone      = $this->dataExists('REF_3_PHONE',          $data);
            $customer->antiquity        = $this->dataExists('ANTIQUITY',            $data);
            $customer->deleted_at = null;
            $customer->update();
        }

        return $customer;
    }

    public function scopeSearch($query,$keywords)
    {
        $keywords = strtolower($keywords);
        
        return $query->where( function ($query) use ($keywords) {
            $query->where('name', 'ILIKE', '%'.$keywords.'%');
            $query->orWhere('acct_num', 'ILIKE', '%'.$keywords.'%');
            $query->orWhere('state', 'ILIKE', '%'.$keywords.'%');
        });
    }


    public static function boot()
    {
        parent::boot();

        static::deleting(function($customer) {

            $customer->credits()->delete();

        });
    }
}
