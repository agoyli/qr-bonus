<?php


namespace AdminBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class ItemAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'item';
    protected $baseRouteName = 'admin_item';

    protected function configureFormFields(FormMapper $form)
    {
        $form->add('name');
        $form->add('comment');
        $form->add('price');
        $form->add('user');
    }


    public function getNewInstance()
    {
        $object = $this->getModelManager()->getModelInstance($this->getClass());
        foreach ($this->getExtensions() as $extension) {
            $extension->alterNewInstance($this, $object);
        }

        $userId = $this->getRequest()->get('user_id');

        if ($userId > 0) {
            $object->setUser(
                $this->getConfigurationPool()
                    ->getContainer()
                    ->get('doctrine.orm.entity_manager')
                    ->getRepository('AppBundle:User')
                    ->find($userId)
            );
        }

        return $object;
    }
}