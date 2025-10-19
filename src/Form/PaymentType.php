<?php

namespace App\Form;

use App\Entity\Payment;
use App\Entity\Order;
use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType; // ✅ ADD THIS
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('paymentReference', TextType::class, [
                'label' => 'Payment Reference (Optional)',
                'required' => false,
            ])

            ->add('order', EntityType::class, [
                'class' => Order::class,
                'choice_label' => 'id',
                'label' => 'Order',
            ])
            ->add('customer', EntityType::class, [
                'class' => Customer::class,
                'choice_label' => 'fullName',
                'label' => 'Customer',
            ])
            ->add('method', ChoiceType::class, [
                'choices' => [
                    'Credit Card' => 'Credit Card',
                    'PayPal' => 'PayPal',
                    'GCash' => 'GCash',
                    'Cash on Delivery' => 'COD',
                ],
                'label' => 'Payment Method',
            ])
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Payment Date',
            ])
            
                ->add('amount', MoneyType::class, [
            'label' => 'Amount Paid',
            'currency' => false, // removes the PHP or $ sign
            'scale' => 2,
            'attr' => ['placeholder' => '0.00', 'step' => '0.01'],
        ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Paid' => 'Paid',
                    'Pending' => 'Pending',
                    'Failed' => 'Failed',
                    'Refunded' => 'Refunded',
                ],
                'label' => 'Payment Status',
            ])

            // ✅ Add this field to link with your boolean column in the entity
            ->add('paid', CheckboxType::class, [
                'label' => 'Mark as Paid',
                'required' => false,
            ])

            ->add('transactionRef', TextType::class, [
                'label' => 'Transaction Reference',
                'required' => false,
            ])
            ->add('adminNotes', TextareaType::class, [
                'label' => 'Admin Notes',
                'required' => false,
            ])
            ->add('proof', FileType::class, [
                'label' => 'Proof of Payment (optional)',
                'required' => false,
                'mapped' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Payment::class,
        ]);
    }
}
