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

    public function markComplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        Session::flash("success", "Task marked as completed.");
        return redirect("/");
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
        Session::flash("success", "Task has been added.");

        return redirect("/");
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

        Session::flash("success", "Task has been updated successfully.");
        return redirect("/");
    }

    public function deleteItem($id)
    {
        $listItem = ListItem::find($id);
        $listItem->delete();
        Session::flash("success", "Task has been deleted.");

        return redirect("/");
    }
}