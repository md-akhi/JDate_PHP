<?php
    /**
	  * In the name of Allah, the Beneficent, the Merciful.
	  *
    * @package		Date and Time Related Extensions - SH(Solar Hijri, Shamsi Hijri, Iranian Hijri)
    * @author		  Mohammad Amanalikhani <md.akhi.ir@gmail.com>
    * @link			  http://git.akhi.ir/php/SHDateTime/		(Git)
    * @link			  http://git.akhi.ir/php/SHDateTime/docs/	(wiki)
    * @license	  https://www.gnu.org/licenses/agpl-3.0.en.html AGPL-3.0 License
    * @version	  Release: 1.0.0-alpha.5
    */


require_once(__DIR__."/src/SHBase.php");

	class SHDate extends SHDateBase {
		
		public static function date($format,$timestamp=false){
			return parent::dates($format,$timestamp);
		}
		public static function gmdate($format,$timestamp=false){
			return parent::dates($format,$timestamp,true);
        }
        
		/**
		* Format a local time/date according to locale settings
		* @param   string  $format  The following characters are recognized in the format parameter string.
		* @param   int  $timestamp  The optional timestamp parameter is an integer Unix timestamp that defaults to the current local time if a timestamp is not given.In other words,it defaults to the value of jtime().
		* @return  string  A string formatted according to the given format string using the given timestamp or the current local time if no timestamp is given.
		* @see self::strftime_().
		* @since   1.0
		*/
		public static function strftime($format,$timestamp=false){
			return parent::strftimes($format,$timestamp);
        }
        
		/**
		* Format a GMT/UTC time/date according to locale settings
		* @param   string  $format  See description in strfjtime().
		* @param   int  $timestamp  See description in strfjtime().
		* @return  string  A string formatted according format using the given timestamp or the current local time if no timestamp is given.
		* @see SHDate::php_strfjtime().
		* @since   1.0
		*/
		public static function gmstrftime($format,$timestamp=false){
			return parent::strftimes($format,$timestamp,1);
		}

		/**
		* Get Unix timestamp for a date
		* @param   int  $h  The number of the hour.
		* @param   int  $m  The number of the minute.
		* @param   int  $s  The number of seconds.
		* @param   int  $shDay  The number of the day.
		* @param   int  $shMonth  The number of the month.
		* @param   int  $shYear  The number of the year.
		* @return  int|bool  The Unix timestamp of the arguments given. If the arguments are invalid,the function returns FALSE .
		* @since   2.0
		*/
		public static function mktime($h=false,$i=false,$s=false,$shDay=false,$shMonth=false,$shYear=false){
			return parent::mktimes($h,$i,$s,$shDay,$shMonth,$shYear);
        }

        /**
        * Get Unix timestamp for a GMT date
        * @param   int  $h  The number of the hour.
        * @param   int  $m  The number of the minute.
        * @param   int  $s  The number of seconds.
        * @param   int  $jm  The number of the month.
        * @param   int  $jd  The number of the day.
        * @param   int  $jy  The number of the year.
        * @param   int  $is_dst  Parameters always represent a GMT date so is_dst doesn't influence the result.
        * @return  int  a integer Unix timestamp.
        * @since   1.0
        */
		public static function gmmktime($h=false,$i=false,$s=false,$shYear=false,$shMonth=false,$shDay=false){
			return parent::mktimes($h,$i,$s,$shDay,$shMonth,$shYear,true);
        }
        
		public static function isLeap($jy){
			return (bool)parent::isLeap($jy);
        }
        
		public static function getdate($timestamp=false){
			return parent::getdates($timestamp);
		}
		public static function gmgetdate($timestamp=false){
			return parent::getdates($timestamp,1);
        }
        
		public static function timeToDate($timestamp=false){
			return parent::timeToDates($timestamp);
		}
		public static function timeToGmdate($timestamp=false){
			return parent::timeToGmdates($timestamp,1);
		}
	}


    function shdate($format,$timestamp=false){
        return SHDate::date($format,$timestamp);
    }

    function gmshdate($format,$timestamp=false){
        return SHDate::gmdate($format,$timestamp);
    }

    function mkshtime($h=false,$m=false,$s=false,$jd=false,$jm=false,$jy=false){
        return SHDate::mktime($h,$m,$s,$jd,$jm,$jy);
    }
    function gmmkshtime($h=false,$m=false,$s=false,$jd=false,$jm=false,$jy=false){
        return SHDate::gmmktime($h,$m,$s,$jd,$jm,$jy);
    }

	function strfshtime($format,$timestamp=false){
		return SHDate::strftime($format,$timestamp);
    }
    
	function gmstrfshtime($format,$timestamp=false){
		return SHDate::gmstrftime($format,$timestamp);
	}
   /**
    * Get date/time information
    * @param   int  $timestamp  The optional timestamp parameter is an integer Unix timestamp that defaults to the current local time if a timestamp is not given. In other words,it defaults to the value of jtime().
    * @return  array  an associative array of information related to the timestamp.
    * @since   1.0
    */
	function getshdate($timestamp=false){
		return SHDate::getdate($timestamp);
    }

	function gmgetshdate($timestamp=false){
		return SHDate::gmgetdate($timestamp);
    }

	/*
    * Get the local time
    * @param   int  $timestamp  The optional timestamp parameter is an integer Unix timestamp that defaults to the current local time if a timestamp is not given. In other words,it defaults to the value of jtime().
    * @param   bool  $is_associative  If set to FALSE,numerically indexed array. If set to TRUE,associative array containing all.
    * @return  array  Numerically indexed array or associative array containing all.
    * @since   1.0
    */
	function localshtime($timestamp=false,$is_associative=false){
		return SHDate::localtime($timestamp,$is_associative);
    }

    /*
    * Get current time
    * @param   bool  $return_float  When set to TRUE,a float instead of an array is returned.
    * @return  array  By default an array. If return_float is set,then a float.
    * @since   1.0
    */
	function getshtimeofday($return_float=false){
		return SHDate::gettimeofday($return_float);
    }

    function checkshdate($jy,$jm,$jd){
		return SHDate::checkdate($jy,$jm,$jd);
    }
	/**
    * Validate a time
    * @param   int  $h  Hour of the time.
    * @param   int  $i  Minute of the time.
    * @param   int  $s  Second of the time.
    * @return  bool  TRUE if the date given is valid; otherwise returns FALSE.
    * @since   1.0
    */
	function checktime($h,$i,$s){
		return SHDate::checktime($h,$i,$s);
    }
	function checkshtime($h,$i,$s){
		return SHDate::checktime($h,$i,$s);
    }
    
    function strtoshtime($time,$now=false){
		return SHDate::strtotime($time,$now);
    }
	/**
    * Format a local time/date as integer
    * @param   string  $format  The following characters are recognized in the format parameter string.
    * @param   int  $timestamp  The optional timestamp parameter is an integer Unix timestamp that defaults to the current local time if a timestamp is not given.
    *                                                In other words,it defaults to the value of jtime().@return int  an integer.
    * @since   1.0
    */
	function ishdate($format,$timestamp=false){
		return SHDate::idate($format,$timestamp);
    }
    
    function shtime($timestamp=false){
		return SHDate::time($timestamp);
    }
    
    function microshtime($get_as_float=false){
		return SHDate::microtime($get_as_float);
	}
