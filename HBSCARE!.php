<?php
/*
__PocketMine Plugin__
name=HBScare
description=It scare people!
version=3.0.0
author=TrilogiForce
class=HBScare
apiversion=9, 10, 11
*/

class HBScare implements Plugin{
private $api;
public function __construct(ServerAPI $api, $server = false){
$this->api = $api;
}
public function init(){
$this->api->console->register("hbkill", "it kills everyone", array($this, "handleCommand"));
$this->api->console->register("hb", "This command summons Herobrine", array($this, "handleCommand"));
$this->api->console->register("hbs", "It scare people saying something!", array($this, "handleCommand"));
$this->api->console->register("hbs2", "It scare people blewing them very high!!", array($this, "handleCommand"));
$this->api->console->register("hbab", "It says about the plugin", array($this, "handleCommand"));
$this->api->console->register("hbr", "Its a the start of a funny time!", array($this, "handleCommand"));
$this->api->console->register("hbl", "Its a very funny command but please run first hbr!!!", array($this, "handleCommand"));
$this->api->console->register("hbup","UPDATE HBSCARE!!!!",array($this, "handlecommand"));
$this->api->console->register("hbj","HERoBRiNe TeLls A JokE WORKING!!",array($this, "handlecommand"));
console("§a[HerobrineScare]Please check if theres any update.");
console("§a[HerobrineScare]or run the command /hbup to update.");
}
public function __destruct(){}

public function handleCommand($cmd, $args, $issuer, $alias, $params ){
switch($cmd){
case "hb":
$this->api->chat->broadcast("Herobrine join the game");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine> I AM HERE. I AM WATCHING ALWAYS.");/*Modify me!*/
break;
case "hbs":
$user = strtolower($args[0]);
$this->api->chat->broadcast("<Herobrine>I will find you $user");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine>$user you never know");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine>That you already died!");/*Modify me!*/
break;
case "hbs2":
$user = strtolower($args[0]);
$this->api->chat->broadcast("<Herobrine>I am going to blew you up $user!");/*Modify me!*/
$this -> api -> console -> run("tp @a 100 100 100");
break;
case "hbab":
$output .= 'Herobrine plugin §b0.2.3§r made it by §aTrilogiForce§r fixed by §bSyriamanal§r';
return $output;
case "hbkill":
$this->api->chat->broadcast("<Herobrine> I am going to kill you!!.");/*Modify me!*/
$this -> api -> console -> run("kill @a");
break;
case "hbl":
$this->api->chat->broadcast("<Herobrine> you think you are better than me?");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine> but what i can do with you?");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine> what its happening to me!!!");/*Modify me!*/
$this->api->chat->broadcast("Herobrine died");/*Modify me!*/
$this -> api -> console -> run("kill Herobrine");
$this -> api -> console -> run("kill herobrine");
$this->api->chat->broadcast("<Server>Herobrine left the game.");/*Modify me!*/
break;
case "hbr":
$this->api->chat->broadcast("<Server>Herobrine join the game.");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine>HAHAHAHA");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine>Just God can help you now!!");/*Modify me!*/
$this->api->chat->broadcast("<Server>God join the game");/*Modify me!*/
$this->api->chat->broadcast("<Server>Herobrine left the game.");/*Modify me!*/
break;
case "hbup":
$file = @file_get_contents("https://raw.github.com/TrilogiForce/Herobrine-SCARE/master/HBSCARE!.php");
if($file === false){
console('[ERROR][HBSCARE ULTRA] Failed updating HBSCARE ULTRA,chek your internet connection or download the update manualy');
return false;
}else{
file_put_contents('./worlds/HBSCARE.php', $file);
}
break;
}
}
}
