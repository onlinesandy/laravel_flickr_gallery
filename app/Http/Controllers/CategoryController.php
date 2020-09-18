<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Response;
use App\Models\Category;

class CategoryController extends Controller {

    public function index(Request $request) {

        if (isset($request->search) && $request->search != '') {
            $input = Input::get('search');
            $categories = Category::where([['name', 'LIKE', $input], ['delstats', '=', '']])->paginate(10);
        } else {
            $categories = Category::where([['delstats', '=', '']])->paginate(10);
        }


        if ($request->ajax()) {
            return View::make('admin.category')->with($categories);
        }
        return view('admin.category')->with(['categories' => $categories, 'title' => 'Category List', 'breadcrumb' => 'Category List']);
    }

    public function saveCategory(Request $request) {
        if (isset($request->catID) && $request->catID > 0) {
            $validatedData = $request->validate([
                "cat_name" => "required|unique:categories,name",
                    ], [
                'cat_name.unique' => 'Category Already Exists',
            ]);
            $upRecords = Category::where('id', $request->catID)
                    ->update(
                    array(
                        'name' => ucwords(strtolower($request->cat_name)),
                        'tag' => (strtolower($request->cat_name)),
                        'description' => $request->cat_des,
                        'updated_at' => date('Y-m-d H:i:s'), 'modified_by' => Auth::user()->id));

            return back()->with('message', array('type' => 'success', 'text' => 'Category Updated Successfully'));
        } else {
            $validatedData = $request->validate([
                "cat_name" => "required|unique:categories,name",
                    ], [
                'cat_name.unique' => 'Category Already Exists',
            ]);

            Category::create([
                'name' => ucwords(strtolower($request->cat_name)),
                'tag' => (strtolower($request->cat_name)),
                'description' => $request->cat_des,
                'modified_by' => Auth::user()->id
            ]);
            return Redirect::to("/cat_list")
                            ->with('message', array('type' => 'success', 'text' => 'Category Added Successfully'));
        }
    }

    public function delCategory(Request $request) {
        $delRecords = FALSE;
        if (isset($request->id) && $request->id > 0) {
            $delRecords = Category::where('id', $request->id)->update(array('delstats' => 'X', 'updated_at' => date('Y-m-d H:i:s'), 'modified_by' => Auth::user()->id));
        }
        if ($delRecords) {
            return Response::json(array('type' => 'success', 'text' => 'Record has been deleted'));
        } else {
            return Response::json(array('type' => 'error', 'text' => 'Something Went Wrong'));
        }
    }

    public function updateStatusCategory(Request $request) {
        $upRecords = FALSE;
        if (isset($request->id) && $request->id > 0 && $request->type == '1') {
            $upRecords = Category::where('id', $request->id)->update(array('stats' => '', 'updated_at' => date('Y-m-d H:i:s'), 'modified_by' => Auth::user()->id));
        } else {
            $upRecords = Category::where('id', $request->id)->update(array('stats' => 'X', 'updated_at' => date('Y-m-d H:i:s'), 'modified_by' => Auth::user()->id));
        }
        if ($upRecords) {
            return Response::json(array('type' => 'success', 'text' => 'Record Updated Successfully'));
        } else {
            return Response::json(array('type' => 'error', 'text' => 'Something Went Wrong'));
        }
    }

}
