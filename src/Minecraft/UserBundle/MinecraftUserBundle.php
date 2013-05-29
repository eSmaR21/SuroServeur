<?php

namespace Minecraft\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MinecraftUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
