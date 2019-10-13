<?php

namespace App\Csv\Imports;

use App\Csv\Exports\TransactionsExport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

/**
 * Class TransactionsImport
 * @package App\Csv\Imports
 */
class TransactionsImport implements ToCollection
{
    /**
     * @param Collection $rows
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function collection(Collection $rows)
    {
        \Excel::store(new TransactionsExport($rows), 'csv-processed/test.csv');
    }
}
