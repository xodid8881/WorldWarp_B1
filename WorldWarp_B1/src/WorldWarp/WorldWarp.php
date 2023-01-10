<?php

namespace WorldWarp;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\world\World;

class WorldWarp extends PluginBase implements Listener {
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
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
				$worlds = $this->getServer()->getWorldManager()->getWorldByName($args[0]);
				$world = $args [0];
				if (!$worlds instanceof World) {
					$sender->sendMessage ( $tag . " 월드 " . $world . " 는 없습니다." );
					return true;
				}
				$sender->sendMessage ( $tag . " 월드 " . $world . " 로 이동했습니다." );
				$sender->teleport($this->getServer ()->getWorldManager()->getWorldByName($world)->getSafeSpawn());
				return true;
			}
			return true;
		}
		return true;
	}
}
