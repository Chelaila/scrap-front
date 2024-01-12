<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class ScrappingExport implements FromCollection
{
    use Exportable;

    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::where('nombre', 'like', $this->value . '%')->get();

    }
}
