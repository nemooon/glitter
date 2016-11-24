<?php

namespace Nemooon\Glitter\Application\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\MessageBag;

class Admin
{
    /**
     * Create a new instance.
     *
     * @param  \Illuminate\Contracts\View\Factory  $view
     * @return void
     */
    public function __construct(AuthManager $auth, ViewFactory $view)
    {
        $this->auth = $auth;
        $this->view = $view;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $me = $this->auth->guard('member')->user();
        $store = $me->activeStore;

        $flash_message = new MessageBag($request->session()->get('flash_message', []));
        $flash_message->setFormat('<div class="alert alert-info alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>:message</div>');
        $this->view->share(compact('me', 'store', 'flash_message'));

        return $next($request);
    }
}
