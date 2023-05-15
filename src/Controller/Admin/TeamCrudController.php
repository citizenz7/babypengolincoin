<?php

namespace App\Controller\Admin;

use App\Entity\Team;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TeamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Team::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('nickname')
                ->setColumns(6),
            TextField::new('subtitle')
                ->hideOnIndex()
                ->setColumns(6),
            TextField::new('function')
                ->setColumns(3),
            TextField::new('country')
                ->setColumns(3),
            ImageField::new('image', 'Pic')
                ->setColumns(6)
                ->setBasePath('assets/img/team')
                ->setUploadDir('public/assets/img/team')
                ->setRequired(false)
                ->setUploadedFileNamePattern('[name]-[uuid].[extension]'),
            TextEditorField::new('presentation')
                ->hideOnIndex()
                ->setColumns(12),
            UrlField::new('twitter')
                ->setColumns(3)
                ->hideOnIndex(),
            UrlField::new('facebook')
                ->setColumns(3)
                ->hideOnIndex(),
            UrlField::new('linkedin')
                ->setColumns(3)
                ->hideOnIndex(),
            UrlField::new('youtube')
                ->setColumns(3)
                ->hideOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Team members list')
            ->setPageTitle('edit', 'Edit Team member')
            ->setPageTitle('detail', 'Team member details')
            ->setDefaultSort(['id' => 'DESC'])
            ->showEntityActionsInlined(true);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)

            // On DESACTIVE le bouton DELETE et le bouton NEW
            //->disable(Action::DELETE, Action::NEW)

            ->update(Crud::PAGE_INDEX, Action::DETAIL, function(Action $action){
                return $action->setIcon('fas fa-eye text-info')->setLabel('')->addCssClass('text-dark');
            })
            ->update(Crud::PAGE_INDEX, Action::NEW, function(Action $action){
                return $action->setIcon('fas fa-newspaper pe-1')->setLabel('Add Team member');
            })
            ->update(Crud::PAGE_INDEX,Action::EDIT,function(Action $action){
                return $action->setIcon('fas fa-edit text-warning')->setLabel('')->addCssClass('text-dark');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function(Action $action){
                return $action->setIcon('fas fa-trash text-danger')->setLabel('')->addCssClass('text-dark');
            })
            ;
    }
}
