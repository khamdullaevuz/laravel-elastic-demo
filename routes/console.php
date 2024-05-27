<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Elastic\Elasticsearch\ClientBuilder;

Artisan::command('search', function (){
    $client = ClientBuilder::create()
        ->setBasicAuthentication(config('database.connections.elasticsearch.hosts.0.user'), config('database.connections.elasticsearch.hosts.0.pass'))
        ->setHosts([config('database.connections.elasticsearch.hosts.0.host').':'.config('database.connections.elasticsearch.hosts.0.port')])
        ->setSSLCert(config('database.connections.elasticsearch.hosts.0.ssl_cert'))
        ->build();

    $params = [
        'index' => 'my_index',
        'body' => [
            'query' => [
                'match' => [
                    'field' => 'search_keyword',
                ],
            ],
        ],
    ];

    $response = $client->search($params);
    dd($response);
});
