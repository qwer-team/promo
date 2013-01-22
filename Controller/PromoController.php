<?php

namespace Qwer\PromoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Qwer\PromoBundle\Entity\Promo;
use Qwer\PromoBundle\Form\PromoType;
use Qwer\PromoBundle\Event\PromoEvent;

class PromoController extends Controller
{
    public function indexAction()
    { 
        $user = $this->get('security.context')->getToken()->getUser();
        
        $entities = $this->get("repository.Promo")
                         ->findByUserId($user->getId());
        
        $template = 'QwerPromoBundle:Promo:IndexPromo.html.switcher';
        return $this->render($template, array('entities' => $entities));        
    }
    
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QwerPromoBundle:Promo')->find($id);

        if (!$entity) {
           throw $this->createNotFoundException('Unable to find Promo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    public function newAction()
    {   
        $entity = new Promo();
        $formBuilder = $this->get("type.promo");
        $form = $this->createForm($formBuilder, $entity);
        
        $template = 'QwerPromoBundle:Promo:NewPromo.html.switcher';
        return $this->render($template, array('form' => $form->createView()));        
    }

    
    public function createAction(Request $request)
    {
        $entity  = new Promo();
        $form = $this->createForm($this->get("type.promo"), $entity);
        $form->bindRequest($request);
        
        if ($form->isValid()) {
            
            $event = new PromoEvent($entity);
            $this->get('event_dispatcher')
                 ->dispatch('create.CreatePromo', $event);
            
            return $this->redirect(
                        $this->generateUrl(
                                                'EditPromo', 
                                                array('id' => $entity->getId())
                                            )
                                 );
        }

        $template = 'QwerPromoBundle:Promo:NewPromo.html.switcher';
        return $this->render($template, array('form' => $form->createView()));        
        
    }

    public function editAction($id)
    {
        $entity = $user = $this->get('repository.Promo')->get($id);

        if (!$entity) {
           throw $this->createNotFoundException('Unable to find Promo entity.');
        }

        $promoType = $this->get("type.promo")->isNew(false);
        $editForm = 
                    $this->createForm(
                                $promoType, 
                                $entity, 
                                array("attr" => array("new" => false))
                            );
        $deleteForm = $this->createDeleteForm($id);

        $template = 'QwerPromoBundle:Promo:EditPromo.html.switcher';
        $params = array(
                        'entity'  => $entity,
                        'form'   => $editForm->createView(),
                        'delete_form' => $deleteForm->createView(),
                       );
        return $this->render( $template, $params);        
    }

    public function updateAction(Request $request, $id)
    {
        $entity = $this->get('repository.Promo')->get($id);

        if (!$entity) {
           throw $this->createNotFoundException('Unable to find Promo entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $promopType =$this->get("type.promo")->isNew(false);
        $editForm = $this->createForm( $promopType, $entity);
        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $event = new PromoEvent($entity);
            $this->get('event_dispatcher')
                 ->dispatch('update.UpdatePromo', $event);
        }
        
        $template = 'QwerPromoBundle:Promo:EditPromo.html.switcher';
        $params = array(
                        'entity'  => $entity,
                        'form'   => $editForm->createView(),
                        'delete_form' => $deleteForm->createView(),
                       );
        return $this->render($template, $params);        
    }
    
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QwerPromoBundle:Promo')->find($id);

            if (!$entity) {
               throw 
                 $this->createNotFoundException('Unable to find Promo entity.');
            }

            $event = new PromoEvent($entity);
            $this->get('event_dispatcher')
                 ->dispatch('delete.DeletePromo', $event);
        }

        return $this->redirect($this->generateUrl('promo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
