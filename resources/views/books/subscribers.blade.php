@extends('layouts.main') @section('content')


<table class="table table-hover table-fixed" id="subscribeTable">
    <thead>
        <tr>
            <th> Reference Id </th>
            <th> Title </th>
            <th> Subscriber </th>
            <th> Subscribed At </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subscribers as $subscriber)
        <tr >
            <td>{{ $subscriber->book->reference_id }}</td>
            <td>{{ $subscriber->book->title }}</td>
            <td>{{ $subscriber->user->name }}</td>
            <td>{{ $subscriber->created_at }}</td>                
        </tr>
        @endforeach
    </tbody>
</table>

<script type="text/javascript" src="/js/subscribe.js"></script>
@endsection