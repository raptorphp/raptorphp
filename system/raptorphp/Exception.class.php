<?php
abstract class ExceptionHandler {
	public function Error($error = array()) {
/*		throw new ErrorHandler(
 *					$error['ErrorStr'],
 *					0,
 *					$error['ErrorNo'],
 *					$error['ErrorFile'],
 *					$error['ErrorLine']
 *				       );
 */
		ErrorHandler::show_error($error);
	}
}
class ErrorHandler extends Exception {
	public static $_message;
	public static $_code;
	public static $_severity;
	public static $_file;
	public static $_line;
	public function __construct($message, $code, $severity, $filename, $lineno) {
		$this->message = $message;
		$this->code = $code;
		$this->severity = $severity;
		$this->file = $filename;
		$this->line = $lineno;
		self::show_error();
	}
	public function show_error($error = array()) {
		echo "Error: <br />";
		echo $error['ErrorStr'] . '<br />';
		echo $error['ErrorFile'] . ' (' . $error['ErrorLine'] . ')';
		exit(1);

	}
}
?>
