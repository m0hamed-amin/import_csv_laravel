<?php

namespace App\Http\Controllers;

use App\Events\ImportBigFileToDbEvent;
use App\Imports\ImportUsers;
use App\Mail\ReportMailafterImporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $result = event(new ImportBigFileToDbEvent($file));
        Mail::to('test@test.com')->send(new ReportMailafterImporting($result));
        session()->flash('status', 'file is queued for importing');
        return redirect("import");
    }

}
