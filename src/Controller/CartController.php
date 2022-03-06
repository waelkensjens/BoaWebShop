<?php

namespace App\Controller;

use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Util\TargetPathTrait;


class CartController extends AbstractController
{

    use TargetPathTrait;

    protected RequestStack $requestStack;
    protected InertiaInterface $inertia;


    public function __construct(
        RequestStack $requestStack,
        InertiaInterface $inertia
    ) {
        $this->requestStack = $requestStack;
        $this->inertia = $inertia;
    }


    /**
     * @Route(
     *     "/cart",
     *     name="cart",
     *     methods={"GET"},
     *     options={"expose"=true})
     * )
     */
    public function cart(
        InertiaInterface $inertia,
        Request $request
    ): Response {
    //Todo: tried storing to session through cookies
        $cookies = $request->cookies;

        if ($cookies->has('vuex'))
        {
            $cart = $cookies->get('vuex');
            $cart = json_decode($cart);
        }
        //do calculations?

        return $inertia->render('Cart/Checkout',
            [

            ]
        );
    }

    /**
     * Add an item to the cart and store it in the session
     *
     * @Route(
     *     "/add",
     *     name="addToCart",
     *     methods={"Post"},
     *     options={"expose"=true})
     * )
     */
    public function addToCart(Request $request): Response
    {
        //Todo: check how to store to session through ajax
        $session = $this->requestStack->getSession();
        $url = $request->get('url');


        if ($session->has('cart')) {
            $cart = $session->get('cart');
            $cart[] = $request->get('product');
        }
        $session->set('cart', $cart);
        return $this->redirect($url);
    }

}
