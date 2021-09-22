<?php

namespace App;
use App\File;
use App\Event;
use App\PayrollFileRow;
use App\PersonnelFileRow;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\TransactionIsNotLatestException;

class Transaction extends Model
{
    protected $guarded = [];

    public function delete() {

        if (!$this->is_latest()) {
            throw new TransactionIsNotLatestException();
        }

        $file = File::where('name', $this->fileName)->first();

        $events = Event::where('transaction_id', $this->id)->get();
        foreach ($events as $event) {
            $event->delete();
        }

        if ($this->fileType == 1) {
            PersonnelFileRow::where('transaction_id', $this->id)->delete();
        } else if ($this->fileType == 2) {
            PayrollFileRow::where('transaction_id', $this->id)->delete();
        }

        parent::delete();
        
        $file->delete();
    }

    public function is_latest()
    {
        $response = false;
        $transaction = Transaction::latest()->first();
        if ($this->is($transaction)) {
            $response = true;
        }
        return $response;
    }
}
