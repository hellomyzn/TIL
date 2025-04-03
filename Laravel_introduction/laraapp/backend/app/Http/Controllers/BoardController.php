<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    public function index(Request $request){
        $items = Board::all();
        $with = Board::with('person')->get();
        return view('board.index',compact('items', 'with'));
    }

    public function add(Request $request){
        return view('board.add');
    }

    public function store(Request $request){
        $this->validate($request, Board::$rules);
        $board = new Board();
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();

        return redirect('board/index');
    }
}
