<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CustomerGrupsUser;

/**
 * Created by Igor Mazur
 * Date: 06.06.15 15:16
 */
class UsersController extends  AdminController
{
	/**
	 * @var array
	 */
	protected $roles = [
        0   =>  '',
        1   =>  'Админ',
        2   =>  'Покупатель',
        3   =>  'Разовый покупатель',
        4   =>  'Монтажник'
    ];

	private $permissions = [
	    0   =>  '',
        -5  =>  'Админ',
        5   =>  'Монтажник',
        10  =>  'Покупатель'
    ];

	/**
	 * @param User $user
	 * @param Request $request
	 * @return \Illuminate\View\View
	 */
	public function index(User $user, Request $request)
	{
        if ($request->ajax()){

            if(!empty($request->get('search'))){
                $ar = [' ', '-', '-', '(', ')', '+38'];
                $search = trim ($request->get('search'));
                foreach ($ar as $v){
                    $search = str_replace($v, '', $search);
                }
                $ar = str_split($search);
                //dd($ar);
                if(is_numeric($ar[1])){
                    //dd($ar);
                    $search = '('.$ar[0].$ar[1].$ar[2].')'.$ar[3].$ar[4].$ar[5].'-'.$ar[6].$ar[7].'-'.$ar[8].$ar[9];
                }else{
                    $search = $request->get('search');
                }
            }else{
                $search = null;
            }


            $order = $request->get('sortBy') ? $request->get('sortBy') : 'id';
            $por = $request->get('sortByPor') ? $request->get('sortByPor') : 'DESC';
            $paginate = $request->get('paginate') ? $request->get('paginate') : 20;
            $page = $request->get('page') ? $request->get('page') : 1;
            $status = $request->get('status') == '' ? '' : $request->get('status');
            $role_id = $request->get('role_id') == 0 ? 0 : $request->get('role_id');

            $users = $user->where(function($user) use($search){
                $user->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%')
                    ->orWhere('city', 'LIKE', '%'.$search.'%')
                    ->orWhere('organization', 'LIKE', '%'.$search.'%')
                    ->orWhere('phone_1', 'LIKE', '%'.$search.'%')
                    ->orWhere('phone_2', 'LIKE', '%'.$search.'%')
                    ->orWhere('phone_3', 'LIKE', '%'.$search.'%')
                    ->orWhere('phone', 'LIKE', '%'.$search.'%');

            })->where('status', $status ?: 'LIKE', '%')
             ->where('role_id', $role_id ?: 'LIKE', '%')
             ->orderBy($order, $por)->paginate($paginate);

            return [
                'users' => $users,
                'permissions' => $this->permissions,
                'params' => [
                    'search' => $search,
                    'sortBy' =>$order,
                    'sortByPor' => $por,
                    'paginate' => $paginate,
                    'page' => $page,
                    '_token' => $request->get('_token'),
                    'status' => $status,
                    'role_id' => $role_id
                ]
            ];

        }

	    $ar = [' ', '-', '-', '(', ')', '+38'];
        $search = $request->get('search');

        foreach ($ar as $v){
            $search = str_replace($v, '', $search);
        }

		$users = $user->where(function($user) use($search){
			$user->where('name', 'LIKE', '%'.$search.'%')
				 ->orWhere('email', 'LIKE', '%'.$search.'%')
				 ->orWhere('city', 'LIKE', '%'.$search.'%')
                 ->orWhere('organization', 'LIKE', '%'.$search.'%')
                 ->orWhere('phone_1', 'LIKE', '%'.$search.'%')
                 ->orWhere('phone_2', 'LIKE', '%'.$search.'%')
                 ->orWhere('phone_3', 'LIKE', '%'.$search.'%')
				 ->orWhere('phone', 'LIKE', '%'.$search.'%');

		})->orderBy('id', 'DESC')->paginate(30);

		$permissions= $this->permissions;

		return view('admin.users.indexget',compact('users','permissions', 'search'));
	}

	public function indexGet(){
        return view('admin.users.indexget');
    }

	/**
	 * @return mixed
	 */
	public function create()
	{
		return view('admin.users.create')->withRoles($this->roles)->withUser(new User);
	}

	/**
	 * @param CreateRequest $request
	 * @param User $user
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateRequest $request, User $user)
	{
		$user = $user->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('users.indexGet')->withMessage('');
		}
		return redirect()->route('users.edit',$user->id);
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function show($id)
	{
		$user = User::with('orders.products','reviews.product')->findOrFail($id);
		return view('admin.users.show', compact('user'));
	}

	/**
	 * @param User $user
	 * @param $id
	 * @return mixed
	 */
	public function edit(User $user, $id)
	{
		$user = $user->where('id', $id)->with('customerGroups')->first();

		return view('admin.users.edit',compact('user'))->withRoles($this->roles);
	}

	/**
	 * @param UpdateRequest $request
	 * @param User $user
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateRequest $request, User $user, CustomerGrupsUser $customerGroupuser, $id)
	{
        $userPhone = $user->where('phone', $request->phone)->first();

	    if($userPhone && $userPhone->id != $id){
            return redirect()->route('users.edit', $id)->with('message','<h4 align="center" style="color: red">Такой номер телефона уже занят.</h4>');
        }

	    $user->findOrFail($id)->update($request->all());

        $customerGroupuser->where('user_id', $id)->delete();
        //dd($request->customer_group_id);
        if($request->customer_group_id[0] != ''){
            $grups = [];
            foreach ($request->customer_group_id as $key => $value){
                $grups[] = ['user_id' => $id, 'customer_group_id' => $value];
            }
            $customerGroupuser->insert($grups);
        }

		if((int)$request->get('button')) {
			return redirect()->route('users.indexGet')->withMessage('');
		}

		return redirect()->route('users.edit',$id);
	}

	/**
	 * @param User $user
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(User $user,$id)
	{
		$user->findOrFail($id)->delete();

		return redirect()->route('users.indexGet');
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\View\View
	 */
	public function search(Request $request)
	{
		try{
			$query   = $this->prepareSearchQuery($request->get('q'));

			$users = User::where('email', 'like', $query)->orWhere('name','like',$query)->paginate();

			return view('admin.users.indexget')->withUsers($users)->withPermissions($this->permissions)->withQ($request->get('q'));

		} catch(\Exception $e) {
			return redirect()->route('users.users.indexGet')->withMessage($e->getMessage());
		}
	}

	public function delete(User $user,$id){
        $user->findOrFail($id)->delete();
    }

}
