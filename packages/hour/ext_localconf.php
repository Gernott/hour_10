<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Hour',
        'Hour',
        [
            \WEBprofil\Hour\Controller\HourController::class => 'list, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \WEBprofil\Hour\Controller\HourController::class => 'list, show, new, create, edit, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    hour {
                        iconIdentifier = hour-plugin-hour
                        title = LLL:EXT:hour/Resources/Private/Language/locallang_db.xlf:tx_hour_hour.name
                        description = LLL:EXT:hour/Resources/Private/Language/locallang_db.xlf:tx_hour_hour.description
                        tt_content_defValues {
                            CType = list
                            list_type = hour_hour
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'hour-plugin-hour',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:hour/Resources/Public/Icons/user_plugin_hour.svg']
    );
})();
