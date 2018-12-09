<?php

namespace WorldWarp;

// 플러그인
use pocketmine\plugin\PluginBase;
// 이벤트
use pocketmine\event\Listener;
use pocketmine\level\Level;
// 커맨드
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class WorldWarp extends PluginBase implements Listener {
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
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
					$sender->sendMessage ( $tag . " 월드 " . $args [0] . " 로 이동했습니다." );
					$world = strtolower($args [0]);
					$sender->teleport($this->getServer()->getLevelByName($world)->getSafeSpawn());
					break;
			  }
                        return true;
		  }
                 return true;
	 }
}