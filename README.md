> # Rework的坑点:
>   * 版本
>       > laravel5.3
>       > php>=5.6.4
>       > composer 应该都行
>   * 发版后代码目录改变，需要注意重启队列脚本:
>       > * ps -aux | grep queue
>       > * kill ***
>       > * nohup php artisan queue:work --timeout=0 --daemon &
>       > * 注意：重启时看下有没有未执行完的队列
>   * push 功能需要node支持，需要另起一个node服务
>   * Membership:
>       > * 包括hot desk类型和普通类型．　hot desk类型购买时不设置g过期时间，　而是在用户第一次使用信用支付后，　xx天后过期
>   * 用户注册会员后需要为用户注册sendbird,　方便用户使用app内置聊天,注册凭证是用户的uuid
>   * 未完待续
