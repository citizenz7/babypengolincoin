<?php

namespace App\Controller\Admin;

use App\Entity\Section;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class SectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Section::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            IntegerField::new('sortOrder')
                ->setColumns(2),
            TextField::new('title', 'Title')
                ->setColumns(5),
            TextField::new('subtitle', 'Subtitle')
                ->hideOnIndex()
                ->setColumns(5),
            TextEditorField::new('contentMain', 'Main Content')
                ->setColumns(12)
                ->hideOnIndex(),
            TextEditorField::new('contentLeft', 'Left Content')
                ->setHelp('if exists...')
                ->setColumns(12)
                ->hideOnIndex(),
            TextEditorField::new('contentRight', 'Right Content')
                ->setHelp('if exists...')
                ->setColumns(12)
                ->hideOnIndex(),
            TextField::new('buttonText', 'Button Text')
                ->setColumns(6)
                ->hideOnIndex(),
            TextField::new('buttonLink', 'Button Link')
                ->hideOnIndex()
                ->setColumns(6)
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Sections')
            ->setPageTitle('edit', 'Edit section')
            ->setPageTitle('detail', 'Section: ')
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
                return $action->setIcon('fas fa-newspaper pe-1')->setLabel('Add section');
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
