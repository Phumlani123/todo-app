<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Throw_;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TodoItemController extends Controller
{
    public function index()
    {
        $todoItems = TodoItem::all()->toArray();
        if($todoItems){
            return array_reverse($todoItems);
        } else {
            return response()->json(['error' => 'Sorry something went wrong'], 500);
        }
        
    }

    public function store(Request $request)
    {
        $todoItem = new TodoItem([
            'desc' => $request->input('desc'),
            'complete' => $request->input('complete')
        ]);
        if($todoItem->save()){
            return response()->json('Item created');
        } else {
            return response()->json(['error' => 'Sorry something went wrong'], 500);
        }
    }

    public function show($id)
    {
        $todoItem = TodoItem::find($id);
        
        if($todoItem){
            return response()->json($todoItem);
        } else {
            return response()->json(['error' => 'Sorry something went wrong'], 500);
        }
        
    }

    public function update($id, Request $request)
    {
        $todoItem = TodoItem::find($id);
        $success = $todoItem->update($request->all());
        if($success){
            return response()->json('Item updated');
        } else {
            return response()->json(['error' => 'Sorry something went wrong'], 500);
        }
    }

    public function destroy($id)
    {
        $todoItem = TodoItem::find($id);
        $success = $todoItem->delete();
        if($success){
            return response()->json('Item removed!');
        } else {
            return response()->json(['error' => 'Sorry something went wrong'], 500);
        }
    }
}
