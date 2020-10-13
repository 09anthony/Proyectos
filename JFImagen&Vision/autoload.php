<?php

function autoload($clases){
    include 'Controlador/'.$clases.'.php';
   
}
spl_autoload_register("autoload");
    