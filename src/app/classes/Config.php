<?php
	
	class Config {

		private $_db,
				$_settings;

		public static function get($path = null){
			if($path){
				$config = $GLOBALS['config'];
				$path = explode('/', $path);

				foreach($path as $bit){
					if(isset($config[$bit])){
						$config = $config[$bit];
					}
				}

				return $config;
			}

			return false;
		}

		public static function getDBSetting($path = null) {
			if($path) {
				$db = DB::getInstance();

				$path = explode('/', $path);
				$config = $db->get('config', array('setting_name', '=', $path[0]));
				$config = $config->first()->setting_value;
				$settings = json_decode($config, true);

				foreach($path as $bit){
					if(isset($settings[$bit])){
						$settings = $settings[$bit];
					}
				}

				return $settings;
			}
			return false;
		}

		public static function getDBActiveSetting($path = null) {
			if($path) {
				$db = DB::getInstance();

				$path = explode('/', $path);
				$config = $db->get('config', array('setting_name', '=', $path[0]));
				$config = $config->first()->setting_value;
				$settings = json_decode($config, true);
				$settings = $settings[$path[0]];
				$keys = array_keys($settings);

				$x = 0;
				$activeSetting = null;
				foreach ($settings as $setting) {
					if($setting == 1 | $setting = "true")
					{
						$activeSetting = $keys[$x];
					}

					$x++;
				}

				if (!$activeSetting)
					return false;

				return $activeSetting;
			}
			return false;
		}

		public static function getDBSettings($path = null) {
			if($path) {
				$db = DB::getInstance();

				$path = explode('/', $path);
				$config = $db->get('config', array('setting_name', '=', $path[0]));
				$config = $config->results()[0]->setting_value;
				$settings = json_decode($config, true);
				$settings = $settings[$path[0]];

				return $settings;
			}
			return false;
		}

		public static function getDBSiteContent($path = null) {
			if($path) {
				$db = DB::getInstance();

				$path = explode('/', $path);
				$config = $db->get('config', array('setting_name', '=', 'site_content'));
				$config = $config->results()[0]->setting_value;
				$settings = json_decode($config, true);
				$settings = $settings[$path[0]];

				return $settings;
			}
			return false;
		}

		public static function getDBSiteContentAll() {
			$db = DB::getInstance();

			$config = $db->get('config', array('setting_name', '=', 'site_content'));
			$config = $config->results()[0]->setting_value;
			$settings = json_decode($config, true);

			return $settings;
		}

		public static function updateDBSiteContent($path = null, $fields = array()) {
			if($path) {
				$db = DB::getInstance();

				$path = explode('/', $path);
				$config = $db->get('config', array('setting_name', '=', 'site_content'));
				$id = $config->first()->id;
				$siteContent = $config->results()[0]->setting_value;
				$siteContent = json_decode($siteContent, true);

				foreach($fields as $item => $value) {
					for($i = 1; $i < count($fields); $i++) {
						//print_r($item);
						//print_r(isset($siteContent[$path[0]][$item]));
						if(isset($siteContent[$path[0]][$item]) == $item) {
							$siteContent[$path[0]][$item] = $value;
						}
					}
				}

				//print_r($siteContent);

				$updateFields = array(
		              			'setting_value' => json_encode($siteContent)
        		   				);

				if(!$db->update('config', $id, $updateFields)) {
					throw new Exception('There was a problem updating.');
				}
				
				//return $settings;
			}
			return false;
		}
	}

?>