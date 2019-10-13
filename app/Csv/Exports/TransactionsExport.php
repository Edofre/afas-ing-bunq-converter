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
     * @return array
     */
    public function headings(): array
    {
        return [
            'Datum',
            'Naam / Omschrijving',
            'Rekening',
            'Tegenrekening',
            'Code',
            'Af Bij',
            'Bedrag (EUR)',
            'MutatieSoort',
            'Mededelingen',
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        // ------ FROM ------ Bunq
        // 0 Date
        // 1 Interest Date
        // 2 Amount
        // 3 Account
        // 4 Counterparty
        // 5 Name
        // 6 Description

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
            str_replace('-', '', $row[0]), // Datum
            $row[5], // Naam / Omschrijving
            $row[3], // Rekening
            $row[4], // Tegenrekening
            '', // Code
            $row[2] > 0 ? 'Bij' : 'Af', // Af Bij
            str_replace('-', '', $row[2]), // Bedrag (EUR)
            '', // MutatieSoort
            $row[6], // Mededelingen
        ];
    }
}
