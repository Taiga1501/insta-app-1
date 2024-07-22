<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;




class CategoriesController extends Controller
{
    private $category;
    

    public function __construct(Category $category, Post $post)
    {
        $this->post = $post;
        $this->category = $category;
        
    }

    public function index()
    {
       
        $all_categories = $this->category->orderBy('name')->paginate(10);

        //count uncategorized posts
        $all_posts = $this->post->all();
        $uncategorized = 0;
        foreach($all_posts as $post){
            if($post->categoryPosts->count() == 0){
                $uncategorized++;  //add 1 to $uncategorized
            }

        }

        return view('admin.categories.index')->with('all_categories', $all_categories)
                                             ->with('uncategorized_count', $uncategorized);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   =>   'required|max:50|unique:categories,name'
        ]);

        $this->category->name = $request->name;
        $this->category->save();

        return redirect()->back();
    }

    public function update(Request $request, $category_id)
    {
        $request->validate([
            'name'.$category_id   =>   'required|max:50|unique:categories,name,'.$category_id
        ],[
            
            "name$category_id.unique"   =>   'The new name has already been taken.'
        ]);

        $category = $this->category->findOrFail($category_id);
        $category->name = $request->input('name'.$category_id);
        $category->save();

        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);
        $category->forceDelete($id);

        return redirect()->route('admin.categories');
    }
}
