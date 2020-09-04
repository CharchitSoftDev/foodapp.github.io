<?php namespace App\Controllers;

use App\Models\FoodItems;
use App\Models\UserModel;

class Registration extends BaseController
{
    public function index()
    {
        $this->menu();
    }

    public function view($page = 'home', $data = ['Home'])
    {
        if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $data["title"] = ucfirst($page);
        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
    public function save()
    {
        $model = new UserModel();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => ['label' => 'username', 'rules' => 'required', 'errors' => ['required' => 'Username is required']],
                'email' => ['label' => 'email', 'rules' => 'required|valid_email', 'errors' => ['required' => 'Email is required']],
                'password' => ['label' => 'password', 'rules' => 'required|min_length[8]', 'errors' => ['min_length' => 'Your password is too short']],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $this->view('register', $data);
            } else {
                $data = array(
                    "firstname" => $this->request->getPost('username'),
                    "email" => $this->request->getPost('email'),
                    "password" => $this->request->getPost('password'),
                    "is_veg" => $this->request->getPost('group'),
                    "restaurant_name" => $this->request->getPost('restaurant-name'),
                    "account_type" => $this->request->getGet('form'),
                );
                $model->saveUser($data);
                return redirect()->to('/registration/view');
            }
        }
    }

    public function getFoodItems()
    {
        $model = new FoodItems();
        $data['food'] = $model->getFoodItem();
        $this->view('restaurant_dashboard',$data);
    }
    public function menu()
    {
        $model = new FoodItems();
        $data['title'] = ucfirst("menu");
        $data['food'] = $model->getFoodItem();
        $this->view('menu',$data);
    }
    public function saveFood()
    {
        $model = new FoodItems();
        $rest_name = $model->getRestaurant(session()->get('email'));
        $this->request->getFile('food-img')->move(ROOTPATH . 'public/');
        $data = array(
            "name" => $this->request->getPost('food-name'),
            "description" => $this->request->getPost('food-description'),
            "price" => $this->request->getPost('food-price'),
            "Image" => $this->request->getFile('food-img')->getClientName(),
            "type" => $this->request->getPost('food-type'),
            "is_active" => $this->request->getPost('food-status'),
            "restaurant_name" => $rest_name['restaurant_name'],
        );
        $model->saveUser($data);
        return redirect()->to('/registration/view');
    }
    public function login()
    {
        $model = new UserModel();
        $user = $model->where('email', $this->request->getVar('email'))
            ->where('password', $this->request->getPost('password'))
            ->first();
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => ['label' => 'email', 'rules' => 'required|valid_email', 'errors' => ['required' => 'Email is required']],
                'password' => ['label' => 'password', 'rules' => 'required|min_length[8]', 'errors' => ['min_length' => 'Your password is too short']],
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $this->view('home', $data);
            } elseif (!$user) {
                $data["user"] = "Email or password don\'t found";
                $this->view('home', $data);
            } else {
                $this->setUserSession($user);
                if (session()->get('account_type') == "restaurant") {
                    return redirect()->to('/registration/getFoodItems');
                }
                return redirect()->to('/registration/menu');
            }
        }
    }
    public function order(){
        $data['user'] = session()->get('firstname');
        $this->view('order', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['u_id'],
            'firstname' => $user['firstname'],
            'email' => $user['email'],
            'is_veg' => $user['is_veg'],
            'restaurant_name' => $user['restaurant_name'],
            'account_type' => $user['account_type'],
            'success' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/registration/view/');
    }
}
