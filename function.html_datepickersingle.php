<?php

/**
 * This plugin was based on datepicker by Smarty but
 * the difference between both datepicker and datepickersingle
 * are with the datepickersingle you can make datepicker with both
 * multiple fields and calling the function just one time also you 
 * can change the skin using $template.
 * How to use : on .tpl file call {datepickerone fields="field1,field2,field3" pathSkinImages=""}
 * @author			Matheus Marabesi <matheus.marabesi@gmail.com>
 * @version			1.0
 * @package			Smarty
 * @subpackage			PluginsFunction
 */

/**
 * 
 * Return a datepicker to a given fields through the
 * function. This function is recommended to the people
 * who needs a datepicker jQuery plugin more than two fields.
 * @param	string		$params		String with the html ids of text field
 * @param 	Smarty		$smarty		A Smarty instance (just for the Smarty, don't pass anything)
 * @param 	string		$template	theme wanted
 */
function smarty_function_datepickersingle($params, &$smarty, $template) 
{
	$pathSkinImages = $params['pathSkinImages'];
	$fields = $params['fields'];

	$string = '';
	// wheter some string was send
	if ( strlen($fields) )
	{	
		$array = explode(',', $fields);
		if ( is_array($array) )
		{
			foreach ( $array as $key => $value )
			{
				// check it out whether is the last element of array to not add the comma
				if ( $value == end($array) )
				{
					$string .= '#' . $value;
				}
				else
				{
					$string .= '#' . $value . ',';
				}
			}
		}
		else
		{
			$string = '#' . $fields;
		}
	}
	else
	{
		$string = 'null';
	}
		
    $retval = <<< EOF
	<script type="text/javascript">

		$(document).ready(function(){

			include_css('skins/gde/css/', 'jquery-ui-1.8.4.custom.css');

			include_js('js/jquery/ui/', 'jquery.ui.core.js');
			include_js('js/jquery/', 'jquery.ui.datepicker.custom.js');
			include_js('js/jquery/ui/i18n/', 'jquery-ui-i18n.js');

			var dates = $( "{$string}" ).datepicker({
				showOn: 'both',
				buttonImage: '{$pathSkinImages}calendar.png',
				buttonImageOnly: true,
				changeMonth: true,
				changeYear: true,
				numberOfMonths: 1
			});
		});
		jQuery(function($){
		    var language = '{$smarty->getLang()->getLocale()}';
			$.datepicker.setDefaults( $.datepicker.regional[language] );
		});
	</script>
EOF;
    return $retval;
}
?>
