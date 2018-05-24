<?php

namespace Lic\BanqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MouvementType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       // $builder->add('montant')->add('dateMouvement')->add('valider')->add('description')->add('rapprochement')->add('compte')->add('membre')->add('moyenPaiement')->add('repetitif');
        $builder
            ->add('montant'         ,MoneyType::class)
            ->add('dateMouvement'   ,DateType::class)
            ->add('valider'         ,CheckboxType::class, array('required' => false))
            ->add('rapprochement'         ,CheckboxType::class, array('required' => false))
            ->add('description'     ,TextareaType::class)
            ->add('moyenPaiement'   ,EntityType::class,array(
                'class'=>'LicBanqueBundle:Paiement',
                'choice_label'=> 'libelle'))

            ->add('membre'   ,EntityType::class,array(
                'class'=>'LicBanqueBundle:Membre',
                'choice_label'=> 'prenom',
                'multiple'=> false,))

            ->add('save'            ,SubmitType::class)

        ;

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lic\BanqueBundle\Entity\Mouvement'
        ));
    }


    public function getBlockPrefix()
    {
        return 'lic_banquebundle_mouvement';
    }


}
