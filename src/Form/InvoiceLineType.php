<?php

namespace App\Form;

use App\Entity\InvoiceLine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceLineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', TextType::class)
            ->add('quantity', IntegerType::class)
            ->add('amount', MoneyType::class, [
                'currency' => 'USD',
                'scale' => 2,
            ])
            ->add('vatAmount', MoneyType::class, [
                'currency' => 'USD',
                'scale' => 2,
            ])
            ->add('totalWithVat', MoneyType::class, [
                'currency' => 'USD',
                'scale' => 2
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InvoiceLine::class,
        ]);
    }
}