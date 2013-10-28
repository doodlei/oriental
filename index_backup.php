<?php
function __autoload($class) {
    $path = strtolower($class);
    require_once './sketch/' . $path . '.php';
}

$user = new User();
$db = new Database();
$form = new FormDesigner();
$common = new StandAlone();

echo $form->html_input_text('name', 'nothing', 40, 30);
echo $common->smart_newline();
echo $form->html_textarea('description', '');

/** Class Function Printing **/
$user = new User();
$db = new Database();
$form = new FormDesigner();
$common = new StandAlone();

$class_methods = get_class_methods($form);
foreach ($class_methods as $class_method => $value) {
    echo '<pre dir="ltr" class="xdebug-var-dump">';
        echo $class_method;
            echo '<font color="#888a85">    =&gt;  </font><font color="#cc0000">';
        echo $value . '()</font></i>';
    echo '</pre>';
}

?>
