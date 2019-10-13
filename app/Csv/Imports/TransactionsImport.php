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
    /** @var string */
    private $fileName;

    /**
     * TransactionsImport constructor.
     * @param $path
     */
    public function __construct($path)
    {
        // Get the proper file name
        if (preg_match('/csv\/(.*?).txt/', $path, $match) == 1) {
            $this->fileName = $match[1];
        }
    }

    /**
     * @param Collection $rows
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function collection(Collection $rows)
    {
        // Skip the first row because we don't need the headers
        $rows->forget(0);

        \Excel::store(new TransactionsExport($rows), "csv-processed/{$this->fileName}.csv");
    }
}
