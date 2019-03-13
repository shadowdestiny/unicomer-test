<?php

namespace App\Jobs;

use Illuminate\Support\Facades\DB;
use Log;
use Session;
use League\Csv\Reader;
use App\Models\Customer;
use App\Models\Credit;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportCSV implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $path;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath)
    {
        $this->path = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

      Log::info('The import clients in progress!');

      $reader = Reader::createFromPath(public_path().'/uploads/'.$this->path)->setHeaderOffset(0);

      if($reader){

          $customer = new Customer;

          DB::beginTransaction();

          $customer->removeNonExistent($reader);

          foreach ($reader as $record) {

              $customer = new Customer;
              
              $customer = $customer->importData($record);

              $credit = new Credit;

              $credit = $credit->importData($customer,$record);

              $transaction = new Transaction;

              $transaction = $transaction->importData($customer,$credit,$record); 

              Log::info($transaction);
          }

          DB::commit();

          Log::info('The import clients successful!');

      }else{

        Log::info('The customers could not be imported!');

      }

    }
}
