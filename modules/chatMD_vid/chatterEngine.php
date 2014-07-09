<?php
ini_set('date.timezone', 'America/New_York');
 class Chatter{
		//change this according to your database setup
	    protected $server = 'localhost';
		protected $username = 'km1079_chat123';//'futurepr_chatmd';
		protected $password = 'chatmd@123';//'@2=QRHyu7}5d';
		protected $database = 'km1079_chatmd';
		
		//leave this as our database connection later
		protected $connection = null;
	
		public function __construct(){
			
			
			$this->connection = @mysql_connect($this->server, $this->username, $this->password);
			if($this->connection){
				if(!mysql_select_db($this->database)) die('database not found');
			}
			else die('database connection failed. Check your setup');
			
			$mode = $this->fetch('mode');
		
			switch($mode){
				case 'get':
			
					$this->getMessage();
					break;
				case 'post':
					$this->postMessage();
					break;
				default:
					//$this->output(false, 'Wrong mode.');
					break;
			}
			
			return;
		}
				
		protected function getMessage(){
			
			$endtime = time() + 20;
			$lasttime = $this->fetch('lastTime');
		
			$curtime = null;
				$pu = $this->fetch('pu'); 
				 $du = $this->fetch('du'); 
		
			while(time() <= $endtime){
				$queryRest="
					SELECT *
					FROM tbl_textchat  where  user_id=$pu and doctor_id=$du
					ORDER BY insertDate desc
					LIMIT 0, 100";
				$rs = mysql_query($queryRest);
				
				if($rs){
					$messages = array();
					
					while($row = mysql_fetch_array($rs)){
						$messages[] = array(
							'user' => $row['username'],
							'text' => $row['text'],
							'time' => $row['insertDate']
						
						);
					}
					
					$curtime = strtotime($messages[0]['time']);
				}
				
				if(!empty($messages) && $curtime != $lasttime){
					$this->output(true, '', array_reverse($messages), $curtime);
					break;
				}
				else{
					sleep(1);
				}
			}
		}
		
		protected function postMessage(){
			$user = $this->fetch('user');
			$text = $this->fetch('text');
		 	$pu = $this->fetch('pu'); 
		   $du = $this->fetch('du'); 
		   $time=date("Y-m-d H:i:s", strtotime("now"));//strtotime("now");
			if(empty($user) || empty($text)){
				$this->output(false,'Username and Chat Text must be inputted.');
			}
			else{
				$query= "INSERT INTO tbl_textchat(
						messageId,
						username,
						text,
						doctor_id,
						user_id,
						insertDate
					)
					VALUES(
						uuid(),
						'$user',
						'$text',$du,
						$pu,
						'$time'
					)";
				$rs = mysql_query($query);
				
				if($rs){
					$this->output(true, '');
				}
				else{
					$this->output(false, $query.'Chat posting failed. Please try again.');
				}
			}
		}
		
		protected function fetch($name){
			$val = isset($_POST[$name]) ? $_POST[$name] : '';
			return mysql_real_escape_string($val, $this->connection);
		}
		
		protected function output($result, $output, $message = null, $latest = null){
			echo json_encode(array(
				'result' => $result,
				'message' => $message,
				'output' => $output,
				'latest' => $latest
			));
		}
	}

	new Chatter();