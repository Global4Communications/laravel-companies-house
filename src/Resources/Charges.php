<?php

namespace Global4Communications\LaravelCompaniesHouse\Resources;

use Global4Communications\LaravelCompaniesHouse\Http\Client;

class Charges extends ResourcesBase
{
    /**
     * Companies House Number.
     * @var string
     */
    protected $number;

    /**
     * Charges constructor.
     * @param Client $client
     * @param $number
     */
    public function __construct(Client $client, $number)
    {
        parent::__construct($client);

        $this->number = $number;
    }

    /**
     * Get all charges paginated.
     *
     * @param int $items_per_page
     * @param int $start_index
     * @return array|mixed|null|object
     * @throws \Exception
     */
    public function all($items_per_page = 20, $start_index = 0)
    {
        if (! empty($this->number)) {
            $uri = "/company/$this->number/charges";

            $url = $this->buildResourceUrl($uri);

            $params = [
                'items_per_page' => $items_per_page,
                'start_index' => $start_index,
            ];

            return $this->client->get($url, $params);
        } else {
            throw new \InvalidArgumentException('Invalid Argument: You must provide valid company number to search for.');
        }
    }

    /**
     * Find specific charge by Id.
     *
     * @param $chargeId
     * @return array|mixed|null|object
     * @throws \Exception
     */
    public function find($chargeId)
    {
        if (empty($chargeId)) {
            throw new \InvalidArgumentException('You must provide a ChargesId.');
        }

        if (! empty($this->number)) {
            $uri = "/company/$this->number/charges/$chargeId";

            $url = $this->buildResourceUrl($uri);

            return $this->client->get($url);
        } else {
            throw new \InvalidArgumentException('Invalid Argument: You must provide valid company number to search for.');
        }
    }
}
