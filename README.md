钉钉扩展包，当前只封装了 *Webhook* 功能

## 安装

``` bash
$ composer require jormin/dingtalk -vvv
```

## 通用配置

 - webhook: 群机器人Webhook

## 通用响应

| 参数  | 类型  | 是否必须  | 描述  |
| ------------ | ------------ | ------------ | ------------ |
| success| bool | 是 | true：操作成功 false:操作失败 |
| message | string | 是 | 结果说明 |
| data | array | 否 | 返回数据 |


## 使用

1. 生成钉钉对象

    ``` php
    $webhook = 'your webhook';
    $dingtalk = new \Jormin\Dingtalk\Dingtalk($webhook);
    ```

2. 发送文本消息

    ```
    /**
     * 发送文本消息
     * @param string $content 消息内容
     * @param array $mobiles 被@人的手机号(在content里添加@人的手机号)
     * @param bool $isAtAll @所有人时：true，否则为：false
     * @return array
     */
    $dingtalk->sendText($content, $mobiles = [], $isAtAll = false)
    ```

3. 发送链接消息

    ```
    /**
     * 发送链接消息
     * @param string $title 消息标题
     * @param string $text 消息内容。如果太长只会部分展示
     * @param string $messageUrl 点击消息跳转的URL
     * @param string $picUrl 图片URL
     * @return array
     */
    $dingtalk->sendLink($title, $text, $messageUrl, $picUrl = '')
    ```

4. 发送Markdown消息

    ```
     /**
     * 发送Markdown消息
     * @param string $title 首屏会话透出的展示内容
     * @param string $text markdown格式的消息
     * @param array $mobiles 被@人的手机号(在content里添加@人的手机号)
     * @param bool $isAtAll @所有人时：true，否则为：false
     * @return array
     */
    $dingtalk->sendMarkdown($title, $text, $mobiles = [], $isAtAll = false)
    ```

5. 发送ActionCard

    ```
     /**
      * 发送ActionCard
      * @param string $title 首屏会话透出的展示内容
      * @param string $text markdown格式的消息
      * @param array $btns 按钮，每个元素包含 title(按钮方案)、actionURL(点击按钮触发的URL)
      * @param int $btnOrientation 0-按钮竖直排列，1-按钮横向排列
      * @param int $hideAvatar 0-正常发消息者头像，1-隐藏发消息者头像
      * @return array
      */
    $dingtalk->sendActionCard($title, $text, $btns = [], $btnOrientation = 0, $hideAvatar = 0)
    ```

6. 发送FeedCard

    ```
     /**
      * 发送FeedCard
      * @param array $links 链接，每个元素包含 title(单条信息文本)、messageURL(点击单条信息到跳转链接)、picURL(单条信息后面图片的URL)
      * @return array
      */
    $dingtalk->sendFeedCard($links=[])
    ```

## 参考项目

1. [钉钉开发文档-自定义机器人](https://open-doc.dingtalk.com/microapp/serverapi2/qf2nxq)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
