<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Services\ImageFileValidator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Mime\Part\File;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un projet')
            ->setEntityLabelInPlural('Projets');
    }

    private $imageFileValidator;

    public function __construct(ImageFileValidator $imageFileValidator)
    {
        $this->imageFileValidator = $imageFileValidator;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')
                ->setLabel('Titre'),
            TextField::new('thematic')
                ->setLabel('Intitulé'),
            TextField::new('context')
                ->setLabel('Contexte'),
            TextField::new('tools')
                ->setLabel('Outils'),
            TextField::new('workingHours')
                ->setLabel('Charge en heures'),
            TextField::new('period')
                ->setLabel('Période de réalisation'),
            TextField::new('need')
                ->setLabel('Besoin'),
            TextField::new('technologies')
                ->setLabel('Technologies'),
            TextField::new('documentation')
                ->setLabel('Documentation'),
            TextField::new('conclusion')
                ->setLabel('Conclusion'),
            ImageField::new('picture')
                ->setLabel('Image n°1')
                ->setBasePath('uploads/pictures')
                ->setUploadDir('public/uploads/pictures'),
                /*->setFormTypeOptions([
                    'constraints' => [
                        $this->imageFileValidator->getImageFileConstraints(),
                    ],
                ]),*/
            ImageField::new('picture2')
                ->setLabel('Image n°2')
                ->setBasePath('uploads/pictures')
                ->setUploadDir('public/uploads/pictures'),
                /*->setFormTypeOptions([
                    'constraints' => [
                        $this->imageFileValidator->getImageFileConstraints(),
                    ],
                ]),*/
            ImageField::new('picture3')
                ->setLabel('Image n°3')
                ->setBasePath('uploads/pictures')
                ->setUploadDir('public/uploads/pictures'),
                /*->setFormTypeOptions([
                    'constraints' => [
                        $this->imageFileValidator->getImageFileConstraints(),
                    ],
                ]),*/
        ];
    }
}
