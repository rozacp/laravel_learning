<?php namespace App\Http\Controllers;

use App\Harvester\Harvester;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

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



    public function test()
    {
        //$harvester = App::make(Harvester::class, ['mona', 'budala', 'kreten']);
        //$harvester = App::make('harvester', ['mona', 'budala', 'kreten']);
        $harvester = App('harvester', ['mona', 'budala', 'kreten']);
        // return \Harvester::fullChar();

        return $harvester->fullChar();
    }


}
