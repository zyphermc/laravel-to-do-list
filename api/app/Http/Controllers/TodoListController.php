<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;
use Illuminate\Support\Facades\Session;

class TodoListController extends Controller
{
    public function index()
    {
        return view("home", ["listItems" => ListItem::where("is_complete", 0)->get()]);
    }

    public function getItems()
    {
        $items = ListItem::where("is_complete", 0)->get();

        $itemArray = [];

        foreach ($items as $item) {
            $itemArray[] = [
                'id' => $item->id,
                'name' => $item->name,
            ];
        }

        return response()->json($itemArray);
    }

    public function markComplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return response()->json([
            'flash' => [
                'type' => 'success',
                'message' => 'Item marked as complete.'
            ]
        ]);
    }
    public function createItem(Request $request)
    {

        $request->validate([
            "name" => "required|unique:list_items|max:255"
        ]);

        $newListItem = new ListItem;
        $newListItem->name = $request->name;
        $newListItem->is_complete = 0;
        $newListItem->save();

        return response()->json([
            "id" => $newListItem->id,
            "name" => $newListItem->name,
            'flash' => [
                'type' => 'success',
                'message' => 'Item successfully created.'
            ]
        ]);
    }

    public function editItem($id)
    {
        $listItem = ListItem::find($id);
        return view("edit", compact("listItem"));
    }

    public function updateItem(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required|unique:list_items|max:255"
        ]);

        $listItem = ListItem::find($id);
        $listItem->name = $request->input("name");
        $listItem->save();

        return response()->json([
            'flash' => [
                'type' => 'success',
                'message' => 'Item successfully updated.'
            ]
        ]);
    }

    public function deleteItem($id)
    {
        $listItem = ListItem::find($id);
        $listItem->delete();

        return response()->json([
            'flash' => [
                'type' => 'success',
                'message' => 'Item successfully deleted.'
            ]
        ]);
    }
}