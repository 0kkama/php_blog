<?php
//
function extractFields(array $fields, array $target) : array {
        $result = [];
        foreach($fields as $field){
            $result[$field] = val($target[$field], 2);
            // $result[$field] = $target[$field];
        }
        return $result;
    }
