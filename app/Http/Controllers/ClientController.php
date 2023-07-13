<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $clients = Client::paginate(20);

        return view('admin.client.index', compact('clients'));
    }

    public function create(Request $request)
    {
        return view('admin.client.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string',
            'name_short' => 'required|string',
        ]);

        $client = new Client;
        $client->name = $request->name;
        $client->name_short = $request->name_short;
        $client->save();

        return redirect()->route('client.index');
    }

    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        Validator::make($request->all(), [
            'name' => 'required|string',
            'name_short' => 'required|string',
        ]);

        $client->name = $request->name;
        $client->name_short = $request->name_short;
        $client->save();

        return redirect()->route('client.index');
    }

    public function destroy(Request $request, Client $client)
    {
        $client->delete();

        return redirect()->route('client.index');
    }
}
