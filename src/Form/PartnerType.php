<?php

namespace App\Form;

use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nome',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true,
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true,
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Tipo',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true,
                'choices' => ['Patrocinador' => 'Patrocinador', 'Apoiador' => 'Apoiador']
            ])
            ->add('image', FileType::class, [
                'label' => 'Imagem',
                'attr' => [
                    'class' => 'form-control'
                ],
                'data_class' => null
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
        ]);
    }
}
