<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un message')
            ->setEntityLabelInPlural('Messages');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstname')
                ->setLabel('Prénom'),
            TextField::new('name')
                ->setLabel('Nom'),
            EmailField::new('email')
                ->setLabel('Adresse email')
                ->setFormTypeOptions([
                    'constraints' => [
                        new Email(['message' => 'L\'adresse e-mail n\'est pas valide.']),
                    ],
                ]),
            TelephoneField::new('phone')
                ->setLabel('Numéro de téléphone')
                ->setFormTypeOptions([
                    'constraints' => [
                        new Regex([
                            'pattern' => '/^\+\d{1,3}\d{1,14}$/',
                            'message' => 'Le numéro de téléphone n\'est pas valide. Utilisez le format international, sans espace, par exemple, +33612345678.',
                        ]),
                    ],
                ]),
            TextEditorField::new('message')
                ->setLabel('Message'),
        ];
    }
}
