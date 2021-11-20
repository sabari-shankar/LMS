<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Book;
use App\Imports\ImportBook;
use App\Imports\BulkErrorExport;
use Excel;
use Illuminate\Support\Str;

class BookController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $books = Book::all();
        return view('books.view-book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:5',
            'author' => 'min:3',
            'no_of_books' => 'required|numeric',
        ]);
        $books = $request->input();
        Arr::forget($books, '_token');
        $book = Book::create($books);
        $referenceId = '#LMS000' . $book->id;
        $book->reference_id = $referenceId;
        $book->save();
        if ($book) {
            return redirect(route('books.index'))->with('successMsg', 'book has been added successfully');
        } else {
            return redirect(route('books.index'))->with('errorMsg', 'Failed to add book. Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $books = Book::find($id);
        return $books->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $book = Book::find($id);
        $inputs = $request->input();
        Arr::forget($inputs, '_token');
        $book->fill($inputs);
        if ($book->save()) {
            return redirect(route('books.index'))->with('successMsg', 'book has been updated successfully');
        } else {
            return redirect(route('books.index'))->with('errorMsg', 'Failed to update a book. Please try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        try {
            $result = (object) [];
            $result->error = true;
            $book = Book::find($id);
            $subscribe = $book->subscribers->count();

            if ($subscribe) {
                $result->message = 'Selected Book is subscribed by the user. You Can\'t able to delete the book.';
                echo json_encode($result);
                return;
            }
            if ($book->delete()) {
                $result->error = false;
                $result->message = 'Book has been deleted successfully';
            } else {
                $result->message = 'Failed to delete a book. Please try again later.';
            }
            echo json_encode($result);
            return;
        } catch (Exception $exception) {
            return $exception;
        }
    }

    /**
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function postImport(Request $request) {
        try {
            $request->validate([
                'file' => "required",
            ]);
            $bulkUpload = new ImportBook();
            $result = Excel::import($bulkUpload, $request->file('file'));
            $rowCount = $bulkUpload->getRowCount();
            if ($rowCount == 0) {
                return redirect(route('books.index'))->with('successMsg', 'There is no data to upload. Please upload file with valid data');
            }
            \Log::info("Book has been uploaded successfully");
            return redirect(route('books.index'))->with('successMsg', 'Upload successfully');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errors = [];
            foreach ($failures as $failure) {
                $error = $failure->values();
                $error['row'] = $failure->row();
                $error['error'] = implode(",", $failure->errors());
                if (false !== $key = array_search($failure->row(), array_column($errors, 'row'))) {
                    $errors[$key]['error'] .= "\r\n" . implode(",", $failure->errors());
                } else {
                    $errors[] = $error;
                }
            }
            \Log::warning(count($errors) . " Book has been inserted failed");
            $fileName = "book_" . \Carbon\Carbon::now()->format('Y-m-d_H-i-s') . ".csv";
            $filePath = "bulk_upload_errors" . "/" . $fileName;
            Excel::store(new BulkErrorExport($errors), $filePath, 'public');
            $template['filePath'] = $filePath;
            $template['fileName'] = $fileName;
            $request->session()->flash('modal', $template);
            return back();
        }
    }

}
