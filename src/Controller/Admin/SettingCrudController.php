<?php

namespace App\Controller\Admin;

use App\Entity\Setting;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SettingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Setting::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('siteName', 'Site name')
                ->setColumns(6),
            TextField::new('siteNamefull', 'Site name full')
                ->setColumns(6),
            TextField::new('siteNameticker', 'Site name ticker')
                ->setColumns(2),
            TextField::new('siteUrl', 'Site URL')
                ->setColumns(4),
            UrlField::new('siteUrlfull', 'Site URL full')
                ->setColumns(3),
            EmailField::new('siteEmail', 'Site e-mail address')
                ->setColumns(3),
            ImageField::new('siteLogo', 'Site Logo')
                ->setColumns(5)
                ->setBasePath('assets/img')
                ->setUploadDir('public/assets/img')
                ->setRequired(false)
                ->setUploadedFileNamePattern('[name]-[contenthash].[extension]'),
            TextEditorField::new('siteDescription', 'Site description')
                ->setColumns(12)
                ->hideOnIndex(),
            TextEditorField::new('siteKeywords', 'Site keywords')
                ->setColumns(12)
                ->hideOnIndex(),
            TextEditorField::new('siteAbout', 'Site about')
                ->setColumns(12)
                ->hideOnIndex(),
            TextField::new('siteVersion', 'Site version')
                ->setColumns(2),
            TextEditorField::new('siteDisclaimer', 'Site disclaimer')
                ->setColumns(12)
                ->hideOnIndex(),
            TextField::new('siteFooterlefttitle', 'Site footer left title')
                ->setColumns(6)
                ->hideOnIndex(),
            TextField::new('siteFootercentertitle', 'Site footer center title')
                ->setColumns(6)
                ->hideOnIndex(),
            TextField::new('siteFooterrighttitle', 'Site footer right title')
                ->setColumns(6)
                ->hideOnIndex(),
            TextEditorField::new('siteFooterrightcontent', 'Site footer right content')
                ->setColumns(12)
                ->hideOnIndex()
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            //->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ->setPageTitle('index', 'Site settings')
            ->setPageTitle('edit', 'Edit site settings')
            ->showEntityActionsInlined(true)
            ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function(Action $action){
                return $action->setIcon('fas fa-eye text-info')->setLabel('')->addCssClass('text-dark');
            })
            // On DESACTIVE le bouton DELETE et le bouton NEW
            ->disable(Action::DELETE, Action::NEW)
            ->update(Crud::PAGE_INDEX,Action::EDIT,function(Action $action){
                return $action->setIcon('fas fa-edit text-warning')->setLabel('');
            });
    }
}
