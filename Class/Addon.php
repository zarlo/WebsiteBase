<?php


public class Addon
{

      //not my code//
//////////////////////////

$listeners = array();

/* Create an entry point for plugins */
public static function hook() {
    global $listeners;

    $num_args = func_num_args();
    $args = func_get_args();

    if($num_args < 2)
        trigger_error("Insufficient arguments", E_USER_ERROR);

    // Hook name should always be first argument
    $hook_name = array_shift($args);

    if(!isset($listeners[$hook_name]))
        return; // No plugins have registered this hook

    foreach($listeners[$hook_name] as $func) {
        $args = $func($args);
    }
    return $args;
}

/* Attach a function to a hook */
public static function add_listener($hook, $function_name) {
    global $listeners;
    $listeners[$hook][] = $function_name;
}

//////////////////////////

public static function LoadAddon($Addon)
{
  include "Addon/" . $Addon ."/Load.php";
}
}
 ?>
