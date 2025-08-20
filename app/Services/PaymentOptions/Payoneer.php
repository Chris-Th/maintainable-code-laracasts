<?php

namespace App\Services\PaymentOptions;
use App\Contracts\PaymentOption;
use App\Models\PaymentPayoneer;

class Payoneer implements PaymentOption
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
        try {
            $fields = $this->Fields();
            $wireDetails = [];
            foreach ($fields as $field) {
                if (isset($data[$field->name])) {
                    $wireDetails[$field->name] = $data[$field->name];
                } else {
                    throw new \Exception("Missing required field: {$field->name}");
                }
            }
            return PaymentPayoneer::updateOrCreate(
                ['user_id' => $userId],
                $wireDetails
            );
       } catch (\Throwable $th) {

       }
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

