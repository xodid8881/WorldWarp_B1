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
		$tag = "§b§l[ §fWorldWarp§b ] §f";
		$command = $command->getName ();
		$name = $sender->getName ();
		if ($command == "worldwarp") {
			if (! isset ( $args [0] )) {
				$sender->sendMessage ( $tag . "/worldwarp [ WorldFolderName ]" );
				return true;
			}
			switch ($args [0]) {
				case $args [0] :
				if (! file_exists ( $this->getServer ()->getDataPath () . "worlds/" . $args[0] )) {
					$sender->sendMessage ( $tag . "There is no world with that name" );
					return true;
				} else {
					Server::getInstance()->getWorldManager()->loadWorld ($args[0]);
				}
				foreach (Server::getInstance()->getWorldManager()->getWorlds() as $level) {
					$world = $level->getFolderName();
					if ($args[0] == $world){
						$sender->sendMessage ( $tag . "move successfully" );
						$sender->teleport($level->getSafeSpawn());
						return true;
					}
				}
				$sender->sendMessage ( $tag . "There is no world with that name" );
				return true;
			}
		}
	}
}
