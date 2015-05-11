<?php

require_once 'Ants.php';

class MyBot
{
    private $directions = array('n','e','s','w');

    public function doTurn( $ants ){

    $count=0;
    $count2 = 0; 
    echo "\n\ncurrent count: $count\n\n"; 
    $destinations = array();
        $closest_target = null;
        foreach ( $ants->myAnts as $ant ) {
            list ($aRow, $aCol) = $ant;
            foreach ($this->directions as $direction) {
                list($dRow, $dCol) = $ants->destination($aRow, $aCol, $direction);
                if ($ants->passable($dRow, $dCol)) {

                    if( $count2 > 5) {
                    $count2 = $count2 + 1;
                    $ants->issueOrder($aRow, $aCol, $direction);
                    break;

                } else if ($count < 4){
                    $count= $count+1;
                 echo "\nborked\n";
                    $ants->issueOrder($aRow, $aCol,'s');
                    break;

                }else if($count < 10 && $count > 4){
                    $count= $count+1;
                    echo "\nborked2\n ";
                    $ants->issueOrder($aRow, $aCol,'e');
                    break;
                }else{
               $count2 = 0;
               $count = 0;
                    break;   
                }
                }


                if ($closest_target === null) {
                # no target found, mark ant as not moving so we don't run into it
                $destinations []= $ant;
                continue;
            }




            }
        }
    }
    
}

/**
 * Don't run bot when unit-testing
 */
if( !defined('PHPUnit_MAIN_METHOD') ) {
    Ants::run( new MyBot() );
}