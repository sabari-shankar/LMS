<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Excel;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

/**
 * Description of BulkImport
 *
 * @author sabarishankar.parthi
 */
class ImportBook implements ToModel, WithHeadingRow, WithBatchInserts, WithValidation {

    protected $rows = 0;

    public function model(array $rows) {
        $result = [];
        ++$this->rows;
        $book = Book::create($rows);
        $book->reference_id = '#LMS000' . $book->id;
        $result = $book->save();
    }

    public function batchSize(): int {
        return 1000;
    }

    public function getRowCount(): int {
        return $this->rows;
    }

    public function rules(): array {
        return ['title' => 'required|min:5',
            'author' => 'min:3',
            'no_of_books' => 'required|numeric',];
    }

}
