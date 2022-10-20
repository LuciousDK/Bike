<?php

$_EXTKEY = 'pepebike';

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Bike Extension',
	'description' => '',
	'category' => 'plugin',
	'author' => '',
	'author_email' => '',
	'author_company' => '',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '10.4',
			'fluid' => '10.4',
			'typo3' => '10.4',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	)

);
