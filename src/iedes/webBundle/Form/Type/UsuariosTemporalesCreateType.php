<?php

namespace iedes\webBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use iedes\webBundle\Entity\UsuariosTemporales;


class UsuariosTemporalesCreateType extends AbstractType {
    
    public function BuildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('nombre', 'text', array('label' => 'nombre',  'required' => true));
        $builder->add('telefono1', 'text', array('label' => 'telefono', 'required' => true)); 
        
        $builder->add('route', 'text', array('label' => 'route', 'required' => false, 'mapped' => false, 'read_only' => true));
        $builder->add('streetNumber', 'text', array('label' => 'street number', 'required' => false, 'mapped' => false, 'read_only' => true));
        $builder->add('postalCode', 'text', array('label' => 'postal code', 'required' => false, 'mapped' => false, 'read_only' => true));
        $builder->add('locality', 'text', array('label' => 'Ciudad', 'required' => true, 'mapped' => false, 'read_only' => true));
        $builder->add('adminArea3', 'text', array('label' => 'admin area 3', 'required' => false, 'mapped' => false, 'read_only' => true));
        $builder->add('adminArea2', 'text', array('label' => 'admin area 2', 'required' => false, 'mapped' => false, 'read_only' => true));
        $builder->add('adminArea1', 'text', array('label' => 'admin area 1', 'required' => false, 'mapped' => false, 'read_only' => true));
        $builder->add('country', 'text', array('label' => 'country', 'required' => true, 'mapped' => false, 'read_only' => true));
        
        $builder->add('send', 'submit', Array('label' => 'Enviar'));
    }
    
    public function getName(){
        return 'iedes_webbundle_usuariostemporalescreatetype';
    }
}