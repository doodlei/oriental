<?php
/**
 * Designs the form using FormDesigner
 * call this class to your page
 * 
 * Description eg. $form = new FormDesigner();
 * 
 * call method to your page eg. $form->html_textarea();
 * 
 * @author Samrat Khan <michi.andreoli@gmail.com>
 * @name Formdesigner.php
 * @version 0.1
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package FormDesigner
 */
class FormDesigner {
    /**
     * 
     * @param string $name Textarea Name. Use eg. name="example"
     * @param string $value  Textarea value. Use eg. value="Example"
     * @param int $cols Textarea cols with default 40. Use eg. cols="40"
     * @param int $rows Textarea rows with default 5. Use eg. rows="5"
     * @return string Return textarea to the form
     */
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
    /**
     * 
     * @param string $name Hidden field name. Use eg. name="example"
     * @param string $value Hidden field value. Use eg. value="example"
     * @return string Return the hidden field
     */
    function html_input_hidden($name, $value) {
        $buf = '<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '">';
        return $buf;
    }
    /**
     * 
     * @global string $state
     * @param string $name
     * @param string $value
     * @param boolean $checked
     * @return string
     */
    function html_input_radio($name, $value, $checked = FALSE) {
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
    /**
     * 
     * @param string $name
     * @param string $value
     * @param boolean $checked
     * @return string
     */
    function html_input_checkbox($name, $value, $checked = FALSE) {
        $tmp = '';
        if ($checked)
            $tmp = ' checked';
        $buf = '<input type="checkbox" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '"' . $tmp . '>';
        return $buf;
    }
    /**
     * 
     * @param string $name
     * @param string $value
     * @param string $class
     * @param string $id
     * @return string
     */
    function html_input_text($name, $value = '', $class, $id) {
        $buf = '<input type="text" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" class="' . $class . '" id="' . $id . '">';
        return $buf;
    }
    /**
     * 
     * @param string $name
     * @param string $value
     * @param int $size
     * @param int $maxlength
     * @return string
     */
    function html_input_password($name, $value = '', $size = 20, $maxlength = 100) {
        if ($size > $maxlength)
            $size = $maxlength;
        if (strlen($value) > $maxlength)
            $value = substr($value, 0, $maxlength);
        $buf = '<input type="password" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" size="' . $size . '" maxlength="' . $maxlength . '">';
        return $buf;
    }
    /**
     * 
     * @param type $name
     * @param type $value
     * @return string
     */
    function html_input_submit($name = 'button', $value = ' GO ') {
        $buf = '<input type="submit" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '">';
        return $buf;
    }
    /**
     * 
     * @param string $value
     * @return string
     */
    function html_input_reset($value = ' CANCEL ') {
        $buf = '<input type="reset" value="' . htmlspecialchars($value) . '">';
        return $buf;
    }
    /**
     * 
     * @param string $name
     * @param string $value_description_array
     * @param string $value_selected
     * @param int $size
     * @param boolean $multiple
     * @return string
     */
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
    /**
     * 
     * @param type $name
     * @param type $value_description_array
     * @param type $value_selected
     * @param type $columns
     * @param type $table_border
     * @param type $cellspacing
     * @param type $cellpadding
     * @param string $other_table_string
     * @return string
     */
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
    /**
     * 
     * @param type $name
     * @param type $value_description_array
     * @param type $value_selected_array
     * @param type $columns
     * @param type $table_border
     * @param type $cellspacing
     * @param type $cellpadding
     * @param string $other_table_string
     * @return string
     */
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

    /*     * * Created by Samrat Khan ** */
    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $type
     * @param type $field_class
     * @param type $field_id
     * @param type $label_width_class
     * @param type $field_width_class
     * @param type $place_holder
     * @return string
     */
    function zontal_input_text($name, $value = '', $type, $field_class, $field_id, $label_width_class, $field_width_class = NULL, $place_holder = NULL) {
        $buf = '
            <div class="form-group">
            <label class="' . $label_width_class . ' control-label">' . $place_holder . '</label>
            <div class="' . $field_width_class . '">
                <input name="' . $name . '" value="' . $value . '" type="' . $type . '" class="' . $field_class . '" id="' . $field_id . '" placeholder="' . $place_holder . '">
            </div>
            </div>';
        return $buf;
    }
    /**
     * 
     * @param type $btn_name
     * @param type $btn_text
     * @param type $btn_box_width
     * @param type $btn_class
     * @return string
     */
    function zontal_submit_btn($btn_name, $btn_text, $btn_box_width, $btn_class) {
        $buf = '
            <div class="form-group">
                <div class="' . $btn_box_width . '">
                    <input name="' . $btn_name . '" type="submit" class="' . $btn_class . '" value="' . $btn_text . '">
                </div>
            </div>
            ';
        return $buf;
    }

}

?>
