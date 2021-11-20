<?php

namespace App\Http\Controllers;

use App\Models\BookSubscription;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class BookSubscriptionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::user()->is_admin) {
            $subscribers = BookSubscription::all();
            return view('books.subscribers', compact('subscribers'));
        }
        $books = Book::all();
        $availableBooks = $this->getSubscibers();
        return view('books.subscribe-book', compact('books', 'availableBooks'));
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
        $result = (object) [];
        $result->error = true;
        $subscribe = $request->input();
        Arr::forget($subscribe, '_token');
        $subscribe = array_merge($subscribe, ['user_id' => Auth::id()]);
        $subscription = BookSubscription::create($subscribe);
        if ($subscription) {
            $result->error = false;
            $result->message = 'Subscribed Successfully';
        } else {
            $result->message = 'Subscribed Failed,please try agin later';
        }
        echo json_encode($result);
        return;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $result = (object) [];
            $result->error = true;
            $subscription = BookSubscription::find($id);

            if ($subscription && $subscription->delete()) {
                $result->error = false;
                $result->message = 'Book has been unsubscribed successfully';
            } else {
                $result->message = 'Failed to unsubscribe a book. Please try again later.';
            }
            echo json_encode($result);
            return;
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function getSubscibers() {
        $books = Book::all();
        $subscribers = [];
        foreach ($books as $book) {
            $subscribeCount = $book->subscribers->count();
            $subscribes = $book->subscribers;
            $availableBook = $book->no_of_books - $subscribeCount;
            $subscribers[$book->id]['available_books'] = $availableBook;
            $subscribers[$book->id]['subscribe'] = true;
            $subscribers[$book->id]['unavailable'] = false;
            foreach ($subscribes as $subscribe) {
                if ($subscribe->user_id == \Auth::id()) {
                    $subscribers[$book->id]['subscribe'] = false;
                    $subscribers[$book->id]['subscribe_id'] = $subscribe->id;
                } else {
                    if ($availableBook) {
                        $subscribers[$book->id]['subscribe'] = true;
                    } else {
                        $subscribers[$book->id]['unavailable'] = true;
                    }
                }
            }
        }
        return $subscribers;
    }

}
