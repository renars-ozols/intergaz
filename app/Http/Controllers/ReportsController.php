<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ReportsController extends Controller
{
    public function differentOrderTypes(): Response
    {
        $clients = DB::table('deliveries')
            ->select('clients.name', 'addresses.title', 'addresses.id')
            ->join('addresses', 'addresses.id', '=', 'deliveries.address_id')
            ->join('clients', 'clients.id', '=', 'addresses.client_id')
            ->whereIn('deliveries.type', [1, 2])
            ->groupBy('clients.id', 'addresses.id')
            ->havingRaw('COUNT(DISTINCT deliveries.type) = 2')
            ->paginate(10);

        return Inertia::render('OrderTypesReport', [
            'clients' => $clients,
        ]);
    }

    public function lastDeliveries(): Response
    {
        $deliveryLines = DB::table('deliveries')
            ->select('clients.name as client', 'addresses.title as address', 'delivery_lines.item', 'delivery_lines.price')
            ->join('routes', 'deliveries.route_id', '=', 'routes.id')
            ->join('addresses', 'addresses.id', '=', 'deliveries.address_id')
            ->join('clients', 'clients.id', '=', 'addresses.client_id')
            ->join('delivery_lines', 'delivery_lines.delivery_id', '=', 'deliveries.id')
            ->where('deliveries.status', 2)
            ->orderBy('routes.date', 'desc')
            ->paginate(10);

        return Inertia::render('LastDeliveriesReport', [
            'deliveries' => $deliveryLines,
        ]);
    }

    public function inactiveClients(): Response
    {
        $clients = DB::table('clients')
            ->join('addresses', 'clients.id', '=', 'addresses.client_id')
            ->leftJoin('deliveries', function ($join) {
                $join->on('deliveries.address_id', '=', 'addresses.id')
                    ->where('deliveries.type', '=', 1);
            })
            ->whereNull('deliveries.id')
            ->select('clients.name', 'addresses.title', 'addresses.id')
            ->paginate(10);

        return Inertia::render('InactiveClientsReport', [
            'clients' => $clients,
        ]);
    }
}
