<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
	use SoftDeletes;

	protected $table = "credits";

    protected $fillable = [
    	'customer_id',
        'contract',
    ];

    protected $hidden = [];

    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function dataExists($key,$data)
    {
        return ( array_key_exists($key,$data) ) ? $data[$key] : null;
    }

    public function importData($customer,$data)
    {

        if( !$this->dataExists('CONTRACT', $data) ){
            return false;
        }

        $credit = Credit::where('contract','=',$data['CONTRACT'])->withTrashed()->first();
        
        if( $customer && !$credit){

            $credit = Credit::create([
                'customer_id' => $customer->id,
                'contract'    => $this->dataExists('CONTRACT', $data),
            ]);

        } else if ($credit){

            $credit->deleted_at = null;
            $credit->update();

        }

        return $credit;
    }

}

