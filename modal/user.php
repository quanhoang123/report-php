<?php

class User
{
  private $user_name;
  private $pass_word;
  private $role;
  

  function getUserName(){
    return $this->user_name;
  }
  
  function getShortName(){
    $spacePos = strpos($this->getUserName, ' ');
		if($spacePos){
			return substr($this->getUserName, 0, $spacePos);
		}
		return $this->getUserName;
	}
  function canManage(){
		return $this->role == "admin";
	}
	function canBuy(){
		return $this->role == "user";
	}
}
