<?php

	defined('APP') or die();

	class Router
	{

        private $uri;
        private $uri_trimmed;
        private $uri_items;
        private $routes;

        function __construct (Array $routes = []) {
            $this->uri = $_SERVER['REQUEST_URI'];
            $this->uri_trimmed = $this->utrim($this->uri);
            $this->uri_items = explode(' ', $this->uri_trimmed);

            if (is_array($routes)) {
                $this->routes = $routes;
            } else {
                $this->routes = [];
            }
        }

        private function utrim (String $string) {
			$string = strtolower($string);
			$string = str_ireplace('/', ' ', $string);
			$string = trim($string);

			return $string;
		}

        public function request_uri () {
			return $this->uri;
		}

		public function current_url () {
			return '/' . implode('/', $this->uri_items);
		}

		public function current_url_as_array () {
            return $this->uri_items;
        }

		public function current_has (String $url) {
			if (empty($url)) {
				return false;
			}

			$url = $this->utrim($url);

			if (strpos($this->uri_trimmed, $url) !== false) {
				return true;
			}

			return false;
		}

		public function is_current (String $url) {
			if (empty($url)) {
				return false;
			}

			$url = $this->utrim($url);

			if ($this->uri_trimmed == $url) {
				return true;
			}

			return false;
		}

        public function search (Array $conditions = [], String $attrib = null) {
            if (!is_array($this->routes) || empty($this->routes)) {
                return null;
            }

            if (!is_array($conditions) || empty($conditions)) {
                return null;
            }

            $result = [];

            foreach ($this->routes as $route) {
                $found = 0;

                foreach ($conditions as $key => $value) {
                    if (key_exists($key, $route) && $route[$key] == $value) {
                        $found++;
                    }
                }

                if (sizeof($conditions) == $found) {
                    if (empty($attrib)) {
                        $result[] = $route;
                    } elseif (key_exists($attrib, $route)) {
                        $result[] = $route[$attrib];
                    }
                }
            }

            return $result;
        }

        public function redirect (String $url) {
            header("location:$url");
            die();
        }

        public function set_routes (Array $routes = []) {
            if (!is_array($routes) || empty($routes)) {
                return false;
            }

            $this->routes = $routes;
        }

        public function add_route (Array $route = []) {
            if (!is_array($route) || empty($route)) {
                return false;
            }

            $this->routes[] = $route;
        }

        public function get_route_by_url (String $url) {
            if (empty($this->routes)) {
                return null;
            }

            if (empty($url)) {
                return null;
            }

            foreach ($this->routes as $route) {
                if ($route['route'] == $url) {
                    return $route;
                }
            }

            return null;
        }

        public function current_route () {
            return $this->get_route_by_url($this->current_url());
        }

	}
