<?php

/**
 * This file is part of MetaModels/core.
 *
 * (c) 2012-2015 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Andreas Isaak <info@andreas-isaak.de>
 * @author     David Maack <david.maack@arcor.de>
 * @author     Stefan Heimes <stefan_heimes@hotmail.com>
 * @author     Tim Becker <tim@westwerk.ac>
 * @author     Alexander Menk <a.menk@imi.de>
 * @copyright  2012-2015 The MetaModels team.
 * @license    https://github.com/MetaModels/core/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

$GLOBALS['TL_DCA']['tl_metamodel_dca'] = array
(
    'config'                => array
    (
        'dataContainer'    => 'General',
        'ptable'           => 'tl_metamodel',
        'ctable'           => 'tl_metamodel_dcasetting',
        'switchToEdit'     => false,
        'enableVersioning' => false,
    ),
    'dca_config'            => array
    (
        'data_provider'  => array
        (
            'default' => array
            (
                'source' => 'tl_metamodel_dca'
            ),
            'parent'  => array
            (
                'source' => 'tl_metamodel'
            )
        ),
        'childCondition' => array
        (
            array
            (
                'from'    => 'tl_metamodel',
                'to'      => 'tl_metamodel_dca',
                'setOn'   => array
                (
                    array
                    (
                        'to_field'   => 'pid',
                        'from_field' => 'id',
                    ),
                ),
                'filter'  => array
                (
                    array
                    (
                        'local'     => 'pid',
                        'remote'    => 'id',
                        'operation' => '=',
                    ),
                ),
                'inverse' => array
                (
                    array
                    (
                        'local'     => 'pid',
                        'remote'    => 'id',
                        'operation' => '=',
                    ),
                )
            )
        ),
    ),
    'list'                  => array
    (
        'sorting'           => array
        (
            'mode'         => 4,
            'fields'       => array('name'),
            'panelLayout'  => 'filter,limit',
            'headerFields' => array('name'),
            'flag'         => 1,
        ),
        'label'             => array
        (
            'fields' => array('name'),
            'format' => '%s',
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();"'
            ),
        ),
        'operations'        => array
        (
            'edit'     => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif',
            ),
            'copy'     => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['copy'],
                'href'  => 'act=copy',
                'icon'  => 'copy.gif',
            ),
            'delete'   => array
            (
                'label'      => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => sprintf(
                    'onclick="if (!confirm(\'%s\')) return false; Backend.getScrollOffset();"',
                    $GLOBALS['TL_LANG']['MSC']['deleteConfirm']
                )
            ),
            'show'     => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['show'],
                'href'  => 'act=show',
                'icon'  => 'show.gif'
            ),
            'groupsort_settings' => array
            (
                'label'   => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['groupsort_settings'],
                'href'    => 'table=tl_metamodel_dca_sortgroup',
                'icon'    => 'system/modules/metamodels/assets/images/icons/dca_groupsortsettings.png',
                'idparam' => 'pid'
            ),
            'settings' => array
            (
                'label'   => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['settings'],
                'href'    => 'table=tl_metamodel_dcasetting',
                'icon'    => 'system/modules/metamodels/assets/images/icons/dca_setting.png',
                'idparam' => 'pid'
            ),
        )
    ),
    'metapalettes' => array
    (
        'default' => array
        (
            'title' => array
            (
                'name',
                'isdefault'
            ),
            'view' => array
            (
                'panelLayout',
            ),
            'backend' => array
            (
                'rendertype',
                'backendcaption',
                'backendicon',
            ),
            'display' => array
            (
                'rendermode',
                'showColumns'
            ),
            'permissions' => array
            (
                'iseditable',
                'iscreatable',
                'isdeleteable',
            ),
        )
    ),
    'metasubselectpalettes' => array
    (
        'rendertype' => array
        (
            'standalone' => array
            (
                'backend after rendertype' => array('backendsection'),
            ),
            'ctable' => array
            (
                'backend after rendertype' => array('ptable'),
            )
        ),
        'rendermode' => array
        (
            'flat' => array
            (
                'display after rendermode' => array(),
            ),
            'parented' => array
            (
                'display after rendermode' => array(),
            )
        ),
    ),
    'fields'                => array
    (
        'name'           => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['name'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => array
            (
                'mandatory' => true,
                'maxlength' => 64,
                'tl_class'  => 'w50'
            )
        ),
        'isdefault'      => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['isdefault'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array
            (
                'maxlength' => 255,
                'tl_class'  => 'w50 m12 cbx'
            ),
        ),
        'rendertype'     => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['rendertype'],
            'inputType' => 'select',
            'reference' => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['rendertypes'],
            'eval'      => array
            (
                'tl_class'           => 'w50',
                'submitOnChange'     => true,
                'includeBlankOption' => true
            )
        ),
        'ptable'         => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['ptable'],
            'inputType' => 'select',
            'eval'      => array
            (
                'tl_class'           => 'w50',
                'submitOnChange'     => true,
                'includeBlankOption' => true
            )
        ),
        'rendermode' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['rendermode'],
            'inputType'               => 'select',
            'eval'                    => array
            (
                'tl_class'            => 'w50',
                'submitOnChange'      => true
            )
        ),
        'showColumns' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['showColumns'],
            'inputType'               => 'checkbox',
            'eval'                    => array
            (
                'tl_class'            => 'w50',
                'submitOnChange'      => true
            )
        ),
        'backendsection' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['backendsection'],
            'exclude'   => true,
            'inputType' => 'select',
            'reference' => &$GLOBALS['TL_LANG']['MOD'],
            'eval'      => array
            (
                'includeBlankOption' => true,
                'valign'             => 'top',
                'chosen'             => true,
                'tl_class'           => 'w50'
            ),
        ),
        'backendicon'    => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['backendicon'],
            'exclude'   => true,
            'inputType' => 'fileTree',
            'eval'      => array
            (
                'fieldType'  => 'radio',
                'files'      => true,
                'filesOnly'  => true,
                'extensions' => 'jpg,jpeg,gif,png,tif,tiff',
                'tl_class'   => 'clr'
            )
        ),
        'backendcaption' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['backendcaption'],
            'exclude'   => true,
            'inputType' => 'multiColumnWizard',
            'eval'      => array
            (
                'tl_class'     => 'clr',
                'columnFields' => array
                (
                    'langcode'    => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['becap_langcode'],
                        'exclude'   => true,
                        'inputType' => 'select',
                        'options'   => array_flip(array_filter(array_flip($this->getLanguages()), function ($langCode) {
                            // Disable >2 char long language codes for the moment.
                            return (strlen($langCode) == 2);
                        })),
                        'eval'      => array
                        (
                            'tl_class' => 'clr',
                            'style'    => 'width:200px',
                            'chosen'   => 'true'
                        )
                    ),
                    'label'       => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['becap_label'],
                        'exclude'   => true,
                        'inputType' => 'text',
                        'eval'      => array
                        (
                            'style' => 'width:180px',
                        )
                    ),
                    'description' => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['becap_description'],
                        'exclude'   => true,
                        'inputType' => 'text',
                        'eval'      => array
                        (
                            'style' => 'width:200px',
                        )
                    ),
                ),
            )
        ),
        'panelLayout'    => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['panelLayout'],
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => array
            (
                'tl_class' => 'clr long wizard',
            ),
        ),
        'iseditable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['iseditable'],
            'inputType'               => 'checkbox',
            'eval'                    => array
            (
                'tl_class'            => 'w50 m12 cbx',
            )
        ),
        'iscreatable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['iscreatable'],
            'inputType'               => 'checkbox',
            'eval'                    => array
            (
                'tl_class'            => 'w50 m12 cbx',
            )
        ),
        'isdeleteable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_metamodel_dca']['isdeleteable'],
            'inputType'               => 'checkbox',
            'eval'                    => array
            (
                'tl_class'            => 'w50 m12 cbx',
            )
        )
    )
);
