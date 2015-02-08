<?php

namespace Uek\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FeedType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
			->add(
				'sex',
				'choice', 
				array (
					'choices' => array (
						'MALE' => 'Man'
						
					)
				)
			)
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Uek\DemoBundle\Entity\Feed'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'uek_demobundle_feed';
    }
}
