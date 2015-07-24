<?php
/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 *
 * @package    MetaModels
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Andreas Isaak <info@andreas-isaak.de>
 * @author     David Maack <david.maack@arcor.de>
 * @author     Oliver Hoff <oliver@hofff.com>
 * @author     Stefan Heimes <stefan_heimes@hotmail.com>
 * @author     Alexander Menk <a.menk@imi.de>
 * @copyright  The MetaModels team.
 * @license    LGPL.
 * @filesource
 */

$GLOBALS['TL_DCA']['tl_metamodel_rendersettings'] = array
(
    'config'       => array
    (
        'dataContainer'    => 'General',
        'ptable'           => 'tl_metamodel',
        'ctable'           => 'tl_metamodel_rendersetting',
        'switchToEdit'     => false,
        'enableVersioning' => false,
    ),
    'dca_config'   => array
    (
        'data_provider'  => array
        (
            'parent' => array
            (
                'source' => 'tl_metamodel'
            )
        ),
        'childCondition' => array
        (
            array(
                'from'    => 'tl_metamodel',
                'to'      => 'tl_metamodel_rendersettings',
                'setOn'   => array
                (
                    array(
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
        'child_list'     => array
        (
            'tl_metamodel_rendersettings' => array
            (
                'fields' => array
                (
                    'type',
                    'attr_id',
                    'urlparam',
                    'comment'
                ),
                'format' => '%s %s',
            ),
        ),
    ),
    'list'         => array
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
            )
        ),
        'operations'        => array
        (
            'edit'     => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
            ),
            'copy'     => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['copy'],
                'href'  => 'act=copy',
                'icon'  => 'copy.gif'
            ),
            'delete'   => array
            (
                'label'      => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => sprintf(
                    'onclick="if (!confirm(\'%s\')) return false; Backend.getScrollOffset();"',
                    $GLOBALS['TL_LANG']['MSC']['deleteConfirm']
                )
            ),
            'show'     => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['show'],
                'href'  => 'act=show',
                'icon'  => 'show.gif'
            ),
            'settings' => array
            (
                'label'   => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['settings'],
                'href'    => 'table=tl_metamodel_rendersetting',
                'icon'    => 'system/modules/metamodels/assets/images/icons/rendersetting.png',
                'idparam' => 'pid'
            ),
        )
    ),
    'metapalettes' => array
    (
        'default' => array
        (
            'title'   => array
            (
                'name',
                'isdefault'
            ),
            'general' => array
            (
                'template',
                'format',
                'jumpTo'
            ),
            'expert'  => array
            (
                'hideEmptyValues',
                'hideLabels',
            ),
            'view'    => array
            (
                'additionalCss',
                'additionalJs'
            )
        ),
    ),
    'fields'       => array
    (
        'name'            => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['name'],
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => array
            (
                'mandatory' => true,
                'maxlength' => 255,
                'tl_class'  => 'w50'
            )
        ),
        'isdefault'       => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['isdefault'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array
            (
                'tl_class' => 'm12 w50 cbx'
            ),
        ),
        'hideEmptyValues' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['hideEmptyValues'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array
            (
                'tl_class' => 'w50'
            )
        ),
        'hideLabels'      => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['hideLabels'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array
            (
                'tl_class' => 'w50'
            )
        ),
        'template'        => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['template'],
            'default'   => 'metamodel_prerendered',
            'exclude'   => true,
            'inputType' => 'select',
            'eval'      => array
            (
                'includeBlankOption' => true,
                'tl_class'           => 'w50',
                'mandatory'          => true,
                'chosen'             => true
            )
        ),
        'format'          => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['format'],
            'exclude'   => true,
            'inputType' => 'select',
            'options'   => array
            (
                'html5',
                'xhtml',
                'text'
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['formatOptions'],
            'eval'      => array
            (
                'includeBlankOption' => true,
                'tl_class'           => 'w50',
                'chosen'             => true
            )
        ),
        'jumpTo'          => array
        (
            'label'          => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['jumpTo'],
            'exclude'        => true,
            'minCount'       => 1,
            'maxCount'       => 1,
            'disableSorting' => '1',
            'inputType'      => 'multiColumnWizard',
            'eval'           => array
            (
                'style'        => 'width:100%;',
                'columnFields' => array
                (
                    'langcode' => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['jumpTo_language'],
                        'exclude'   => true,
                        'inputType' => 'justtextoption',
                        'options'   => array
                        (
                            'xx' => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['jumpTo_allLanguages']
                        ),
                        'eval'      => array
                        (
                            'valign' => 'center'
                        )
                    ),
                    'value'    => array(
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['jumpTo_page'],
                        'exclude'   => true,
                        'inputType' => 'text',
                        // TODO: change callbacks to event handlers.
                        'wizard'    => array
                        (
                            array('MetaModels\Dca\RenderSettings', 'pagePicker')
                        ),
                        'eval'      => array
                        (
                            'style' => 'width:317px;'
                        )
                    ),
                    'filter'   => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['jumpTo_filter'],
                        'exclude'   => true,
                        'inputType' => 'select',
                        'eval'      => array
                        (
                            'style'              => 'width:200px;',
                            'includeBlankOption' => true,
                            'chosen'             => true
                        )
                    ),
                ),
                'buttons'      => array
                (
                    'copy'   => false,
                    'delete' => false,
                    'up'     => false,
                    'down'   => false
                ),
                'tl_class'     => 'clr clx',
            )
        ),
        'additionalCss'   => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['additionalCss'],
            'exclude'   => true,
            'inputType' => 'multiColumnWizard',
            'eval'      => array
            (
                'style'        => 'width:100%;',
                'columnFields' => array
                (
                    'file'      => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['file'],
                        'exclude'   => true,
                        'inputType' => 'select',
                        'eval'      => array
                        (
                            'style'              => 'width:515px;',
                            'chosen'             => true,
                            'includeBlankOption' => true
                        )
                    ),
                    'published' => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['publish'],
                        'exclude'   => true,
                        'inputType' => 'checkbox',
                        'eval'      => array
                        (
                            'style' => 'width:40px;'
                        )
                    ),
                )
            )
        ),
        'additionalJs'    => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['additionalJs'],
            'exclude'   => true,
            'inputType' => 'multiColumnWizard',
            'eval'      => array(
                'style'        => 'width:100%;',
                'columnFields' => array
                (
                    'file'      => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['file'],
                        'exclude'   => true,
                        'inputType' => 'select',
                        'eval'      => array
                        (
                            'style'              => 'width:515px;',
                            'chosen'             => true,
                            'includeBlankOption' => true
                        )
                    ),
                    'published' => array
                    (
                        'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['publish'],
                        'exclude'   => true,
                        'inputType' => 'checkbox',
                        'eval'      => array
                        (
                            'style' => 'width:40px;'
                        )
                    ),
                )
            )
        ),
    ),
);