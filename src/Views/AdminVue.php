<?php

namespace WonderWp\Component\Template\Views;

use WonderWp\Component\DependencyInjection\Container;

class AdminVue
{
    /** @var VueFrag[] */
    protected $frags = [];

    /**
     * @param VueFrag $frag
     *
     * @return $this
     */
    public function addFrag(VueFrag $frag)
    {
        $this->frags[] = $frag;

        return $this;
    }

    /**
     * @param string $prefix
     * @param array $frags
     *
     * @return $this
     */
    public function registerFrags($prefix, array $frags = [])
    {
        /** @var $prefix string */
        //To be overridden by children

        if(empty($frags)) {
            $container = Container::getInstance();
            $frags = [
                new VueFrag($container->offsetGet($prefix . '.wwp.path.templates.frags.header')),
                new VueFrag($container->offsetGet($prefix . '.wwp.path.templates.frags.tabs')),
                new VueFrag($container->offsetGet($prefix . '.wwp.path.templates.frags.content')),
                new VueFrag($container->offsetGet($prefix . '.wwp.path.templates.frags.footer')),
            ];
        }

        foreach ($frags as $vueFrag) {
            $this->addFrag($vueFrag);
        }

        return $this;
    }

    /**
     * @param array $params
     *
     * @return $this
     */
    public function render($params = [])
    {
        if (!empty($this->frags)) {
            foreach ($this->frags as $frag) {
                /** @var VueFrag $frag */
                $frag->render($params);
            }
        }

        return $this;
    }
}
