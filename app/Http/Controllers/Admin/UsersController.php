<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Created by Igor Mazur
 * Date: 06.06.15 15:16
 */
class UsersController extends  AdminController
{
	/**
	 * @var array
	 */
	protected $roles = [ 1 => 'admin', 2 => 'subscriber'];

	private $permissions = [0=>'', -5=>'Admin',10=>'Customer'];

	/**
	 * @param User $user
	 * @param Request $request
	 * @return \Illuminate\View\View
	 */
	public function index(User $user, Request $request)
	{
		$users = $user->where(function($user) use($request){
			$user->where('name', 'LIKE', '%'.$request->get('search').'%')
				 ->orWhere('email', 'LIKE', '%'.$request->get('search').'%')
				 ->orWhere('city', 'LIKE', '%'.$request->get('search').'%')
				 ->orWhere('country', 'LIKE', '%'.$request->get('search').'%');
		})->paginate(20);

		$permissions= $this->permissions;

		return view('admin.users.index',compact('users','permissions'));
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
			return redirect()->route('dashboard.users.index')->withMessage('');
		}
		return redirect()->route('dashboard.users.edit',$user->id);
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
		$user = $user->findOrFail($id);

		return view('admin.users.edit',compact('user'))->withRoles($this->roles);
	}

	/**
	 * @param UpdateRequest $request
	 * @param User $user
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateRequest $request, User $user, $id)
	{
		$user->findOrFail($id)->update($request->all());



		if((int)$request->get('button')) {
			return redirect()->route('dashboard.users.index')->withMessage('');
		}

		return redirect()->route('dashboard.users.edit',$id);
	}

	/**
	 * @param User $user
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(User $user,$id)
	{
		$user->findOrFail($id)->delete();

		return redirect()->route('dashboard.users.index');
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

			return view('admin.users.index')->withUsers($users)->withPermissions($this->permissions)->withQ($request->get('q'));

		} catch(\Exception $e) {
			return redirect()->route('dashboard.users.index')->withMessage($e->getMessage());
		}
	}

}
