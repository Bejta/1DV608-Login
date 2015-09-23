<?php

namespace view;

class DateTimeView {


	public function show() {

        /* To eliminate error on local server
         * This should be done in INI file
         * http://php.net/manual/en/function.date-default-timezone-set.php
         */
        date_default_timezone_set('Europe/Stockholm');

		$timeString = date("l") . ', the ' . date("jS \of F Y") . ', The time is ' . date("H:i:s");

		return '<p>' . $timeString . '</p>';
	}
}