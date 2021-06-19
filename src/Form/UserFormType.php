<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FName', TextType::class, [
                'label' => 'Фамилия',
            ])

            ->add('IName', TextType::class, [
                'label' => 'Имя'
            ])
            ->add('OName', TextType::class, [
                'label' => 'Отчество'
            ])
            ->add('Series', TextType::class, [
                'label' => 'Серия'
            ])
            ->add('Number', TextType::class, [
                'label' => 'Номер'
            ])
            ->add('ChangeFIO', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
                'label' => 'Дата изменения ФИО',
            ])
            ->add('NameFaculty', TextType::class, [
                'label' => 'Факультет'
            ])
            ->add('NameSpecialization', TextType::class, [
                'label' => 'Специальность'
            ])
            ->add('RegisterNumber', TextType::class, [
                'label' => 'Регистрационный номер'
            ])
            ->add('DateGive', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
                'label' => 'Дата выдачи',
            ])

            ->add('DateCommissions', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
                'label' => 'Дата комиссии ГОСЫ'
            ])
            ->add('TypeDiplom', TextType::class, [
                'label' => 'Тип диплома'
            ])
            ->add('CollorDiplom', TextType::class, [
                'label' => 'Степень отличия'
            ])
            ->add('NumberProtocol', TextType::class, [
                'label' => 'Номер протокола'
            ])
            ->add('DateProtocol', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
                'label' => 'Дата протокола'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
