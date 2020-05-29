<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MonModule extends Module
{
    public function __construct()
    {
        $this->name = 'monmodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'Pierre Belin';
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_
        ];

        parent::__construct();

        $this->displayName = $this->l('Mon module');
        $this->description = $this->l('Description du module');
        $this->confirmUninstall = $this->l('Êtes-vous sûr de vouloir désinstaller ce module ?');
    }

    public function install()
    {
        if (parent::install()
        && $this->registerHook('actionCustomerAccountAdd')
        && $this->registerHook('displayProductAdditionalInfo')
        && $this->registerHook('displayMonMessage')
        ) {
            return true;
        }

        return false;
    }

    public function uninstall()
    {
        if (parent::uninstall()) {
            return true;
        }

        return false;
    }

    public function hookActionCustomerAccountAdd($params)
    {
        // newCustomer
        $customer = $params['newCustomer'];
        $customer->lastname = 'TestMonModule';
        $customer->save();
    }

    public function hookDisplayProductAdditionalInfo($products)
    {
        return $this->display(__FILE__, 'views/templates/admin/monaffichage.tpl');
    }

    public function hookDisplayMonMessage()
    {
        return $this->display(__FILE__, 'views/templates/admin/monmessage.tpl');
    }
}
