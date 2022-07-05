<?php
function year_check( $my_year ) {
    if ( $my_year % 400 == 0 ) {
        echo( "<b>It is a leap year</b>" );
    } else if ( $my_year % 100 == 0 ) {
        echo( "<b>It is not a leap year</b>" );
    } else if ( $my_year % 4 == 0 ) {
        echo( "<b>It is a leap year</b>" );
    } else {
        echo( "<b>It is not a leap year</b>" );
    }
}

function singHappyBirthday( $nm ) {
    for ( $i = 0; $i < 4; $i ++ ) {
        printf( "Happy birthday %s!\n", ( 2 === $i ) ? "dear {$nm}" : "to you" );
    }
}
