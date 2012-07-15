<?php

class RandomNumber extends AppModel {
    var $first = 'first';
    var $second = 'second';

    public function RandomNumber(){

    }

    public function fill_table( $numberOfTables = 100 ){

            for( $i = 0; $i < $numberOfTables; $i++ ) {
                $firstnum = rand(1, 9);
                $secondnum = rand(21, 99);

                $this->save(array (
                    'RandomNumber' => array (
                        'first' => $firstnum,
                        'second' => $secondnum
                        )
                    )
                );
            }
    }
    public function truncate(){
        $this->query('TRUNCATE table;');
    }
    public function reset( $numberOfTables = 100 ){
        $this->truncate();
        $this->fill_table( $numberOfTables );
    }
}
?>
