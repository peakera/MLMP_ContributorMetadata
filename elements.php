<?php

$elementSetMetadata = array(
        'name' => 'Contributor Information',
        'description' => "Stores information about the contributor of an item. To be used in conjunction with the 'contribution' plugin",
        'record_type' => 'Item'
    );

$elements = array(
    array(
        'label' => 'Contributor Name',
        'name' => 'Contributor Name',
        'description' => 'Name of the  contributer'
    ),
    
    array(
        'label' => 'Military Branch',
        'name' => 'Military Branch',
        'description' => 'Branch of the military affiliated with the item'
    ),

    array(
        'label' => 'Military Status',
        'name' => 'Military Status',
        'description' => 'Status in the military associated with the item'
    ),
    
    array(
        'label' => 'Contributor Age',
        'name' => 'Contributor Age',
        'description' => 'Age of the contributer'
    ),
    
    array(
        'label' => 'Contributor Ethnicity',
        'name' => 'Contributor Ethnicity',
        'description' => 'Ethnicity or race of the contributer'
    ),
     
     array(
        'label' => 'Contributor Gender',
        'name' => 'Contributor Gender',
        'description' => 'Gender of the contributer'
    )
 );
 
 ?>