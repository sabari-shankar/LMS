<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Book;
use App\Models\BookSubscription;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=[];
        $books = Book::selectRaw('sum(no_of_books) as book_count')->first();
        $data['book_count'] = $books->book_count;
        $data['available_count'] = $data['book_count'] - BookSubscription::all()->count();
        $availableCountPercent = 0;
        if($data['book_count'] && $data['available_count']){
            $availableCountPercent=round(($data['available_count'] / $data['book_count'] ) *100);
        }
        $data['available_count_percent'] =$round(($data['available_count'] / $data['book_count'] ) *100);
        if(Auth::user()->is_admin){
            $data['subscription_count'] = BookSubscription::all()->count();
        }else{
            $data['subscription_count'] = BookSubscription::where('user_id',Auth::id())->count();
        }
        $data['subscription_count_percent'] = round(($data['subscription_count'] / $data['available_count'] ) *100);
        return view('home',compact('data'));
    }
}
