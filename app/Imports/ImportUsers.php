<?php

namespace App\Imports;

use App\User;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUsers implements
    ToModel,
    WithHeadingRow,
    withValidation,
    WithChunkReading,
    SkipsOnError,
    ShouldQueue
{
    use importable,SkipsErrors;

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
        'first_name' => 'required',
        'last_name' => 'required',
        'family_name' => 'required',
        'uuid' => 'required',
        ];
    }

    /**
     * @param \Throwable $e
     */
    public function onError(\Throwable $e)
    {
        throw ValidationException::withMessages(['error' => 'Error in importing']);
    }

}
