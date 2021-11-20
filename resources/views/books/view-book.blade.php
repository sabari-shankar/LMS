@extends('layouts.main') @section('content')
<div>

    <div class="float-right">
        <a href="#" data-toggle="modal" data-target="#saveBookForm" class="btn btn-info btn-sm"> Create</a>
        <a href="#" data-toggle="modal" data-target="#importBookForm" class="btn btn-info btn-sm"> Import</a>
    </div>

</div>

<table class="table table-hover table-fixed" id="bookTable">
    <thead>
        <tr>
            <th> Reference Id </th>
            <th> Title </th>
            <th> Author </th>
            <th> Subject </th>
            <th> Edition </th>
            <th> No.of.Books </th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr >
            <td>{{ $book->reference_id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->subject }}</td>
            <td>{{ $book->edition }}</td>
            <td>{{ $book->no_of_books }}</td>
            <td><a href="#" style="color:#f0ad4e" class='editBook' data-section='{{route('books.edit',$book->id)}}' data-update='{{route('books.update',$book->id)}}'><i class="far fa-edit "></i></a>
                <a href="#" style="color:#d9534f" data-section='{{route( 'books.destroy',$book->id) }}' class='deleteDialog'><i
                        class="far fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('books.save')
@include('books.import')
@include('books.import-response')
@include('books.confirm')
<!-- jquery validation -->
<script>
    let session = {!! json_encode(Session::all()) !!}
    ;
</script>
<script type="text/javascript" src="/js/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="/js/jquery-validation/jquery.validation.init.js"></script>
    <script type="text/javascript" src="/js/book.js"></script>
    @endsection