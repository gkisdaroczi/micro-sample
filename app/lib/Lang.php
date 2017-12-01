<?php

	defined('APP') or die();

	class Lang
	{

        private $langs;
        private $current_lang;

        function __construct() {
            $this->langs = [];
            $this->current_lang = null;
        }

        public function init(Array $langs = [], String $current_lang = null) {
            if (!is_array($langs) || empty($langs)) {
                return false;
            }

            if (empty($current_lang)) {
                return false;
            }

            $this->langs = $langs;

            if (!empty($current_lang)) {
                $this->current_lang = $current_lang;
            }
        }

        public function set_langs (Array $langs = []) {
            if (!is_array($langs) || empty($langs)) {
                return false;
            }

            $this->langs = $langs;
        }

        public function langs (Bool $to_string  = false) {
            if (!is_array($this->langs) || empty($this->langs)) {
                return false;
            }

            $langs = [];

            foreach ($this->langs as $lang) {
                $langs[] = $to_string ? $lang['lang'] : $lang;
            }

            return $langs;
        }

        public function add_lang (Array $lang = []) {
            if (!is_array($lang) || empty($lang)) {
                return false;
            }

            $this->langs[] = $lang;
        }

        public function set_current_lang (String $current_lang = null) {
            $this->current_lang = $current_lang;
        }

        public function current_lang () {
            if (!is_array($this->current_lang) || empty($this->current_lang)) {
                return false;
            }

            return $this->current_lang;
        }

        public function other_langs (Bool $to_string  = false) {
            if (!is_array($this->langs) || empty($this->langs) || empty($this->current_lang)) {
                return false;
            }

            if (sizeof($this->langs) < 2) {
                return $this->langs[0];
            }

            $langs = [];

            foreach ($this->langs as $lang) {
                if ($lang['lang'] != $this->current_lang) {
                    $langs[] = $to_string ? $lang['lang'] : $lang;
                }
            }

            return $langs;
        }

    }
