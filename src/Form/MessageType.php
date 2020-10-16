<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'message.form.name',
                'attr' => ['placeholder' => 'message.form.name'],
                'required' => false
            ])
            ->add('email', EmailType::class,[
                'label' => 'message.form.email',
                'attr' => ['placeholder' => 'message.form.email'],
                'required' => false
            ])
            ->add('text', TextareaType::class,[
                'attr' => ['rows' => 5,'placeholder' => 'message.form.text'],
                'label' => 'message.form.text',
                'required' => false
            ])
            ->add('save', SubmitType::class,[
                'label' => 'message.form.submit'
            ])
        ;
    }
}