<?php

class RandomNumber extends AppModel {
    var $first = 'first';
    var $second = 'second';
    var $name = 'RandomNumber';
   // var $hasMany = array( 'MyRecipe' => array('className'  => 'RandomNumber'  )  );
   // var $hasAndBelongsToMany = array('MemberOf' => 'Study');

    public function fill_table( $numberOfTables = 100 ){
        for( $i = 0; $i <= $numberOfTables; $i++ ) {
            $firstnum = rand(2, 9);
            $secondnum = rand(21, 99);

            $this->save(array (
                'RandomNumber' => array (
                    'id' => $i,
                    'first' => $firstnum,
                    'second' => $secondnum
                    )
                )
            );
        }
    }
    public function truncate(){
        $this->query('TRUNCATE table random_numbers;');
    }
    public function reset( $numberOfTables = 100 ){
        $this->truncate();
        $this->fill_table( $numberOfTables );
    }
    public function getNumbers( $qid ){
        // Only get what we need
       return $this->find('first', array(
                        'conditions' =>  array(
                            'RandomNumber.id' => $qid
                            ),
                        'fields' => array(
                            'RandomNumber.first',
                            'RandomNumber.second'
                            )
                        )
                    );
    }
}
?>
