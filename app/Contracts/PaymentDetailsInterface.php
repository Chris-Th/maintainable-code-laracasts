<?php

namespace App\Contracts;

interface PaymentDetailsInterface
{
    /**
     * Get details of a specific payment method.
     * @param int $id
     * @return array
     */
    public function show(int $id): array;

    /**
     * Store new payment option.
     * @param array $data
     * @return bool
     */
    public function store(array $data): bool;

    /**
     * Update an existing payment option
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * Get the details of a payment option for editing
     * @param int $id
     * @return array
     */
    public function edit(int $id): array;

    /**
     * Delete a payment option
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * Make a payment option primary
     * @param int $id
     * @return bool
     */
    public function makePrimary(int $id): bool;
}
