<?php

/**
 * @author Samrat Khan
 * @author Zorj
 * Oct 23, 2013 - 3:08:24 PM
 */
class FormDesigner {

    function html_textarea($name, $value = '', $cols = 40, $rows = 5) {
        /**  wrap="virtual" is not part of any W3C HTML standard; at least 
         * *  up to 4.01, but nearly any decent browser knows it, and if 
         * *  it doesn't oh well.   It is too nice to not include here and does
         * *  not seem to break anywhere. * */
        $buf = '<textarea wrap="virtual" name="' . htmlspecialchars($name) . '" rows="' . $rows . '" cols="' . $cols . '">'
                . htmlspecialchars($value)
                . '</textarea>';
        return $buf;
    }

    function html_input_hidden($name, $value) {
        $buf = '<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '">';
        return $buf;
    }

    function html_input_radio($name, $value, $checked = FALSE) {
        /**  The following allows for making sure that no two radio buttons
         * *  of the same name can ever be checked.  Once one is checked, no
         * *  subsequent ones will be allowed to be checked.  I used md5 just because it
         * *  produces a unique hash where all characters are valid for this specific 
         * *  variable name in PHP and which is then made into a global variable
         * *  which is where the state gets saved.  
         * *  ChangeLog.  
         * *  Had to use 'global' instead of static.  Static was erroring out 
         * *  for some reason.  * */
        $namesum = md5($name);
        $state = 'radio_' . $namesum;
        global $$state;
        $tmp = '';
        if ($checked && !$$state) {
            $$state = TRUE;
            $tmp = ' checked';
        }
        $buf = '<input type="radio" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '"' . $tmp . '>';
        unset($tmp);
        unset($state);
        return $buf;
    }

    function html_input_checkbox($name, $value, $checked = FALSE) {
        $tmp = '';
        if ($checked)
            $tmp = ' checked';
        $buf = '<input type="checkbox" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '"' . $tmp . '>';
        return $buf;
    }

    function html_input_text($name, $value = '', $class, $id) {
        $buf = '<input type="text" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" class="' . $class . '" id="' . $id . '">';
        return $buf;
    }

    function html_input_password($name, $value = '', $size = 20, $maxlength = 100) {
        if ($size > $maxlength)
            $size = $maxlength;
        if (strlen($value) > $maxlength)
            $value = substr($value, 0, $maxlength);
        $buf = '<input type="password" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" size="' . $size . '" maxlength="' . $maxlength . '">';
        return $buf;
    }

    function html_input_submit($name = 'button', $value = ' GO ') {
        $buf = '<input type="submit" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '">';
        return $buf;
    }

    function html_input_reset($value = ' CANCEL ') {
        $buf = '<input type="reset" value="' . htmlspecialchars($value) . '">';
        return $buf;
    }

    function html_select($name, $value_description_array, $value_selected = '', $size = 1, $multiple = FALSE) {
        $num_elements = count($value_description_array);
        if ($size > $num_elements)
            $size = $num_elements;
        $mul = '';
        if ($multiple)
            $mul = ' multiple';
        $buf = '<select name="' . htmlspecialchars($name) . '" size="' . $size . '"' . $mul . '>' . "\n";
        /**  make sure tmp[0] exists and is NULL, 
         * *  needed for this to work corectly * */
        $tmp[''] = '';

        if (is_array($value_selected) && count($value_selected))
            while (list($key_tmp, $v) = each($value_selected))
                $tmp[$v] = ' selected';
        else
            $tmp[$value_selected] = ' selected';

        /**  Using error_reporting() here is a 
         * *  hack to make sure printing out $tmp[unset] doesn't bitch.  
         * *  Doing it this way is much quicker than doing a compare each 
         * *  time through the loop * */
        $orig_error = error_reporting(0);
        while (list($key, $val) = each($value_description_array))
            $buf .= '  <option value="' . htmlspecialchars($key) . '"' . $tmp[$key] . '>' . $val . "\n";
        error_reporting($orig_error);
        unset($tmp);
        unset($orig_error);
        unset($mul);
        $buf .= '</select>';
        return $buf;
    }

    function html_input_radio_table($name, $value_description_array, $value_selected, $columns = 3, $table_border = 0, $cellspacing = 0, $cellpadding = 2, $other_table_string = '') {
        $num_records = count($value_description_array);
        if (!$num_records)
            return '';

        $height = ceil($num_records / $columns);

        if (strlen($other_table_string))
            $other_table_string = ' ' . trim($other_table_string);

        $buf = '<table cellspacing="' . $cellspacing . '" cellpadding="' . $cellpadding . '" border="' . $table_border . '"' . $other_table_string . '>' . "\n";

        for ($y = 1; $y <= $height; $y++) {
            $buf .= '<tr>';
            for ($x = 1; $x <= $columns; $x++) {
                $count++;

                list($key, $val) = each($value_description_array);

                if (strlen($key)) {
                    $er = error_reporting(0);

                    $checked = FALSE;
                    if ($value_selected == $key)
                        $checked = TRUE;


                    $buf .= '<td valign="top">' . html_input_radio($name, $key, $checked) . '&nbsp;</td><td valign="top">' . $val . '&nbsp;&nbsp;&nbsp;</td>';

                    error_reporting($er);
                }
                else
                    $buf .= '<td colspan="2">&nbsp;</td>';
            }
            $buf .= '</tr>' . "\n";
        }
        $buf .= '</table>';
        return $buf;
    }

    function html_input_checkbox_table($name, $value_description_array, $value_selected_array, $columns = 3, $table_border = 0, $cellspacing = 0, $cellpadding = 2, $other_table_string = '') {
        $num_records = count($value_description_array);
        if (!$num_records)
            return '';

        $height = ceil($num_records / $columns);

        if (strlen($other_table_string))
            $other_table_string = ' ' . trim($other_table_string);

        $buf = '<table cellspacing="' . $cellspacing . '" cellpadding="' . $cellpadding . '" border="' . $table_border . '"' . $other_table_string . '>' . "\n";

        for ($y = 1; $y <= $height; $y++) {
            $buf .= '<tr>';
            for ($x = 1; $x <= $columns; $x++) {
                $count++;

                list($key, $val) = each($value_description_array);

                if (strlen($key)) {
                    $er = error_reporting(0);

                    $checked = FALSE;
                    if (in_array($key, $value_selected_array))
                        $checked = TRUE;

                    $buf .= '<td valign="top">' . html_input_checkbox($name, $key, $checked) . '&nbsp;</td><td valign="top">' . $val . '&nbsp;&nbsp;&nbsp;</td>';

                    error_reporting($er);
                }
                else
                    $buf .= '<td colspan="2">&nbsp;</td>';
            }
            $buf .= '</tr>' . "\n";
        }
        $buf .= '</table>';
        return $buf;
    }

}

?>
