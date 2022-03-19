<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Shop\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withTrashed()->get();

        return view('admin.categories', compact('categories'));
    }


    public function create()
    {
        return view('admin.forms.create-category');
    }

    public function store(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        Category::create(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('logo')
            )
        );

        return redirect()->route('admin.categories.index')
            ->with('success','Данные сохранены');
    }

    public function show(int $id)
    {

    }

    public function edit($id)
    {
        $category = Category::whereId($id)->first();

        return view('admin.forms.edit-category', compact('category'));
    }

    public function update(CategoryRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        Category::find($id)->setAttributes(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('logo')
            )
        )->save();

        return redirect()->route('admin.categories.index')
            ->with('success','Данные обновлены');
    }

    public function destroy(int $server, int $type): \Illuminate\Http\RedirectResponse
    {
        $type ? Category::whereId($server)->delete()
            : Category::whereId($server)->forceDelete();

        return redirect()->back()
            ->with('success','Категория скрыта');
    }

    public function restore($id): \Illuminate\Http\RedirectResponse
    {
        Category::whereId($id)->restore();

        return redirect()->back()
            ->with('success','Категория восстановлена');
    }
}
