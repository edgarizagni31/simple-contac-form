'use strict';

const alertSucces = document.getElementById('alertSuccess');

if ( alertSucces ) {
    setTimeout( () => {
        alertSucces.remove();
    }, 2000 );
}
 