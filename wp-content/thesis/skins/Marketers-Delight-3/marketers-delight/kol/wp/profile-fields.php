<?php

function kol_profile_fields($contactmethods) {
	$contactmethods['kol_twitter'] = __('Twitter URL (MD3)', 'kol');
	return $contactmethods;
}
	add_filter('user_contactmethods', 'kol_profile_fields');