<?php

namespace Minecraft\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Minecraft\CoreBundle\Entity\Shop;

class DefaultController extends Controller
{
	public function indexAction()
	{
		return $this->render('MinecraftCoreBundle:Default:index.html.twig');
	}

	public function serverAction()
	{
		return $this->render('MinecraftCoreBundle:Default:server.html.twig');
	}

	public function joinAction()
	{
		return $this->render('MinecraftCoreBundle:Default:join.html.twig');
	}
}
