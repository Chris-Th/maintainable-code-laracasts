<?php

namespace App\Services\PaymentOptions;
use App\Contracts\PaymentOption;

class Wire implements PaymentOption
{

    public function getFields()
    {
        //
    }

    public function getValues(int $userId)
    {
        //
    }

    public function store(int $userId, array $data)
    {
       // Store the data
    }

    public function delete(int $userId)
    {
        // delete data
    }

    public function makePrimary(int $userId)
    {
        // Make this the primary payment option
    }
}

