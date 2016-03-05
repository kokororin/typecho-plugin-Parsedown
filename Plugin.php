<?php
/**
 * Parsedown
 *
 * @package Parsedown Plugin
 * @author Kokororin
 * @version 1.0
 * @link https://kotori.love
 */

class Parsedown_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Abstract_Contents')->markdown = array('Parsedown_Plugin', 'markdown');
        Typecho_Plugin::factory('Widget_Abstract_Comments')->markdown = array('Parsedown_Plugin', 'markdown');
    }

    /**
     * 禁用插件
     */
    public static function deactivate()
    {}

    /**
     * 插件设置
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {}

    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {}

    public static function markdown($text)
    {
        require_once dirname(__FILE__) . '/Parsedown.php';
        return Parsedown::instance()
            ->setBreaksEnabled(true)
            ->text($text);
    }
}
