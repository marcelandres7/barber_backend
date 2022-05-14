<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequirementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add('description')
                ->add('lawReference')
                ->add('nameEng')
                ->add('descriptionEng')
                ->add('lawReferenceEng')
                ->add('isActive')
                ->add('weight')
                ->add('createdAt')
                ->add('updatedAt')
                ->add('createdBy')
                ->add('requirementGroup')
                ->add('requirementPenalty', 'entity', array(
                    'class' => 'AppBundle:RequirementPenalty',
                    'choice_value' => 'requirementPenaltyId',
                    'choice_label' => 'name',
                    'empty_data'  => null,
                    'empty_value' => "",
                    'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                    ->where("u.isActive = '1'");
                    }
                    ))
                ->add('requirementType', 'entity', array(
                    'class' => 'AppBundle:RequirementType',
                    'choice_value' => 'requirementTypeId',
                    'choice_label' => 'name',
                    'empty_data'  => null,
                    'empty_value' => "",
                    'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                    ->where("u.isActive = '1'");
                    }
                    ))
                ->add('updatedBy');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Requirement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_requirement';
    }


}
