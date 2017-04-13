<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class PublicationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('is_an_offer', ChoiceType::class, array(
            'label' => 'Type: ',
            'choices'  => array(
                'Offre' => true,
                'Demande' => false,
            ),
            'choices_as_values' => true))
            //    ->add('is_a_proffesional')
            ->add('title','text', array('label' => 'Titre'))
            ->add('description', 'textarea',array('label' => 'Description'))
            ->add('price', 'integer',array('label' => 'Prix'))
            ->add('email','email', array('label' => 'Email'))
            ->add('phone', 'text',array('label' => 'Télèphone','required' => false))
            ->add('category',null, array('label' => 'Catégorie'))
            ->add('localisation',null,array('label' => 'Ville'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Publication'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_publication';
    }


}
