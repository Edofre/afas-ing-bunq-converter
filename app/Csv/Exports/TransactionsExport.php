<?php

namespace App\Csv\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * Class TransactionsExport
 * @package App\Csv\Exports
 */
class TransactionsExport implements FromCollection, WithMapping
{
    /** @var */
    private $data;

    /**
     * TransactionsExport constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data;
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        // ------ FROM ------ Bunq
        // Date
        // Interest Date
        // Amount
        // Account
        // Counterparty
        // Name
        // Description

        // ------- TO ------- Ing
        // Datum
        // Naam / Omschrijving
        // Rekening
        // Tegenrekening
        // Code
        // Af Bij
        // Bedrag (EUR)
        // MutatieSoort
        // Mededelingen

        return [
            $row[0],
            $row[1],
            $row[2],
            $row[6],
        ];
    }
}
