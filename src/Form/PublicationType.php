<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Publication;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;

class PublicationType extends AbstractType
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

        $builder
            ->add('titre', TextType::class,[
                'label' => 'Titre',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Titre de la publication' ],
            ])
            ->add('sousTitre', TextType::class,[
                'label' => 'Sous titre',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Sous titre de la publication' ],
                'required' => false,
            ])
            ->add('ssousTitre', TextType::class,[
                'label' => 'Sous sous titre',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Sous sous titre de la publication' ],
                'required' => false,
            ])
            ->add('description', TextareaType::class,[
                'label' => 'Description',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Description de la publication' ],
                'required' => false,
            ])
            ->add('lien', TextType::class,[
                'label' => 'Url',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Le lien vers la ressource' ],
                'required' => false,
            ])
            ->add('contenu', TextareaType::class,[
                'label' => 'Contenu',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Contenu de la publication' ],
                'required' => false,
            ])
            ->add('nomDocument', FileType::class,[
                'data_class' => null,
                'label' => 'Nom du Document',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Nom du document' ],
                'required' => false,
            ])
            ->add('nomImage', FileType::class,[
                'attr' => [ 'class' => 'form-control','placeholder' => 'titre de l\'image' ],
                'data_class' => null,
                'multiple' => false,
                'required' => false,
                'label' => 'Nom image'
            ])
            ->add('route', ChoiceType::class,[
                'choices' => $routes,
                'label' => 'Route',
                'placeholder' => 'Sélectionner une route...',
                'attr' => [ 'class' => 'form-control select2' ],
                'required' => false,
            ])
            ->add('estSlide', CheckboxType::class,[
                'label' => 'Slide',
                'attr' => [ 'class' => 'flat-red'],
                'required' => false,
            ])
            ->add('estArticle', CheckboxType::class,[
                'label' => 'Article',
                'attr' => [ 'class' => 'flat-red'],
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
            ->add('icone', TextType::class,[
                'label' => 'Icone',
                'attr' => [ 'class' => 'form-control','placeholder' => 'nom de l\'icone' ],
                'required' => false,
            ])
            ->add('ordreAffichage', IntegerType::class,[
                'label' => 'Ordre d\'affichage',
                'attr' => [ 'class' => 'form-control','placeholder' => 'Ordre d\'affichage de la publication' ],
                'required' => false,
            ])
            ->add('menu', EntityType::class,[
                'class' => Menu::class,
                'label' => 'Menu',
                'attr' => [ 'class' => 'form-control select2' ],
                'choice_label' => 'titre',
                'required' => false,
            ])
            ->add('publicationparent', EntityType::class,[
                'class' => Publication::class,
                'label' => 'Publication parent',
                'attr' => [ 'class' => 'form-control select2' ],
                'choice_label' => 'titre',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
            'allow_extra_fields' => true
        ]);
    }
}
