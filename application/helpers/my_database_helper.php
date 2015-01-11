<?php

/*
 * This file is create for storing name of table, and field.
 * 
 */

if (!function_exists('table')) {

    function table($key) {
        // Tables' name
		$table['tbl_profile'] = 'tbl_profile';

		if (array_key_exists($key, $table)) {
            return $table[$key];
        } else {
            return NULL;
        }
    }

}

if (!function_exists('field')) {

    function field($key) {
        // Fields' profile
        $field['pro_id'] 	= 'pro_id';
        $field['pro_name'] 	= 'pro_name';

        $field['use_name'] 	= 'use_name';
        $field['use_password'] 	= 'use_password';

        if (array_key_exists($key, $field)) {
            return $field[$key];
        } else {
            return NULL;
        }
    }

}