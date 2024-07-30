<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session;
use CodeIgniter\Validation\Validation;
use Config\Services;
use Psr\Log\LoggerInterface;
use eftec\bladeone\BladeOne;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url','html','form','text','web'];
    protected BladeOne $blade;
    protected array $data=[];
    protected Validation $validation;
    protected AdminModel $adminModel;
    protected Session  $session;

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $views = APPPATH . 'Views';
        $cache =  WRITEPATH. 'cache';
        $this->blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

        $this->session = Services::session();

        $this->validation =  Services::validation();
        $this->data['validation']= $this->session->getFlashdata('validation');

        $this->adminModel= model(AdminModel::class);

        $this->data['systemMessage']= $this->session->getFlashdata('systemMessage');
        $this->data['validation']= $this->session->getFlashdata('validation');

    }
}
