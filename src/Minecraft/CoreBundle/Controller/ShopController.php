<?php

namespace Minecraft\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Minecraft\CoreBundle\Entity\Shop;
use Minecraft\CoreBundle\Form\ShopType;

class ShopController extends Controller
{
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('MinecraftCoreBundle:Shop');

		$items = $repository->findAll();

		return $this->render('MinecraftCoreBundle:Shop:index.html.twig', array('items' => $items));
	}

	public function buyAction($id)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('MinecraftCoreBundle:Shop');

		$item = $repository->find($id);
		$nb = $item->getPrice();

		return $this->render('MinecraftCoreBundle:Shop:buy.html.twig', array('nb' => $nb, 'id' => $id));
	}

	public function addAction()
	{
		$shop = new Shop;
		$form = $this->createForm(new ShopType, $shop);

		$request = $this->get('request');
		if ($request->getMethod() == 'POST') {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($shop);
				$em->flush();

				return $this->redirect($this->generateUrl('minecraft_core_shop_index'));
			}
		}

		return $this->render('MinecraftCoreBundle:Shop:add.html.twig', array('form' => $form->createView()));
	}

	public function removeAction($id)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('MinecraftCoreBundle:Shop');

		$item = $repository->find($id);

		$form = $this->createFormBuilder()->getForm();

		$request = $this->getRequest();
		if ($request->getMethod() == 'POST') {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->remove($item);
				$em->flush();

				return $this->redirect($this->generateUrl('minecraft_core_shop_index'));
			}
		}

		return $this->render('MinecraftCoreBundle:Shop:remove.html.twig', array(
      'item' => $item,
      'form' => $form->createView()
    ));
	}

	public function successAction()
	{
		$id = $this->getRequest()->get('monelib_data0');

		$repository = $this->getDoctrine()->getManager()->getRepository('MinecraftCoreBundle:Shop');

		$item = $repository->find($id);

		$user = $this->container->get('security.context')->getToken()->getUser()->getUsernameMinecraft();

		$rcon = $this->container->get('minecraft_core.rcon');
		$rcon->exec($item->getItem(), $user);

		return $this->render('MinecraftCoreBundle:Shop:success.html.twig');
	}

	public function deniedAction()
	{
		return $this->render('MinecraftCoreBundle:Shop:denied.html.twig');
	}

	public function errorAction()
	{
		return $this->render('MinecraftCoreBundle:Shop:error.html.twig');
	}
}
