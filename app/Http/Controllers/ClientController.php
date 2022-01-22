<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $clients = Client::paginate(12);
        

        if($request->has('query')) {
			$clients = Client::filter(request(['query','client_name','client_owner_name', 'client_contact_person', 'client_contact_number']))->paginate(12);
			// dd($employees);
		}
        return view('admin.clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $this->validate($request, [
			'client_name' => 'required',
			
		]);
        DB::transaction(function () use ($request) {
            $client = new Client();
            // $adprofile->education = json_encode($array);

            $client->client_contact_person = json_encode($request->client_contact_person);
            $client->client_contact_number = json_encode($request->client_contact_number);
            $client->client_contact_email = json_encode($request->client_contact_email);
            $client->fill($request->all());
            $client->save();
            return $client;
        });
        toast('You have created new Client, Successfully ', 'success', 'top-right');
        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        $clients = Client::findOrFail($client->id);
        // dd($client->id);
        return view('admin.clients.show', ['client' => $clients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        // dd($client->id);
        $clients = Client::findOrFail($client->id);
        return view('admin.clients.edit', ['client' => $clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
        // dd($client);
        DB::transaction(
            function () use ($request, $client) {
                // $client = new Client();
                // $adprofile->education = json_encode($array);
                $client->client_name = $request->client_name;
                $client->client_id = $request->client_id;
                $client->client_owner_name = $request->client_owner_name;
                $client->client_owner_email = $request->client_owner_email;
                $client->client_owner_number = $request->client_owner_number;
                $client->address = $request->address;
                // dd($client);
                $client->client_contact_person = json_encode($request->client_contact_person);
                $client->client_contact_number = json_encode($request->client_contact_number);
                $client->client_contact_email = json_encode($request->client_contact_email);
                $client->fill($request->all());
                // dd($request);
                // dd($client);
                $client->save();
                return $client;
            }
        );
        toast('You have updated Client Successfully ', 'success', 'top-right');
        return redirect()->route('admin.clients.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client = Client::findOrFail($client->id);
        $client->delete();
        toast('You have deleted Client,  Successfully ', 'success', 'top-right');
        return redirect()->route('admin.clients.index');
    }
}
