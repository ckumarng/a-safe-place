<?php

class RandomNumber extends AppModel {
    var $first = 'first';
    var $second = 'second';

    var $name = 'RandomNumber';
   // var $hasMany = array( 'MyRecipe' => array('className'  => 'RandomNumber'  )  );
   // var $hasAndBelongsToMany = array('MemberOf' => 'Study');


    public function fill_table( $numberOfTables = 100 ){
        debug('You found me!');
            for( $i = 0; $i < $numberOfTables; $i++ ) {
                echo '.';
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
}
?>
