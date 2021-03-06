<?php
/**
 * Spreads events to any number of listeners.
 * Use this class to log to different log file formats at the same time.
 */
class RudimentaryPhpTest_Listener_Spreader implements RudimentaryPhpTest_Listener {
	/**
	 * @var array List of 
	 */
	private $listeners = array();
	
	/**
	 * Takes any number of listeners and calls there methods whenever a call comes in.
	 * @param RudimentaryPhpTest_Listener * Supply any number of listeners as parameter
	 */
	public function __construct(){
		// Ensure types match
		foreach(func_get_args() as $listener){
			if($listener instanceof RudimentaryPhpTest_Listener){
				$this->listeners[] = $listener;
			} else {
				throw new Exception('Listeners of wrong type passed.');
			}
		}
	}
	
	public function suspiciousOutput($path, $output){
		foreach($this->listeners as $listener){
			$listener->suspiciousOutput($path, $output);
		}
	}
	
	public function setUpSuite($path){
		foreach($this->listeners as $listener){
			$listener->setUpSuite($path);
		}
	}
	
	public function tearDownSuite($path){
		foreach($this->listeners as $listener){
			$listener->tearDownSuite($path);
		}
	}
	
	public function setUpClass($className){
		foreach($this->listeners as $listener){
			$listener->setUpClass($className);
		}
	}
	
	public function tearDownClass($className){
		foreach($this->listeners as $listener){
			$listener->tearDownClass($className);
		}
	}
	
	public function skippedTest($className, $methodName){
		foreach($this->listeners as $listener){
			$listener->skippedTest($className, $methodName);
		}
	}
	
	public function setUpTest($className, $methodName, $file, $line){
		foreach($this->listeners as $listener){
			$listener->setUpTest($className, $methodName, $file, $line);
		}
	}
	
	public function setUpTestDone($className, $methodName, $file, $line, $output){
		foreach($this->listeners as $listener){
			$listener->setUpTestDone($className, $methodName, $file, $line, $output);
		}
	}
	
	public function assertionSuccess($className, $methodName, $file, $line, $message){
		foreach($this->listeners as $listener){
			$listener->assertionSuccess($className, $methodName, $file, $line, $message);
		}
	}
	
	public function assertionFailure($className, $methodName, $file, $line, $message){
		foreach($this->listeners as $listener){
			$listener->assertionFailure($className, $methodName, $file, $line, $message);
		}
	}
	
	public function unexpectedException($className, $methodName, Exception $exception){
		foreach($this->listeners as $listener){
			$listener->unexpectedException($className, $methodName, $exception);
		}
	}
	
	public function tearDownTest($className, $methodName, $output){
		foreach($this->listeners as $listener){
			$listener->tearDownTest($className, $methodName, $output);
		}
	}
	
	public function tearDownTestDone($className, $methodName, $output){
		foreach($this->listeners as $listener){
			$listener->tearDownTestDone($className, $methodName, $output);
		}
	}
}