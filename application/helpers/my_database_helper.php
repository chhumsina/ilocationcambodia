<?php

/*
 * This file is create for storing name of table, and field.
 * 
 */

if (!function_exists('table')) {

    function table($key) {
        // Tables' name
		$table['ilc_categories'] = 'ilc_categories';
		$table['ilc_branches'] = 'ilc_branches';
		$table['ilc_companies'] = 'ilc_companies';

		if (array_key_exists($key, $table)) {
            return $table[$key];
        } else {
            return NULL;
        }
    }

}

if (!function_exists('field')) {

    function field($key) {

        $field['use_name'] 	= 'use_name';
        $field['use_password'] 	= 'use_password';
        $field['re_password'] 	= 're_password';


        $field['com_id']  = 'com_id';
		$field['branch_id']  = 'branch_id';
		$field['title']  = 'title';
		$field['longitude']  = 'longitude';
		$field['latitude']  = 'latitude';
		$field['email']  = 'email';
		$field['website']  = 'website';
		$field['phone_1']  = 'phone_1';
		$field['phone_2']  = 'phone_2';
		$field['address']  = 'address';
		$field['description']  = 'description';
		$field['user_id']  = 'user_id';
		$field['bra_approve']  = 'bra_approve';


        $field['gender']  = 'gender';
        $field['email']  = 'email';
        $field['phone_1']  = 'phone_1';
        $field['phone_2']  = 'phone_2';
        $field['utype_id']  = 'utype_id';
        $field['com_logo']  = 'com_logo';
        $field['com_name']  = 'com_name';
        $field['cat_id']  = 'cat_id';
        $field['deleted']  = 'deleted';

        $field['cat_id']  = 'cat_id';
        $field['cat_name']  = 'cat_name';
        $field['approve']  = 'approve';

        if (array_key_exists($key, $field)) {
            return $field[$key];
        } else {
            return NULL;
        }
    }

}