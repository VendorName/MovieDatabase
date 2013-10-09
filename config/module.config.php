<?php
return array(
    'router' => array(
        'routes' => array(
            'VendorName\MovieDatabase\List' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/app/:locale/movies',
                    'defaults' => array(
                        'controller' => 'VendorName\MovieDatabase\Controller\List',
                        'action' => 'index'
                    )
                )
            ),
            'VendorName\MovieDatabase\Movie' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/app/:locale/movie/:title/:year',
                    'defaults' => array(
                        'controller' => 'VendorName\MovieDatabase\Controller\Movie',
                        'action' => 'index'
                    )
                )
            ),
            'VendorName\MovieDatabase\Admin\Movie\List' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/app/:locale/admin/movies',
                    'defaults' => array(
                        'controller' => 'VendorName\MovieDatabase\Controller\AdminList',
                        'action' => 'list'
                    )
                )
            ),
            'VendorName\MovieDatabase\Admin\Movie\Edit' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/app/:locale/admin/movie/:title/:year/edit',
                    'defaults' => array(
                        'controller' => 'VendorName\MovieDatabase\Controller\AdminEdit',
                        'action' => 'edit'
                    )
                )
            ),
            'VendorName\MovieDatabase\Admin\Movie\Delete' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/app/:locale/admin/movie/:title/:year/delete',
                    'defaults' => array(
                        'controller' => 'VendorName\MovieDatabase\Controller\AdminDelete',
                        'action' => 'delete'
                    )
                )
            ),
            'VendorName\MovieDatabase\Admin\Movie\Create' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/app/:locale/admin/movie/create',
                    'defaults' => array(
                        'controller' => 'VendorName\MovieDatabase\Controller\AdminEdit',
                        'action' => 'edit'
                    )
                )
            ),
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'VendorName\MovieDatabase\Controller\List' => 'VendorName\MovieDatabase\Controller\ListController',
            'VendorName\MovieDatabase\Controller\Movie' => 'VendorName\MovieDatabase\Controller\MovieController',
            'VendorName\MovieDatabase\Controller\AdminList' => 'VendorName\MovieDatabase\Controller\AdminListController',
            'VendorName\MovieDatabase\Controller\AdminEdit' => 'VendorName\MovieDatabase\Controller\AdminEditController',
            'VendorName\MovieDatabase\Controller\AdminDelete' => 'VendorName\MovieDatabase\Controller\AdminDeleteController',
            'VendorName\MovieDatabase\Controller\AdminCreate' => 'VendorName\MovieDatabase\Controller\AdminCreateController'
        )
    ),
    // Add view dir to the view manager
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    // Add translation dir to the translator
    'translator' => array(
        'translation_file_patterns' => array(
            'tag' => array(
                'type' => 'phpArray',
                'base_dir' => __DIR__ . '/../languages/movieDatabase',
                'pattern' => '%s.php',
                'text_domain' => 'movieDatabase'
            )
        )
    ),
    'modules' => array(
        'Grid\Core' => array(
            'navigation' => array(
                'content' => array(
                    'pages' => array(
                        'movie-database'      => array(
                            'order'         => 100,
                            'label'         => 'movieDatabase.admin.menu.movieDatabaseList',
                            'textDomain'    => '',
                            'route'         => 'VendorName\MovieDatabase\Admin\Movie\List',
                            'resource'      => 'uri',
                            'privilege'     => 'view',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'form' => array(
        'VendorName\MovieDatabase\Movie' => array(
            'elements' => array(
                'title' => array(
                    'spec' => array(
                        'type' => 'Zork\Form\Element\Text',
                        'name' => 'title',
                        'options' => array(
                            'label' => 'movieDatabase.meta-content.list.thead.title',
                            'required' => true,
                        )
                    )
                ),
                'releaseDate' => array(
                    'spec' => array(
                        'type' => 'Zork\Form\Element\Date',
                        'name' => 'releaseDate',
                        'options' => array(
                            'label' => 'movieDatabase.meta-content.list.thead.releaseDate',
                            'required' => true,
                        )
                    )
                ),
                'imdbId' => array(
                    'spec' => array(
                        'type' => 'Zork\Form\Element\Text',
                        'name' => 'imdbId',
                        'options' => array(
                            'label' => 'movieDatabase.meta-content.list.thead.imdbId',
                            'required' => true,
                        )
                    )
                ),
                'create' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Submit',
                        'name'  => 'create',
                        'attributes'    => array(
                            'value'     => 'submit',
                        ),
                    ),
                    'flags' => array(
                        'priority' => -1000,
                    ),
                ),
            )
        ),
    ),
    'form' => array(
        'VendorName\MovieDatabase\Movie' => array(
            'elements' => array(
                'title' => array(
                    'spec' => array(
                        'type' => 'Zork\Form\Element\Text',
                        'name' => 'title',
                        'options' => array(
                            'label' => 'movieDatabase.field.title.label',
                            'required' => true,
                        )
                    )
                ),
                'releaseDate' => array(
                    'spec' => array(
                        'type' => 'Zork\Form\Element\Text',
                        'name' => 'releaseYear',
                        'options' => array(
                            'label' => 'movieDatabase.field.releaseYear.label',
                            'required' => true,
                        )
                    )
                ),
                'create' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Submit',
                        'name'  => 'create',
                        'attributes'    => array(
                            'value'     => 'submit',
                        ),
                    ),
                    'flags' => array(
                        'priority' => -1000,
                    ),
                ),
            )
        ),
    )
);
