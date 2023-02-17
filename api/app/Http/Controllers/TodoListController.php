<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;
use Illuminate\Support\Facades\Validator;

class TodoListController extends Controller
{
    public function getItems()
    {
        $items = ListItem::where("is_complete", 0)->get();

        $itemArray = [];

        foreach ($items as $item) {
            $itemArray[] = [
                "id" => $item->id,
                "name" => $item->name,
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
            "flash" => [
                "type" => "success",
                "message" => "Item marked as complete.",
                "icon" => "done"
            ]
        ]);
    }
    public function createItem(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required|unique:list_items|max:255"
        ], [
                "name.required" => "The task name is required.",
                "name.unique" => "The task name is already taken.",
                "name.max" => "The task name may not be greater than 255 characters."
            ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $nameError = $errors->first("name");

            return response()->json([
                "flash" => [
                    "type" => "error",
                    "message" => $nameError,
                    "icon" => "error"
                ]
            ]);
        }

        $newListItem = new ListItem;
        $newListItem->name = $request->name;
        $newListItem->is_complete = 0;
        $newListItem->save();

        return response()->json([
            "id" => $newListItem->id,
            "name" => $newListItem->name,
            "flash" => [
                "type" => "success",
                "message" => "Item successfully created.",
                "icon" => "done"
            ]
        ]);
    }


    public function updateItem(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|unique:list_items|max:255"
        ], [
                "name.required" => "The task name is required.",
                "name.unique" => "The task name is already taken.",
                "name.max" => "The task name may not be greater than 255 characters."
            ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $nameError = $errors->first("name");

            return response()->json([
                "flash" => [
                    "type" => "error",
                    "message" => $nameError,
                    "icon" => "error"
                ]
            ]);
        }

        $listItem = ListItem::find($id);
        $listItem->name = $request->input("name");
        $listItem->save();

        return response()->json([
            "flash" => [
                "type" => "success",
                "message" => "Item successfully updated.",
                "icon" => "done"
            ]
        ]);
    }

    public function deleteItem($id)
    {
        $listItem = ListItem::find($id);
        $listItem->delete();

        return response()->json([
            "flash" => [
                "type" => "success",
                "message" => "Item successfully deleted.",
                "icon" => "done"
            ]
        ]);
    }
}