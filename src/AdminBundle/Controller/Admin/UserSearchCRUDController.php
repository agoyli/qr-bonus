<?php


namespace AdminBundle\Controller\Admin;


use Sonata\AdminBundle\Controller\CRUDController;

class UserSearchCRUDController extends CRUDController
{
    public function listAction()
    {
        return $this->renderWithExtraParams('@Admin/user_search/index.html.twig');
    }
}