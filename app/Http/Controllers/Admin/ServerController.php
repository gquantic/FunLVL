<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServerRequest;
use App\Models\Shop\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::withTrashed()->get();

        return view('admin.servers', compact('servers'));
    }


    public function create()
    {
        return view('admin.forms.create-server');
    }

    public function store(ServerRequest $request): \Illuminate\Http\RedirectResponse
    {
        Server::create(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('logo')
            )
        );

        return redirect()->route('admin.servers.index')
            ->with('success','Данные сохранены');
    }

    public function show(int $id)
    {

    }

    public function edit($id)
    {
        $server = Server::whereId($id)->first();

        return view('admin.forms.edit-server', compact('server'));
    }

    public function update(ServerRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        Server::find($id)->setAttributes(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('logo')
            )
        )->save();

        return redirect()->route('admin.servers.index')
            ->with('success','Данные обновлены');
    }

    public function destroy(int $server, int $type): \Illuminate\Http\RedirectResponse
    {
        $type ? Server::whereId($server)->delete()
            : Server::whereId($server)->forceDelete();

        return redirect()->back()
            ->with('success','Сервер скрыт');
    }

    public function restore($id): \Illuminate\Http\RedirectResponse
    {
        Server::whereId($id)->restore();

        return redirect()->back()
            ->with('success','Сервер восстановлен');
    }
}
