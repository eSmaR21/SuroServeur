<?php

namespace Minecraft\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShopType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name', 'text', array('label' => 'Nom :'))
			->add('picture', 'file', array('label' => 'Photo :'))
			->add('description', 'text', array('label' => 'Description :'))
			->add('price', 'integer', array('label' => 'Prix :'))
			->add('item', 'integer', array('label' => 'Numéro de l\'item :'))
			->add('count', 'integer', array('label' => 'Nombres :'));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
		'data_class' => 'Minecraft\CoreBundle\Entity\Shop'
		));
	}

	public function getName()
	{
		return 'minecraft_corebundle_shoptype';
	}
}
