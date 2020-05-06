<?php

namespace App\Imports;

use App\User;

use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUsers implements ToModel, WithHeadingRow, withValidation, WithChunkReading,SkipsOnFailure, ShouldQueue
{
    use importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model
    */
    public function model(array $row)
    {
        return new User([
            'first_name'     => $row['first_name'],
            'last_name'    => $row['last_name'],
            'family_name' => $row['family_name'],
            'uuid' => $row['uuid'],
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function rules() : array
    {
        return [
        '0' => 'required',
        '1' => 'required',
        '2' => 'required',
        '3' => 'required',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        throw new Exception('Error in importing');
    }

}
