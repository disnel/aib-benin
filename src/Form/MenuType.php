<?php

namespace App\Form;

use App\Entity\Menu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MenuType extends AbstractType
{
    protected $routerInterface;
    public function __construct(RouterInterface $routerInterface) {
        $this->routerInterface = $routerInterface;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $collection = $this->routerInterface->getRouteCollection();
        $allRoutes = $collection->all();
        $routes = array();

        foreach ($allRoutes as $route => $params) {
            $routes[$route . ' (' . $params->getPath() . ')'] = $route;
            $defaults = $params->getDefaults();
        }

        $thisRoutes = isset($routes[get_class($this)]) ? $routes[get_class($this)] : null;

        $builder
            ->add('titre', TextType::class,[
                'label' => 'Titre',
                'attr' => [ 'class' => 'form-control','placeholder' => 'titre du menu' ],
            ])
            ->add('sousTitre', TextType::class,[
                'label' => 'Sous titre',
                'attr' => [ 'class' => 'form-control','placeholder' => 'sous titre du menu' ],
                'required' => false,
            ])
            ->add('description', TextareaType::class,[
                'label' => 'Description',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Description du menu' ],
                'required' => false,
            ])
            ->add('icone', TextType::class,[
                'label' => 'Icone',
                'attr' => [ 'class' => 'form-control','placeholder' => 'nom de l\'icone' ],
                'required' => false,
            ])
            ->add('estMasque', CheckboxType::class,[
                'label' => 'Masque',
                'attr' => [ 'class' => 'flat-red'],
                'required' => false,
            ])
            ->add('estActif', CheckboxType::class,[
                'label' => 'Actif',
                'attr' => [ 'class' => 'flat-red'],
                'required' => false,
            ])
            ->add('route', ChoiceType::class,[
                'choices' => $routes,
                'label' => 'Route',
                'placeholder' => 'Sélectionner une route...',
                'attr' => [ 'class' => 'form-control select2' ],
                'required' => false,
            ])
            ->add('ordreAffichage', TextType::class,[
                'label' => 'Ordre d\'affichage',
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('menuparent', EntityType::class, [
                'attr' => [ 'class' => 'form-control select2' ],
                'placeholder' => 'Veuillez selectionner un menu',
                'class' => Menu::class,
                'choice_label' => 'titre',
                'label' => 'Menu associé',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
