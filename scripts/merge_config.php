<?php

    $merge_configs=array();   
    
    $view_config= new Soulware\EditViewOnInstall\viewMergeConfig('application','Email.php','modules/Emails','Email','get_list_view_data','replace','
                //DashletHandler
                $mod_strings = array_merge($mod_strings, return_module_language($GLOBALS[\'current_language\'], \'Emails\')); // hard-coding for Home screen ListView
                //DashletHandler');
    $view_config->original_content='$mod_strings = return_module_language($GLOBALS[\'current_language\'], \'Emails\'); // hard-coding for Home screen ListView';
    $merge_configs[]=$view_config;
    
    
    $view_config= new Soulware\EditViewOnInstall\viewMergeConfig('application','Email.php','modules/Emails','Email','quickCreateForm','replace','
                //DashletHandler
                $mod_strings = array_merge($mod_strings, return_module_language($current_language, \'Emails\'));
                //DashletHandler');
    $view_config->original_content='$mod_strings = return_module_language($current_language, \'Emails\');';
    $merge_configs[]=$view_config;

