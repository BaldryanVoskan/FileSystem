<?php
function sortFunction ($items, $column = 'name', $type = SORT_ASC){
    // Sorting logic
    array_multisort( array_column($items, $column), (int)$type, $items );
    return $items;
}