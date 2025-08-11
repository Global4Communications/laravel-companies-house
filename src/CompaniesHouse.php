<?php

namespace Global4Communications\LaravelCompaniesHouse;

use Global4Communications\LaravelCompaniesHouse\Http\Client;
use Global4Communications\LaravelCompaniesHouse\Resources\Charges;
use Global4Communications\LaravelCompaniesHouse\Resources\Company;
use Global4Communications\LaravelCompaniesHouse\Resources\FilingHistory;
use Global4Communications\LaravelCompaniesHouse\Resources\Search;

/**
 * Class CompaniesHouse.
 */
class CompaniesHouse
{
    /**
     * @var
     */
    public $client;

    /**
     * CompaniesHouseApi constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $number
     * @return Company
     */
    public function company($number)
    {
        return new Company($this->client, $number);
    }

    /**
     * @return Search
     */
    public function search()
    {
        return new Search($this->client);
    }

    /**
     * @param $number
     * @return FilingHistory
     */
    public function filingHistory($number)
    {
        return new FilingHistory($this->client, $number);
    }

    /**
     * @param $number
     * @return Charges
     */
    public function charges($number)
    {
        return new Charges($this->client, $number);
    }
}
