<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;


class BoardController extends Controller
{
    public function index(Request $request)
    {
        $items=Board::with('person')->get();
        return view('board.index', ['items' => $items]);

    }

    public function add(Request $request)
    {
        return view('board.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Board::$rules);
        $board = new Board;
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/board');
    }

    public function delete(Request $request)
    {
        $message = Board::find($request->id);
        return view('board.del', ['form' => $message]);
    }

    public function remove(Request $request)
    {
        Board::find($request->id)->delete();
        return redirect('board');
    }
}
