<?php

/**
 * FuelPHP Breadcrumb
 * "MIT License"
 * @Copyright 2017 Keite Trần <anhtrn90@gmail.com>
 * @Author anhtn
 */

namespace Breadcrumb;

class Breadcrumb {

  /**
   * @array Data[]
   */
  protected static $data = array();

  /**
   * @string iconClass
   */
  protected static $iconClass = null;

  /**
   * Load init 
   * 
   * @access	protected
   * @return void
   */
  protected static function _init() {
    \Config::load('breadcrumb', true, true);
    static::$iconClass = \Config::get('breadcrumb.iconClass', static::$iconClass);
  }

  /**
   * Create new breadcrumb level
   *
   * @param string $name
   * @param string $link (defaul null)
   * @param string $iconClass (defaul null)
   * @access	public
   * @return	void
   */
  public static function create($name, $link = '', $iconClass = '') {
    static::$data[] = (object) array(
              'name' => $name,
              'link' => (empty($link) ? null : \Uri::create($link)),
              'iconClass' => !(empty($iconClass)) ? $iconClass : static::$iconClass
    );
  }

  /**
   * Clear all breadcrumb
   * 
   * @param none
   * @return void
   */
  public static function clear() {
    static::$data = array();
  }

  /**
   * Render breadcrumb to template
   * 
   * @param none
   * @return html template with data
   */
  public static function render() {
    $res = array();
    $current = end(static::$data);
    if (!empty(static::$data)) {
      foreach (static::$data AS $key => $item) {
        $item->current = false;
        if ($item === $current) {
          $item->current = true;
        }
        $res[] = $item;
      }
      $view = \View::forge('breadcrumb', null, false);
      $view->set('breadcrumb', $res, false);
      return $view->render();
    }
    return null;
  }

}
