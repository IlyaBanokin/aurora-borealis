<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\ShopOrdersRequest;
use App\Mail\ShopOrder;
use App\Repositories\ShopCartRepository;
use Arr;
use Config;
use Mail;
use Route;
use Session;

/**
 * Class CartController.
 * Добавление заказа | Вывод корзины | Страница оформления заказа | Очистка корзины | Удаление из корзины одного товара | Оформление заказа | Отправка на почту клиента
 */
class CartController extends BaseController
{
    protected $cart_rep;

    /**
     * Конструктор.
     * @var ShopCartRepository
     */
    public function __construct()
    {
        parent::__construct();

        $this->cart_rep = app(ShopCartRepository::class);
        $this->template = env('THEME') . '.shop.menu.menu';
    }

    /**
     * Добавление заказа и вывод корзины.
     * @var ShopCartRepository $cart
     */
    public function show()
    {
        $cart = $this->cart_rep;

        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        if ($id) {
            $product = $cart->getProductForCart($id);
            if (!$product) {
                return false;
            }
        }
        $cart->addToCart($product, $qty);

        if (request()->ajax()) {
            return view(env('THEME') . '.shop.cart.cart_modal');
        }
        redirect();
    }

    /**
     * Вывод корзины.
     */
    public function index()
    {
        return view(env('THEME') . '.shop.cart.cart_modal');
    }

    /**
     * Страница оформления заказа.
     */
    public function checkout()
    {
        $content = view(env('THEME') . '.shop.cart.checkout');
        $this->vars = Arr::add($this->vars, 'content', $content);

        $this->title = 'Оформление заказа';

        return $this->renderOutput();
    }

    /**
     * Очистка корзины.
     */
    public function clear()
    {
        $this->cart_rep->cartClear();
        return view(env('THEME') . '.shop.cart.cart_modal');
    }

    /**
     * Удаление товара из корзины.
     */
    public function delete()
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;

        if (Session::has("cart.$id")) {
            $this->cart_rep->deleteItem($id);
        }

        if (Route::getCurrentRoute()->uri() == "cart/checkout") {
            if (request()->ajax()) {
                return view(env('THEME') . '.shop.cart.checkout');
            }
        } else {
            if (request()->ajax()) {
                return view(env('THEME') . '.shop.cart.cart_modal');
            }
        }
        redirect();
    }

    /**
     * Оформление заказа, отправка на почту клиента.
     * @param  ShopOrdersRequest $request
     */
    public function store(ShopOrdersRequest $request)
    {
        $data = $request->all();

        $name = $data['name'];
        $phone = $data['phone'];
        $text = !empty($data['text']) ? $data['text'] : '';
        $mailTo = Config::get('settings.emailContacts');

        Mail::to($mailTo)->send(new ShopOrder($name, $phone, $text));

        $this->cart_rep->cartClear();

        return redirect()
            ->route('cart.checkout')
            ->with(['success' => 'Спасибо за заказ! В ближайшее время с Вами свяжется наш менеджер, для уточнения заказа.']);
    }
}
