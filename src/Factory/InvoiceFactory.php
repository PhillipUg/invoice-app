<?php

namespace App\Factory;

use App\Entity\Invoice;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Invoice|Proxy createOne(array $attributes = [])
 * @method static Invoice[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Invoice|Proxy findOrCreate(array $attributes)
 * @method static Invoice|Proxy random(array $attributes = [])
 * @method static Invoice|Proxy randomOrCreate(array $attributes = [])
 * @method static Invoice[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Invoice[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 */
final class InvoiceFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'invoiceDate' => self::faker()->dateTime(),
            'invoiceNumber' => self::faker()->randomNumber(),
            'customerId' => self::faker()->randomNumber(),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Invoice $invoice) {})
            ;
    }

    protected function withInvoiceLines(int $count): self
    {
        return $this->afterInstantiate(function(Invoice $invoice) use ($count) {
            InvoiceLineFactory::new()->createMany($count, ['invoice' => $invoice]);
        });
    }

    protected static function getClass(): string
    {
        return Invoice::class;
    }
}
