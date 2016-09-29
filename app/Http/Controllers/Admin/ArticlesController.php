<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Models\Page;

/**
 * Class ArticlesController
 * @package App\Http\Controllers\Admin
 */
class ArticlesController extends AdminController
{
	/**
	 * @param Article $article
	 * @return \Illuminate\View\View
	 */
	public function index(Article $article)
	{
		$articles = $article->orderBy('id','desc')->paginate();

		return view('admin.articles.index',compact('articles'));
	}

	/**
	 * @param Page $page
	 * @return \Illuminate\View\View
	 */
	public function create(Page $page)
	{
		return view('admin.articles.create')
			->withPages($page->lists('title','id'))
				->withArticle(new Article);
	}

	/**
	 * @param CreateRequest $request
	 * @param Article $article
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateRequest $request, Article $article)
	{
		$article = $article->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.articles.index')->withMessage('');
		}

		return redirect()->route('dashboard.articles.edit',[$article->id]);

	}

	/**
	 * @param Article $article
	 * @param Page $page
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit(Article $article, Page $page, $id)
	{
		$article = $article->findOrFail($id);

		$pages = $page->lists('title','id');

		return view('admin.articles.edit',compact('article','pages'));
	}

	/**
	 * @param UpdateRequest $request
	 * @param Article $article
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateRequest $request, Article $article, $id)
	{
		$article = $article->findOrFail($id)->update($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.articles.index')->withMessage('');
		}

		return redirect()->route('dashboard.articles.edit',[$article->id]);

	}

	/**
	 * @param Article $article
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Article $article, $id)
	{
		$article->findOrFail($id)->delete();

		return redirect()->route('dashboard.articles.index');
	}

}
