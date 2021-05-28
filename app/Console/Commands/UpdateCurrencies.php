<?php

namespace App\Console\Commands;

use App\Models\Currency;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use SimpleXMLElement;

class UpdateCurrencies extends Command
{
    protected $signature = 'cur:upd';
    protected $description = 'Update Currencies';
    private Client $client;

    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    public function handle()
    {
        $results = [];

        foreach ($this->loadXml() as $node) {
            $results[] = $this->parseNode($node);
        }

        Currency::upsert($results, 'code');

        return 0;
    }

    private function loadXml(): SimpleXMLElement
    {
        $xml = $this->client->get(env('API'))->getBody()->getContents();
        return (new SimpleXMLElement($xml))->Valute;
    }

    private function parseNode(SimpleXMLElement $node): array
    {
        return [
            'code' => (string)$node->CharCode,
            'name' => (string)$node->Name,
            'rate' => (string)$node->Value,
        ];
    }
}
