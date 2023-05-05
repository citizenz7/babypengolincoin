<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('nickname', 'Nickname')
                ->setColumns(6),
            ImageField::new('image')
                ->setColumns(5)
                ->setBasePath('assets/img/users')
                ->setUploadDir('public/assets/img/users')
                ->setRequired(false)
                ->setUploadedFileNamePattern('[name]-[contenthash].[extension]'),
            ChoiceField::new('roles', 'Roles')
                ->setColumns(3)
                ->setChoices([
                    'Admin' => 'ROLE_ADMIN',
                    // 'Membre' => 'ROLE_USER',
                    // 'Auteur' => 'ROLE_AUTHOR'
                ])
                ->allowMultipleChoices()
                ->renderAsBadges([
                    'ROLE_ADMIN' => 'success',
                    // 'ROLE_USER' => 'primary',
                    // 'ROLE_AUTHOR' => 'warning'
                ]),
            EmailField::new('email', 'Email address')
                ->setColumns(5)
                ->hideOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Users')
            ->setPageTitle('edit', 'Edit user')
            ->setPageTitle('detail', 'User : ')
            ->setDefaultSort(['id' => 'DESC'])
            ->showEntityActionsInlined(true);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)

            // On DESACTIVE le bouton DELETE et le bouton NEW
            ->disable(Action::DELETE, Action::NEW)

            ->update(Crud::PAGE_INDEX, Action::DETAIL, function(Action $action){
                return $action->setIcon('fas fa-eye text-info')->setLabel('')->addCssClass('text-dark');
            })
            // ->update(Crud::PAGE_INDEX, Action::NEW, function(Action $action){
            //     return $action->setIcon('fas fa-newspaper pe-1')->setLabel('Créer un utilisateur');
            // })
            ->update(Crud::PAGE_INDEX,Action::EDIT,function(Action $action){
                return $action->setIcon('fas fa-edit text-warning')->setLabel('')->addCssClass('text-dark');
            })
            // ->update(Crud::PAGE_INDEX, Action::DELETE, function(Action $action){
            //     return $action->setIcon('fas fa-trash text-danger')->setLabel('')->addCssClass('text-dark');
            // })
            ;
    }
}
