<?php


function create_session($name = "", $data_arr)
{
    $_SESSION[$name.'medconencrypt'] = $data_arr;
}

function destroy_session($name)
{
    unset($_SESSION[$name.'medconencrypt']);
}

function generate_session($name = "", $defaultnull = "")
{
    if(isset($_SESSION[$name.'medconencrypt'])){
        if ($_SESSION[$name.'medconencrypt'] != "") {
            return $_SESSION[$name.'medconencrypt'];
        }else{
            return $defaultnull;
        }
    }else{
        if ($defaultnull != "") {
            return $defaultnull;
        }else{
            return "";
        }
    }
}

function iduser($name = "", $defaultnull = "")
{
    if(generate_session('loginid') != ''){
        return generate_session('loginid');
    }else{
        return '';
    }
}


function cek($data = [], $name = '')
{
    if(isset($data->$name)){
        return $data->$name;
    }else{
        return "";
    }
}
