<?php

class DatabaseHelper {

    /*
    *   Filter: using hole sentence or spezific word.
    */
    public function searchFor($values, $table, $column) {
        $set = $this->db->from($table);

        if ($this->checkSyntax($values) === true) {
            # query hole sentence            
            $sentence = $this->getSentence($values);
            $set->where($set->expr()->eq($column, $sentence));
        } else {
            # query word by word
            $arraySize2 = count($values);
            $set->where($set->expr()->eq($column, $value[0]));
            for ($i = 1; $i < $arraySize; $i++) { 
                $set->where($set->expr()->eq($column, $value[$i]));
            }        
        }

        return $set->execute()->fetchAll();
    }

    /*
    *   If value begins with inverted comma, the value is a sentence.
    */
    public function checkSyntax($values) {
        if (preg_match('/"/', $values[0]))
            return true;
        else
            return false;
    }

    /*
    *   Get words between inverted commas.
    */ 
    public function getSentence($value) {
        $expresion = '(\"[\w\s]+\")';

        if(preg_match($expresion, $value, $match)) {
            return str_replace('"', '', $match[0]);
        } else {
            throw new Exception("Regex filter error.");
        }
    }
}