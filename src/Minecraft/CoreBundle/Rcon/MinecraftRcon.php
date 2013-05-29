<?php

namespace Minecraft\CoreBundle\Rcon;

require_once __DIR__.'/PHPSend.php';

class MinecraftRcon
{
	public function exec($cmd, $user)
	{
		$con = new PHPSsend();
		$succ = $con->PHPSconnect("sirius.edenservers.fr","cx7w033r","11223");

		$con->PHPScommand("give ". $user ." ". $cmd ." 64");

		$succ = $con->PHPSdisconnect();
	}
}
