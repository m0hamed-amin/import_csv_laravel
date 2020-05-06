<?php

namespace App\Listeners;

use Exception;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel as Excel;


class InsertToDbListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try {
            Excel::import(new ImportUsers, $event->file);
        } catch (Exception $e) {
            $failures = $e->failures();
            echo count($failures);
        }
    }
}
