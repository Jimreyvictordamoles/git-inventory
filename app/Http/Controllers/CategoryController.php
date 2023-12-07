<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $category_list = Category::latest()->get();

        return view('category.index',[
            'category_list' => $category_list
        ]);
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){

        $request->validate([
            'category_name' => 'required',
            'status' => 'nullable',
        ]);

        $store = Category::create($request->all());

        return redirect()->route('category')->with('success', 'New category has been successfully aded!');
    }

    public function show(string $id){

        $category = Category::findOrFail($id);

        if (!$category) {
            // You might want to redirect to an error page or display a message.
            return redirect()->route('category')->with('error', 'Category item not found.');
        }
    
        return view('category.show', ['category' => $category]);

    }

    public function edit(Request $reuqest, $id){

        $category = Category::findOrFail($id);

        return view('category.edit', ['category' => $category]);

    }

    public function update(Request $request, string $id){

        $request->validate([
            'category_name' => 'required',
            'status' => 'required',
        ]);
    
        $category = Category::find($id);
    
        // Check if the category item exists
        if (!$category) {
            // Handle the case where the category item is not found.
            // You might want to redirect to an error page or display a message.
            return redirect()->route('category')->with('error', 'Category item not found.');
        }

        $category->update($request->all());

        return redirect()->route('category')->with('success', 'Category item updated successfully!');
    }

    public function destroy(Request $request, string $id){

        $category = category::find($id);

        // Check if the item was found
        if (!$category) {
            return redirect()->route('category')->with('error', 'Category item not found.');
        }

        // Delete the category item
        $category->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('category')->with('success', 'Category item deleted successfully.');
    }
}
