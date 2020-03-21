<?php

namespace AdminBundle;

use AdminBundle\DependencyInjection\AdminExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AdminBundle extends Bundle
{
    /**
     * @return mixed
     */
    public function getExtension()
    {
        return new AdminExtension();
    }
}