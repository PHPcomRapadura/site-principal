<?php

namespace App\Form;

use App\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Título',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Descrição'
            ])
            ->add('incorporation_code', TextareaType::class, [
                'label' => 'Código de Incorporação',
                'required' => true,
            ])
            ->add('status', CheckboxType::class, [
                'label' => 'Registro Ativo'
            ])
            ->add('btn_salvar', SubmitType::class, [
                'label' => 'Salvar'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
