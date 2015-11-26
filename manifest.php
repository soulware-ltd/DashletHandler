<?php
    $manifest =array(
        'acceptable_sugar_flavors' => array('CE','PRO','CORP','ENT','ULT'),
        'acceptable_sugar_versions' => array(
            'regex_matches' => array('6.5.*'),
	 ),
        'author' => 'Szabolcs Hovanecz, Soulware Ltd.',
        'description' => 'Save and restore dahslets order and settings by user.',
        'icon' => '',
        'is_uninstallable' => true,
        'name' => 'SoulwareDashboardHandler',
        'published_date' => '2014-01-01 2014 12:00:00',
        'type' => 'module',
        'version' => '1.0.3',
    );
   
    $installdefs =array(
        'id' => 'SoulwareDashboardHandler',
        'copy' => array(
	    array(
	    "from" => "<basepath>/files/custom/include/MySugar/tpls/MySugar.tpl", "to" => "custom/include/MySugar/tpls/MySugar.tpl"),
	    array(
	    "from" => "<basepath>/files/custom/modules/Home/DashletStorage.class.php", "to" => "custom/modules/Home/DashletStorage.class.php"),
	    array(
	    "from" => "<basepath>/files/custom/modules/Home/dashlets_handler.php", "to" => "custom/modules/Home/dashlets_handler.php"),
	    array(
	    "from" => "<basepath>/files/custom/modules/Home/language/hu_hu.lang.php", "to" => "custom/modules/Home/language/hu_hu.lang.php"),
	    array(
	    "from" => "<basepath>/files/custom/modules/Home/language/en_us.lang.php", "to" => "custom/modules/Home/language/en_us.lang.php"),
	    array(
	    "from" => "<basepath>/files/custom/modules/Home/index.php", "to" => "custom/modules/Home/index.php"),
	    array(
	    "from" => "<basepath>/files/custom/metadata/dashlet_storage_metadata.php", "to" => "custom/metadata/dashlet_storage_metadata.php"),
	    array(
	    "from" => "<basepath>/files/custom/Extension/application/Ext/TableDictionary/dashlet_storageTableDictionary.php", "to" => "custom/Extension/application/Ext/TableDictionary/dashlet_storageTableDictionary.php"),
            array(
            "from" => "<basepath>/files/modules/Campaigns/Charts.php", "to" => "modules/Campaigns/Charts.php",    
            ),
            array(
            "from" => "<basepath>/files/modules/Emails/metadata/additionalDetails.php", "to" => "modules/Emails/metadata/additionalDetails.php",
            ),
            array(
            "from" => "<basepath>/files/custom/modules/Emails/Dashlets/MyEmailsDashlet/MyEmailsDashlet.php", "to" => "custom/modules/Emails/Dashlets/MyEmailsDashlet/MyEmailsDashlet.php",    
            ),
        ),
        'language'=> array (
            array(
                'from'=> '<basepath>/files/custom/modules/Home/language/en_us.lang.php',
                'to_module'=> 'Home',
                'language'=>'en_us'
            ),
	    array(
                'from'=> '<basepath>/files/custom/modules/Home/language/hu_hu.lang.php',
                'to_module'=> 'Home',
                'language'=>'hu_hu'
            ),
        ),
        'post_uninstall' => array(
	    '<basepath>/scripts/post_uninstall.php',
	),
    );
?>
