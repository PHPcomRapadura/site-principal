<?php

namespace App\Form;

use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ["label" => "Nome"], [
                'required' => true
            ])
            ->add('type', ChoiceType::class, [
                "label" => "Tipo",
                'choices' => ['Patrocinador' => 'P', 'Apoiador' => 'A'],
                'required' => true
            ])
            ->add('image', FileType::class, [
                "label" => "Imagem",
                'data_class' => null
            ])
            ->add('btn_consultar', SubmitType::class, [
                'label' => "Consultar"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
        ]);
    }
}
