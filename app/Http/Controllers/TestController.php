<?php

namespace App\Http\Controllers;

use App\Events\ImportBigFileToDbEvent;
use App\Imports\ImportUsers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class TestController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExport()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        /// raise an event to make import large file
        event(new ImportBigFileToDbEvent($file));
        session()->flash('status', 'file is queued for importing');
        return redirect("import");
    }

}
