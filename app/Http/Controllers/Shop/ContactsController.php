<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\ShopContactsRequest;
use App\Mail\SendContacts;
use Arr;
use Config;
use Mail;


/**
 * Class ContactsController
 * Страница Контакты | Отправка формы обратной связи.
 */
class ContactsController extends BaseController
{
    /**
     * Конструктор.
     */
    public function __construct()
    {
        parent::__construct();

        $this->template = env('THEME') . '.shop.contacts.contacts';
    }

    /**
     * Контент.
     */
    public function index()
    {
        $content = view(env('THEME') . '.shop.contacts.contactsContent');
        $this->vars = Arr::add($this->vars, 'content', $content);

        $this->title = 'Кафе Северное Сияние | Контакты | Обратная связь';
        $this->description = 'Доставка обедов по Санкт-Петербургу и Ленинградской области кафе Северное Сияние, доставка обедов на предприятия';
        $this->keywords = 'доставка, обеды на предприятия, заказ на дом, кафе Северное Сияние';

        return $this->renderOutput();
    }

    /**
     * Отправка формы..
     * @param  ShopContactsRequest $request
     */
    public function store(ShopContactsRequest $request)
    {
        $data = $request->all();

        $name = $data['name'];
        $email = $data['email'];
        $text = $data['text'];
        $mailTo = Config::get('settings.emailContacts');

        Mail::to($mailTo)->send(new SendContacts($name, $email, $text));

        return redirect()
            ->route('contacts.index')
            ->with(['success' => 'Сообщение успешно отправлено']);
    }
}
