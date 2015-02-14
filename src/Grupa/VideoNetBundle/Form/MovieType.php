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
            ->add('name', 'text', 
				array(
					'label' => 'Tytuł filmu'
				)
			)
            ->add('price', 'number',
				array(
					'label' => 'Cena'
				)
			)
			->add('description', 'textarea',
				array(
					'label' => 'Opis'
				)
			)
			->add('premiere_poland', 'date', 
				array(
					'years' => range(date('Y') - 70, date('Y') + 10),
					'label' => 'Premiera w Polsce'
				)
			)
			->add('premiere_world', 'date', 
				array(
					'years' => range(date('Y') - 70, date('Y') + 10),
					'label' => 'Premiera światowa'
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
					'placeholder' => 'Wybierz..',
					'label' => 'Rok produkcji'
				)
			)
			->add('isHit', 'checkbox', 
				array(
					'label' => 'Hit',
					'required' => false,
				)
			)
			->add('isSuperHit', 'checkbox', 
				array(
					'label' => 'Super Hit',
					'required' => false
				)
			)
			->add('category', 'entity', 
				array(
					'class' => 'GrupaVideoNetBundle:MovieCategory',
					'property' => 'name',
					'multiple' => false,
					'label' => 'Kategoria',
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
