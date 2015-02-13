<?php
$dictionary['dashlet_storage'] = array(
    'table'     => 'dashlet_storage',
    'fields'    => array(
        array(
            'name'  => 'id',
            'type'  => 'varchar',
            'len'   => 36
        ),
        array(
            'name'  => 'user_id',
            'type'  => 'varchar',
            'len'   => 36
        ),
        array(
            'name'  => 'title',
            'type'  => 'varchar',
            'len'   => 100
        ),
        array(
            'name'  => 'data',
            'type'  => 'text'
        )
    ),
    'indices' => array(
        array('name' => 'dashlet_storage_pri', 'type' => 'primary', 'fields' => array('id')),
        array('name' => 'dashlet_storage_idx', 'type' => 'index', 'fields' => array('user_id'))
    )
);