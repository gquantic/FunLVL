<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    public function index()
    {
        $categories = TicketCategory::withTrashed()->get();

        return view('admin.ticket-categories', compact('categories'));
    }


    public function create()
    {
        return view('admin.forms.create-ticket-category');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        TicketCategory::create(
            array_merge(
                $request->all()
            )
        );

        return redirect()->route('admin.ticket-categories.index')
            ->with('success','Данные сохранены');
    }

    public function show(int $id)
    {

    }

    public function edit($id)
    {
        $category = TicketCategory::whereId($id)->first();

        return view('admin.forms.edit-ticket-category', compact('category'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        TicketCategory::find($id)->setAttributes(
            array_merge(
                $request->all()
            )
        )->save();

        return redirect()->route('admin.ticket-categories.index')
            ->with('success','Данные обновлены');
    }

    public function destroy(int $server, int $type): \Illuminate\Http\RedirectResponse
    {
        $type ? TicketCategory::whereId($server)->delete()
            : TicketCategory::whereId($server)->forceDelete();

        return redirect()->back()
            ->with('success','Категория скрыта');
    }

    public function restore($id): \Illuminate\Http\RedirectResponse
    {
        TicketCategory::whereId($id)->restore();

        return redirect()->back()
            ->with('success','Категория восстановлена');
    }
}
