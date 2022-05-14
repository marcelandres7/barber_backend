<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use AppBundle\Repository\DistributorRepository;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('password', 'password', 
                array(
                    'required' => false
                ))
            ->add('status', 'choice', array('choices' => array("ACTIVO" => "ACTIVO", "INACTIVO" => "INACTIVO")))
            ->add('userRole')
            //->add('avatarPath',FileType::class, array('data_class' => null, 'required' => false))
            ->add('avatarPath','file', array('data_class' => null, 'required' => false))
            ->add('bio')
            ->add('organization');	
				
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }
}
