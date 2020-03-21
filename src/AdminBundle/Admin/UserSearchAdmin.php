<?php


namespace AdminBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class UserSearchAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'user_search';
    protected $baseRouteName = 'admin_user_search';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list']);
    }
}