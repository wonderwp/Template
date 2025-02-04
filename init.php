<?php

use WonderWp\Component\DependencyInjection\Container;
use WonderWp\Component\Template\Views\AdminVue;
use WonderWp\Component\Template\Views\EditAdminView;
use WonderWp\Component\Template\Views\ListAdminView;
use WonderWp\Component\Template\Views\OptionsAdminView;

add_action('wonderwp.loader.load', 'wwp_register_template_definitions_towards_container', 10, 2);

function wwp_register_template_definitions_towards_container(Container $container)
{
    //Views
    $container['wwp.views.baseAdmin']    = function () {
        return new AdminVue();
    };
    $container['wwp.views.listAdmin']    = function () {
        return new ListAdminView();
    };
    $container['wwp.views.editAdmin']    = function () {
        return new EditAdminView();
    };
    $container['wwp.views.optionsAdmin'] = function () {
        return new OptionsAdminView();
    };
}
