<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller {

    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        $first = 'Fox';
        $last = 'Moulder';

        return view('pages.about', compact('first', 'last'));

    }

    public function contact()
    {
        $people = ['John', 'mark', 'Jessica'];

        return view('pages.contact')->with('people', $people);
    }
}
