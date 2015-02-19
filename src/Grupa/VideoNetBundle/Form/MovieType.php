<?php

namespace Grupa\VideoNetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class MovieType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price', 'number')
			->add('description', 'textarea')
			->add('premiere_poland', 'date', 
				array(
					'years' => range(date('Y') - 70, date('Y') + 10)
				)
			)
			->add('premiere_world', 'date', 
				array(
					'years' => range(date('Y') - 70, date('Y') + 10)
				)
			)
			->add('production_year', 'choice', 
				array(
					'choice_list' => new ChoiceList(
						array(
							range(date('Y') - 70, date('Y') + 10)
						), 
						array(
							range(date('Y') - 70, date('Y') + 10)
							)
						),
					'placeholder' => 'Wybierz..'
				)
			)
			->add('isHit', 'checkbox', 
				array(
					'required' => false,
				)
			)
			->add('isSuperHit', 'checkbox', 
				array(
					'required' => false
				)
			)
			->add('movieFoto')
			->add('movieBigFoto')
			->add('movieVideo')
			->add('duration')
			->add('countryProduction')
			->add('category', 'entity', 
				array(
					'class' => 'GrupaVideoNetBundle:MovieCategory',
					'property' => 'name',
					'multiple' => false,
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
            'data_class' => 'Grupa\VideoNetBundle\Entity\Movie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'grupa_videonetbundle_movie';
    }
}
