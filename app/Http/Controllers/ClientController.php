<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Delivery;
use Inertia\Inertia;
use Inertia\Response;

class ClientController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('ClientsList', [
            'clients' => Client::with('addresses')->paginate(10),
        ]);
    }

    public function show(Client $client): Response
    {
        $clientDeliveries = Delivery::with(['address', 'deliveryLines', 'route'])
            ->whereIn('address_id', $client->addresses()->pluck('id'))
            ->join('routes', 'deliveries.route_id', '=', 'routes.id')
            ->orderBy('routes.date', 'DESC')
            ->paginate(10);

        $clientDeliveries->each(function ($delivery) {
            $delivery->address = $delivery->address->title;
            $delivery->date = $delivery->route->date;
            $delivery->total = $delivery->deliveryLines->sum('price');
        });

        return Inertia::render('ClientsShow', [
            'client' => $client,
            'deliveries' => $clientDeliveries,
        ]);
    }
}
