<?php
return ['genieacs'=>[
 'url'=>env('GENIEACS_NBI_URL'),
 'username'=>env('GENIEACS_USERNAME'),
 'password'=>env('GENIEACS_PASSWORD'),
 'timeout'=>(int)env('GENIEACS_TIMEOUT',15),
]];
