<?php
/**
 * Date: 04/12/14
 * Time: 16:23
 */

namespace ITN\DebugBundle;

use ITN\DebugBundle\DependencyInjection\CompilerPass\DebugBundleFirewall;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ITNDebugBundle extends Bundle
{
    public function build(ContainerBuilder $builder)
    {
        parent::build($builder);

        $builder->addCompilerPass(new DebugBundleFirewall());
    }
}