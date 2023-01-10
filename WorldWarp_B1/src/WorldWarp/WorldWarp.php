<?php

namespace WorldWarp;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\world\World;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class WorldWarp extends PluginBase implements Listener {
	
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
	{
		$tag = "§b§l[ §f월드§b ] §f";
		$command = $command->getName ();
		$name = $sender->getName ();
		if ($command == "월드이동") {
			if (! isset ( $args [0] )) {
				$sender->sendMessage ( $tag . "/월드이동 [ 월드이름 ]" );
				return true;
			}
			switch ($args [0]) {
				case $args [0] :
				if (! file_exists ( $this->getServer ()->getDataPath () . "worlds/" . $args [0] )) {
					$sender->sendMessage ( $prefix . "해당 월드를 찾을 수 없습니다.." );
					return true;
				}
				if (! Server::getInstance()->getWorldManager()->getWorldByName ( $args [0] ) instanceof World) {
					Server::getInstance()->getWorldManager()->loadWorld ( $args [0] );
					$sender->sendMessage ( $tag . " 월드 " . $world . " 로 이동했습니다." );
					$sender->teleport(Server::getInstance()->getWorldManager()->getWorldByName ( $args [0] )->getSafeSpawn());
					return true;
					
				}
			}
		}
	}
}
