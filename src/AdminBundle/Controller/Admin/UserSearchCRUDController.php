<?php


namespace AdminBundle\Controller\Admin;


use AppBundle\Entity\User;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserSearchCRUDController extends CRUDController
{
    public function listAction()
    {
        $request = $this->getRequest();
        if ($request->isMethod('POST')) {
            $response = new JsonResponse(['status' => 'User not found']);
            $userId = (int)$request->get('user_id');
            if ($userId > 0) {
                $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($userId);
                if ($user instanceof User) {
                    $response->setData([
                        'id' => $user->getId(),
                        'username' => $user->getUsername(),
                        'fullname' => '',
                        'bonus' => 0,
                        'url' => $this->redirectToRoute('admin_user_edit', ['id' => $user->getId()])->getTargetUrl(),
                    ]);
                }
            }
            return $response;
        }
        return $this->renderWithExtraParams('@Admin/user_search/index.html.twig');
    }
}