<?php

	defined('APP') or die();

	class View
	{

		static function load($template = '', $variables = [], $extension = 'php') {
			if (empty($template)) {
				// missing template
				print ('missing template');

				return false;
			}

			$file = APP . '/view/' . $template . '.' . $extension;

			if (!file_exists($file)) {
				// missing file
				print ('missing file');

				return false;
			}

			if (!empty($variables)) {
				extract($variables);
			}

			include ($file);
		}

	}

	function _p($text = null, $plus = null) {
		if (empty($text)) {
			return false;
		}

		if (!empty($plus)) {
			$text = sprintf($plus, $text);
		}

		return $text;
	}
