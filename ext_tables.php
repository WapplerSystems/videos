<?php
defined('TYPO3_MODE') or die();


call_user_func(
    function ($extKey) {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', '[videos] video player');



        $GLOBALS['TBE_STYLES']['skins']['backend']['stylesheetDirectories']['videos'] = 'EXT:videos/Resources/Public/CSS/Backend/';


    },
    'videos'
);
