<?php

namespace App\Factory;

use App\Entity\InvoiceLine;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static InvoiceLine|Proxy createOne(array $attributes = [])
 * @method static InvoiceLine[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static InvoiceLine|Proxy findOrCreate(array $attributes)
 * @method static InvoiceLine|Proxy random(array $attributes = [])
 * @method static InvoiceLine|Proxy randomOrCreate(array $attributes = [])
 * @method static InvoiceLine[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static InvoiceLine[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 */

final class InvoiceLineFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'quantity' => self::faker()->randomNumber(2),
            'invoice' => InvoiceFactory::new(),
            'description' => self::faker()->text(100),
            'amount' => self::faker()->randomFloat(2, 0.1, 1000),
            'vatAmount' => self::faker()->randomFloat(2, 0.1, 1000),
            'totalWithVat' => self::faker()->randomFloat(2, 0.1, 1000),
        ];
    }

    protected static function getClass(): string
    {
        return InvoiceLine::class;
    }
}
