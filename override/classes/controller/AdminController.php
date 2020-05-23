<?php

class AdminController extends AdminControllerCore
{
    /** @var array Number of results in list per page (used in select field) */
    protected $_pagination = [5, 20, 50, 100, 300, 1000];

    /** @var int Default number of results in list per page */
    protected $_default_pagination = 5;
}
