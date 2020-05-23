/**
 * File created: Saturday, 23rd May 2020
 * @author Pierre Belin (contact@pierrebelin.fr)
 * @copyright 2019-2020 Pierre Belin
 */

<?php

class Address extends AddressCore
{
    public static function isValid($id_address)
    {
        $id_address = (int) $id_address;
        $isValid = Db::getInstance()->getValue('
            SELECT `id_address` FROM ' . _DB_PREFIX_ . 'address a
            WHERE a.`id_address` = ' . $id_address . ' AND a.`deleted` = 0 AND a.`active` = 1
        ');

        // MON CODE A AJOUTÉ
        if (true) {
            // FAIRE QUELQUECHOSE
        }

        return (bool) $isValid;
    }
}
