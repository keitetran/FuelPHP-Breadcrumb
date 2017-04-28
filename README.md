FuelPHP-Breadcrumb
================

Easy create breadcrumb

  \Breadcrumb::create('Home');
  \Breadcrumb::create('Level 2');
  \Breadcrumb::create('Level 3');
  
  
Create: 
- Level 1 -> Base Controller
- Level 2 -> Controller::befor
- Level 3 -> Controller::action
- Level ...........................
- Last level -> Controller::after

  
Configuration
==================

  1. Add package name to your config file
  
    'always_load' => array(
      'packages' => array(
        //'orm',
        'breadcrumb',
      )
    )

  2. Copy all file to fuel\package\breadcrumb
  3. Copy file fuel\packages\breadcrumb\config\breadcrumb.php to \fuel\app\config and change it.
  
Usage
====================

    public function action_index() {
      \Breadcrumb::create('Home');

      $this->template = \View::forge('empty');
      $view = \View::forge('home/index', $this->data);
      $this->template->content = $view;
    }
    
Registering messages
====================

    \Breadcrumb::create('level1');
   

Rendering messages
==================

The `Breadcrumb::render()` method returns an array of View instances. 

    <div class="container-fluid">
      <?php echo \Breadcrumb::render(); ?>
      <?php echo $content; ?>
    </div>

Custom template: Edit views/breadcrumb.php 


