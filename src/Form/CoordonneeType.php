<?php

namespace App\Form;

use App\Entity\Coordonnee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CoordonneeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('adresse', TextType::class,[
            'label' => 'Adresse',
            'attr' => [ 'class' => 'form-control','placeholder' => 'adresse' ],
        ])
        ->add('telephone', TextType::class,[
            'label' => 'Telephone',
            'attr' => [ 'class' => 'form-control','placeholder' => 'telephone' ],
        ])
        ->add('telephone2', TextType::class,[
            'label' => 'Telephone 2',
            'attr' => [ 'class' => 'form-control','placeholder' => 'telephone 2' ],
            'required' => false,
        ])
        ->add('email', TextType::class,[
            'label' => 'Email',
            'attr' => [ 'class' => 'form-control','placeholder' => 'email' ],
        ])
        ->add('email2', TextType::class,[
            'label' => 'Email 2',
            'attr' => [ 'class' => 'form-control','placeholder' => 'email 2' ],
            'required' => false,
        ])
        ->add('logo', FileType::class,[
            'label' => 'Logo',
            'attr' => [ 'class' => 'form-control','placeholder' => 'logo' ],
            'required' => false,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coordonnee::class,
        ]);
    }
}
