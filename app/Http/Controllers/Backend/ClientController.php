<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $text = request('q');

        $clients = Client::where('name', 'like', '%'.$text.'%')
            ->orWhere('phone','like','%'.$text.'%')
            ->orWhere('address','like','%'.$text.'%')
            ->latest()->paginate(3);
        return view('backend.modules.clients.index',compact('clients','text'));
    }

    public function create()
    {
        return view('backend.modules.clients.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'phone'   => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',

        ]);

        Client::create($request->all());

        session()->flash('message', trans('backend/messages.success.added'));
        return redirect()->route('backend.clients.index');


    }

    public function edit(Client $client)
    {
        return view('backend.modules.clients.edit',compact('client'));
    }

    public function update(Request $request,Client $client)
    {
        $request->validate([
            'name'    => 'required',
            'phone'   => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',

        ]);

        $client->update($request->all());

        session()->flash('message', trans('backend/messages.success.updated'));
        return redirect()->route('backend.clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('message', trans('backend/messages.success.deleted'));
        return redirect()->route('backend.clients.index');
    }
}
