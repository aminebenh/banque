<?php

namespace Lic\BanqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class PaiementType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelle',TextType::class)
                ->add('details',TextType::class);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lic\BanqueBundle\Entity\Paiement'
        ));
    }



    public function getBlockPrefix()
    {
        return 'lic_banquebundle_paiement';
    }


}
