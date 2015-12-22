<?php

if (isset($_GET['id'])){
    if ($_GET['id']==1){
        echo "Hello Earth";
    }
    elseif ($_GET['id']==2){
        echo "Hello Mars";
    }
    elseif ($_GET['id']==3){
        echo "Hello Uranus";
    }
    else{
        echo "No idea of where you want to go";
    }
}