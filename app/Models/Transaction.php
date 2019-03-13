<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	use SoftDeletes;

	protected $table = "transactions";

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'credit_id',
        'contract',
        'purchase_date',
        'total_sale',
        'date_of_last_payment',
        'present_bal',
        'paid_off_balance',
        'term',
        'installment',
        'total_last_payment',
        'amt_past_due',
        'late_fee',
        'minimun_payment',
    ];

    protected $hidden = [];

    protected $dates = ['deleted_at'];

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
    
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function getMinimunPaymentAttribute($value)
    {
        return ($this->attributes['minimun_payment']) ? $this->attributes['minimun_payment'] : 0;
    }

    public function dataExists($key,$data)
    {
        return ( array_key_exists($key,$data) ) ? $data[$key] : null;
    }

    public function importData($customer, $credit, $data)
    {
        if($customer && $credit){

            $transaction = Transaction::where('contract','=',$data['CONTRACT'])
                ->where('date_of_last_payment','=',$this->dataExists('DATE_OF_LAST_PAYMENT', $data))
                ->where('credit_id','=',$credit->id)
                ->first();

            if (!$transaction)

                return Transaction::create([
                    'credit_id'            => $credit->id,
                    'contract'             => $data['CONTRACT'],
                    'purchase_date'        => $this->dataExists('PURCHASE_DATE', $data),
                    'total_sale'           => $this->dataExists('TOTAL_SALE', $data),
                    'date_of_last_payment' => $this->dataExists('DATE_OF_LAST_PAYMENT', $data),
                    'present_bal'          => $this->dataExists('PRESENT_BAL', $data),
                    'paid_off_balance'     => $this->dataExists('PAID_OFF_BALANCE', $data),
                    'term'                 => $this->dataExists('TERM', $data),
                    'installment'          => $this->dataExists('INSTALLMENT', $data),
                    'total_last_payment'   => $this->dataExists('TOTAL_LAST_PAYMENT', $data),
                    'amt_past_due'         => $this->dataExists('AMT_PAST_DUE', $data),
                    'late_fee'             => $this->dataExists('LATE_FEE', $data),
                    'minimun_payment'      => $this->dataExists('MINIMUN_PAYMENT', $data),
                ]);

        }
    }



}

