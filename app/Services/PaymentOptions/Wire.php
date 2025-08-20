<?php

namespace App\Services\PaymentOptions;
use App\Contracts\PaymentOption;
use App\Models\PaymentWire;

class Wire implements PaymentOption
{

    public function getFields()
    {
        return [
            (object)[
                'name' => 'bank_account_name',
                'type' => 'text',
                'label' => 'Bank Account Name',
                'required' => true,
                'style' => 'col-xl-12,'
            ],
            (object)[
                'name' => 'bank_account_number',
                'type' => 'text',
                'label' => 'Account Number or IBAN',
                'required' => true,
                'style' => 'col-xl-6'
            ],
            (object)[
                'name' => 'bank_swift_code',
                'type' => 'text',
                'label' => 'ABA or SWIFT Code',
                'required' => true,
                'style' => 'col-xl-6'
            ],
            (object)[
                'name' => 'account_address',
                'type' => 'text',
                'label' => 'Address 1',
                'required' => true,
                'style' => 'col-xl-12'
            ],
            (object)[
                'name' => 'account_address2',
                'type' => 'text',
                'label' => 'Address 2',
                'required' => false,
                'style' => 'col-xl-12'
            ],
        ];
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
            return PaymentWire::updateOrCreate(
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

