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
/**
 * Promo controller.
 *
 * @Route("/promo")
 */
class PromoController extends Controller
{
    /**
     * Lists all Promo entities.
     *
     * @Route("/", name="promo")
     * @Template()
     */
    public function indexAction()
    { 
        $user = $this->get('security.context')->getToken()->getUser();
        
        $entities = $this->get("repository.Promo")->findByUserId($user->getId());
        
        $template = 'QwerPromoBundle:Promo:IndexPromo.html.switcher';
        return $this->render($template, array('entities' => $entities));        
    }

    /**
     * Finds and displays a Promo entity.
     *
     * @Route("/{id}/show", name="promo_show")
     * @Template()
     */
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

    /**
     * Displays a form to create a new Promo entity.
     *
     * @Route("/new", name="promo_new")
     * @Template()
     */
    public function newAction()
    {   
        $entity = new Promo();
        $formBuilder = $this->get("type.promo");
        $form = $this->createForm($formBuilder, $entity, 
                                    array("attr" => array("new" => true)));
                
        $template = 'QwerPromoBundle:Promo:NewPromo.html.switcher';
        return $this->render($template, array('form' => $form->createView()));        
    }

    /**
     * Creates a new Promo entity.
     *
     * @Route("/create", name="promo_create")
     * @Method("POST")
     * @Template("QwerPromoBundle:Promo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Promo();
        $form = $this->createForm($this->get("type.promo"), $entity, 
                                        array("attr" => array("new" => true)));
        $form->bindRequest($request);
        
        if ($form->isValid()) {
            
            $event = new PromoEvent($entity);
            $this->get('event_dispatcher')->dispatch('create.CreatePromo', $event);
            
            return $this->redirect($this->generateUrl('EditPromo', array('id' => $entity->getId())));
        }

        $template = 'QwerPromoBundle:Promo:NewPromo.html.switcher';
        return $this->render($template, array('form' => $form->createView()));        
        
    }

    /**
     * Displays a form to edit an existing Promo entity.
     *
     * @Route("/{id}/edit", name="promo_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $user = $this->get('repository.Promo')->get($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promo entity.');
        }

        $editForm = $this->createForm($this->get("type.promo")->isNew(false), $entity, 
                                        array("attr" => array("new" => false)));
        $deleteForm = $this->createDeleteForm($id);

        $template = 'QwerPromoBundle:Promo:EditPromo.html.switcher';
        return $this->render($template, array('entity'  => $entity,
                                    'form'   => $editForm->createView(),
                                    'delete_form' => $deleteForm->createView(),
                            ));        
    }

    /**
     * Edits an existing Promo entity.
     *
     * @Route("/{id}/update", name="promo_update")
     * @Method("POST")
     * @Template("QwerPromoBundle:Promo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $entity = $this->get('repository.Promo')->get($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promo entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm($this->get("type.promo")->isNew(false), $entity );
        $editForm->bindRequest($request);

        if ($editForm->isValid()) {

            $event = new PromoEvent($entity);
            $this->get('event_dispatcher')->dispatch('update.UpdatePromo', $event);

           // return $this->redirect($this->generateUrl('EditPromo', array('id' => $id)));
        }
        
        $template = 'QwerPromoBundle:Promo:EditPromo.html.switcher';
        return $this->render($template, array('entity'  => $entity,
                                    'form'   => $editForm->createView(),
                                    'delete_form' => $deleteForm->createView(),
                            ));        
    }
    /**
     * Deletes a Promo entity.
     *
     * @Route("/{id}/delete", name="promo_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QwerPromoBundle:Promo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Promo entity.');
            }

            $event = new PromoEvent($entity);
            $this->get('event_dispatcher')->dispatch('delete.DeletePromo', $event);
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
