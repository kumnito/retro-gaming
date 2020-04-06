<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Console;
use App\Entity\Jeux;
use App\Repository\CategorieRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class AnnonceType extends AbstractType
{
    private $categorie;
    public function __construct(CategorieRepository $categorie) 
    {
        $this->categorie = $categorie;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('annee')
            ->add('prix')
            ->add('compteur')

            ->add('Console_id', EntityType::class, [
                'class' => Console::class,
                'choice_label' => 'nom',
                'required' => true,
                ])

            
            ->add('categorie', EntityType::class, [
                 'class' => Categorie::class,
                 'choice_label' => 'nom',
                 'required' => true,
                 ])

            ->add('photo',FileType::class, [
                'label' => 'La photo du jeux (PNG, JPG, JPEG) ',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Le format n\'est pas valide',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jeux::class,
        ]);
    }
}
