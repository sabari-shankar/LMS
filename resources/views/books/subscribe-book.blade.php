@extends('layouts.main') @section('content')


<table class="table table-hover table-fixed" id="subscribeTable">
    <thead>
        <tr>
            <th> Reference Id </th>
            <th> Title </th>
            <th> Author </th>
            <th> Subject </th>
            <th> Edition </th>
            <th> Available Books </th>
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
            <td>{{$availableBooks[$book->id]['available_books']}}/{{ $book->no_of_books }}</td>
            <td> 
                @if($availableBooks[$book->id]['subscribe'] && !$availableBooks[$book->id]['unavailable'])
                <a href="#" class="btn btn-success btn-sm subscribeBook" data-book-id ='{{$book->id}}' data-section='{{route('subscribe.store')}}'>Subscribe</a>
                @elseif($availableBooks[$book->id]['unavailable'])
                <span class="text-danger">Currently Unavailable</span>
                @else
                <a href="#" data-section='{{route( 'subscribe.destroy',$availableBooks[$book->id]['subscribe_id']) }}' class='btn btn-danger btn-sm unSubscribeBook'>Un Subscribe</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('books.confirm')
<script type="text/javascript" src="/js/subscribe.js"></script>
@endsection