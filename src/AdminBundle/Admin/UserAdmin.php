<?php


namespace AdminBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'user';
    protected $baseRouteName = 'admin_user';

    protected function configureFormFields(FormMapper $form)
    {
        $form->add('username');
        $form->add('email');
        $form->add('roles', ChoiceType::class, [
            'choices' => [
                'Admin' => 'ROLE_ADMIN',
            ],
            'multiple' => true,
        ]);
        $form->add('enabled');
        $form->add('plainPassword', PasswordType::class);
        $form->add('items', CollectionType::class, [
        ], [
            'edit' => 'inline',
            'inline' => 'table',
            'link_parameters' => ['user_id' => $this->getSubject()->getId()],
        ]);
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('username');
    }
}